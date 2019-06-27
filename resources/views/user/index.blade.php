@extends('layouts.app')
@section('title', 'category')
@section('header')
<h1>
  Category
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
  <li class="active">Index Category</li>
</ol>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">INDEX CATEGORY</h3>
    <a href="{{route('user.create')}}" class="btn btn-info pull-right">Create</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-striped" id="table">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Name</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>No.Telp</th>
          <th>Photo</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      @if (session('Success'))
      <div class="alert alert-success">
        {{ session('Success') }}
      </div>
      @endif
    </table>
  </div>
  <!-- /.box-body -->
</div>
@endsection
@push('scripts')
<script>
  $(function() {
    $('#table').DataTable({
      processing: true,
      serverSide: true,
      ajax: 'user/json_user',
      columns: [
      { data: 'id', name: 'id' },
      { data: 'name', name: 'name' },
      { data: 'email', name: 'email' },
      { data: 'alamat', name: 'alamat' },
      { data: 'no_telp', name: 'no_telp' },
      { data: 'photo', name: 'photo', render: function (data, type, full, meta) {
        var hitung = data.length;
        if ( hitung == 50 ) {
          var dat = "/storage/" + data;
        } else if (hitung == 51) {
          var dat = "/storage/" + data;
        } else {
          var dat = data;
        }
        return "<img src=\"" +  dat + "\"height=\"100\"/>";
        }
      },
      {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });
  });
</script>
@endpush