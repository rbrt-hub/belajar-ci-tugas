<!-- Sidebar -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Flash messages -->
        <?php if (session()->getFlashdata('redirect_success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('redirect_success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Home -->
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == '') ? '' : 'collapsed' ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <!-- Keranjang -->
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'keranjang') ? '' : 'collapsed' ?>" href="keranjang">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li>

        <!-- Admin Only -->
        <?php if (session()->get('role') == 'admin') : ?>
            <!-- Produk -->
            <li class="nav-item">
                <a class="nav-link <?= (uri_string() == 'produk') ? '' : 'collapsed' ?>" href="<?= base_url('produk') ?>">
                    <i class="bi bi-receipt"></i>
                    <span>Produk</span>
                </a>
            </li>

            <!-- Produk Kategori -->
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'produkkategori') ? "" : "collapsed" ?>" href="produkkategori">
                    <i class="bi bi-receipt"></i>
                    <span>Produk Kategori</span>
                </a>
            </li>
        <?php endif; ?>

        <!-- Contact -->
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'faq') ? '' : 'collapsed' ?>" href="contact">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar -->
