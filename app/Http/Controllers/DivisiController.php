<?php

namespace App\Http\Controllers;

use App\Repositories\DivisiRepository;
use Illuminate\Http\Request;
use Datatables;

class DivisiController extends Controller
{

    private $divisi;

    public function __construct(DivisiRepository $divisiRep) 
    {
        $this->divisi = $divisiRep;
    }

    public function index() 
    {
        return view('masterdata.divisi.index');
    }

    public function dt() 
    {
        return DataTables::of($this->divisi->all())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('divisi.edit', ['id' => $data->KODE_DIVISI]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Divisi"><i class="fa fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function create() 
    {
        $isEdit = false;
        return view('masterdata.divisi.form',compact('isEdit'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'DIVISI' => 'required|max:200',
        ]);
        
        try {
            $request->merge(['KODE_DIVISI' => $this->divisi->AutoKode()]);
            $this->divisi->create($request->all());
            return redirect()->action('DivisiController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Divisi",
                'text' => "Berhasil Menambah Data Divisi ".$request->KODE_DIVISI.".",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return redirect()->action('DivisiController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Divisi",
                'text' => "Gagal Menambah Data Divisi.",
                'type' => "error"
            ]));
        }
    }

    public function edit($id) 
    {
        $isEdit = TRUE;
        $divisi = $this->divisi->findBy('KODE_DIVISI',$id);
        return view('masterdata.divisi.form',compact('isEdit','divisi'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'DIVISI' => 'required|max:200',
        ]);

        try {
            $this->divisi->update($request->except(['_token', '_method']), $id, 'KODE_DIVISI');
            return redirect()->action('DivisiController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Divisi",
                'text' => "Berhasil Mengubah Data Divisi ".$id.".",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return redirect()->action('DivisiController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Divisi",
                'text'  => "Gagal Merubah Data Divisi.",
                'type'  => "error"
            ]));
        }
    }
}
