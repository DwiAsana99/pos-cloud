<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SubkategoriRepository;
use App\Repositories\KategoriRepository;
use Datatables;

class SubkategoriController extends Controller
{

    private $subkategori;
    private $kategori;

    public function __construct(
        SubkategoriRepository $subRep,
        KategoriRepository $katRep
    ) 
    {
        $this->subkategori = $subRep;
        $this->kategori = $katRep;
    }

    public function index() 
    {
        return view('masterdata.subkategori.index');
    }

    public function dt() 
    {
        return DataTables::of($this->subkategori->subkategoriRelasi())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('subkategori.edit', ['id' => $data->KODE_SUB_KATEGORI]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Subkategori"><i class="fa fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function create() 
    {
        $isEdit = FALSE;
        return view('masterdata.subkategori.form',compact('isEdit'));
    }

    public function select2(Request $request) 
    {
        $datas = $this->kategori->select2($request->q);
        $kategori[] = [];
        foreach ($datas as $data) {
            $kategori[] = ['id' => $data->KODE_KATEGORI, 'text' => $data->KATEGORI];
        }
        return response()->json($kategori);
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'KODE_KATEGORI' => 'required',
            'SUB_KATEGORI' => 'required|max:200',
        ]);

        try {
            $request->merge(['KODE_SUB_KATEGORI' => $this->subkategori->AutoKode(strlen($request->KODE_KATEGORI),$request->KODE_KATEGORI)]);
            $this->subkategori->create($request->all());
            return redirect()->action('SubkategoriController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Subkategori",
                'text' => "Berhasil Menambah Data Subkategori ".$request->KODE_SUB_KATEGORI.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('SubkategoriController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Subkategori",
                'text' => "Gagal Menambah Data Subkategori.",
                'type' => "error"
            ]));
        }
    }

    public function edit($id) 
    {
        $isEdit = TRUE;
        $subkategori = $this->subkategori->findBy('KODE_SUB_KATEGORI',$id);
        return view('masterdata.subkategori.form',compact('isEdit','subkategori'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'SUB_KATEGORI' => 'required|max:200',
        ]);

        try {
            $this->subkategori->update($request->except(['_token','_method','KODE_KATEGORI']),$id,'KODE_SUB_KATEGORI');
            return redirect()->action('SubkategoriController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Subkategori",
                'text' => "Berhasil Mengubah Data Subkategori ".$id.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('SubkategoriController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Subkategori",
                'text' => "Gagal Mengubah Data Subkategori.",
                'type' => "error"
            ]));
        }
    }
}
