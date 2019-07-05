@extends('layouts.app')
@section('title', 'dashboard')
@section('header')

@endsection
@section('content')
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{$categoryCount}}</h3>

					<p>Category</p>
				</div>
				<div class="icon">
					<i class="fa fa-database"></i>
				</div>
				<a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{$debtsCount}}</h3>

					<p>Peminjaman</p>
				</div>
				<div class="icon">
					<i class="fa fa-cart-plus"></i>
				</div>
				<a href="{{route('debt.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{$memberCount}}</h3>

					<p>MEMBERS</p>
				</div>
				<div class="icon">
					<i class="fa fa-money"></i>
				</div>
				<a href="{{route('member.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{$userCount}}</h3>

					<p>USER</p>
				</div>
				<div class="icon">
					<i class="fa fa-user"></i>
				</div>
				<a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>

</section>
@endsection