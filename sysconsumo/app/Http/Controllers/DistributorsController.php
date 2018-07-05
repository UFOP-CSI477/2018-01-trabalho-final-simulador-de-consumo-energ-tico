<?php

namespace App\Http\Controllers;

use App\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistributorsController extends Controller
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
        $distributors = Distributor::orderBy('uf')->orderBy('name')->get();
        return view('administrativo.distributor.index')->with('distributors', $distributors);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type==0){
            return view('administrativo.distributor.create');
        }
        //usuário comum
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user');
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
        //dd($request);

        if(Auth::user()->type==0){
            Distributor::create($request->all());
            session()->flash('mensagem', 'Distribuidora de energia inserida com sucesso!');
            return redirect()->route('distributors.index');
        }
        //usuário comum
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        return view('administrativo.distributor.show')->with('distributor', $distributor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        //administrador
        if(Auth::user()->type==0){
            return view('administrativo.distributor.edit')->with('distributor', $distributor);    
        }
        //usuário comum
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {
        //administrador
        if(Auth::user()->type==0){
            $distributor->fill($request->all());
            $distributor->save();
            session()->flash('mensagem','Distribuidora de energia atualizada com sucesso!');
            return redirect()->route('distributors.show', $distributor->id);
        }
        //usuário comum
        else{
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user');
        }
        //usuário comum
        else{
            $distributor->delete();
            session()->flash('mensagem', 'Distribuidor excluído com sucesso!');
            return redirect()->route('distributors.index');
        }
    }
}
