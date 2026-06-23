<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('page_title', 'Bienvenido a la Gaceta del Beni')</title>
    <meta name="description" content="@yield('page_description', setting('site.description'))">
    <meta name="keywords" content="beni, gaceta, bolivia, gobernacion, leyes">

    <meta property="og:url"           content="@yield('page_url', url(''))" />
    <meta property="og:type"          content="blog" />
    <meta property="og:title"         content="@yield('page_title', 'Bienvenido a la Gaceta del Beni')" />
    <meta property="og:description"   content="@yield('page_description', setting('site.description'))" />
    <meta property="og:image"         content="@yield('page_background', asset('images/site-banner.jpg'))" />

    <!-- Favicons -->
    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    @if($admin_favicon == '')
        <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/png">
    @else
        <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
    @endif

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('lp/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('lp/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <!-- Sliders / lightbox / animations -->
    <link href="{{ asset('lp/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lp/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lp/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Gaceta theme -->
    <link href="{{ asset('css/gaceta.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body>

  <!-- ======= Topbar ======= -->
  <div class="g-topbar">
    <div class="g-container">
      <div class="g-tb-info">
        <a href="mailto:{{ setting('site.email') }}"><i class="bi bi-envelope"></i> {{ setting('site.email') }}</a>
        {{-- Sin teléfono/celular actualmente --}}
        {{-- <span><i class="bi bi-telephone"></i> {{ setting('site.phone') }}</span> --}}
      </div>
      <div class="g-tb-social">
        <a href="{{ setting('social.facebook') }}" target="_blank"><i class="bi bi-facebook"></i> Facebook</a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header class="g-header">
    <div class="g-container">
      <div class="g-logo">
        <a href="https://beni.gob.bo">
          <?php $logo = Voyager::setting('site.logo', ''); ?>
          @if($logo == '')
            <img src="{{ asset('images/icon-alt.png') }}" alt="GADBENI">
          @else
            <img src="{{ Voyager::image($logo) }}" alt="GADBENI">
          @endif
        </a>
      </div>
      <nav class="g-nav" id="gNav">
        <ul>
          <li><a href="{{ url('') }}" class="active">Gaceta</a></li>
          <li><a href="https://auditoria.beni.gob.bo/" target="_blank">Auditoría</a></li>
          <li><a href="https://transparencia.beni.gob.bo/" target="_blank">Transparencia</a></li>
          <li><a href="https://beni.gob.bo/" target="_blank">Gobernación</a></li>
        </ul>
      </nav>
      <button class="g-nav-toggle" id="gNavToggle" aria-label="Menú"><i class="bi bi-list"></i></button>
    </div>
  </header>

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer class="g-footer">

    <div class="g-newsletter">
      <div class="g-container">
        <h4>Recibe novedades</h4>
        <p>Ingresa tu Email y recibe novedades acerca del Gobierno Autónomo del Beni</p>
        <form action="" method="post">
          <input type="email" name="email" placeholder="tucorreo@ejemplo.com" required>
          <button type="submit" class="g-btn g-btn-primary" style="background:var(--gold);color:var(--green-darker)">Suscribirse</button>
        </form>
      </div>
    </div>

    <div class="g-footer-top">
      <div class="g-container">
        <div class="g-footer-grid">

          <div>
            <a href="#">
              <?php $logo = Voyager::setting('site.logo', ''); ?>
              @if($logo == '')
                <img src="{{ asset('images/icon-alt.png') }}" alt="GADBENI">
              @else
                <img src="{{ Voyager::image($logo) }}" alt="GADBENI">
              @endif
            </a>
            <p>
              Santísima Trinidad - Beni - Bolivia<br><br>
              {{-- Sin teléfono/celular actualmente --}}
              {{-- <strong>Teléfono/Celular:</strong> {{ setting('site.phone') }}<br> --}}
              <strong>Email:</strong> {{ setting('site.email') }}
            </p>
          </div>

          <div>
            <h4>GADBENI</h4>
            <ul>
              <li><a href="https://beni.gob.bo/" target="_blank"><i class="bx bx-chevron-right"></i> Gobernación</a></li>
              <li><a href="https://auditoria.beni.gob.bo/" target="_blank"><i class="bx bx-chevron-right"></i> Auditoría</a></li>
              <li><a href="https://transparencia.beni.gob.bo/" target="_blank"><i class="bx bx-chevron-right"></i> Transparencia</a></li>
              <li><a href="{{ url('') }}"><i class="bx bx-chevron-right"></i> Gaceta</a></li>
            </ul>
          </div>

          <div>
            <h4>Enlaces</h4>
            <ul>
              <li><a href="#"><i class="bx bx-chevron-right"></i> Proyectos</a></li>
              <li><a href="#"><i class="bx bx-chevron-right"></i> Buzón de sugerencias</a></li>
              <li><a href="#"><i class="bx bx-chevron-right"></i> Trabaja con nosotros</a></li>
            </ul>
          </div>

          <div>
            <h4>Síguenos</h4>
            <p>Echa un vistazo a nuestras redes sociales</p>
            <div class="g-footer-social">
              <a href="{{ setting('social.facebook') }}" target="_blank"><i class="bi bi-facebook"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="g-footer-bottom">
      <div class="g-container" style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:8px;width:100%;max-width:var(--container)">
        <span>&copy; {{ date('Y') }} <strong><span>GADBENI</span></strong>. Todos los derechos reservados.</span>
        <span>Desarrollado por Unidad de Desarrollo de Software</span>
      </div>
    </div>
  </footer>

  <a href="#" class="g-top" id="gTop"><i class="bi bi-arrow-up-short"></i></a>

  <!-- jQuery (usado por búsqueda AJAX) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('lp/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('lp/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('lp/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('lp/assets/vendor/purecounter/purecounter.js') }}"></script>

  <script>
    // Animaciones
    if (window.AOS) AOS.init({ duration: 700, once: true });
    // Lightbox video
    if (window.GLightbox) GLightbox({ selector: '.glightbox' });

    // Menú móvil
    var navToggle = document.getElementById('gNavToggle');
    var nav = document.getElementById('gNav');
    if (navToggle) navToggle.addEventListener('click', function () { nav.classList.toggle('open'); });

    // Back to top + header al hacer scroll
    var topBtn = document.getElementById('gTop');
    var header = document.querySelector('.g-header');
    function onScroll() {
      if (window.scrollY > 400) topBtn.classList.add('show'); else topBtn.classList.remove('show');
      if (window.scrollY > 30) header.classList.add('scrolled'); else header.classList.remove('scrolled');
    }
    window.addEventListener('scroll', onScroll);
    onScroll();
  </script>

  @yield('script')

</body>

</html>
