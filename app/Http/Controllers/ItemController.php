<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Item;
use App\Model\Category;
use DataTables;
use Form;

class ItemController extends Controller
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

    public function json_item(){

        $items = Item::all();
        return Datatables::of($items)
        ->addColumn('category', function($item){
            return $item->category->name;
        })
        ->addColumn('action', function ($item) {
            return '<form action="'. route('item.destroy', $item->id) .'" method="POST" class="text-center">
            <a href="' . route('item.edit', $item->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</a>
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
        return view('item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('item.create', compact('categories'));
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
            'required' => ':attribute wajib diisi !!!',
            'unique' => ':attribute buku sudah terpakai !!!'
        ];
        $this->validate($request,[
            'category_id' => 'required',
            'judul' => 'required',
            'kode' => 'unique:items,kode|required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'harga_beli' => 'required',
            'tanggal_beli' => 'required',
            'total' => 'required',
            'keterangan' => 'required',
        ],$messages);
        Item::create($request->all());
        return redirect('/admin/item')->with('Success', 'Data anda telah berhasil di input !');
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
        $categories1 = Category::orderBy('id', 'asc')->get();
        $items = Item::find($id);
        return view('item.edit', compact('items', 'categories1', 'categories2'));
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
            'required' => ':attribute wajib diisi !!!',
            'unique' => ':attribute buku sudah terpakai !!!'
        ];
        $this->validate($request,[
            'category_id' => 'required',
            'judul' => 'required',
            'kode' => 'unique:items,kode,'.$id,
            'pengarang' => 'required',
            'penerbit' => 'required',
            'harga_beli' => 'required',
            'tanggal_beli' => 'required',
            'total' => 'required',
            'keterangan' => 'required',
        ],$messages);
        $data = Item::find($id);

        $data->update($request->all());
        return redirect('/admin/item')->with('Success', 'Data anda telah berhasil di edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect('/admin/item')->with('Success', 'Data anda telah berhasil di hapus !');
    }
}
