<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zakat;
use App\Models\Warga;
use App\Models\BelanjaBeras;
use Illuminate\Support\Facades\DB;


class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // return $request->all();

        if ($request->jenis_zakat == 1) {
            $warga = Warga::where('id', $request->warga_id)->first();
            $jumlah_muzaki = $warga->jumlah_muzaki;
            $jumlah_beras = $jumlah_muzaki * 2.5;

            $jumlah_uang = '0';
        } else if ($request->jenis_zakat == 2) {
            $warga = Warga::where('id', $request->warga_id)->first();
            $jumlah_muzaki = $warga->jumlah_muzaki;
            $jumlah_uang = $jumlah_muzaki * $request->uang;

            $jumlah_beras = '0';
        }

        $a = Zakat::create([
            'warga_id' => $request->warga_id,
            'jenis_zakat' => $request->jenis_zakat,
            'uang' => $request->uang,
            'jumlah_beras' => $jumlah_beras,
            'jumlah_uang' => $jumlah_uang,
        ]);

        $cek = DB::table('belanja_beras')->count();
        if ($cek == 0) {
            $saldo = $jumlah_uang;
        } else {
            $saldo = $request->saldo + $jumlah_uang;
        }

        $belanja = new BelanjaBeras();
        $belanja->id_zakat = $a->id;
        $belanja->jumlah_uang = $a->jumlah_uang;
        $belanja->saldo = $saldo;
        $belanja->save();

        return redirect(route('beranda'));
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
