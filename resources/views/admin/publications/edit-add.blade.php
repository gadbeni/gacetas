@php
    $edit = $publication->exists;

    $currentFile = null;
    $currentFileUrl = null;
    if ($publication->file && $publication->file != '[]') {
        $decoded = json_decode($publication->file);
        $currentFile = $decoded[0] ?? null;
        if ($currentFile) {
            // Resolve the file URL: server first, then S3.
            $currentFileUrl = \App\Http\Controllers\StorageController::url($currentFile->download_link);
        }
    }
@endphp

@extends('voyager::master')

@section('page_title', ($edit ? 'Editar' : 'Crear') . ' Publicación')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-certificate"></i>
        {{ $edit ? 'Editar Publicación' : 'Crear Publicación' }}
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <form role="form" class="form-edit-add"
                          action="{{ $edit ? route('voyager.publications.update', $publication->id) : route('voyager.publications.store') }}"
                          method="POST" enctype="multipart/form-data">

                        @if ($edit)
                            {{ method_field('PUT') }}
                        @endif
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="control-label" for="publications_type_id">Tipo</label>
                                <select class="form-control select2" name="publications_type_id" id="publications_type_id" required>
                                    <option value="">Seleccione un tipo</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('publications_type_id', $publication->publications_type_id) == $type->id ? 'selected' : '' }}>
                                            {{ $type->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="title">Título</label>
                                <input type="text" class="form-control" name="title" id="title"
                                       value="{{ old('title', $publication->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="description">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="5">{{ old('description', $publication->description) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="tags">Tags</label>
                                        <input type="text" class="form-control" name="tags" id="tags"
                                               value="{{ old('tags', $publication->tags) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="file">Archivo</label>
                                        @if ($currentFile)
                                            <p>
                                                <a href="{{ $currentFileUrl }}" target="_blank">
                                                    {{ $currentFile->original_name }}
                                                </a>
                                            </p>
                                        @endif
                                        <input type="file" name="file" id="file">
                                        <p class="help-block">Deje vacío para mantener el archivo actual.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="enact_date">Fecha de promulgación</label>
                                        <input type="date" class="form-control" name="enact_date" id="enact_date"
                                               value="{{ old('enact_date', $publication->enact_date ? \Carbon\Carbon::parse($publication->enact_date)->format('Y-m-d') : '') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="publish_date">Fecha de publicación</label>
                                        <input type="date" class="form-control" name="publish_date" id="publish_date"
                                               value="{{ old('publish_date', $publication->publish_date ? \Carbon\Carbon::parse($publication->publish_date)->format('Y-m-d') : '') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="highlight">Destacado</label>
                                <div>
                                    <input type="hidden" name="highlight" value="0">
                                    <input type="checkbox" name="highlight" id="highlight" value="1"
                                           class="toggleswitch" data-on="Sí" data-off="No"
                                        {{ old('highlight', $publication->highlight) ? 'checked' : '' }}>
                                </div>
                            </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary save">
                                Guardar <i class="voyager-check"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('.toggleswitch').bootstrapToggle();
        });
    </script>
@stop
