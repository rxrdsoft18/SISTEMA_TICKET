<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request)
      {
        $buscar=$request->input('buscarTicket');
        $tickets=DB::table('tickets')
                ->where('nombre','LIKE','%'.$buscar.'%')
                ->orwhere('descripcion','LIKE','%'.$buscar.'%')
                ->orderBy('id','desc')
                ->paginate(10);
      }
        
        return view('ticket.index',['tickets'=>$tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
          'nombre'=>'required',
          'descripcion'=>'required',
          'nivel_importancia'=>'required'
        ];
        
        $this->validate($request,$reglas);
        
        $ticket = new Ticket();
        $ticket->nombre = $request->input('nombre');
        $ticket->descripcion = $request->input('descripcion');
        $ticket->nivel_importancia = $request->get('nivel_importancia');
        $hora=Carbon::now('America/Lima');
        $ticket->fecha_solicitud = $hora->toDateTimeString();
        $ticket->save();
        
        return redirect('tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $tickets=DB::table('tickets')
        ->where('nivel_importancia','=',$id)
        ->orderBy('id','desc')
        ->paginate(10);
      
      return view('ticket.index',['tickets'=>$tickets]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ticket = Ticket::findOrFail($id);
      
      return view('ticket.edit',['ticket'=>$ticket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $ticket =  Ticket::findOrFail($id);
      $ticket->nombre = $request->input('nombre');
      $ticket->descripcion = $request->input('descripcion');
      $ticket->nivel_importancia = $request->get('nivel_importancia');
      $hora=Carbon::now('America/Lima');
      $ticket->fecha_solicitud = $hora->toDateTimeString();
      $ticket->save();
  
      return redirect('tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        
        return response()->json($ticket);
    }
}
