@extends('layouts.app')
@section('title', 'members')
@section('header')
<h1>
  MEMBERS
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Members</a></li>
  <li class="active">Index Members</li>
</ol>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">INDEX MEMBERS</h3>
    <a href="{{route('member.create')}}" class="btn btn-info pull-right">Create</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-striped" id="table">
      <thead>
        <tr>
          <th>No</th>
          <th>NIP</th>
          <th>Name</th>
          <th>Alamat</th>
          <th>Status</th>
          <th>No. Telepon</th>
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
      ajax: 'member/json_member',
      columns: [
      { data: 'id', name: 'id' },
      { data: 'NIP', name: 'NIP' },
      { data: 'name', name: 'name' },
      { data: 'alamat', name: 'alamat' },
      { data: 'status', name: 'status' },
      { data: 'no_telp', name: 'no_telp' },
      {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });
  });
</script>
@endpush