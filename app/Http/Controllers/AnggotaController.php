<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Http\Requests\AnggotaRequest;
use PDF;
use Barryvydh\Snappy;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')){
            $anggota = Anggota::All();
            return view('anggota.index',compact('anggota'));
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('admin')){
            return view('anggota.create');
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggotaRequest $request)
    {
        if (Auth::user()->hasRole('admin')){
            $anggota = new Anggota;
            $anggota->nta = $request->get('nta');
            $anggota->nama = $request->get('nama');
            $anggota->pangkalan = $request->get('pangkalan');
            $anggota->agama = $request->get('agama');
            $anggota->gol = $request->get('gol');
            $anggota->tempat = $request->get('tempat');
            $anggota->tgl_lahir = $request->get('tgl_lahir');
            $anggota->kwaran = $request->get('kwaran');
            $anggota->kwarcab = $request->get('kwarcab');
            $anggota->goldar = $request->get('goldar');
            $file = $request->file('foto')->store('foto', 'public');
            $anggota->foto = $file;
            $anggota->save();
            Toastr::success('Anggota Berhasil Disimpan', 'SUKSES', ['options']);
            return redirect()->route('anggota.index');
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->hasRole('admin')){
            $anggota = Anggota::find($id);
            return view('anggota.show',compact('anggota'));
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('admin')){
            $anggota = Anggota::find($id);
            return view('anggota.edit',compact('anggota'));
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnggotaRequest $request, $id)
    {
        if (Auth::user()->hasRole('admin')){
            $anggota = Anggota::findOrFail($id);
            $anggota->nta = $request->get('nta');
            $anggota->nama = $request->get('nama');
            $anggota->pangkalan = $request->get('pangkalan');
            $anggota->agama = $request->get('agama');
            $anggota->tempat = $request->get('tempat');
            $anggota->tgl_lahir = $request->get('tgl_lahir');
            $anggota->gol = $request->get('gol');
            $anggota->kwaran = $request->get('kwaran');
            $anggota->kwarcab = $request->get('kwarcab');
            $anggota->goldar = $request->get('goldar');
            if( $request->file('foto') != NULL){
                $file = $request->file('foto')->store('foto', 'public');
                $anggota->foto = $file;
            }
            $anggota->save();
            Toastr::success('Anggota Berhasil Diupdate', 'SUKSES', ['options']);
            return redirect()->route('anggota.index');
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')){
            $anggota = Anggota::findOrFail($id);
            $anggota->delete();
            return redirect()->back();
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        } 
    }

    public function pdf($id){
        if (Auth::user()->hasRole('admin')){
            $anggota = Anggota::find($id);
            return view('anggota.pdf',compact('anggota'));
        }
        else {
            return response()->view('errors.403', [abort(403)], 403);
        } 
    }
}
