<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentsController extends Controller
{
    
    public function __construct()
    {
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
            $equipment = Equipments::orderBy('name')->where('user_id',Auth::user()->id)->get();
            return view('usuario.equipment.index')->with('equipments', $equipments);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        # code...
    }

    public function create_for_room(Room $room)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            return view('usuario.equipment.create')->with('room', $room);
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
            Equipment::create($request->all());
            session()->flash('mensagem', 'Equipamento inserido com sucesso!');
            return redirect()->route('rooms.show', $request->room_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            return view('usuario.equipment.show')->with('equipment', $equipment);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            return view('usuario.equipment.edit')->with('equipment', $equipment);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            $equipment->fill($request->all());
            $equipment->save();
            session()->flash('mensagem','Equipamento atualizado com sucesso!');
            return redirect()->route('rooms.show', $equipment->room_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            $equipment->delete();
            session()->flash('mensagem', 'Equipamento excluído com sucesso!');
            return redirect()->route('rooms.show', $equipment->room_id);
        }
    }
}
