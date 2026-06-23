<!-- ======= Contacto ======= -->
<section id="contact" class="g-section">
  <div class="g-container">

    <div class="g-section-head" data-aos="fade-up">
      <span class="g-eyebrow">Contacto</span>
      <h2>Contáctanos</h2>
      <p>Puedes ponerte en contacto con nosotros mediante cualquiera de los canales de comunicación descritos a continuación.</p>
    </div>

    <div class="g-contact-grid" data-aos="fade-up">

      <div>
        <div class="g-info-cards">
          <div class="g-info-card">
            <i class="bx bx-map"></i>
            <div>
              <h3>Nuestra dirección</h3>
              <p>{{ setting('site.address') ?: 'Santísima Trinidad - Beni - Bolivia' }}</p>
            </div>
          </div>
          <div class="g-info-card">
            <i class="bx bx-envelope"></i>
            <div>
              <h3>Nuestro Email</h3>
              <p>{{ setting('site.email') }}</p>
            </div>
          </div>
          {{-- Sin teléfono/celular actualmente --}}
          {{-- <div class="g-info-card">
            <i class="bx bx-phone-call"></i>
            <div>
              <h3>Teléfono/Celular</h3>
              <p>{{ setting('site.phone') }}</p>
            </div>
          </div> --}}
        </div>

        <form action="forms/contact.php" method="post" class="g-form">
          <div class="g-row2">
            <input type="text" name="name" placeholder="Nombre completo" required>
            <input type="email" name="email" placeholder="Tu Email" required>
          </div>
          <input type="text" name="subject" placeholder="Asunto" required>
          <textarea name="message" rows="5" placeholder="Mensaje" required></textarea>
          <button type="submit" class="g-btn g-btn-primary"><i class="bi bi-send"></i> Enviar mensaje</button>
        </form>
      </div>

      <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d964.2034342454992!2d-64.90438077082753!3d-14.83570830295541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93dd6fd5b87370df%3A0x47918f6983c7c6c8!2sGobierno%20Aut%C3%B3nomo%20Departamental%20Del%20Beni!5e0!3m2!1ses-419!2sbo!4v1626364207037!5m2!1ses-419!2sbo" allowfullscreen loading="lazy"></iframe>
      </div>

    </div>

  </div>
</section>
