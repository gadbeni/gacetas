@extends('layouts.master')

@section('content')
  <!-- ======= Hero Section ======= -->
  @php
    $site_banner = Voyager::setting('site.banner', '');
  @endphp
  <section id="hero" class="d-flex align-items-center" style='background: url("{{ $site_banner ? Voyager::image($site_banner) : asset('images/site-banner.jpg') }}") top left;'>
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1 class="text-white">Bienvenido a <span>{{ setting('site.title') }}</span></h1>
      <h2 class="text-white">{{ setting('site.description') }}</h2>
      <div class="d-flex">
        <a href="#featured-services" class="btn-get-started scrollto">Iniciar ahora</a>
        <a href="https://www.youtube.com/watch?v=LMZoMUov9LQ" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span class="text-white">Ver Video</span></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
            @foreach (App\Models\PublicationsType::where('deleted_at', NULL)->get() as $item)
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-5 card-item-link" data-slug="{{ $item->slug }}">
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bi bi-{{ $item->icon }}"></i></div>
                    <h4 class="title"><a>{{ $item->title }}</a></h4>
                    <p class="description">{{ $item->description }}</p>
                  </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Acerca de</h2>
          <h3>Conoce más <span>acerca de nosotros</span></h3>
          <p>A continuación te mostramos un breve resumen de las actividades que llevamos a cabo.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('images/site-about.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>GACETA JURIDICA DEPARTAMENTAL</h3>
            <p>
              Es el instrumento informativo que tiene por objeto publicar de manera permanente las Leyes Departamentales, Decretos Departamentales y de Gobernación, Resoluciones de Gobernación y Administrativas y sobre todo cualquier otro documento de carácter general que emita el Gobierno Autónomo Departamental del Beni.
            </p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                  <h5>MISIÓN</h5>
                  <p>Custodiar y salvaguardar cronológica y oportunamente en la Gaceta Oficial las Leyes Decretos y Resoluciones que emita el Ejecutivo Departamental del Beni.</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>VISIÓN</h5>
                  <p>Constituirse en el órgano oficial de publicación y difusión de toda la normativa emitida por el Ejecutivo  Departamental.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row">
            @foreach (App\Models\PublicationsType::with('publications')->where('deleted_at', NULL)->limit(4)->get() as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-{{ $item->icon }}"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ count($item->publications) }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>{{ $item->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials" style='background: url("{{ setting('site.background') ? Voyager::image(setting('site.background')) : asset('images/site-background.jpg') }}") no-repeat;'>
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            @foreach (App\Models\Official::where('deleted_at', NULL)->get() as $item)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ $item->image ? asset('storage/'.$item->image) : asset('images/user.png') }}" class="testimonial-img" alt="">
                <h3>{{ $item->full_name }}</h3>
                <h4>{{ $item->job }}</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>{{ $item->description }}<i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            @endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <h3>Preguntas <span>Frecuentes</span></h3>
          <p>Consulta las preguntas mas habituales realizadas por los visitantes de la página</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
            <ul class="faq-list">
              @foreach (App\Models\FrequentQuestion::where('deleted_at', NULL)->get() as $item)
              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq-{{ $item->id }}">{{ $item->title }} <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq-{{ $item->id }}" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    {!! $item->description !!}
                  </p>
                </div>
              </li>
              @endforeach

            </ul>
          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    @include('layouts.contact-us')

  </main><!-- End #main -->

  <!-- <div id="flake">&#10052;</div> -->
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/snowfall.css') }}">
@endsection

@section('script')
  <script src="{{ asset('js/snowfall.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('.card-item-link').click(function(){
        let slug = $(this).data('slug');
        window.location = "{{ url('') }}/"+slug;
      });
    });
  </script>
@endsection