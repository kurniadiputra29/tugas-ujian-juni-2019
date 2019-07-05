<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetMail;

class ResetPassword extends Controller
{
    public function resetpass(Request $request)
    {
        $resetpass = $request->email;
        
        // $coba = User::all('email');
        $users = User::where('email', $resetpass)->get();
        $users_count = User::where('email', $resetpass)->count();
        
        if ($users_count > 0 ) {
            Mail::to('kurniadiputra111@gmail.com')->send(new ResetMail($resetpass));
            return redirect('admin/resetpassword')->with('Success', 'Email telah berhasil dikirim, cek email Anda !');

            // return view('ubah.sendmail', compact('users'));
        } else {
            return back()->with('Gagal', 'Email Anda Tidak Terdaftar !!');
        }
    }
    public function confirmpass(Request $request)
    {
        $id = $request->id;
        $users = User::find($id);
        return view('layouts.resetpass.confirmasi', compact('users'));
    }
    public function update(Request $request)
    {
            $id = $request->id;
            $data = User::find($id);
            $data->password = bcrypt($request->password);
            $data->save(); 
            return redirect('/login')->with('Success', 'Password anda telah berhasil di reset !');
    }
    public function register(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min karakter !!!',
        ];
        $this->validate($request,[
            'photo' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'unique:users,email|required',
            'password' => 'required|min:5', 
        ],$messages);
        
        $data           = new User;
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->alamat    = $request->alamat;
        $data->no_telp    = $request->no_telp;
        $data->password = bcrypt($request->password);

        $nama_file = $request->file('photo');
        $path = $nama_file->store('public/photo'); // ini akan tersimpan pada storage, app, public, files.
        $data->photo = str_replace("public/","",$path);
        $data->save();
        return redirect('/login')->with('Success', 'Data anda telah berhasil di input !');
    }
}
