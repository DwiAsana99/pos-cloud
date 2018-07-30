<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DistributorDivisiRepository;
use App\Repositories\DistributorRepository;
use Datatables;

class DistributorDivisiController extends Controller
{
    private $distributordivisi;
    private $distributor;

    public function __construct(
        DistributorDivisiRepository $distributordivisiRep,
        DistributorRepository $distributorRep
    ) 
    {
        $this->distributordivisi = $distributordivisiRep;
        $this->distributor = $distributorRep;
    }

    public function index() 
    {
        return view('masterdata.distributor_divisi.index');
    }

    public function dt() 
    {
        return DataTables::of($this->distributordivisi->distributor_divisiRelasi())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('distributordivisi.edit', ['id' => $data->KODE_DISTRIBUTOR_DIVISI]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Divisi"><i class="fa fa-edit"></i></a>
                    <a href="'. route('isAktif.distributordivisi', ['id' => $data->KODE_DISTRIBUTOR_DIVISI]) .'" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data Divisi"><i class="fa fa-remove"></i></a>';
        })
        ->make(true);
    }

    public function create() 
    {
        $isEdit = FALSE;
        return view('masterdata.distributor_divisi.form',compact('isEdit'));
    }

    public function select2(Request $request) 
    {
        $datas = $this->distributor->select2($request->q);
        $distributor[] = [];
        foreach ($datas as $data) {
            $distributor[] = ['id' => $data->KODE_DISTRIBUTOR, 'text' => $data->NAMA_DISTRIBUTOR];
        }
        return response()->json($distributor);
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'KODE_DISTRIBUTOR' => 'required',
            'NAMA_DISTRIBUTOR_DIVISI' => 'required',
            'NAMA_SALES' => 'required',
            'NOHP_SALES' => 'required',
        ]);

        try {
            $kode = $this->distributordivisi->AutoKode(strlen($request->KODE_DISTRIBUTOR),$request->KODE_DISTRIBUTOR);
            $request->merge([
                'KODE_DISTRIBUTOR_DIVISI' => $kode,
                'IS_AKTIF' => 1
            ]);
            $cek = $this->distributordivisi->findBy('KODE_DISTRIBUTOR_DIVISI',$kode);
            if(count($cek) > 0) {
                $this->distributordivisi->update($request->except(['_token','_method','KODE_DISTRIBUTOR_DIVISI']),$kode,'KODE_DISTRIBUTOR_DIVISI');
            } else {
                $this->distributordivisi->create($request->all());
            }
            return redirect()->action('DistributorDivisiController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Distributor Divisi",
                'text' => "Berhasil Menambah Data Distributor Divisi ".$request->KODE_DISTRIBUTOR_DIVISI.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('DistributorDivisiController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Distributor Divisi",
                'text' => "Gagal Menambah Data Distributor Divisi.",
                'type' => "error"
            ]));
        }
    }

    public function edit($id) 
    {
        $isEdit = TRUE;
        $distributorDivisi = $this->distributordivisi->findBy('KODE_DISTRIBUTOR_DIVISI',$id);
        return view('masterdata.distributor_divisi.form',compact('isEdit','distributorDivisi'));
    }

    public function update(Request $request,$id) 
    {
        $this->validate($request, [
            'KODE_DISTRIBUTOR' => 'required',
            'NAMA_DISTRIBUTOR_DIVISI' => 'required',
            'NAMA_SALES' => 'required',
            'NOHP_SALES' => 'required',
        ]);

        try {
            $this->distributordivisi->update($request->except(['_token','_method','KODE_DISTRIBUTOR']),$id, 'KODE_DISTRIBUTOR_DIVISI');
            return redirect()->action('DistributorDivisiController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Distributor Divisi",
                'text' => "Berhasil Mengubah Data Distributor Divisi ".$id.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('DistributorDivisiController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Distributor Divisi",
                'text' => "Gagal Mengubah Data Distributor Divisi.",
                'type' => "error"
            ]));
        }
    }

    public function isAktif($id) 
    {
        $this->distributordivisi->update(['IS_AKTIF' => 0],$id, 'KODE_DISTRIBUTOR_DIVISI');
            return redirect()->action('DistributorDivisiController@index')
            ->with('notif', json_encode([
                'title' => "Hapus Data Distributor Divisi",
                'text' => "Berhasil Menghapus Data Distributor Divisi ".$id.".",
                'type' => "success"
            ]));
    }
}
