<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PelangganRepository;
use Datatables;

class PelangganController extends Controller
{
    private $pelanggan;

    public function __construct(PelangganRepository $pelangganRep) 
    {
        $this->pelanggan = $pelangganRep;
    }

    public function index() 
    {
        return view('masterdata.pelanggan.index');
    }

    public function dt() 
    {
        return DataTables::of($this->pelanggan->all())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('pelanggan.edit', ['id' => $data->KODE_PELANGGAN]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Pelanggan"><i class="fa fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function create() 
    {
        $isEdit = FALSE;
        return view('masterdata.pelanggan.form',compact('isEdit'));
    }

    public function store(Request $request) 
    {
        $this->validate($request,[
            'NAMA_PELANGGAN' => 'required',
            'ALAMAT' => 'required',
            'NO_HP' => 'required',
            'EMAIL' => 'required',
            'NPWP' => 'required',
        ]);

        try {
            $request->merge(['KODE_PELANGGAN' => $this->pelanggan->Autokode()]);
            $this->pelanggan->create($request->all());
            return redirect()->action('PelangganController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Pelanggan",
                'text' => "Berhasil Menambah Data Pelanggan ".$request->KODE_PELANGGAN.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('PelangganController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Pelanggan",
                'text' => "Gagal Menambah Data Pelanggan.",
                'type' => "error"
            ]));
        }
    }

    public function edit($id) 
    {
        $isEdit = TRUE;
        $pelanggan = $this->pelanggan->findBy('KODE_PELANGGAN',$id);
        return view('masterdata.pelanggan.form',compact('isEdit','pelanggan'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request,[
            'NAMA_PELANGGAN' => 'required',
            'ALAMAT' => 'required',
            'NO_HP' => 'required',
            'EMAIL' => 'required',
            'NPWP' => 'required',
        ]);

        try {
            $this->pelanggan->update($request->except(['_token','_method']),$id,'KODE_PELANGGAN');
            return redirect()->action('PelangganController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Pelanggan",
                'text' => "Berhasil Mengubah Data Pelanggan ".$id.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('PelangganController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Pelanggan",
                'text' => "Gagal Mengubah Data Pelanggan.",
                'type' => "error"
            ]));
        }
    }
}
