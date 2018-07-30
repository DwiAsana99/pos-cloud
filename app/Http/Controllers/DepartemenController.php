<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DepartemenRepository;
use App\Repositories\DivisiRepository;
use Datatables;

class DepartemenController extends Controller
{
    private $departemen;
    private $divisi;

    public function __construct(
        DepartemenRepository $departemenRep,
        DivisiRepository $divisiRep
    ) 
    {
        $this->departemen = $departemenRep;
        $this->divisi = $divisiRep;
    }

    public function index() 
    {
        return view('masterdata.departemen.index');
    }

    public function dt() 
    {
        return DataTables::of($this->departemen->depRelasi())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('departemen.edit', ['id' => $data->KODE_DEPARTEMEN]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Divisi"><i class="fa fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function create() 
    {
        $isEdit = FALSE;
        return view('masterdata.departemen.form',compact('isEdit'));
    }

    public function select2(Request $request) 
    {
        $datas = $this->divisi->select2($request->q);
        $divisi[] = [];
        foreach ($datas as $data) {
            $divisi[] = ['id' => $data->KODE_DIVISI, 'text' => $data->DIVISI];
        }
        return response()->json($divisi);
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'KODE_DIVISI' => 'required',
            'DEPARTEMEN' => 'required|max:200',
        ]);
            
        try {
            $request->merge(['KODE_DEPARTEMEN' => $this->departemen->AutoKode(strlen($request->KODE_DIVISI),$request->KODE_DIVISI)]);
            $this->departemen->create($request->all());
            return redirect()->action('DepartemenController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Divisi",
                'text' => "Berhasil Menambah Data Departemen ".$request->KODE_DEPARTEMEN.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('DepartemenController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Siswa",
                'text' => "Gagal Menambah Data Departemen.",
                'type' => "error"
            ]));
        }
    }

    public function edit($id)
    {
        $isEdit = TRUE;
        $departemen = $this->departemen->findBy('KODE_DEPARTEMEN',$id); 
        return view('masterdata.departemen.form',compact('isEdit','departemen'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'DEPARTEMEN' => 'required|max:200',
        ]);

        try {
            $this->departemen->update($request->except(['_token', '_method','KODE_DIVISI']), $id, 'KODE_DEPARTEMEN');
            return redirect()->action('DepartemenController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Departemen",
                'text' => "Berhasil Mengubah Data Departemen ".$id.".",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return redirect()->action('DepartemenController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Departemen",
                'text'  => "Gagal Merubah Data Departemen.",
                'type'  => "error"
            ]));
        }
    }
}
