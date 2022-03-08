<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="/modul">
                <img src="/assets/img/logo-labuan.png" class="mt-6 ml-4 navbar-brand-img" style="
                max-height: 5rem;">
            </a>
            <div class=" ml-auto mt-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner mt-5">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">

                        <a class="nav-link" href="#navbar-tanah" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-dashboards">
                            <i class="fas fa-book text-primary"></i>
                            <span class="nav-link-text">TANAH</span>
                        </a>
                        <div class="collapse" id="navbar-tanah">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> SENARAI TANAH </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/datatanah" class="nav-link">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> PERMOHONAN TANAH </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a class="nav-link" href="#navbar-bangunan-premis" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-dashboards">
                            <i class="fas fa-book text-primary"></i>
                            <span class="nav-link-text">BANGUNAN / PREMIS</span>
                        </a>
                        <div class="collapse" id="navbar-bangunan-premis">
                            <ul class="nav nav-sm flex-column">
                                <a class="nav-link" href="#senarai-bangunan" data-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="navbar-dashboards">
                                    <span class="sidenav-mini-icon"> </span>
                                    <span class="nav-link-text ml-2">SENARAI</span>
                                </a>
                                <div class="collapse" id="senarai-bangunan">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="/jkrpataf612" class="nav-link ">
                                                <span class="sidenav-normal"> BANGUNAN/PREMIS</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/senarai-blok-bangunan" class="nav-link ">
                                                <span class="sidenav-normal"> BLOK BANGUNAN </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/senarai-maklumat-aras" class="nav-link ">
                                                <span class="sidenav-normal"> ARAS DAN RUANG </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/senarai-binaan-luar" class="nav-link ">
                                                <span class="sidenav-normal"> BINAAN LUAR </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <li class="nav-item">
                                    <a href="/jkrpataf68"
                                        class="nav-link  {{ Request::is('jkrpataf68') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> PERMOHONAN <br> BANGUNAN/PREMIS </span>
                                    </a>
                                </li>

                                <a class="nav-link" href="#pengumpulan-data" data-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="navbar-dashboards">
                                    <span class="sidenav-mini-icon"> </span>
                                    <span class="nav-link-text ml-2">PENGUMPULAN DATA <br> ASET KHUSUS</span>
                                </a>
                                <div class="collapse" id="pengumpulan-data">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="/dataasetkhusus" class="nav-link ">
                                                <span class="sidenav-normal"> BLOK </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/maklumataras" class="nav-link ">
                                                <span class="sidenav-normal"> ARAS & RUANG </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/dakbinaanluar" class="nav-link ">
                                                <span class="sidenav-normal"> BINAAN LUAR </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </ul>
                        </div>


                        <a class="nav-link" href="#navbar-laporan-sijil" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-dashboards">
                            <i class="fas fa-book text-primary"></i>
                            <span class="nav-link-text">LAPORAN & SIJIL</span>
                        </a>
                        <div class="collapse" id="navbar-laporan-sijil">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/jkrpata92" class="nav-link ">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> LAPORAN PEMULIHAN <br>/ UBAH SUAI / NAIK
                                            TARAF /
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jkrpataf102" class="nav-link ">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> LAPORAN VERIFIKASI DAN <br> PERAKUAN
                                            PELUPUSAN
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jkrpataf104" class="nav-link ">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> PENENTUSAHAN PELUPUSAN <br> ASET
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jkrpataf114" class="nav-link ">
                                        <span class="sidenav-mini-icon"> </span>
                                        <span class="sidenav-normal"> SIJIL HAPUS KIRA ASET
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a class="nav-link" href="#navbar-jalan" data-toggle="collapse" role="button"
                            aria-expanded="{{ Request::is('plpkpa0102*') ? 'true' : 'false' }}"
                            aria-controls="navbar-dashboards">

                            <i class="fas fa-road text-primary"></i>
                            <span class="nav-link-text">JALAN</span>
                        </a>

                        <div class="collapse {{ Request::is('plpkpa0102*') ? 'show' : '' }}" id="navbar-jalan">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="/dashboard-jalan" class="nav-link {{ Request::is('jalan*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon">D</span>
                                        <span class="sidenav-normal"> Dashboard Aduan <br/>(PL-PK(PA)-01/02) </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/jalan" class="nav-link {{ Request::is('jalan*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon">Pendaftaran Jalan </span>
                                        <span class="sidenav-normal"> Pendaftaran Jalan </span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="/bahujalan"
                                        class="nav-link {{ Request::is('bahujalan*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon">Pendaftaran BahuJalan </span>
                                        <span class="sidenav-normal"> Pendaftaran BahuJalan </span>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="/plpkpa0102"
                                        class="nav-link {{ Request::is('plpkpa0102*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon"> ATA(01/02) </span>
                                        <span class="sidenav-normal"> Aduan <br/>(PL-PK(PA)-01/02) </span>
                                    </a>
                                </li>


                            </ul>
                        </div>


                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
