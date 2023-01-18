<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="/"><img src="assets/img/Untitled-1.png" alt="" class="img-fluid">Pelalawan</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->

        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Dataset</a></li>
                <li class="dropdown"><a href="#"><span>Visualisasi</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="datadasar">Data Dasar</a></li>
                        <!-- <li><a href="datalayanan">Data Layanan</a></li> -->
                    </ul>
                </li>
                <!-- <li class="dropdown"><a href="#"><span>Info Data</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="datakecamatan">Data kecamatan</a></li>
              <li><a href="datadesa">Data Desa</a></li>
              <li><a href="dataserana">Data Sarana</a></li>
              <li><a href="datakendaraanbermotor">Data Kendaraan Bermotor</a></li>
              <li><a href="datamobil">Data Mobil</a></li>
            </ul>
          </li> -->
                <!-- <li><a class="nav-link scrollto" href="dataentitas">Data Entitas</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Artikel</a></li> -->
                <li><a class="nav-link scrollto text-success fw-semibold" style="padding-right: 10px" href="bantuan">Bantuan</a></li>

                @can('admin')
                <li><a class="nav-link scrollto text-success fw-semibold" style="padding-right: 10px" href="dashboard">Dashboard</a></li>
                @endcan

                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"> Logout</button>
                </form>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
