@php
    $fileUrl  = null;
    $fileName = null;
    if ($publication->file && $publication->file != '[]') {
        $decoded  = json_decode($publication->file);
        $first    = $decoded[0] ?? null;
        if ($first) {
            $fileName = $first->original_name ?? null;
            // Resolve the file URL: server (public) or S3, based on the stored value.
            $fileUrl  = \App\Http\Controllers\StorageController::url($first->download_link);
        }
    }
    $isPdf = $fileName && \Illuminate\Support\Str::endsWith(strtolower($fileName), '.pdf');
@endphp

@extends('voyager::master')

@section('page_title', 'Ver Publicación')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-certificate"></i>
        Ver Publicación
    </h1>
    <a href="{{ route('voyager.publications.edit', $publication->id) }}" class="btn btn-primary">
        <i class="voyager-edit"></i> Editar
    </a>
    <a href="{{ route('voyager.publications.index') }}" class="btn btn-secondary">
        <i class="voyager-list"></i> Volver
    </a>
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <div class="form-group">
                            <h4>Tipo</h4>
                            <p>{{ $type->title ?? '—' }}</p>
                        </div>

                        <div class="form-group">
                            <h4>Título</h4>
                            <p>{{ $publication->title ?: '—' }}</p>
                        </div>

                        <div class="form-group">
                            <h4>Descripción</h4>
                            <p>{!! $publication->description ?: '—' !!}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h4>Tags</h4>
                                    <p>{{ $publication->tags ?: '—' }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h4>Fecha de promulgación</h4>
                                    <p>{{ $publication->enact_date ? \Carbon\Carbon::parse($publication->enact_date)->format('d/m/Y') : '—' }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <h4>Fecha de publicación</h4>
                                    <p>{{ $publication->publish_date ? \Carbon\Carbon::parse($publication->publish_date)->format('d/m/Y') : '—' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h4>Destacado</h4>
                            <p>
                                <span class="label label-{{ $publication->highlight ? 'success' : 'default' }}">
                                    {{ $publication->highlight ? 'Sí' : 'No' }}
                                </span>
                            </p>
                        </div>

                        <div class="form-group">
                            <h4>Archivo</h4>
                            @if ($fileUrl)
                                <p>
                                    <a href="{{ $fileUrl }}" target="_blank" class="btn btn-primary">
                                        <i class="voyager-download"></i> Descargar {{ $fileName }}
                                    </a>
                                </p>
                                @if ($isPdf)
                                    <iframe src="{{ $fileUrl }}" style="width:100%;height:600px;border:1px solid #ddd;border-radius:4px;"></iframe>
                                @endif
                            @else
                                <p>—</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
