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

                        <a class="nav-link" href="#navbar-pendaftaran_ata" data-toggle="collapse" role="button"
                            aria-expanded="{{ Request::is('jkrpataf68*','jkrpata92*','jkrpataf102*','jkrpataf69*','jkrpataf610*','jkrpataf612*','jkrpataf114*')? 'true': 'false' }}"
                            aria-controls="navbar-dashboards">

                            <i class="fas fa-book text-primary"></i>
                            <span class="nav-link-text">Pendaftaran</span>
                        </a>
                        <div class="collapse {{ Request::is('jkrpataf68*','jkrpata92*','jkrpataf102*','jkrpataf69*','jkrpataf610*','jkrpataf612*','jkrpataf114*')? 'show': '' }}"
                            id="navbar-pendaftaran_ata">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/jkrpataf68"
                                        class="nav-link {{ Request::is('jkrpataf68*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon"> ATA(F6/8) </span>
                                        <span class="sidenav-normal"> JKR.PATA.F6/8 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jkrpataf69"
                                        class="nav-link {{ Request::is('jkrpataf69*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon"> ATA(F6/9) </span>
                                        <span class="sidenav-normal"> JKR.PATA.F6/9 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jkrpataf610"
                                        class="nav-link {{ Request::is('jkrpataf610*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon"> ATA(F6/10) </span>
                                        <span class="sidenav-normal"> JKR.PATA.F6/10 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jkrpataf612"
                                        class="nav-link {{ Request::is('jkrpataf612*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon"> ATA(F6/12) </span>
                                        <span class="sidenav-normal"> JKR.PATA.F6/12 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jkrpata92"
                                        class="nav-link {{ Request::is('jkrpata92*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon"> ATA(9/2) </span>
                                        <span class="sidenav-normal"> JKR.PATA.9/2 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jkrpataf102"
                                        class="nav-link {{ Request::is('jkrpataf102*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon"> ATA(F10/02) </span>
                                        <span class="sidenav-normal"> JKR.PATA.F10/2 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jkrpataf114" class="nav-link">
                                        <span class="sidenav-mini-icon"> ATA(F11/4) </span>
                                        <span class="sidenav-normal"> JKR.PATA.F11/4 </span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <a class="nav-link" href="#navbar-penyelenggaraan_ata" data-toggle="collapse"
                            role="button"
                            aria-expanded="{{ Request::is('dakbinaanluar*', 'dataasetkhusus*', 'jkrpataf104*', 'gambarblok*', 'gambarbinaanluar*')? 'true': 'false' }}"
                            aria-controls="navbar-dashboards">

                            <i class="fas fa-wrench text-primary"></i>
                            <span class="nav-link-text">Penyelenggaraan</span>
                        </a>
                        <div class="collapse {{ Request::is('dakbinaanluar*', 'dataasetkhusus*', 'jkrpataf104*', 'gambarblok*', 'gambarbinaanluar*')? 'show': '' }}"
                            id="navbar-penyelenggaraan_ata">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ Request::is('jkrpataf104*') ? 'active' : '' }}">
                                    <a href="/jkrpataf104" class="nav-link">
                                        <span class="sidenav-mini-icon"> ATA12(1) </span>
                                        <span class="sidenav-normal"> JKR.PATA.F10/4 </span>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ Request::is('dataasetkhusus*') ? 'active' : '' }}">
                                    <a href="/dataasetkhusus" class="nav-link">
                                        <span class="sidenav-mini-icon"> Data Aset Khusus Bangunan</span>
                                        <span class="sidenav-normal"> Data Aset Khusus Blok </span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ Request::is('dakbinaanluar*') ? 'active' : '' }}">
                                    <a href="/dakbinaanluar" class="nav-link">
                                        <span class="sidenav-mini-icon"> Data Aset Khusus Binaaan Luar </span>
                                        <span class="sidenav-normal"> Data Aset Khusus Binaan Luar </span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ Request::is('gambarblok*') ? 'active' : '' }}">
                                    <a href="/gambarblok" class="nav-link">
                                        <span class="sidenav-mini-icon"> Gambar Blok </span>
                                        <span class="sidenav-normal"> Gambar Blok Bangunan </span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ Request::is('gambarbinaanluar*') ? 'active' : '' }}">
                                    <a href="/gambarbinaanluar" class="nav-link">
                                        <span class="sidenav-mini-icon"> Gambar Binaan Luar </span>
                                        <span class="sidenav-normal"> Gambar Binaan Luar </span>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <a class="nav-link" href="#navbar-jalan" data-toggle="collapse" role="button"
                            aria-expanded="{{ Request::is('plpkpa0102*') ? 'true' : 'false' }}"
                            aria-controls="navbar-dashboards">

                            <i class="fas fa-road text-primary"></i>
                            <span class="nav-link-text">Jalan</span>
                        </a>

                        <div class="collapse {{ Request::is('plpkpa0102*') ? 'show' : '' }}" id="navbar-jalan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/plpkpa0102"
                                        class="nav-link {{ Request::is('plpkpa0102*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon"> ATA(01/02) </span>
                                        <span class="sidenav-normal"> PL-PK(PA)-01/02 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jalan" class="nav-link {{ Request::is('jalan*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon">Pendaftaran Jalan </span>
                                        <span class="sidenav-normal"> Pendaftaran Jalan </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/bahujalan"
                                        class="nav-link {{ Request::is('bahujalan*') ? 'active' : '' }}">
                                        <span class="sidenav-mini-icon">Pendaftaran BahuJalan </span>
                                        <span class="sidenav-normal"> Pendaftaran BahuJalan </span>
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
