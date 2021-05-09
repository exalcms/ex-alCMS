<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Diretoria;
use App\Models\DiretoriaUser;
use App\Models\ElementSite;
use Illuminate\Http\Request;

class ExcmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dirPres = DiretoriaUser::with('user','diretoria')->where('id_diretoria', '=', 1)->first();
        $dirVic = DiretoriaUser::with('user','diretoria')->where('id_diretoria', '=', 2)->first();
        $dirSec = DiretoriaUser::with('user','diretoria')->where('id_diretoria', '=', 3)->first();
        $dirFin = DiretoriaUser::with('user','diretoria')->where('id_diretoria', '=', 4)->first();
        $dirJur = DiretoriaUser::with('user','diretoria')->where('id_diretoria', '=', 5)->first();
        $dirCom = DiretoriaUser::with('user','diretoria')->where('id_diretoria', '=', 6)->first();
        $dirCul = DiretoriaUser::with('user','diretoria')->where('id_diretoria', '=', 7)->first();
        $dirEsp = DiretoriaUser::with('user','diretoria')->where('id_diretoria', '=', 8)->first();

        $assoc = ElementSite::orderBy('id', 'DESC')->first();
        return view('welcome', compact('assoc', 'dirFin', 'dirPres', 'dirSec', 'dirVic', 'dirJur', 'dirCom', 'dirCul', 'dirEsp'));
    }

    public function detail()
    {
        return view('detail');
    }

    public function history()
    {
        $history = ElementSite::orderBy('id', 'DESC')->first();
        return view('history', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
