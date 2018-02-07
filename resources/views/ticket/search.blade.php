{!! Form::open(['route'=>'tickets.index','method'=>'GET','class'=>'form-inline my-2 my-lg-0']) !!}
  <input class="form-control mr-sm-2" name="buscarTicket"  type="search" placeholder="Nombre / descripcion" aria-label="Search">
  <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
{!! Form::close() !!}