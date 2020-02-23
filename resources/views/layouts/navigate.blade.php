<ul class="navbar-nav ml-auto">
    <li class="navbar-item active">
        <a href="{{url('/')}}" class="nav-link">Trang chủ</a>
    </li>
    <li class="navbar-item">
        <a href="{{url('/shop')}}" class="nav-link">Cửa hàng sách</a>
    </li>
    <li class="navbar-item">
        <a href="{{url('/about')}}" class="nav-link">Về chúng tôi</a>
    </li>
    <li class="navbar-item">
        <a href="{{url('/faq')}}" class="nav-link">FAQ</a>
    </li>
    <li class="navbar-item">        
        @if(Auth::check())
            Chào bạn, {{Auth::user()->name}}
            <a href="{{ route('logout')}}">Thoát</a>
        @else
        <a href="{{url('/login')}}" class="nav-link">Đăng nhập</a>
        @endif
    </li>
</ul>