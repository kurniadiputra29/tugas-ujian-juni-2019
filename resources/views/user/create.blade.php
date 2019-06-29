@extends('layouts.app')
@section('title', 'user')
@section('header')
<h1>
	USER
</h1>
<ol class="breadcrumb">
	<li>User</li>
	<li><a href="{{route('user.index')}}">Index User</a></li>
	<li class="active" >Create User</li>
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
	{!! form_start($form, ['class' => 'form-horizontal'])!!}
	<div class="box-body">
		<div class="col-sm-12">
		{!! form_rest($form) !!}	
		</div>
		
		<div class="box-footer">
			<a href="{{route('user.index')}}" class="btn btn-default">Cancel</a>
			<button type="submit" class="btn btn-info pull-right">Submit</button>
		</div>
		{!!form_end($form)!!}
	</div>
</div>
@endsection