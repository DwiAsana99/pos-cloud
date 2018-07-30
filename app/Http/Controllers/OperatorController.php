<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OperatorRepository;
use Datatables;

class OperatorController extends Controller
{
    private $operator;

    public function __construct(OperatorRepository $operatorRep) 
    {
        $this->operator = $operatorRep;
    }

    public function index() 
    {
        return view('masterdata.operator.index');
    }

    public function dt() 
    {
        return DataTables::of($this->operator->all())
        ->addColumn('action', function ($data) {
            return '<a href="'. route('operator.edit', ['id' => $data->ID_OPERATOR]) .'" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ubah Data Divisi"><i class="fa fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function create() 
    {
        $isEdit = FALSE;
        return view('masterdata.operator.form',compact('isEdit'));
    }

    public function select2() 
    {
        $data = [
            ['id' => 1, 'text' => 1]
        ];
        return response()->json($data);
    }

    public function store(Request $request) 
    {
        $this->validate($request,[
            'OPERATOR' => 'required',
            'STATUS_OPERATOR' => 'required',
        ]);

        try {
            $this->operator->create($request->all());
            return redirect()->action('OperatorController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Operator",
                'text' => "Berhasil Menambah Data Operator.",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('OperatorController@index')
            ->with('notif', json_encode([
                'title' => "Tambah Data Operator",
                'text' => "Gagal Menambah Data Operator.",
                'type' => "error"
            ]));
        }
    }

    public function edit($id) 
    {
        $isEdit = TRUE;
        $operator = $this->operator->findBy('ID_OPERATOR',$id);
        return view('masterdata.operator.form',compact('isEdit','operator'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request,[
            'OPERATOR' => 'required',
            'STATUS_OPERATOR' => 'required',
        ]);

        try {
            $this->operator->update($request->except(['_method','_token']),$id,'ID_OPERATOR');
            return redirect()->action('OperatorController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Operator",
                'text' => "Berhasil Mengubah Data Operator ".$id.".",
                'type' => "success"
            ]));
        } catch(\Exception $e) {
            return redirect()->action('OperatorController@index')
            ->with('notif', json_encode([
                'title' => "Ubah Data Operator",
                'text' => "Gagal Mengubah Data Operator ".$id.".",
                'type' => "error"
            ]));
        }
    }
}
