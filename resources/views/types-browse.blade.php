@extends('layouts.master')

@section('content')

  <main id="main">

    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="{{ $type->image ? asset('storage/'.$type->image) : asset('images/site-banner.jpg') }}" alt="Card image cap">
          </div>
        </div>
        <div class="col-md-8">
          <div class="card" style="border: 0px">
            <div class="card-body">
              <h3 class="card-title">{{ $type->title }}</h3>
              {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
              <p class="card-text">{{ $type->description }}</p>
              <p class="card-text text-right text-muted" style="text-align: right">
                <small>Última actualización {{ $last_item ? \Carbon\Carbon::parse($last_item->created_at)->diffForHumans() : 'no definida' }}</small>
              </p>
            </div>
          </div>
        </div>
      </div>

    
      <div class="row mt-5">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5">
              <form id="form-search">
                <div class="input-group mb-5">
                  <input type="text" name="search" class="form-control" placeholder="Realizar busqueda..." aria-label="Realizar busqueda...">
                  <button class="btn btn-outline-success" type="submit"> <i class="bi bi-search"></i> Buscar</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div id="list-details" style="min-height: 150px"></div>

      </div>
    </div>

  </main><!-- End #main -->
@endsection

@section('script')
  <script>
    $(document).ready(function(){
      getList();

      $('#form-search').submit(function(e){
        e.preventDefault()
        getList();
      });
    });

    function getList(page = 1){
      let search = $('#form-search input[name="search"]').val();
      let type_id = "{{ $type->id }}";
      let url = "{{ url('') }}";
      $.get(`${url}/${type_id}/search?search=${search}&page=${page}`, function(res){
        $('#list-details').html(res);
      });
    }
  </script>
@endsection