@extends('layouts.master')

@section('page_title', $type->title.' - Gaceta del Beni')

@section('content')

  <main>
    <section class="g-page">
      <div class="g-container">

        <div class="g-page-head" data-aos="fade-up">
          <img src="{{ $type->image ? asset('storage/'.$type->image) : asset('images/site-banner.jpg') }}" alt="{{ $type->title }}">
          <div>
            <span class="g-eyebrow">Categoría</span>
            <h1>{{ $type->title }}</h1>
            <p>{{ $type->description }}</p>
            <p class="g-updated">
              <i class="bi bi-clock-history"></i>
              Última actualización {{ $last_item ? \Carbon\Carbon::parse($last_item->created_at)->diffForHumans() : 'no definida' }}
            </p>
          </div>
        </div>

        <form id="form-search" class="g-list-search">
          <input type="text" name="search" placeholder="Buscar por título, etiqueta o descripción...">
          <button type="submit"><i class="bi bi-search"></i> Buscar</button>
        </form>

        <div id="list-details" style="min-height: 150px"></div>

      </div>
    </section>
  </main>
@endsection

@section('script')
  <script>
    $(document).ready(function () {
      getList();
      $('#form-search').submit(function (e) {
        e.preventDefault();
        getList();
      });
    });

    function getList(page = 1) {
      let search = $('#form-search input[name="search"]').val();
      let type_id = "{{ $type->id }}";
      let url = "{{ url('') }}";
      $.get(`${url}/${type_id}/search?search=${search}&page=${page}`, function (res) {
        $('#list-details').html(res);
      });
    }
  </script>
@endsection
