@extends('layouts.app')

@section('title','Home')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Telusuri data/info terkait kesehatan di lingkup Kab. Pelalawan</h1>
          <h2 data-aos="fade-up" data-aos-delay="400" style="margin-top: 20px;">
          Fitur ini dapat anda gunakan untuk menelusuri data dan informasi terkait sektor kesehatan di wilayah Kabupaten Pelalawan.
          </h4>
          <div data-aos="fade-up" data-aos-delay="800" style="margin-top: -30px">
            <form action="#">
              <div class="input-group">
                <input class="form-control form-control-lg border-end-0 border" type="text" placeholder="Cari dataset" id="search">
                <span class="input-group-append">
                    <button class="btn btn-lg btn-outline-secondary bg-white border-start-0 border ms-n3 rounded-end" type="button">
                      <i class='bx bx-search-alt-2'></i>
                    </button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
<!-- End Hero -->

  </section>


@endsection