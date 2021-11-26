<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand">
                <img src="/assets/img/logo-labuan.png" class="mt-6 ml-4 navbar-brand-img" style="
                max-height: 5rem;">
            </a>
            <div class=" ml-auto ">
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

                        <a class="nav-link" href="#navbar-penerimaan" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-dashboards">
                            <i class="fas fa-plus-square text-primary"></i>
                            <span class="nav-link-text">Penerimaan</span>
                        </a>
                        <div class="collapse {{ Request::is('kewps1', 'kewps2') ? 'show' : '' }}"
                            id="navbar-penerimaan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/kewps1" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS1 </span>
                                        <span class="sidenav-normal"> KEW.PS-1 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps2" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS2 </span>
                                        <span class="sidenav-normal"> KEW.PS-2 </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a class="nav-link" href="#navbar-merekod" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-dashboards">

                            <i class="fas fa-book text-primary"></i>
                            <span class="nav-link-text">Merekod Stok</span>
                        </a>
                        <div class="collapse " id="navbar-merekod">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/kewps3a" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS3(A) </span>
                                        <span class="sidenav-normal"> KEW.PS-3 (A)</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/kewps3b" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS3(B) </span>
                                        <span class="sidenav-normal"> KEW.PS-1 (B)</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/kewps4" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS4 </span>
                                        <span class="sidenav-normal"> KEW.PS-4 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps6" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS6 </span>
                                        <span class="sidenav-normal"> KEW.PS-6 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps5" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS5 </span>
                                        <span class="sidenav-normal"> KEW.PS-5 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps14" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS14 </span>
                                        <span class="sidenav-normal"> KEW.PS-14 </span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <a class="nav-link" href="#navbar-pengeluaran" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-dashboards">

                            <i class="fas fa-search-minus text-primary"></i>
                            <span class="nav-link-text">Pengeluaran</span>
                        </a>
                        <div class="collapse " id="navbar-pengeluaran">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/kewps7" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS7 </span>
                                        <span class="sidenav-normal">KEW.PS-7 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps8" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS8 </span>
                                        <span class="sidenav-normal">KEW.PS-8 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps9" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS9 </span>
                                        <span class="sidenav-normal">KEW.PS-9 </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a class="nav-link" href="#navbar-pemeriksaan" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-dashboards">

                            <i class="fas fa-wrench text-primary"></i>
                            <span class="nav-link-text">Pemeriksaan</span>
                        </a>
                        <div class="collapse" id="navbar-pemeriksaan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/kewps10" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS10 </span>
                                        <span class="sidenav-normal">KEW.PS-10 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps11" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS11 </span>
                                        <span class="sidenav-normal"> KEW.PS-11 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps12" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS12 </span>
                                        <span class="sidenav-normal"> KEW.PS-12 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps13" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS13 </span>
                                        <span class="sidenav-normal"> KEW.PS-13 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps15" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS15 </span>
                                        <span class="sidenav-normal"> KEW.PS-15 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps16" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS16 </span>
                                        <span class="sidenav-normal"> KEW.PS-16 </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a class="nav-link" href="#navbar-pindahan" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-dashboards">

                            <i class="fas fa-door-open text-primary"></i>
                            <span class="nav-link-text">Pindahan</span>
                        </a>
                        <div class="collapse" id="navbar-pindahan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/kewps17" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS17 </span>
                                        <span class="sidenav-normal"> KEW.PS-17 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps18" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS18 </span>
                                        <span class="sidenav-normal"> KEW.PS-18 </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a class="nav-link" href="#navbar-pelupusan" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-dashboards">

                            <i class="fas fa-dumpster text-primary"></i>
                            <span class="nav-link-text">Pelupusan</span>
                        </a>
                        <div class="collapse" id="navbar-pelupusan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/kewps19" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS19 </span>
                                        <span class="sidenav-normal"> KEW.PS-19 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps20" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS20 </span>
                                        <span class="sidenav-normal"> KEW.PS-20 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps21" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS21 </span>
                                        <span class="sidenav-normal"> KEW.PS-21 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps22" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS22* </span>
                                        <span class="sidenav-normal"> KEW.PS-22 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps23" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS23 </span>
                                        <span class="sidenav-normal"> KEW.PS-23 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps24" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS24 </span>
                                        <span class="sidenav-normal"> KEW.PS-24 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps25" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS25 </span>
                                        <span class="sidenav-normal"> KEW.PS-25 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps26" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS26 </span>
                                        <span class="sidenav-normal"> KEW.PS-26 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps27" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS27 </span>
                                        <span class="sidenav-normal"> KEW.PS-27 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps28" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS28 </span>
                                        <span class="sidenav-normal"> KEW.PS-28 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps29" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS29 </span>
                                        <span class="sidenav-normal"> KEW.PS-29 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps30" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS30 </span>
                                        <span class="sidenav-normal"> KEW.PS-30 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps31" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS31 </span>
                                        <span class="sidenav-normal"> KEW.PS-31 </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <a class="nav-link" href="#navbar-kehilangan" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-dashboards">

                            <i class="fas fa-file-excel text-primary"></i>
                            <span class="nav-link-text">Kehilangan</span>
                        </a>
                        <div class="collapse" id="navbar-kehilangan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/kewps32" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS32 </span>
                                        <span class="sidenav-normal"> KEW.PS-32 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps33" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS33 </span>
                                        <span class="sidenav-normal"> KEW.PS-33 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps34" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS34 </span>
                                        <span class="sidenav-normal"> KEW.PS-34 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps35" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS35 </span>
                                        <span class="sidenav-normal"> KEW.PS-35 </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kewps36" class="nav-link">
                                        <span class="sidenav-mini-icon"> KPS36 </span>
                                        <span class="sidenav-normal"> KEW.PS-36 </span>
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
