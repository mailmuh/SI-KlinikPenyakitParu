<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataDokter;

class DataDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datadokters = DataDokter::latest()->get();
        return view('Klinik.Dokter.index', compact('datadokters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Klinik.Dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datadokter = DataDokter::create([
            'nama_dokter' => $request->input('nama_dokter'),
            'ttl' => $request->input('ttl'),
            'alamat' => $request->input('alamat'),
            'agama' => $request->input('agama'),
            'spesialisasi' => $request->input('spesialisasi')
        ]);
        return redirect(route('datadokters.index'));
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
    public function edit(DataDokter $datadokter)
    // ada $id
    {
        return view('Klinik.Dokter.edit', compact('datadokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataDokter $datadokter)
    // ada $id
    {
        $datadokter = DataDokter::whereid_dokter($datadokter->id_dokter)->update([
            'nama_dokter' => $request->input('nama_dokter'),
            'ttl' => $request->input('ttl'),
            'alamat' => $request->input('alamat'),
            'agama' => $request->input('agama'),
            'spesialisasi' => $request->input('spesialisasi'),
        ]);

        return redirect(route('datadokters.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dokter)
    {
        $datadokter = DataDokter::find($id_dokter);
        $datadokter->delete();

        return redirect(route('datadokters.index'));
    }
}
