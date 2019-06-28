@extends('layouts.app')
@section('title', 'members')
@section('header')
<h1>
	MEMBERS
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Members</a></li>
	<li><a href="{{route('member.index')}}">Members</a></li>
	<li class="active" >Create Members</li>
</ol>
@endsection
@section('content')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">CREATE MEMBERS</h3>
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
	<form class="form-horizontal" action="{{route('member.store')}}" method="post">
		@csrf
		<div class="box-body">
			<div class="form-group">
				<label for="NIP" class="col-sm-2 control-label">NIP</label>
				<div class="col-sm-10">
					<input type="text" name="NIP" class="form-control" id="NIP" placeholder="NIP" value="{{ old('NIP') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name Members</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" id="name" placeholder="Name Members" value="{{ old('name') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="alamat" class="col-sm-2 control-label">Alamat Members</label>
				<div class="col-sm-10">
					<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Members" value="{{ old('alamat') }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-10">
					<select class="form-control" name="status_id" >
						<option class="col-sm-10" value="">~~Pilih Status~~</option>
						@foreach($statuses as $status)
						<option class="col-sm-10" value="{{$status->id}}">{{$status->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
				<div class="form-group">
					<label for="no_telp" class="col-sm-2 control-label">No. Telepon</label>
					<div class="col-sm-10">
						<input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Nomor Telepon" value="{{ old('no_telp') }}">
					</div>
				</div>
			<div class="box-footer">
				<a href="{{route('member.index')}}" class="btn btn-default">Cancel</a>
				<button type="submit" class="btn btn-info pull-right">Submit</button>
			</div>
		</div>
	</form>
</div>
@endsection