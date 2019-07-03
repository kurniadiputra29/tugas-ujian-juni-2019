<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use DataTables;
use Form;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\CategoryForm;

class CategoryController extends Controller
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
    public function json_category(){
        // return Datatables::of(Category::all())->make(true);


        $categories = Category::all();

        return Datatables::of($categories)
        ->addColumn('action', function ($category) {
            return '<form action="'. route('category.destroy', $category->id) .'" method="POST" class="text-center">
            <a href="' . route('category.edit', $category->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</a>
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
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(CategoryForm::class, [
            'method' => 'POST',
            'url' => route('category.store')
        ]);
        return view('category.create', compact('form'));
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
            'name' => 'required',
        ],$messages);
        Category::create($request->all());

        return redirect('/admin/category')->with('Success', 'Data anda telah berhasil di input !');
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
    public function edit(FormBuilder $formBuilder ,$id)
    {
        $categories = Category::find($id);
        $form = $formBuilder->create(CategoryForm::class, [
            'method' => 'PUT',
            'model' => $categories,
            'url' => route('category.update', $id)
        ]);

        return view('category.create', compact('form'));
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
            'name' => 'required',
        ],$messages);
        $data = Category::find($id);

        $data->update($request->all());

        return redirect('/admin/category')->with('Success', 'Data anda telah berhasil di edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('admin/category')->with('Success', 'Data anda telah berhasil di hapus !');
    }
}
