<nav class="navbar navbar-expand-lg py-3 bg-blux" data-scroll="true" style=" 
  background-color: #2a2a72; background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%)
  ">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Perbadanan Labuan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a style="text-decoration: none;" href="/umum" class="btn-sm btn-primary">Umum</a>&nbsp;
                <a style="text-decoration: none;" href="/aset-alih" class="btn-sm btn-primary">Aset Alih</a>&nbsp;
                <a style="text-decoration: none;" href="/aset-tak-alih" class="btn-sm btn-primary">Aset Tak
                    Alih</a>&nbsp;
                <a style="text-decoration: none;" href="/aset-tak-ketara" class="btn-sm btn-primary">Aset Tak
                    Ketara</a>&nbsp;
                <a style="text-decoration: none;" href="/stor" class="btn-sm btn-primary">Stor</a>&nbsp;
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="text-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-sm-inline d-none text-white">{{ Auth::user()->name }}</span>
                        <i class="fa fa-user text-white p-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
