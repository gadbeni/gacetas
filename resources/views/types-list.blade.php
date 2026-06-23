<div class="g-list">
    @forelse ($list as $item)
        @php
            $link = null;
            $name = null;
            if($item->file != '[]'){
                $file = json_decode($item->file);
                $name = $file[0]->original_name;
                // Resolve the file URL: server first, then S3.
                $link = \App\Http\Controllers\StorageController::url($file[0]->download_link);
            }
        @endphp
        <div class="g-pub">
            <h5>{{ $item->title }}</h5>
            <div class="g-pub-desc">{!! $item->description !!}</div>
            <div class="g-pub-foot">
                <a href="{{ $link }}" title="{{ $name }}" target="_blank"
                   class="g-btn g-btn-ghost {{ $link ? '' : 'disabled' }}">
                    <i class="bi bi-cloud-download"></i> Descargar
                </a>
                <div class="g-pub-date">
                    <strong>Promulgado {{ date('d/M/Y', strtotime($item->enact_date)) }}</strong><br>
                    {{ \Carbon\Carbon::parse($item->enact_date)->diffForHumans() }}
                </div>
            </div>
        </div>
    @empty
        <div class="g-empty" style="grid-column: 1 / -1">
            <i class="bi bi-inbox"></i>
            <h3>No se encontraron resultados</h3>
        </div>
    @endforelse
</div>

<div class="g-pagination">
    {{ $list->links() }}
</div>

<script>
    $('.page-link').click(function(e){
        e.preventDefault();
        let link = $(this).attr('href');
        if(link){
            page = link.split('=')[1];
            getList(page);
        }
    });
</script>
