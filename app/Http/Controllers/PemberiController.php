<?php

namespace App\Http\Controllers;

use App\Models\BelanjaBeras;
use Illuminate\Http\Request;
use App\Models\Zakat;
use App\Models\Warga;
use App\Models\Penerima;
use DataTables;
use Illuminate\Support\Facades\DB;
use PDF;

class PemberiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Zakat::with(['warga'])->select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                <div class="">
                <a href="' . route('admin:pemberi-zakat.edit', $row->id) . ' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit Pemberi"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                <a href="' . route('admin:pemberi-zakat.destroy', $row->id) . ' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Pemberi" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                </div>';
                    return $actionBtn;
                })

                ->addColumn('jenis', function ($a) {
                    if ($a->jenis_zakat == 1) {
                        return 'Beras';
                    } else {
                        return 'Uang';
                    }
                })
                ->editColumn('jumlah_uang', function ($a) {
                    if ($a->jumlah_uang == 0) {
                        return '-';
                    } else {
                        return $a->jumlah_uang;
                    }
                })
                ->editColumn('jumlah_beras', function ($a) {
                    if ($a->jumlah_beras == 0) {
                        return '-';
                    } else {
                        return $a->jumlah_beras;
                    }
                })
                ->rawColumns(['action',])
                ->make(true);
        }

        return view('admin.pemberi-zakat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function beras(Request $request)
    {
        if ($request->ajax()) {

            $data = Zakat::with(['warga'])->where('jenis_zakat', '1');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                <div class="">
                <a href="' . route('admin:pemberi-zakat.edit', $row->id) . ' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit pemberi"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                <a href="' . route('admin:pemberi-zakat.destroy', $row->id) . ' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus pemberi" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                </div>';
                    return $actionBtn;
                })

                ->addColumn('jenis', function ($a) {
                    if ($a->jenis_zakat == 1) {
                        return 'Beras';
                    } else {
                        return 'Uang';
                    }
                })
                ->rawColumns(['action',])
                ->make(true);
        }

        return view('admin.pemberi-zakat.beras');
    }

    public function uang(Request $request)
    {

        if ($request->ajax()) {

            $data = Zakat::with(['warga'])->where('jenis_zakat', '2');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <div class="">
                    <a href="' . route('admin:pemberi-zakat.edit', $row->id) . ' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit pemberi"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                    <a href="' . route('admin:pemberi-zakat.destroy', $row->id) . ' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus pemberi" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                    </div>';
                    return $actionBtn;
                })

                ->addColumn('jenis', function ($a) {
                    if ($a->jenis_zakat == 1) {
                        return 'Beras';
                    } else {
                        return 'Uang';
                    }
                })

                ->addColumn('rtnya', function ($a) {
                    $b = Warga::where('id', $a->warga_id)->first();
                    return $b->rt;
                })
                ->rawColumns(['action',])
                ->make(true);
        }

        return view('admin.pemberi-zakat.uang');
    }

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
        $data = Zakat::with(['warga'])->find($id);

        // return $data;

        return view('admin.pemberi-zakat.edit', compact('data'));
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
        // return $request->all();

        if ($request->jenis_zakat == 1) {
            $warga = Warga::where('id', $request->warga_id)->first();
            $jumlah_muzaki = $warga->jumlah_muzaki;
            $jumlah_beras = $jumlah_muzaki * 2.5;

            $jumlah_uang = '0';

            Zakat::find($id)->update([
                'jenis_zakat' => $request->jenis_zakat,
                'jumlah_beras' => $jumlah_beras,
                'jumlah_uang' => $jumlah_uang,
            ]);
        } else if ($request->jenis_zakat == 2) {
            $warga = Warga::where('id', $request->warga_id)->first();
            $jumlah_muzaki = $warga->jumlah_muzaki;
            $jumlah_uang = $jumlah_muzaki * $request->uang;

            $jumlah_beras = '0';

            Zakat::find($id)->update([
                'jenis_zakat' => $request->jenis_zakat,
                'jumlah_beras' => $jumlah_beras,
                'jumlah_uang' => $jumlah_uang,
                'uang' => $request->uang,
            ]);
        } else {

            $warga = Warga::where('id', $request->warga_id)->first();
            $jumlah_muzaki = $warga->jumlah_muzaki;
            $jumlah_uang = $jumlah_muzaki * $request->uang;

            $jumlah_beras = '0';

            Zakat::find($id)->update([
                'jenis_zakat' => '2',
                'jumlah_beras' => $jumlah_beras,
                'jumlah_uang' => $jumlah_uang,
                'uang' => $request->uang,
            ]);
        }


        return redirect(route('admin:pemberi-zakat.index'))->with('status', 'Data pemberi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Zakat::find($id);
        BelanjaBeras::where('id_zakat', $a->id)->delete();
        Zakat::destroy($id);
    }

    public function CetakZakatUang()
    {
        $saldo = 0;
        $datanya = DB::table('warga')
            ->leftJoin('zakat', 'warga.id', '=', 'zakat.warga_id')
            ->where('jenis_zakat', '2')
            ->orderBy('rt', 'asc')
            ->orderBy('kepala_kk', 'asc')
            ->get();

        foreach ($datanya as $aa) {
            $saldo = $saldo + $aa->jumlah_uang;
        }


        // $datanya = Zakat::with(['warga'])->where('jenis_zakat', '2')->get();
        $pdf = PDF::loadView('cetak_uang', compact('datanya', 'saldo'));
        return $pdf->download('Data Pemberi Zakat (Uang).pdf');
    }

    public function CetakZakatBeras()
    {
        $saldo = 0;
        $datanya = DB::table('warga')
            ->leftJoin('zakat', 'warga.id', '=', 'zakat.warga_id')
            ->where('jenis_zakat', '1')
            ->orderBy('rt', 'asc')
            ->orderBy('kepala_kk', 'asc')
            ->get();

        foreach ($datanya as $aa) {
            $saldo = $saldo + $aa->jumlah_beras;
        }

        $pdf = PDF::loadView('cetak_beras', compact('datanya', 'saldo'));
        return $pdf->download('Data Pemberi Zakat (Beras).pdf');
    }

    public function cetakPemberi()
    {
        $uang = 0;
        $beras = 0;
        $datanya = DB::table('warga')
            ->leftJoin('zakat', 'warga.id', '=', 'zakat.warga_id')
            ->whereNotNull('jumlah_uang')
            ->orderBy('rt', 'asc')
            ->orderBy('kepala_kk', 'asc')
            ->get();

        foreach ($datanya as $aa) {
            $uang = $uang + $aa->jumlah_uang;
            $beras = $beras + $aa->jumlah_beras;
        }

        $pdf = PDF::loadView('cetak_pemberi', compact('datanya', 'beras', 'uang'));
        return $pdf->download('Data Pemberi Zakat (Uang dan Beras).pdf');
    }

    public function cetaklaporan()
    {

        $uang = 0;
        $beras = 0;
        $jml_beras = 0;
        $datanya = DB::table('warga')
            ->leftJoin('zakat', 'warga.id', '=', 'zakat.warga_id')
            ->whereNotNull('jumlah_uang')
            ->orderBy('rt', 'asc')
            ->orderBy('kepala_kk', 'asc')
            ->get();

        foreach ($datanya as $aa) {
            $uang = $uang + $aa->jumlah_uang;
            $beras = $beras + $aa->jumlah_beras;
        }

        $penerima = Penerima::whereNotNull('nama')->get();
        foreach ($penerima as $bb) {
            $jml_beras = $jml_beras + $bb->jumlah_beras;
        }



        $belanjadonasi = BelanjaBeras::whereNotNull('jenis')->get();

        $saldo_akhir = BelanjaBeras::orderBy('updated_at', 'desc')->first()->saldo;

        $pdf = PDF::loadView('laporan', compact('datanya', 'beras', 'uang', 'penerima', 'belanjadonasi', 'jml_beras', 'saldo_akhir'));
        return $pdf->download('Laporan Akhir.pdf');
    }
}
