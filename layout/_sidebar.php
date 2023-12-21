<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bolder ms-2">Absen Siswa</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <?php function active($link, $halaman)
  {
    if ($halaman == $link) {
      return "active";
    }
  }
  ?>
  <ul class="menu-inner py-1">
    <li class="menu-item nav-item nav-link <?= active("index", $halaman); ?>">
      <a href="index.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <?php if (($_SESSION['level'] == "admin")) { ?>
      <li class="menu-item nav-item nav-link <?= active("input", $halaman); ?>">
        <a href="input_siswa.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Analytics">Input Data Siswa</div>
        </a>
      </li>
      <li class="menu-item nav-item nav-link <?= active("datasiswa", $halaman); ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Kelas</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="kelas.php?kelas=ra" class="menu-link">
              <div data-i18n="Account">XI RA</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="kelas.php?kelas=rb" class="menu-link">
              <div data-i18n="Notifications">XI RB</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="kelas.php?kelas=rc" class="menu-link">
              <div data-i18n="Connections">XI RC</div>
            </a>
          </li>
        </ul>
      </li>
    <?php } else { ?>
      <li class="menu-item nav-item nav-link <?= active("absen_masuk", $halaman); ?>">
        <a href="absen.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Analytics">Absen Masuk</div>
        </a>
      </li>
      <li class="menu-item nav-item nav-link <?= active("absen_keluar", $halaman); ?>">
        <a href="keluar.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-box"></i>
          <div data-i18n="Analytics">Absen Keluar</div>
        </a>
      </li>
      <li class="menu-item nav-item nav-link <?= active("data_absen", $halaman); ?>">
        <a href="data_absen.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-box"></i>
          <div data-i18n="Analytics">Data Absen</div>
        </a>
      </li>
    <?php } ?>
  </ul>
</aside>