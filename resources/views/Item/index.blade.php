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
    <a href="{{route('item.create')}}" class="btn btn-info pull-right">Create</a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-striped" id="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Category</th>
          <th>Name</th>
          <th>Price</th>
          <th>Status</th>
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
      { data: 'name', name: 'name' },
      { data: 'price',  render: $.fn.dataTable.render.number( '.', '', 0, 'Rp ')
      },
      // { data: 'status', name: 'status' },
      {data:  'status', render: function ( data, type, row ) {
          var text = "";
          var label = "";
          if (data == 1){
           text = "Ada";
           label = "success";
          } else 
          if (data == 0){
           text = "Tidak Ada";
           label = "warning";
          }
          return "<span class='label label-" + label + "'>"+ text + "</span>";
      }},
      {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
  });
</script>
@endpush