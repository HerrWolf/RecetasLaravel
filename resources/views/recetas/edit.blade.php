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

    <h2 class="text-center mb-5">Editar Receta: {{$receta->titulo}}</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{route('recetas.update', ['receta' => $receta->id])}}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" placeholder="Titulo Receta" value="{{$receta->titulo}}" />
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="categoria">Categoría</label>
                  <select class="form-control @error('categoria') is-invalid @enderror" name="categoria" id="categoria">
                      <option value="">-- Seleccione --</option>
                      @foreach($categorias as $id => $categoria)
                        <option value="{{$categoria->id}}" {{$receta->categoria_id == $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>                          
                      @endforeach
                  </select>
                  @error('categoria')
                      <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                  @enderror
                </div>
                <div class="form-group mt-3">
                  <label for="preparacion">Preparación</label>
                  <input type="hidden" name="preparacion" id="preparacion" value="{{$receta->preparacion}}" >
                  <trix-editor input="preparacion" class="form-control @error('preparacion') is-invalid @enderror"></trix-editor>
                  @error('preparacion')
                      <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                  @enderror
                </div>
                <div class="form-group mt-3">
                  <label for="ingredientes">Ingredientes</label>
                  <input type="hidden" name="ingredientes" id="ingredientes" value="{{$receta->ingredientes}}" >
                  <trix-editor input="ingredientes" class="form-control @error('ingredientes') is-invalid @enderror"></trix-editor>
                  @error('ingredientes')
                      <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="imagen">Imagen</label>
                  <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                  <div class="mt-4">
                      <p>Imagen Actual:</p>
                      <img src="/storage/{{$receta->imagen}}" alt="{{$receta->titulo}}" style="width:300px">
                  </div>
                  @error('imagen')
                      <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                  @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Editar Receta">
                </div>
            </form>
        </div> 
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection 