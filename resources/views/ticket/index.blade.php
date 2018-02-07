@extends('layouts.app')
@section('content')
<div class="container">
  <table class="table table-hover">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Importancia</th>
      <th scope="col">Fecha</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)
      <tr class="ticket{{$ticket->id}}">
        <th scope="row">{{$ticket->id}}</th>
        <td>{{$ticket->nombre}}</td>
        <td>{{$ticket->descripcion}}</td>
        <td>{{$ticket->nivel_importancia}}</td>
        <td>{{$ticket->fecha_solicitud}}</td>
        <td>
          <a href="{{route('tickets.edit',$ticket->id)}}"><i class="fas fa-edit"></i></a>
          <a href="#" data-id="{{$ticket->id}}" class="modal-eliminar"><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{$tickets->render()}}
  @include('ticket.delete')
</div>
  @push('eliminar')
    <script>
    // PERMITE ABRIR EL MODAL  Y CAPTURA EL ID DEL TICKET
      $(document).on('click','.modal-eliminar',function(){
        $('#modalDelete').modal('show');
        id = $(this).data('id');
        console.log(id);
      })

    // SE EVNIA LA CONSULTA A LA RUTA PARA ELIMINAR EL TICKET
      $('.modal-footer').on('click','.delete',function(){
        jQuery.ajax({
          url:'tickets/'+id,
          type:'DELETE',
          dataType:'json',
          data: {
            '_token': $('input[name=_token]').val(),
          },
          success:function(data){
            $('.ticket'+data.id).remove();
            window.setTimeout('location.reload()', 1000);
          }
        })
      })
    </script>
  @endpush
@endsection