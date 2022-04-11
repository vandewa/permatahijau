<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\Zakat;
use DataTables;


class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Warga::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <div class="">
                    <a href="' . route('admin:warga.edit', $row->id) . ' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit Ormas"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                    <a href="' . route('admin:warga.destroy', $row->id) . ' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Ormas" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                    </div>';
                    return $actionBtn;
                })

                ->rawColumns(['action',])
                ->make(true);
        }

        return view('admin.warga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Warga::create([
            'nama' => ucwords($request->nama),
            'rt' => $request->rt,
            'blok' => $request->blok,
            'nomor' => $request->nomor,
            'jumlah_muzaki' => $request->jumlah_muzaki,
            'kepala_kk' => ucwords($request->nama),
        ]);

        return redirect(route('admin:warga.index'))->with('status', 'Warga berhasil ditambah');
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
        $data = Warga::find($id);

        return view('admin.warga.edit', compact('data'));
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
 
        $cek = Zakat::with('warga')->where('warga_id', $id)->first();

        // return $cek;

        if(!empty($cek)){
            if($cek->warga->jumlah_muzaki != $request->jumlah_muzaki){
                if($cek->jumlah_beras == 0){
                   $jumlah_uang =  $cek->uang*$request->jumlah_muzaki;

                   Zakat::where('warga_id', $id)
                   ->update([
                        'jumlah_uang' => $jumlah_uang,
                   ]);

                } else if($cek->jumlah_uang == 0){
                    $hitung =  $cek->jumlah_beras/$cek->warga->jumlah_muzaki;
                    $jumlah_beras = $hitung*$request->jumlah_muzaki;

                    Zakat::where('warga_id', $id)
                   ->update([
                        'jumlah_beras' => $jumlah_beras,
                   ]);
                }

            } 
            // else {
            //     return 'muzaki tetap';
            // }
        } 
        // else {
        //     return 'tidak perlu update jumlah';
        // }

        Warga::find($id)->update([
            'nama' => ucwords($request->nama),
            'rt' => $request->rt,
            'blok' => $request->blok,
            'nomor' => $request->nomor,
            'jumlah_muzaki' => $request->jumlah_muzaki,
            'kepala_kk' => ucwords($request->nama),
        ]);

        return redirect(route('admin:warga.index'))->with('status', 'Data warga berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Warga::find($id);
        Zakat::where('warga_id', $a->id)->delete();
        Warga::destroy($id);
    }

    public function getWarga($id = 0)
    {
        $data = Warga::where('id', $id)->first();
        return response()->json($data);
    }
}
