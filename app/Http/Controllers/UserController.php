<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Form;
use File;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\UserForm;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json_user()
    {
        $users = User::all();
        return DataTables::of($users)
        ->addColumn('action', function ($user) {
            return '<form action="'. route('user.destroy', $user->id) .'" method="POST" class="text-center">
            <a href="' . route('user.edit', $user->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</a>
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
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('user.create');
    // }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(UserForm::class, [
            'method' => 'POST',
            'url' => route('user.store')
        ]);

        return view('user.create', compact('form'));
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
            'min' => ':attribute harus diisi minimal :min karakter !!!',
        ];
        $this->validate($request,[
            'name' => 'required',
            'email' => 'unique:users,email',
            'password' => 'nullable|min:5',
            'photo' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ],$messages);

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
 
        $nama_file = $request->file('photo');
        $path = $nama_file->store('public/photo'); // ini akan tersimpan pada storage, app, public, files.
        $data->photo = str_replace("public/","",$path); //ini untuk mengubah nama;
        $data->save();
        return redirect('admin/user')->with('Success', 'Data anda telah berhasil di input');
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
    // public function edit($id)
    // {
    //     $users = User::find($id);
    //     return view('user.edit', compact('users'));
    // }
    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit', compact('users'));
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
        if (empty($request->photo)) {
            $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min karakter !!!',
            ];
            $this->validate($request,[
                'name' => 'required',
                'email' => 'unique:users,email,'.$id,
                'password' => 'nullable|min:5', 
                'alamat' => 'required',
                'no_telp' => 'required',
            ],$messages);

            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->alamat = $request->alamat;
            $data->no_telp = $request->no_telp;
            $data->save(); 
            return redirect('/admin/user')->with('Success', 'Data anda telah berhasil di edit !');
        } else {
            $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min karakter !!!',
            ];
            $this->validate($request,[
                'photo' => 'required',
                'name' => 'required',
                'email' => 'unique:users,email,'.$id,
                'password' => 'nullable|min:5', 
                'alamat' => 'required',
                'no_telp' => 'required',
            ],$messages);

            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);

            $nama_file = $request->file('photo');
            $path = $nama_file->store('public/photo'); // ini akan tersimpan pada storage, app, public, files.

            // hapus file
            $data = User::find($id);
            Storage::delete($data->photo);

            $data->photo = str_replace("public/","",$path); //ini untuk mengubah nama
            $data->save();
            return redirect('/admin/user')->with('Success', 'Data anda telah berhasil di edit !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        Storage::delete($users->photo);

        User::find($id)->delete();
        return redirect('/admin/user')->with('Success', 'Data anda telah berhasil di hapus !');
    }
}
