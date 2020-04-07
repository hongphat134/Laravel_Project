<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">Dylan Website</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
       </a>
    </div>
    <ul class="nav navbar-nav"  id="myTopnav">
      <li class="#"><a href="{{route('admin/home')}}">Dashboard</a></li>
      <li class="#"><a href="{{ route('book/home') }}">Book</a></li>
      <li class="#"><a href="{{ route('category/home') }}">Category</a></li>
      <li class="#"><a href="{{ route('order/home') }}">Order</a></li>
      <li class="#"><a href="{{ route('publisher/home') }}">Publisher</a></li>
      <li class="#"><a href="{{ route('user/home') }}">User</a></li>
      
 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hi , {{Auth::user()->name}}</a></li>
      <li><a href="{{ route('logout')}}">Thoát</a></li>
    </ul>
  </div>
</nav>