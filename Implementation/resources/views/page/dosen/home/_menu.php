<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
  <li class="heading">
      <h3 class="uppercase">Administrator</h3>
  </li>
  <li class="nav-item start active">
      <a href="index.php" class="nav-link">
          <i class="icon-home"></i> Beranda </a>
  </li>
  <li class="nav-item">
      <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-users"></i>
          <span class="title">Manajemen Pengguna</span>
          <span class="selected"></span>
          <span class="arrow open"></span>
      </a>
      <ul class="sub-menu">
          <li class="nav-item">
              <a href="index.php?page=allusers" class="nav-link ">
                  <i class="icon-user"></i>
                  <span class="title">Semua Pengguna</span>
                  <span class="selected"></span>
              </a>
          </li>
          <li class="nav-item">
              <a href="index.php?page=importusers" class="nav-link ">
                  <i class="icon-user-follow"></i>
                  <span class="title">Import Pengguna</span>
                  <span class="badge badge-success">1</span>
              </a>
          </li>
      </ul>
  </li>
  <li class="nav-item  ">
      <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-drawer"></i>
          <span class="title">Manajemen Matkul</span>
          <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
          <li class="nav-item  ">
              <a href="index.php?page=allcourses" class="nav-link ">
                  <i class="icon-book-open"></i>
                  <span class="title">Semua Mata Kuliah</span>
              </a>
          </li>
          <li class="nav-item  ">
              <a href="index.php?page=enrollusers" class="nav-link ">
                  <i class="icon-login"></i>
                  <span class="title">Enroll Pengguna</span>
              </a>
          </li>
          <li class="nav-item  ">
              <a href="index.php?page=importcourses" class="nav-link ">
                  <i class="icon-arrow-right"></i>
                  <span class="title">Import Mata Kuliah</span>
              </a>
          </li>
      </ul>
  </li>
  <li class="nav-item  ">
      <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-equalizer"></i>
          <span class="title">Manajemen Sistem</span>
          <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
          <li class="nav-item  ">
              <a href="index.php?page=logactvities" class="nav-link ">
                  <i class="icon-list"></i>
                  <span class="title">Log Aktivitas</span>
              </a>
          </li>
          <li class="nav-item  ">
              <a href="index.php?page=backups" class="nav-link ">
                  <i class="icon-cloud-upload"></i>
                  <span class="title">Backup &amp; Restore</span>
                  <span class="badge badge-danger">2</span>
              </a>
          </li>
          <li class="nav-item  ">
              <a href="index.php?page=coursearchives" class="nav-link ">
                  <i class="icon-briefcase"></i>
                  <span class="title">Arsip Perkuliahan</span>
              </a>
          </li>
      </ul>
  </li>
  <li class="heading">
      <h3 class="uppercase">Dosen &amp; Mahasiswa</h3>
  </li>
  <li class="nav-item">
      <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-graduation"></i>
          <span class="title">Mata Kuliah</span>
          <span class="arrow "></span>
      </a>
      <ul class="sub-menu">
          <?php 
          $courses = array("Pemrograman Internet", "Basis Data", "Sistem Terdistribusi");
          foreach ($courses as $data):            
          ?>
          <li class="nav-item">
              <a href="javascript:;" class="nav-link nav-toggle">
                  <i class="icon-notebook"></i><?php echo "$data"; ?>
                  <span class="arrow"></span>
              </a>
              <ul class="sub-menu">
                  <li class="nav-item">
                      <a href="index.php?page=coursefront" class="nav-link">                          
                          <i class="icon-speedometer"></i> Beranda </a>
                  </li>
                  <li class="nav-item">
                      <a href="index.php?page=courseoutline" class="nav-link">                          
                          <i class="icon-vector"></i> Outline Mata Kuliah </a>
                  </li>
                  <li class="nav-item">
                      <a href="index.php?page=coursematerial" class="nav-link">                          
                          <i class="icon-layers"></i> Materi Perkuliahan </a>
                  </li>
                  <li class="nav-item">
                      <a href="index.php?page=courseassignment" class="nav-link">                          
                          <i class="icon-puzzle"></i> Penugasan </a>
                  </li>
                  <li class="nav-item">
                      <a href="index.php?page=coursegrade" class="nav-link">                          
                          <i class="icon-calculator"></i> Rekapitulasi Nilai </a>
                  </li>
              </ul>
          </li>
        <?php endforeach; ?>          
      </ul>
  </li>
  <li class="nav-item  ">
      <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-settings"></i>
          <span class="title">Pengaturan Aplikasi</span>
          <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
          <li class="nav-item  ">
              <a href="index.php?page=profile" class="nav-link ">
                  <i class="icon-user-following "></i>
                  Profil Pengguna
              </a>
          </li>
          <li class="nav-item ">
              <a href="index.php?page=logout" class="nav-link ">
                  <i class="icon-key"></i>
                  Logout
              </a>
          </li>
      </ul>
  </li>
</ul>
