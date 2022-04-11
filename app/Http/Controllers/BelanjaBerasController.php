<?php

namespace App\Http\Controllers;

use App\Models\BelanjaBeras;
use App\Models\Penerima;
use Illuminate\Http\Request;
use DataTables;

class BelanjaBerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = BelanjaBeras::where('id_zakat', null)->orderBy('created_at', 'desc');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                <div class="">
                <a href="' . route('admin:belanja-beras.destroy', $row->id) . ' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Pemberi" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                </div>';
                    return $actionBtn;
                })
                ->editColumn('tanggal', function ($data) {

                    return \Carbon\Carbon::createFromTimeStamp(strtotime($data->created_at))->isoFormat('D MMMM Y');
                })
                ->editColumn('total_belanja', function ($data) {

                    return number_format($data->total_belanja);
                })
                ->editColumn('saldo', function ($data) {

                    return 'Rp. ' . number_format($data->saldo);
                })
                ->editColumn('jenis', function ($data) {
                    if ($data->jenis == 'belanja') {
                        return 'Belanja Beras (' . $data->beras . ' Kg)';
                    } else {
                        return 'Donasi (' . number_format($data->donasi) . ')';
                    }
                })
                ->rawColumns(['action',])
                ->make(true);
        }


        return view('admin.belanja-beras.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $saldo = BelanjaBeras::orderBy('updated_at', 'desc')->first()->saldo;


        return view('admin.belanja-beras.create', compact('saldo'));
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

        $a = BelanjaBeras::orderBy('updated_at', 'desc')->first()->saldo;
        $saldo = $a - $request->total_belanja;

        $b = Penerima::orderBy('updated_at', 'desc')->first()->stok;
        $stok = $b + $request->beras;

        $d = BelanjaBeras::orderBy('updated_at', 'desc')->first()->saldo;
        $donasi = $a - $request->donasi;

        if ($request->jenis == 'belanja') {

            $c = BelanjaBeras::create([
                'jenis' => $request->jenis,
                'total_belanja' => $request->total_belanja,
                'beras' => $request->beras,
                'keterangan' => $request->keterangan,
                'saldo' => $saldo,
            ]);

            Penerima::create([
                'stok' => $stok,
                'id_belanja_beras' => $c->id,
            ]);
        } else {

            BelanjaBeras::create([
                'jenis' => $request->jenis,
                'total_belanja' => $request->total_belanja,
                'donasi' => $request->donasi,
                'keterangan' => $request->keterangan,
                'saldo' => $donasi,
            ]);
        }

        return redirect(route('admin:belanja-beras.index'));
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
        $a = BelanjaBeras::find($id);
        if (!empty($a)) {
            Penerima::where('id_belanja_beras', $a->id)->delete();
        }
        BelanjaBeras::destroy($id);
    }
}
