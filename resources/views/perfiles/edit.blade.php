@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg class="w-6 h-6 icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Volver
    </a>
@endsection

@section('content')

<h1 class="text-center">Editar Mi Perfil</h1>

<div class="row justify-content-center mt5">
    <div class="col-md-10 bg-white p-3">
        <form action="{{route('perfiles.update', ['perfil' => $perfil->id])}}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Tu Nombre" value="{{$perfil->usuario->name}}" />
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="url">Sitio Web</label>
                <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" placeholder="Tu Sitio Web" value="{{$perfil->usuario->url}}"  />
                @error('url')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="biografia">Biografia</label>
                <input type="hidden" name="biografia" id="biografia" value="{{$perfil->biografia}}" >
                <trix-editor input="biografia" class="form-control @error('biografia') is-invalid @enderror"></trix-editor>
                @error('biografia')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                  <label for="imagen">Tu Imagen</label>
                  <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                  @if($perfil->imagen)
                      <div class="mt-4">
                        <p>Imagen Actual:</p>
                        <img src="/storage/{{$perfil->imagen}}" alt="{{$perfil->usuario->name}}" style="width:300px">
                    </div>                    
                  @endif
                  @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Editar Perfil">
                </div>
        </form>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection 