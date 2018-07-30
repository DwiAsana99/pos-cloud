<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DistributorRepository;
use Datatables;

class DistributorController extends Controller
{
    private $distributor;

    public function __construct(DistributorRepository $distributorRep) 
    {
        $this->distributor = $distributorRep;
    }

    public function index() 
    {
        return view('masterdata.distributor.index');
    }

    public function dt() 
    {
        return DataTables::of($this->distributor->distributorAktif())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('distributor.edit', ['id' => $data->KODE_DISTRIBUTOR]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Divisi"><i class="fa fa-edit"></i></a>
                    <a href="'. route('isAktif.distributor', ['id' => $data->KODE_DISTRIBUTOR]) .'" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data Divisi"><i class="fa fa-remove"></i></a>';
        })
        ->make(true);
    }

    public function isAktif($id) 
    {
        $this->distributor->update(['IS_AKTIF' => 0],$id,'KODE_DISTRIBUTOR');
        return redirect()->action('DistributorController@index')
            ->with('notif', json_encode([
                'title' => "Hapus Data Distributor",
                'text' => "Berhasil Menghapus Data Distributor ".$id.".",
                'type' => "success"
            ]));
    }

    public function create() 
    {
        $isEdit = FALSE;
        return view('masterdata.distributor.form',compact('isEdit'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'NAMA_DISTRIBUTOR' => 'required',
            'ALAMAT' => 'required',
            'PIC' => 'required',
            'HP' => 'required',
            'EMAIL' => 'required',
            'NO_NPWP' => 'required',
            'KETERANGAN' => 'required',
        ]);

        if($request->IS_PKP == null) {
            $PKP = '0';
        } else {
            $PKP = '1';
        }

        try {
            $kode = $this->distributor->AutoKode();
            $request->merge([
                'KODE_DISTRIBUTOR' => $this->distributor->AutoKode(), 
                'IS_PKP' => $PKP,
                'IS_AkTIF' => '1'
            ]);

            $cek = $this->distributor->findBy('KODE_DISTRIBUTOR',$kode);
            if(count($cek) > 0) {
                $this->distributor->update($request->except(['_token','_method','KODE_DISTRIBUTOR']),$kode,'KODE_DISTRIBUTOR');
            } else {
                $this->distributor->create($request->all());
            }

            return redirect()->action('DistributorController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Distributor",
                'text' => "Berhasil Menambah Data Distributor ".$request->KODE_DISTRIBUTOR.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('DistributorController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Distributor",
                'text' => "Gagal Menambah Data Distributor.",
                'type' => "error"
            ]));
        }
        
    }

    public function edit($id) 
    {
        $isEdit = TRUE;
        $distributor = $this->distributor->findBy('KODE_DISTRIBUTOR',$id);
        return view('masterdata.distributor.form',compact('isEdit', 'distributor'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'NAMA_DISTRIBUTOR' => 'required',
            'ALAMAT' => 'required',
            'PIC' => 'required',
            'HP' => 'required',
            'EMAIL' => 'required',
            'NO_NPWP' => 'required',
            'KETERANGAN' => 'required',
        ]);

        if($request->IS_PKP == null) {
            $PKP = '0';
        } else {
            $PKP = '1';
        }

        try {
            $request->merge(['IS_PKP' => $PKP]);
            $this->distributor->update($request->except(['_token','_method']),$id,'KODE_DISTRIBUTOR');
            return redirect()->action('DistributorController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Distributor",
                'text' => "Berhasil Mengubah Data Distributor ".$id.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('DistributorController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Distributor",
                'text' => "Gagal Mengubah Data Distributor",
                'type' => "error"
            ]));
        }
    }
}
