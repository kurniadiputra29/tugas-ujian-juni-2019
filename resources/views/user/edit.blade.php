@extends('layouts.app')
@section('title', 'user')
@section('header')
	<h1>
        USER
    </h1>
    <ol class="breadcrumb">
        <li>User</li>
        <li><a href="{{route('user.index')}}">Index User</a></li>
        <li class="active" >Edit User</li>
    </ol>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
       <h3 class="box-title">CREATE USER</h3>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="form-horizontal" action="{{route('user.update', $users->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
		<div class="box-body">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name User</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" id="name" placeholder="Name User" value="{{$users->name}}">
				</div>
			</div>
		</div>
		<div class="box-body">
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{$users->email}}">
				</div>
			</div>
		</div>
		<div class="box-body">
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input type="password" name="password" class="form-control" id="password" placeholder="Password">
				</div>
			</div>
		</div>
        <div class="box-body">
            <div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="{{$users->alamat}}">
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="no_telp" class="col-sm-2 control-label">No.Telp</label>
                <div class="col-sm-10">
                    <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor Telepon" value="{{$users->no_telp}}">
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="photo" class="col-sm-2 control-label">Photo</label>
                <div class="col-sm-10">
                    <img width="150px" src="{{Storage::url($users->photo)}}" style="border: 2px solid grey; padding: 10px; margin-bottom: 20px;">
                    <input type="file" name="photo" id="photo" value="{{ old('photo') }}">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="{{route('user.index')}}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
    </form>
</div>
@endsection