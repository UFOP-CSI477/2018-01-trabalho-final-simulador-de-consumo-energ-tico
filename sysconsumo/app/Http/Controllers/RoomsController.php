<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Equipment;

class RoomsController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            $rooms = Room::orderBy('name')->where('user_id', Auth::user()->id)->get();
            return view('usuario.room.index')->with('rooms', $rooms);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            return view('usuario.room.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            Room::create($request->all());
            session()->flash('mensagem', 'Cômodo inserido com sucesso!');
            return redirect()->route('rooms.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            $equipments = Equipment::orderBy('name')
                                    ->where('room_id', $room->id)
                                    ->get();

            $potencia_total = DB::table('equipments')
                        ->select(DB::raw('sum(amount*watts) AS potencia_total'))
                        ->where('room_id', $room->id)
                        ->first();

            //dd($potencia_total);

            //$potencia_total = $equipments->select(DB::raw('sum(amount * watts) as potencia_total'));
            return view('usuario.room.show')->with('room', $room)
                                            ->with('equipments', $equipments)
                                            ->with('potencia_total', $potencia_total);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {   
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            return view('usuario.room.edit')->with('room', $room);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            $room->fill($request->all());
            $room->save();
            session()->flash('mensagem','Cômodo atualizado com sucesso!');
            return redirect()->route('rooms.show', $room->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            $room->delete();
            session()->flash('mensagem', 'Cômodo excluído com sucesso!');
            return redirect()->route('rooms.index');
        }
    }
}
