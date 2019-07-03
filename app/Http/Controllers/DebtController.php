<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Debt;
use App\Model\Member;
use App\Model\Item;
use DataTables;
use Form;
class DebtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json_debt(){

        $debts = Debt::all();
        return DataTables::of($debts)
        ->addColumn('members', function($debta){
            return $debta->members->name;
        })
        ->addColumn('item', function($debt){
            return $debt->item->judul;
        })
        ->addColumn('action', function ($debt) {
            return '<form action="'. route('debt.destroy', $debt->id) .'" method="POST" class="text-center">
            <a href="' . route('debt.pays', $debt->id) . '" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i>Kembali</a>
            <a href="' . route('debt.edit', $debt->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</a>
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
            <button type="submit" class="btn btn-xs btn-danger btn-label" onclick="javascript:return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i>
            Hapus</button>            
            </form>
            ';
        })
        ->make(true);
    }

    public function index()
    {
        return view('debt.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $items = Item::all();
        return view('debt.create', compact('members', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!'
        ];
        $this->validate($request,[
            'members_id' => 'required',
            'item_id' => 'required',
            'tgl_pinjam' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ],$messages);
        Debt::create($request->all());

        return redirect('/admin/debt')->with('Success', 'Data anda telah berhasil di input !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $members = Member::all();
        $items = Item::all();
        $debts = Debt::find($id);
        return view('debt.edit', compact('items', 'debts', 'members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!'
        ];
        $this->validate($request,[
            'members_id' => 'required',
            'item_id' => 'required',
            'tgl_pinjam' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ],$messages);
        $data = Debt::find($id);

        $data->update($request->all());
        return redirect('/admin/debt')->with('Success', 'Data anda telah berhasil di edit !');
    }

    public function pays($id)
    {
        $pays = Debt::find($id);
        return view('debt.pays', compact('pays'));
    }

    public function updatepays(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!'
        ];
        $this->validate($request,[
            'tgl_kembali' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ],$messages);
        $data = Debt::find($id);

        $data->update($request->all());
        return redirect('/admin/debt')->with('Success', 'Data anda telah berhasil di input !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Debt::find($id)->delete();
        return redirect('/admin/debt')->with('Success', 'Data anda telah berhasil di hapus !');
    }
}
