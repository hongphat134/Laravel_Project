Xin chào khách hàng {{ $user->email }}, Đây là link để khôi phục mật khẩu 
<hr>
<a href="{{ url('./reset',$data) }}">Link</a>