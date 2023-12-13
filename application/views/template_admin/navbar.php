<body>
    <script src="<?= base_url() ?>assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="https://unkartur.ac.id/"><img src="<?= base_url() ?>/assets/unkartur/logo_web.png" alt="Logo"></a>
                        </div>
                        <div class="header-top-right">

                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2" >
                                        <img src="<?= base_url() ?>assets/compiled/jpg/1.jpg" alt="Avatar">
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name"><strong><?php echo $nama; ?></strong></h6>
                                        <p class="user-dropdown-status text-sm text-muted"><strong><?php echo $akses; ?></strong></p>
                                    </div>
                                </a>
                                <ul class="menu-item dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="far fa-image"></i> Ubah Foto Profil</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-key"></i> Ubah Password</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                                </ul>
                            </div>

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            
                            
                            
                            <li
                                class="menu-item  ">
                                <a href="<?php echo base_url() ?>Home" class='menu-link'>
                                    <span><i class="fas fa-home"></i> Beranda</span>
                                </a>
                            </li>
                            
                            
                            <?php if($this->session->userdata('akses')=='Administrator'){ ?>
                            
                                
                            <?php } if($this->session->userdata('akses')=='Dosen'){ ?>
                                    <li
                                class="menu-item  ">
                                <a href="#" class='menu-link'>
                                    <span><i class="fas fa-user"></i> SDM</span>
                                </a>
                            </li>
                            <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <span><i class="fas fa-users"></i> Mahasiswa</span>
                                </a>
                            
                            <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url('') ?>"
                                                    class='submenu-link'>Daftar Mahasiswa</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Validasi KRS Mahasiswa</a>

                                                
                                            </li>
                                        </ul>
                                    </div>    
                                </div>           
                            </li>
                                        <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <span><i class="fas fa-graduation-cap"></i> Perkuliahan</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url() ?>Dosen/Matkul"
                                                    class='submenu-link'>Jadwal Kelas Perkuliahan</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Agenda Hari Perkuliahan</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Absensi Perkuliahan</a>

                                                
                                            </li>
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>RPS</a>

                                                
                                            </li>
                                          
                                        </ul>
                                    </div>    
                                </div>
                                </li> 
                                        <?php } if($this->session->userdata('akses')=='Mahasiswa'){ ?>
                                            <li
                                class="menu-item  ">
                                <a href="#" class='menu-link'>
                                    <span><i class="fas fa-user"></i> Profil</span>
                                </a>
                            </li>

                                        <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <span><i class="fas fa-graduation-cap"></i> Perkuliahan</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Kartu Rencana Studi Online</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Kartu Hasil Studi</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Jadwal Perkuliahan</a>

                                                
                                            </li>
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Kuesioner Penilaian Dosen</a>

                                                
                                            </li>
                                          
                                        </ul>
                                    </div>    
                                </div>
                                </li> 
                                <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <span><i class="fas fa-print"></i> Laporan</span>
                                </a>
                            
                            <div
                                class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Kartu Rencana Studi</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Kartu Hasil Studi</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Ringkasan Hasil Studi</a>

                                                
                                            </li>
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Transkrip Mahasiswa</a>

                                                
                                            </li>
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Kartu Ujian Mahasiswa</a>

                                                
                                            </li>
                                             <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Laporan Kustom</a>

                                                
                                            </li>
                                        </ul>
                                    </div>    
                            </div>
                            </li>
                                <li
                                class="menu-item  has-sub">
                                <a href="#" class='menu-link'>
                                    <span><i class="far fa-money-bill-alt"></i> Pembayaran</span>
                                </a>
                            
                            <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Pembayaran Tagihan</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="#"
                                                    class='submenu-link'>Pembayaran Manual</a>

                                                
                                            </li>
                                        </ul>
                                    </div>    
                                </div>           
                            </li>

                                <?php if($this->session->userdata('ses_smt') > 5){ ?>
                                    <li
                                        class="menu-item  ">
                                        <a href="<?php echo base_url() ?>Tts" class='menu-link'>
                                            <span><i class="fas fa-tachometer-alt"></i> Tes Tingkat Stress Mahasiswa</span>
                                        </a>
                                    </li>
                                <?php }; ?>
                            <?php }; ?>
                            
                        </ul>
                    </div>
                </nav>

            </header>