@extends('layouts.app')
@section('title', 'debts')
@section('header')
<h1>
  DEBTS
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Pijam Meminjam</a></li>
  <li><a href="{{route('debt.index')}}">Debts</a></li>
	<li class="active" >Edit Debts</li>
</ol>
@endsection
@section('content')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">EDIT DEBTS</h3>
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
	<form class="form-horizontal" action="{{route('debt.update', $debts->id)}}" method="post">
		@csrf
		@method('PUT')
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Member</label>
				<div class="col-sm-10">
					<select class="form-control" name="members_id" >
						<option class="col-sm-10" value="">~~Pilih Member~~</option>
						@foreach($members as $members)
						<option class="col-sm-10" value="{{$members->id}}" {{$debts->members_id == $members->id ? 'selected' : ''}}>{{$members->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Item</label>
				<div class="col-sm-10">
					<select class="form-control" name="item_id" >
						<option class="col-sm-10" value="">~~Pilih Item~~</option>
						@foreach($items as $item)
						<option class="col-sm-10" value="{{$item->id}}" {{$debts->item_id == $item->id ? 'selected' : ''}}>{{$item->judul}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="tgl_pinjam" class="col-sm-2 control-label">Tanggal Peminjaman</label>
				<div class="col-sm-10">
					<input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam" placeholder="Tanggal Peminjaman" value="{{$debts->tgl_pinjam}}">
				</div>
			</div>
			<div class="form-group">
				<label for="tgl_kembali" class="col-sm-2 control-label">Tanggal Kembali</label>
				<div class="col-sm-10">
					<input type="date" name="tgl_kembali" class="form-control" id="tgl_kembali" placeholder="Tanggal Kembali" value="{{$debts->tgl_kembali}}">
				</div>
			</div>
			<div class="form-group">
				<label for="jumlah" class="col-sm-2 control-label">Jumlah Buku</label>
				<div class="col-sm-10">
					<input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah Buku" value="{{$debts->jumlah}}">
				</div>
			</div>
			<div class="form-group">
				<label for="denda" class="col-sm-2 control-label">Denda</label>
				<div class="col-sm-10">
					<input type="number" name="denda" class="form-control" id="denda" placeholder="Denda" value="{{$debts->denda}}">
				</div>
			</div>
			<div class="form-group">
				<label for="keterangan" class="col-sm-2 control-label">Keterangan Buku</label>
				<div class="col-sm-10" style="margin-top: 10px;">
					<textarea name="keterangan" class="form-control" rows="3" placeholder="Enter ..." id="keterangan">{{$debts->keterangan}}</textarea>
				</div>
			</div>
			<div class="box-footer">
				<a href="{{route('debt.index')}}" class="btn btn-default">Cancel</a>
				<button type="submit" class="btn btn-info pull-right">Submit</button>
			</div>
		</div>
	</form>
</div>
@endsection