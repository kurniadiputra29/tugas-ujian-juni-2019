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
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{-- {{$productCount}} --}}</h3>

					<p>PRODUCT</p>
				</div>
				<div class="icon">
					<i class="fa fa-database"></i>
				</div>
				<a href="{{-- {{route('item.index')}} --}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{-- {{$orderCount}} --}}</h3>

					<p>ORDER</p>
				</div>
				<div class="icon">
					<i class="fa fa-cart-plus"></i>
				</div>
				<a href="{{-- {{route('order.index')}} --}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{-- {{$paymentCount}} --}}</h3>

					<p>PAYMENT</p>
				</div>
				<div class="icon">
					<i class="fa fa-money"></i>
				</div>
				<a href="{{-- {{route('payment.index')}} --}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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