@extends('layouts.app')
@section('title', 'status')
@section('header')
<h1>
	STATUS
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Members</a></li>
	<li><a href="{{route('status.index')}}">Status</a></li>
	<li class="active" >Create Status</li>
</ol>
@endsection
@section('content')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">CREATE STATUS</h3>
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
	</div>
	<div class="box-footer">
		<a href="{{route('status.index')}}" class="btn btn-default">Cancel</a>
		<button type="submit" class="btn btn-info pull-right">Submit</button>
	</div>
	{!!form_end($form)!!}
</div>
@endsection