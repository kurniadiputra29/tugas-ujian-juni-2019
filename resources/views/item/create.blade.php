@extends('layouts.app')
@section('title', 'Item')
@section('header')
<h1>
	Item
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
	<li><a href="{{route('item.index')}}">Item</a></li>
	<li class="active" >Create Item</li>
</ol>
@endsection
@section('content')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">CREATE ITEM</h3>
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
						@foreach($categories as $category)
						<option class="col-sm-10" value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="kode" class="col-sm-2 control-label">Kode Buku</label>
				<div class="col-sm-10">
					<input type="text" name="kode" class="form-control" id="kode" placeholder="Kode Buku" value="{{ old('kode') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Judul Buku</label>
				<div class="col-sm-10">
					<input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Buku" value="{{ old('judul') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="pengarang" class="col-sm-2 control-label">Pengarang Buku</label>
				<div class="col-sm-10">
					<input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Pengarang Buku" value="{{ old('pengarang') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="penerbit" class="col-sm-2 control-label">Penerbit Buku</label>
				<div class="col-sm-10">
					<input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Penerbit Buku" value="{{ old('penerbit') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="harga_beli" class="col-sm-2 control-label">Harga Pembelian</label>
				<div class="col-sm-10">
					<input type="number" name="harga_beli" class="form-control" id="harga_beli" placeholder="Harga Pembelian" value="{{ old('harga_beli') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="tanggal_beli" class="col-sm-2 control-label">Tanggal Pembelian</label>
				<div class="col-sm-10">
					<input type="date" name="tanggal_beli" class="form-control" id="tanggal_beli" placeholder="Tanggal Pembelian" value="{{ old('tanggal_beli') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="total" class="col-sm-2 control-label">Total Buku</label>
				<div class="col-sm-10">
					<input type="number" name="total" class="form-control" id="total" placeholder="Total Buku" value="{{ old('total') }}">
				</div>
			</div>
			<div class="form-group">
				<label for="keterangan" class="col-sm-2 control-label">Keterangan Buku</label>
				<div class="col-sm-10" style="margin-top: 10px;">
					<textarea name="keterangan" class="form-control" rows="3" placeholder="Enter ..." id="keterangan">{{ old('keterangan') }}</textarea>
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