    @php
    $pagenow    = dirname($_SERVER['PHP_SELF']); echo "<br>";
    // $activePage = print_r($pagenow); echo "<br>";
    // $hamboh     = $pagenow; echo $hamboh;
    // if($activePage == "/perpus_masjid/admin/layouts") {echo "active";} else {echo "";}
    $url    = $_SERVER['PHP_SELF'];
    $exp    = explode("/", $url);
    $get    = $exp[3];
    @endphp
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if( auth()->user()->password  == null)
          <img src="{{auth()->user()->photo}}" class="img-circle" alt="User Image">
          @else
          <img src="{{Storage::url(auth()->user()->photo)}}" class="img-circle" alt="User Image">
          {{-- <img src="/storage/{{auth()->user()->photo}}" class="img-circle" alt="User Image"> --}}
          @endif
    </div>
    <div class="pull-left info">
      <p>{{ auth()->user()->name }}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="@if($get == 'dashboard') {{'active'}} @endif ">
      <a href="{{route('dashboard.index')}}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="@if($get == 'category' OR $get == 'item') {{'active'}} @endif treeview">
      <a href="#">
        <i class="fa fa-database"></i> <span>Product</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="@if ( $get == 'category') {{'active'}} @endif"><a href="{{route('category.index')}}"><i class="fa fa-circle-o" ></i>Category</a></li>
        <li class="@if( $get == 'item') {{'active'}} @endif"><a href="{{route('item.index')}}"><i class="fa fa-circle-o"></i>Item</a></li>
      </ul>
    </li>
    <li class="@if($get == 'member' OR $get == 'status') {{'active'}} @endif treeview">
      <a href="#">
        <i class="fa fa-users"></i> <span>Members</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="@if ( $get == 'status') {{'active'}} @endif"><a href="{{route('status.index')}}"><i class="fa fa-circle-o" ></i>Status</a></li>
        <li class="@if( $get == 'member') {{'active'}} @endif"><a href="{{route('member.index')}}"><i class="fa fa-circle-o"></i>Members</a></li>
      </ul>
    </li>
    <li class="@if($get == 'debt') {{'active'}} @endif ">
          <a href="{{route('debt.index')}}">
            <i class="fa fa-area-chart"></i> <span>Peminjaman</span>
          </a>
    </li>
    <li class="@if($get == 'user') {{'active'}} @endif ">
      <a href="{{route('user.index')}}">
        <i class="fa fa-user"></i> <span>User</span>
      </a>
    </li>
  </ul>
</section>