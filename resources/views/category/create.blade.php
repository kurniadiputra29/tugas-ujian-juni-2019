@extends('layouts.app')
@section('title', 'category')
@section('header')
	<h1>
        CATEGORY
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
        <li><a href="{{route('category.index')}}">Category</a></li>
        <li class="active" >Create Category</li>
    </ol>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
       <h3 class="box-title">CREATE CATEGORY</h3>
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
    <form class="form-horizontal" action="{{route('category.store')}}" method="post">
        @csrf
		<div class="box-body">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name Category</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" id="name" placeholder="Name Category" value="{{ old('name') }}">
				</div>
			</div>
		</div>
        <div class="box-footer">
            <a href="{{route('category.index')}}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
    </form>
</div>
@endsection