<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Member;
use App\Model\Status;
use DataTables;
use Form;

class MemberController extends Controller
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

    public function json_member(){

        $members = Member::all();
        return DataTables::of($members)
        ->addColumn('status', function($member){
            return $member->status->name;
        })
        ->addColumn('action', function ($member) {
            return '<form action="'. route('member.destroy', $member->id) .'" method="POST" class="text-center">
            <a href="' . route('member.edit', $member->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</a>
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
        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        return view('member.create', compact('statuses'));
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
            'unique' => ':attribute sudah terpakai !!!'
        ];
        $this->validate($request,[
            'NIP' => 'unique:members,NIP|required',
            'name' => 'required',
            'alamat' => 'required',
            'status_id' => 'required',
            'no_telp' => 'required'
        ],$messages);
        Member::create($request->all());
        return redirect('/admin/member')->with('Success', 'Data anda telah berhasil di input !');
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
        $statuses = Status::all();
        $members = Member::find($id);
        return view('member.edit', compact('members', 'statuses'));
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
            'unique' => ':attribute sudah terpakai !!!'
        ];
        $this->validate($request,[
            'NIP' => 'unique:members,NIP,'.$id,
            'name' => 'required',
            'alamat' => 'required',
            'status_id' => 'required',
            'no_telp' => 'required'
        ],$messages);
        $data = Member::find($id);

        $data->update($request->all());
        return redirect('/admin/member')->with('Success', 'Data anda telah berhasil di edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect('/admin/member')->with('Success', 'Data anda telah berhasil di hapus !');
    }
}
