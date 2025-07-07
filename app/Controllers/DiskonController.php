<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskonModel;

    public function __construct()
    {
        $this->diskonModel = new DiskonModel();
        helper(['form']);
    }

public function index()
{
    $data['diskon'] = $this->diskonModel->findAll();
    $data['mode'] = 'index';

    // CARI DISKON HARI INI
    $today = date('Y-m-d');
    $diskonAktif = $this->diskonModel->where('tanggal', $today)->first();

    // SIMPAN KE SESSION
    if ($diskonAktif) {
        session()->set('diskon_aktif', $diskonAktif['nominal']);
    } else {
        session()->remove('diskon_aktif'); // Tidak ada diskon hari ini
    }

    return view('v_diskon', $data);
}


    public function create()
    {
        if (session()->get('role') != 'admin') return redirect()->to('/');

        $data['mode'] = 'create';
        $data['diskon'] = $this->diskonModel->findAll();
        return view('v_diskon', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'tanggal' => 'required|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->diskonModel->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('/diskon')->with('redirect_success', 'Data berhasil ditambahkan.');
    }

    public function update($id)
    {
        if (!$this->validate([
            'nominal' => 'required|numeric'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->diskonModel->update($id, [
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('/diskon')->with('redirect_success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->diskonModel->delete($id);
        return redirect()->to('/diskon')->with('redirect_success', 'Data berhasil dihapus.');
    }
}