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
    <form class="form-horizontal" action="{{route('item.store')}}" method="post">
        @csrf
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Category</label>
				<div class="col-sm-10">
				<select class="form-control" name="category_id" >
					<option class="col-sm-10" value="">~~Pilih Category~~</option>
					@foreach($data as $row)
                    <option class="col-sm-10" value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">
				</div>
			</div>
			<div class="form-group">
			<label for="price" class="col-sm-2 control-label">Price</label>
				<div class="col-sm-10">
					<input type="text" name="price" class="form-control" id="price" placeholder="10000" value="{{ old('price') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="status" class="col-sm-2 control-label">Status</label>
				<div class="col-sm-10 radio">
					<label>
					<input type="radio" name="status" id="status" value="1">Ada
					</label>
					<br>
					<label>
						<input type="radio" name="status" id="status" value="0" >Habis
					</label>
				</div>
			</div>
	        <div class="box-footer">
	            <a href="{{route('item.index')}}" class="btn btn-default">Cancel</a>
	            <button type="submit" class="btn btn-info pull-right">Submit</button>
	        </div>
        </div>
    </form>
</div>
@endsection