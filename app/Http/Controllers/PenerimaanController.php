<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zakat;
use App\Models\Warga;
use DataTables;


class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){

        $data = Zakat::with(['warga'])->select('*');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '
                <div class="">
                <a href="'.route('admin:penerimaan-zakat.edit', $row->id ).' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit Penerimaan"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                <a href="'.route('admin:penerimaan-zakat.destroy', $row->id ).' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Penerimaan" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                </div>';
                return $actionBtn;
            })

            ->addColumn('jenis', function($a){
                if($a->jenis_zakat == 1){
                    return 'Beras';
                } else {
                    return 'Uang';
                }
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

    public function beras(Request $request)
    {
        if($request->ajax()){

        $data = Zakat::with(['warga'])->where('jenis_zakat', '1');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '
                <div class="">
                <a href="'.route('admin:penerimaan-zakat.edit', $row->id ).' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit Penerimaan"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                <a href="'.route('admin:penerimaan-zakat.destroy', $row->id ).' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Penerimaan" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                </div>';
                return $actionBtn;
            })

            ->addColumn('jenis', function($a){
                if($a->jenis_zakat == 1){
                    return 'Beras';
                } else {
                    return 'Uang';
                }
            })
            ->rawColumns(['action',])
            ->make(true);
        }
            
        return view('admin.penerimaan-zakat.beras');
    }

    public function uang(Request $request)
    {
       
        if($request->ajax()){

            $data = Zakat::with(['warga'])->where('jenis_zakat', '2');
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="">
                    <a href="'.route('admin:penerimaan-zakat.edit', $row->id ).' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit Penerimaan"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                    <a href="'.route('admin:penerimaan-zakat.destroy', $row->id ).' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Penerimaan" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                    </div>';
                    return $actionBtn;
                })
    
                ->addColumn('jenis', function($a){
                    if($a->jenis_zakat == 1){
                        return 'Beras';
                    } else {
                        return 'Uang';
                    }
                })
                ->rawColumns(['action',])
                ->make(true);
            }

        return view('admin.penerimaan-zakat.uang');
    }

    public function create()
    {
        $ormas = Ormas::pluck('nama_organisasi', 'id');
        $foto = FotoKegiatan::where('id_kegiatan_ormas', 'a')->get();

        return view('admin.kegiatan-ormas.create', compact('foto'))->with('ormas', $ormas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $b = KegiatanOrmas::create([
            'id_ormas' => $request->id_ormas,
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal' => date("Y-m-d", strtotime($request->tanggal)),
            'deskripsi' => $request->deskripsi,  
        ]);


        if($request->hasfile('images')){
            $files = $request->file('images');
            $prefix = date('Ymdhis');
            $no = 1;
                foreach($files as $a){
                    $extension = $a->extension();
                    $filename = $prefix.'-'.$no.'.'.$extension;
                    $a->move(public_path('/uploads'), $filename);
                    $foto = new FotoKegiatan();
                    $foto->id_kegiatan_ormas = $b->id;
                    $foto->images = $filename;
                    $foto->save();

                    $no++;
                    }
            }

            return redirect(route('admin:kegiatan-ormas.index'))->with('status', 'Kegiatan ormas berhasil ditambah');
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
        
        $data = KegiatanOrmas::find($id);
        $foto = FotoKegiatan::where('id_kegiatan_ormas', $id)->get();
        $ormas = Ormas::pluck('nama_organisasi', 'id');
        $tanggal = \Carbon\Carbon::parse($data->tanggal)->format('d F, Y');

        return view('admin.kegiatan-ormas.edit', compact('data', 'tanggal', 'foto'))->with('ormas', $ormas);
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
        Zakat::destroy($id);
    }

    
}
