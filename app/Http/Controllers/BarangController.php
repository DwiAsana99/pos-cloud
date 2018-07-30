<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BarangRepository;
use App\Repositories\SubkategoriRepository;
use App\Repositories\DistributorDivisiRepository;
use Datatables;

class BarangController extends Controller
{
    
    private $barang;
    private $subkategori;
    private $distributorDivisi;

    public function __construct(
        BarangRepository $barangRep,
        SubkategoriRepository $subkategoriRep,
        DistributorDivisiRepository $distributorDivisiRep
    )
    {
        $this->barang = $barangRep;
        $this->subkategori = $subkategoriRep;
        $this->distributorDivisi = $distributorDivisiRep;
    }

    public function index() 
    {
        return view('masterdata.barang.index');
    }

    public function dt() 
    {
        return DataTables::of($this->barang->barangRelasi())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('barang.edit', ['id' => $data->ID_BARANG]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Barang"><i class="fa fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function create() 
    {
        $isEdit = FALSE;
        return view('masterdata.barang.form',compact('isEdit'));
    }

    public function select2Subkategori(Request $request) 
    {
        $datas = $this->subkategori->select2($request->q);
        $subkategori[] = [];
        foreach ($datas as $data) {
            $subkategori[] = ['id' => $data->KODE_SUB_KATEGORI, 'text' => $data->SUB_KATEGORI];
        }
        return response()->json($subkategori);
    }

    public function select2DistributorDivisi(Request $request) 
    {
        $datas = $this->distributorDivisi->select2($request->q);
        $distributordivisi[] = [];
        foreach ($datas as $data) {
            $distributordivisi[] = ['id' => $data->KODE_DISTRIBUTOR_DIVISI, 'text' => $data->NAMA_DISTRIBUTOR_DIVISI];
        }
        return response()->json($distributordivisi);
    }
    
}
