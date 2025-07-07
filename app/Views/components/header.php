<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="<?= base_url()?>NiceAdmin/assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Toko</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar d-flex align-items-center justify-content-between w-100" style="gap: 1rem;">
    <form class="search-form d-flex align-items-center flex-grow-1" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>

    <?php if (session()->has('diskon_nominal')): ?>
      <div id="diskonAlert"
           class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between shadow px-4 py-2 m-0"
           role="alert"
           style="font-size: 18px; min-width: 400px; max-width: 600px;">
          <strong>Diskon hari ini:</strong>&nbsp;<span>Rp <?= number_format(session('diskon_nominal'), 0, ',', '.') ?> per item</span>
        
      </div>
    <?php endif; ?>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= base_url()?>NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?= session()->get('username'); ?> (<?= session()->get('role'); ?>)</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= session()->get('username'); ?></h6>
            <span><?= session()->get('role'); ?></span>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="logout">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>
        </ul>
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->