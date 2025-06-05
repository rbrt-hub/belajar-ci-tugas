<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategori;

    public function __construct()
    {
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $kategori = $this->kategori->findAll();
        $data['kategori'] = $kategori;

        return view('v_kategori', $data);
    }

    public function store()
    {
        $this->kategoriModel->save([
            'nama' => $this->request->getPost('nama')
        ]);
        return redirect()->to('/kategori')->with('message', 'Data berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama' => $this->request->getPost('nama')
        ]);
        return redirect()->to('/kategori')->with('message', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/kategori')->with('message', 'Data berhasil dihapus');
    }
}
