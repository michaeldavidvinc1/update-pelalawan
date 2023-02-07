@extends('dashboard.index')

@section('container')
    <div class="section-header">
        <h1>Dashboard</h1>
        <!-- <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Default Layout</div>
        </div> -->
    </div>

    <div class="section-body">
        <h2 class="section-title">Wibsite Dinas Kesehatan Kab-Pelalawan</h2>
        <p class="section-lead">Memiliki Informasi Yang Mencakup Seputar Kesehatan. </p>
        <div class="card">
            <div class="card-header">
                <h4>Dashboar Kab-Pelalawan</h4>
            </div>
            <div class="card-body">
                <p>Catatan Pengingat !!!</p>
                <p>Dalam fitur/menu dashboard pada website disediakan tombol imput data excel secara otomatis, dengan memiliki format
                    tersendiri. Data excel yang akan di-imput kedalam website harus meng-export terlebih dahulu format yang akan digunakan,
                    untuk fitur tombol export sudah disediakan pada setiap menu yang ada. Dalam pengisian data excel yang akan di-imput kan 
                    hindari data yang menggunakan RUMUS dan data yang menggunakan GARIS TABEL.
                </p>
            </div>
            <div class="card-footer bg-whitesmoke">
                <!-- This is card footer -->
            </div>
        </div>
    </div>
@endsection
