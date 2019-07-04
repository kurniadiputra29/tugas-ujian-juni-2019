<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    @if( auth()->user()->password  == null)
    <img src="{{auth()->user()->photo}}" class="user-image" alt="User Image">
    @else
    <img src="{{Storage::url(auth()->user()->photo)}}" class="user-image" alt="User Image">
    @endif
    <span class="hidden-xs">{{ auth()->user()->name }}</span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">
      @if( auth()->user()->password  == null)
      <img src="{{auth()->user()->photo}}" class="img-circle" alt="User Image">
      @else
      <img src="{{Storage::url(auth()->user()->photo)}}" class="img-circle" alt="User Image">
      @endif

      <p>
        {{ auth()->user()->name }}
        <small>Member since Nov. 2012</small>
      </p>
    </li>
    <!-- Menu Body -->
    <li class="user-body">
      <div class="row">
        <div class="col-xs-4 text-center">
          <a href="#">Followers</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Sales</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Friends</a>
        </div>
      </div>
      <!-- /.row -->
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <form method="post" action="{{route('login.logout')}}">
          @csrf
          <button type="submit" class="btn btn-default btn-flat">Sign out
          </button>
        </form>  
      </div>
    </li>
  </ul>
</li>