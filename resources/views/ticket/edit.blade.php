@extends('layouts.app')
@section('content')
  <div class="container" style="margin-top: 100px;">
    <div class="card">
      <div class="card-body">
        {!! Form::model($ticket,['route'=>['tickets.update',$ticket->id],'method'=>'PATCH','autocomplete'=>'off']) !!}
        <div class="form-group row">
          <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control" value="{{$ticket->nombre}}" name="nombre" id="inputNombre" placeholder="Red Label">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputDescripcion" class="col-sm-2 col-form-label">Descripcion</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$ticket->descripcion}}" name="descripcion" id="inputDescripcion" placeholder="Descripcion">
          </div>
        </div>
        <div class="form-group row">
          <label for="selectNivel" class="col-sm-2 col-form-label">Nivel Importancia</label>
          <div class="col-sm-10">
            <select name="nivel_importancia" id="selectNivel" class="form-control">
              <option value="" disabled selected>Selecionar nivel de importancia</option>
              <option value="URGENTE" @if($ticket->nivel_importancia == 'URGENTE') selected @endif>Urgente</option>
              <option value="MEDIO BAJO"@if($ticket->nivel_importancia == 'MEDIO BAJO') selected @endif>Medio bajo</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Publicar</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endsection