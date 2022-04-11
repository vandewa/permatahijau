<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zakat;
use App\Models\Warga;
use App\Models\Penerima;
use DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Penerima::whereNotNull('nama');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                <div class="">
                <a href="' . route('admin:penerima-zakat.destroy', $row->id) . ' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Pemberi" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                </div>';
                    return $actionBtn;
                })
                ->editColumn('nama', function ($a) {
                    return ucwords($a->nama);
                })
                ->rawColumns(['action',])
                ->make(true);
        }

        return view('admin.penerimaan-zakat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {

        $cek = DB::table('penerima')->count();
        if ($cek == 0) {
            $beras = 0;
            $datanya = DB::table('warga')
                ->leftJoin('zakat', 'warga.id', '=', 'zakat.warga_id')
                ->whereNotNull('jumlah_uang')
                ->orderBy('rt', 'asc')
                ->orderBy('kepala_kk', 'asc')
                ->get();

            foreach ($datanya as $aa) {
                $beras = $beras + $aa->jumlah_beras;
            }
        } else {
            $datanya = Penerima::orderby('updated_at', 'desc')->first();
            $beras = $datanya->stok;
        }

        return view('admin.penerimaan-zakat.create', compact('beras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = DB::table('penerima')->count();
        if ($cek == 0) {
            $stok = $request->beras - $request->jumlah_beras;
        } else {
            $stok = $request->stok - $request->jumlah_beras;
        }

        Penerima::create([
            'nama' => $request->nama,
            'rt' => $request->rt,
            'blok' => $request->blok,
            'no' => $request->no,
            'jumlah_beras' => $request->jumlah_beras,
            'stok' => $stok,
        ]);

        return redirect(route('admin:penerima-zakat.index'))->with('status', 'Penerima berhasil ditambah');
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

        $data = Penerima::find($id);
        $cek = DB::table('penerima')->count();
        if ($cek == 0) {
            $beras = 0;
            $datanya = DB::table('warga')
                ->leftJoin('zakat', 'warga.id', '=', 'zakat.warga_id')
                ->whereNotNull('jumlah_uang')
                ->orderBy('rt', 'asc')
                ->orderBy('kepala_kk', 'asc')
                ->get();

            foreach ($datanya as $aa) {
                $beras = $beras + $aa->jumlah_beras;
            }
        } else {
            $datanya = Penerima::orderby('created_at', 'desc')->first();
            $beras = $datanya->stok;
        }


        return view('admin.penerimaan-zakat.edit', compact('data', 'beras'));
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
        $cek = DB::table('penerima')->count();
        if ($cek == 0) {
            $stok = $request->beras - $request->jumlah_beras;
        } else {
            $stok = $request->stok - $request->jumlah_beras;
        }

        Penerima::find($id)->update([
            'nama' => $request->nama,
            'rt' => $request->rt,
            'blok' => $request->blok,
            'no' => $request->no,
            'jumlah_beras' => $request->jumlah_beras,
            'stok' => $stok,
        ]);

        return redirect(route('admin:penerima-zakat.index'))->with('status', 'Data penerima berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Penerima::find($id);
        $b = Penerima::orderBy('updated_at', 'desc')->first();


        $tambahan = $a->jumlah_beras + $b->stok;

        Penerima::create([
            'stok' => $tambahan,
        ]);
        Penerima::destroy($id);
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
        return $pdf->stream();
    }

    public function semuart()
    {
        $saldo = 0;
        $datanya = DB::table('penerima')
            ->where('nama', '!=', null)
            ->orderBy('rt', 'asc')
            ->get();

        foreach ($datanya as $aa) {
            $saldo = $saldo + $aa->jumlah_beras;
        }

        $pdf = PDF::loadView('cetak_semuart', compact('datanya', 'saldo'));
        return $pdf->download('Penerima Zakat.pdf');
    }

    public function rt1()
    {
        $saldo = 0;
        $datanya = DB::table('penerima')
            ->where('rt', '=', 'RT 1')
            ->get();

        foreach ($datanya as $aa) {
            $saldo = $saldo + $aa->jumlah_beras;
        }

        $pdf = PDF::loadView('cetak_rt1', compact('datanya', 'saldo'));
        return $pdf->download('Penerima RT 1.pdf');
    }

    public function rt2()
    {
        $saldo = 0;
        $datanya = DB::table('penerima')
            ->where('rt', '=', 'RT 2')
            ->get();

        foreach ($datanya as $aa) {
            $saldo = $saldo + $aa->jumlah_beras;
        }

        $pdf = PDF::loadView('cetak_rt2', compact('datanya', 'saldo'));
        return $pdf->download('Penerima RT 2.pdf');
    }

    public function rt3()
    {
        $saldo = 0;
        $datanya = DB::table('penerima')
            ->where('rt', '=', 'RT 3')
            ->get();

        foreach ($datanya as $aa) {
            $saldo = $saldo + $aa->jumlah_beras;
        }

        $pdf = PDF::loadView('cetak_rt3', compact('datanya', 'saldo'));
        return $pdf->download('Penerima RT 3.pdf');
    }

    public function rt4()
    {
        $saldo = 0;
        $datanya = DB::table('penerima')
            ->where('rt', '=', 'RT 4')
            ->get();

        foreach ($datanya as $aa) {
            $saldo = $saldo + $aa->jumlah_beras;
        }

        $pdf = PDF::loadView('cetak_rt4', compact('datanya', 'saldo'));
        return $pdf->download('Penerima RT 4.pdf');
    }

    public function rt5()
    {
        $saldo = 0;
        $datanya = DB::table('penerima')
            ->where('rt', '=', 'RT 5')
            ->get();

        foreach ($datanya as $aa) {
            $saldo = $saldo + $aa->jumlah_beras;
        }

        $pdf = PDF::loadView('cetak_rt5', compact('datanya', 'saldo'));
        return $pdf->download('Penerima RT 5.pdf');
    }
}
