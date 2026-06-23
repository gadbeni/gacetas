@extends('layouts.master')

@section('content')

  <!-- ======= Hero ======= -->
  @php
    $site_banner = Voyager::setting('site.banner', '');
    $hero_bg = $site_banner ? Voyager::image($site_banner) : asset('images/site-banner.jpg');
  @endphp
  <section class="g-hero" data-bg style="--hero-bg:url('{{ $hero_bg }}')">
    <div class="g-container">
      <span class="g-kicker">Gobierno Autónomo Departamental del Beni</span>
      <h1>Bienvenido a <span>{{ setting('site.title') }}</span></h1>
      <p>{{ setting('site.description') }}</p>
      <div class="g-hero-rule"></div>
      <div class="g-hero-actions">
        <a href="#tipos" class="g-btn g-btn-primary">Explorar gacetas <i class="bi bi-arrow-down-short"></i></a>
        <a href="https://www.youtube.com/watch?v=LMZoMUov9LQ" class="glightbox g-btn g-btn-outline"><i class="bi bi-play-circle"></i> Ver video</a>
      </div>
    </div>
  </section>

  <main>

    <!-- ======= Tipos de publicación ======= -->
    <section id="tipos" class="g-section">
      <div class="g-container">
        <div class="g-section-head" data-aos="fade-up">
          <span class="g-eyebrow">Categorías</span>
          <h2>Explora la <span>normativa oficial</span></h2>
          <p>Selecciona una categoría para consultar y descargar las publicaciones del Ejecutivo Departamental.</p>
        </div>

        <div class="g-grid">
          @foreach (App\Models\PublicationsType::where('deleted_at', NULL)->get() as $item)
            <div class="g-card card-item-link" data-slug="{{ $item->slug }}" data-aos="fade-up">
              <div class="g-card-icon"><i class="bi bi-{{ $item->icon }}"></i></div>
              <h3>{{ $item->title }}</h3>
              <p>{{ $item->description }}</p>
              <span class="g-card-link">Ver publicaciones <i class="bi bi-arrow-right-short"></i></span>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- ======= Acerca de ======= -->
    <section id="about" class="g-section alt">
      <div class="g-container">
        <div class="g-about-grid">
          <div data-aos="fade-right">
            <img src="{{ asset('images/site-about.jpg') }}" alt="Gaceta Jurídica Departamental">
          </div>
          <div data-aos="fade-left">
            <span class="g-eyebrow">Acerca de</span>
            <h3>Gaceta Jurídica Departamental</h3>
            <p>
              Es el instrumento informativo que tiene por objeto publicar de manera permanente las Leyes Departamentales, Decretos Departamentales y de Gobernación, Resoluciones de Gobernación y Administrativas y sobre todo cualquier otro documento de carácter general que emita el Gobierno Autónomo Departamental del Beni.
            </p>
            <ul class="g-mv">
              <li>
                <div class="g-mv-icon"><i class="bx bx-store-alt"></i></div>
                <div>
                  <h5>Misión</h5>
                  <p>Custodiar y salvaguardar cronológica y oportunamente en la Gaceta Oficial las Leyes, Decretos y Resoluciones que emita el Ejecutivo Departamental del Beni.</p>
                </div>
              </li>
              <li>
                <div class="g-mv-icon"><i class="bx bx-images"></i></div>
                <div>
                  <h5>Visión</h5>
                  <p>Constituirse en el órgano oficial de publicación y difusión de toda la normativa emitida por el Ejecutivo Departamental.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Estadísticas ======= -->
    <section class="g-section g-stats-wrap">
      <div class="g-container">
        <div class="g-stats">
          @foreach (App\Models\PublicationsType::with('publications')->where('deleted_at', NULL)->limit(4)->get() as $item)
            <div class="g-stat" data-aos="zoom-in">
              <i class="bi bi-{{ $item->icon }}"></i>
              <span class="g-stat-num purecounter" data-purecounter-start="0" data-purecounter-end="{{ count($item->publications) }}" data-purecounter-duration="1">0</span>
              <p>{{ $item->title }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- ======= FAQ ======= -->
    <section class="g-section alt">
      <div class="g-container">
        <div class="g-section-head" data-aos="fade-up">
          <span class="g-eyebrow">F.A.Q</span>
          <h2>Preguntas <span>frecuentes</span></h2>
          <p>Consulta las preguntas más habituales realizadas por los visitantes de la página.</p>
        </div>

        <div class="g-faq" data-aos="fade-up">
          @foreach (App\Models\FrequentQuestion::where('deleted_at', NULL)->get() as $item)
            <div class="g-faq-item">
              <div class="g-faq-q" aria-expanded="false">{{ $item->title }} <i class="bi bi-chevron-down"></i></div>
              <div class="g-faq-a"><p>{!! $item->description !!}</p></div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    @include('layouts.contact-us')

  </main>
@endsection

@section('script')
  <script>
    $(document).ready(function () {
      // Click en card de tipo → navega al slug
      $('.card-item-link').click(function () {
        window.location = "{{ url('') }}/" + $(this).data('slug');
      });

      // Acordeón FAQ
      $('.g-faq-q').click(function () {
        var open = $(this).attr('aria-expanded') === 'true';
        $('.g-faq-q').attr('aria-expanded', 'false');
        $('.g-faq-a').removeClass('open');
        if (!open) {
          $(this).attr('aria-expanded', 'true');
          $(this).next('.g-faq-a').addClass('open');
        }
      });
    });

    // Contadores
    if (window.PureCounter) new PureCounter();
  </script>
@endsection
