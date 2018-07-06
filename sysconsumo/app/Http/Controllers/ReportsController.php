<?php

namespace App\Http\Controllers;

use App\Report;
use App\Room;
use App\Equipment;
use App\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportsController extends Controller
{
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
            $reports = Report::orderBy('date_start')->where('user_id',Auth::user()->id)->get();
            $rooms = Room::orderBy('name')->where('user_id',Auth::user()->id)->get();
            return view('usuario.report.index')->with('reports', $reports)
                                               ->with('rooms', $rooms);
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
            $rooms = Room::orderBy('name')->where('user_id',Auth::user()->id)->get();
            return view('usuario.report.create')->with('rooms', $rooms);
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
            
            $rooms = Room::orderBy('name')->where('user_id', Auth::user()->id)->get();

            //'date_start','date_finish','watts','spend','tax','room','user_id','distr_id'
            $report = array('date_start' => $request->date_start);
            $report = array_add($report, 'date_finish', $request->date_finish);
            $report = array_add($report, 'user_id' , Auth::user()->id);
            $report = array_add($report, 'distr_id', Auth::user()->distributor_id);
            

            $tarifa = (Distributor::select('tarifa')->where('id', Auth::user()->distributor_id)->first())->tarifa;
            $report = array_add($report, 'tax', $tarifa);

            $type = $request->room;
            $report = array_add($report, 'room', $type);


            $date_start_carbon = \Carbon\Carbon::parse($request->date_start);
            $date_finish_carbon = \Carbon\Carbon::parse($request->date_finish);

            $time_of_use = $date_finish_carbon->diffInDays($date_start_carbon);

            $consumo_kw = 0;
            $consumo_rs = 0;
            if($type != 0){
                $consumo_diario = (DB::table('equipments')
                        ->select(DB::raw('sum(amount*watts*time_use) AS consumo_diario'))
                        ->where('room_id', $type)
                        ->first())->consumo_diario;

                $consumo_kw = $time_of_use * $consumo_diario/1000;
                $consumo_rs = $consumo_kw * $tarifa;
            }else{
                foreach ($rooms as $r) {
                    $consumo_diario = (DB::table('equipments')
                        ->select(DB::raw('sum(amount*watts*time_use) AS consumo_diario'))
                        ->where('room_id', $r->id)
                        ->first())->consumo_diario;

                    $consumo_kw = $consumo_kw + ($time_of_use * $consumo_diario)/1000;
                    $consumo_rs = $consumo_rs + ($consumo_kw * $tarifa);
                }
            }

            $report = array_add($report, 'watts', $consumo_kw);
            $report = array_add($report, 'spend', $consumo_rs);

            //dd($report);

            Report::create($report);
            session()->flash('mensagem', 'Relatório gerado com sucesso!');
            return redirect()->route('reports.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            $rooms = Room::orderBy('name')->where('user_id', Auth::user()->id)->get();
            $type = $report->room;

            $date_start_carbon = \Carbon\Carbon::parse($report->date_start);
            $date_finish_carbon = \Carbon\Carbon::parse($report->date_finish);
            $time_of_use = $date_finish_carbon->diffInDays($date_start_carbon);

            $tarifa = (Distributor::select('tarifa')->where('id', Auth::user()->distributor_id)->first())->tarifa;

            $bandeira = array();
            $array_bandeiras = array();
            $total = array();
            
            $consumo_kw = 0;
            $consumo_rs = 0;

            if($type != 0){
                $consumo_diario = (DB::table('equipments')
                        ->select(DB::raw('sum(amount*watts*time_use) AS consumo_diario'))
                        ->where('room_id', $type)
                        ->first())->consumo_diario;

                $consumo_kw = $time_of_use * $consumo_diario/1000;
                $consumo_rs = $consumo_kw * $tarifa;

                $rooms = Room::where('id', $type)->first();

                $bandeira = array_add($bandeira, 'comodo', $rooms->name);
                $bandeira = array_add($bandeira, 'verde', $consumo_rs);
                $bandeira = array_add($bandeira, 'amarela', ($tarifa + 0.01)*$consumo_kw);
                $bandeira = array_add($bandeira, 'vermelha1', ($tarifa + 0.03)*$consumo_kw);
                $bandeira = array_add($bandeira, 'vermelha2', ($tarifa + 0.05)*$consumo_kw);

                $array_bandeiras = array_add($array_bandeiras, $type, $bandeira);
                $total = $array_bandeiras;                
            }

            else{
                foreach ($rooms as $r) {
                    $bandeira = array();
                    $consumo_kw = 0;
                    $consumo_rs = 0;

                    $consumo_diario = (DB::table('equipments')
                        ->select(DB::raw('sum(amount*watts*time_use) AS consumo_diario'))
                        ->where('room_id', $r->id)
                        ->first())->consumo_diario;

                    $consumo_kw = $consumo_kw + ($time_of_use * $consumo_diario)/1000;
                    $consumo_rs = $consumo_rs + ($consumo_kw * $tarifa);

                    $bandeira = array_add($bandeira, 'comodo', $r->name);
                    $bandeira = array_add($bandeira, 'verde', $consumo_rs);
                    $bandeira = array_add($bandeira, 'amarela', ($tarifa + 0.01)*$consumo_kw);
                    $bandeira = array_add($bandeira, 'vermelha1', ($tarifa + 0.03)*$consumo_kw);
                    $bandeira = array_add($bandeira, 'vermelha2', ($tarifa + 0.05)*$consumo_kw);

                    $array_bandeiras = array_add($array_bandeiras, $r->name, $bandeira);
                }

                $somaVerde = 0; $somaAm = 0; $somaVer1 = 0; $somaVer2 = 0;
                foreach ($array_bandeiras as $bandeira) {
                    $somaVerde = $somaVerde+$bandeira['verde'];
                    $somaAm = $somaAm+$bandeira['amarela'];
                    $somaVer1 = $somaVer1+$bandeira['vermelha1'];
                    $somaVer2 = $somaVer2+$bandeira['vermelha2']; 
                }

                $total = array_add($total, 'verde', $somaVerde);
                $total = array_add($total, 'amarela', $somaAm);
                $total = array_add($total, 'vermelha1', $somaVer1);
                $total = array_add($total, 'vermelha2', $somaVer2);
                //dd($total);
            }

            //dd($array_bandeiras);
            return view('usuario.report.show')->with('report', $report)
                                              ->with('total', $total)
                                              ->with('array_bandeiras', $array_bandeiras);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //não será feito
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //não será feito
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //administrador
        if(Auth::user()->type==0){
            session()->flash('mensagem', 'Acesso Negado!');
            return redirect()->route('user.index');
        }
        //usuário comum
        else{
            $report->delete();
            session()->flash('mensagem', 'Relatório excluído com sucesso!');
            return redirect()->route('reports.index');
        }
    }
}
