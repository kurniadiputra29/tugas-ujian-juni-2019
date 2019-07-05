@extends('layouts.app')
@section('title', 'Item')
@section('header')
<h1>
  Item
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
  <li class="active">Index Item</li>
</ol>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">INDEX ITEM</h3>
    <a href="{{route('item.create')}}" class="btn btn-info pull-right">Create</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-striped" id="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Category</th>
          <th>Judul Buku</th>
          <th>Kode Buku</th>
          <th>Pengarang Buku</th>
          <th>Penerbit Buku</th>
          <th>Harga Beli</th>
          <th>Tersedia</th>
          <th>Keterangan</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      @if (session('Success'))
      <div class="alert alert-success">
        {{ session('Success') }}
      </div>
      @endif
    </tbody></table>
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
      ajax: 'item/json_item',
      columns: [
      // { data: 'id', name: 'id' },
      { data: 'id', name:'id'},
      { data: 'category', name: 'category' },
      { data: 'judul', name: 'judul' },
      { data: 'kode', name: 'kode' },
      { data: 'pengarang', name: 'pengarang' },
      { data: 'penerbit', name: 'penerbit' },
      { data: 'harga_beli', render: $.fn.dataTable.render.number( '.', '', 0, 'Rp ') },
      // { data: 'total', name: 'total' },
      {data:  'total', render: function ( data, type, row ) {
          var text = data;
          var satuan = " pcs";
          return data + satuan;
        }
      },
      { data: 'keterangan', name: 'keterangan' },
      {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
  });
</script>
@endpush