<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\KategoriRepository;
use App\Repositories\DepartemenRepository;
use Datatables;

class KategoriController extends Controller
{
    private $kategori;
    private $departemen;

    public function __construct(
        KategoriRepository $kategoriRep,
        DepartemenRepository $departemenRep
     ) 
    {
        $this->kategori = $kategoriRep;
        $this->departemen = $departemenRep;
    }

    public function index() 
    {
        return view('masterdata.kategori.index');
    }

    public function dt() 
    {
        return DataTables::of($this->kategori->kategoriRelasi())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('kategori.edit', ['id' => $data->KODE_KATEGORI]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Divisi"><i class="fa fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function create() 
    {
        $isEdit = FALSE;
        return view('masterdata.kategori.form',compact('isEdit'));
    }

    public function select2(Request $request) 
    {

        $datas = $this->departemen->select2($request->q);
        $departemen[] = [];
        foreach ($datas as $data) {
            $departemen[] = ['id' => $data->KODE_DEPARTEMEN, 'text' => $data->DEPARTEMEN];
        }
        return response()->json($departemen);
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'KODE_DEPARTEMEN' => 'required',
            'KATEGORI' => 'required|max:200',
        ]);

        try {
            $request->merge(['KODE_KATEGORI' => $this->kategori->AutoKode(strlen($request->KODE_DEPARTEMEN),$request->KODE_DEPARTEMEN)]);
            $this->kategori->create($request->all());
            return redirect()->action('KategoriController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Kategori",
                'text' => "Berhasil Menambah Data Kategori ".$request->KODE_KATEGORI.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('KategoriController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Kategori",
                'text' => "Gagal Menambah Data Kategori.",
                'type' => "error"
            ]));
        }
    }

    public function edit($id) 
    {
        $isEdit = TRUE;
        $kategori = $this->kategori->findBy('KODE_KATEGORI',$id);
        return view('masterdata.kategori.form',compact('isEdit','kategori'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'KATEGORI' => 'required|max:200',
        ]);

        try {
            $this->kategori->update($request->except(['_token','_method','KODE_DEPARTEMEN']), $id, 'KODE_KATEGORI');
            return redirect()->action('KategoriController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Kategori",
                'text' => "Berhasil Mengubah Data Kategori ".$id.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('KategoriController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Kategori",
                'text' => "Gagal Mengubah Data Kategori.",
                'type' => "error"
            ]));
        }
    }

}
