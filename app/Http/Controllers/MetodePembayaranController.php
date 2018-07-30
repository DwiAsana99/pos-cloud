<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MetodePembayaranRepository;
use Datatables;

class MetodePembayaranController extends Controller
{
    private $metodepembayaran;

    public function __construct(MetodePembayaranRepository $MPRep) 
    {
        $this->metodepembayaran = $MPRep;
    }

    public function index() 
    {
        return view('masterdata.metode_pembayaran.index');
    }

    public function dt() 
    {
        return DataTables::of($this->metodepembayaran->all())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('metodepembayaran.edit', ['id' => $data->ID_METODE]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Divisi"><i class="fa fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function create() 
    {
        $isEdit = FALSE;
        return view('masterdata.metode_pembayaran.form',compact('isEdit'));
    }

    public function store(Request $request) 
    {
        $this->validate($request,[
            'METODE' => 'required',
            'IS_DEBET' => 'required',
            'CHARGE' => 'required',
        ]);

        try {
            $this->metodepembayaran->create($request->all());
            return redirect()->action('MetodePembayaranController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Metode Pembayaran",
                'text' => "Berhasil Menambah Data Metode Pembayaran.",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('MetodePembayaranController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Metode Pembayaran",
                'text' => "Gagal Menambah Data Metode Pembayaran.",
                'type' => "error"
            ]));
        }
    }

    public function select2() 
    {
        $data = [
            ['id' => 0, 'text' => 0],
            ['id' => 1, 'text' => 1],
            ['id' => 2, 'text' => 2],
        ];
        return response()->json($data);
    }

    public function edit($id) 
    {
        $isEdit = TRUE;
        $metode = $this->metodepembayaran->findBy('ID_METODE',$id);
        return view('masterdata.metode_pembayaran.form',compact('isEdit','metode'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request,[
            'METODE' => 'required',
            'IS_DEBET' => 'required',
            'CHARGE' => 'required',
        ]);

        try {
            $this->metodepembayaran->update($request->except('_token','_method'),$id,'ID_METODE');
            return redirect()->action('MetodePembayaranController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Metode Pembayaran",
                'text' => "Berhasil Mengubah Data Metode Pembayaran ".$id.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('MetodePembayaranController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Metode Pembayaran",
                'text' => "Gagal Mengubah Data Metode Pembayaran.",
                'type' => "error"
            ]));
        }
    }
}
