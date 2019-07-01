@extends('layouts.app')
@section('title', 'debts')
@section('header')
<h1>
  DEBTS
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Pijam Meminjam</a></li>
  <li class="active">Index Debts</li>
</ol>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">INDEX DEBTS</h3>
    <a href="{{route('debt.create')}}" class="btn btn-info pull-right">Pinjam</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-striped" id="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Member</th>
          <th>Item</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th>Jumlah</th>
          <th>Denda</th>
          <th>Keterangan</th>
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
      ajax: 'debt/json_debt',
      columns: [
      { data: 'id', name: 'id' },
      { data: 'members', name: 'members' },
      { data: 'item', name: 'item' },
      { data: 'tgl_pinjam', name: 'tgl_pinjam' },
      // { data: 'tgl_kembali', name: 'tgl_kembali' },
      { data: 'tgl_kembali', name: 'tgl_kembali', render: function (data, type, full, meta) {
          var text = "Belum Dikembalikan";
          var label = "warning";
          if (data == null){
           return "<span class='label label-" + label + "'>"+ text + "</span>";
          } else {
           return data;
          }
        }
      },
      { data: 'jumlah', name: 'jumlah' },
      // { data: 'denda', name: 'denda' },
      { data: 'denda', name: 'denda', render: function (data, type, full, meta) {
          var text = "Tidak ada denda";
          var label = "success";
          if (data == null){
           return "<span class='label label-" + label + "'>"+ text + "</span>";
          } else {
           return data;
          }
        }
      },
      { data: 'keterangan', name: 'keterangan' },
      {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });
  });
</script>
@endpush