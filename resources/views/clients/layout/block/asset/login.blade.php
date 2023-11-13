@if (Session::has('msg-login'))
<div class="alert alert-success">
    {{ Session::get('msg-login') }}
</div>
@endif
<div class="modal" id="login-form-click" style="display: none;">
    <div class="modal__overlay" id="form-click">
        @if (Session::has('error-login'))
        <div class="alert alert-danger" style="background-color: white; color: black; max-width: 425px; margin-left: 68%; margin-top: 2%; color: red;">
            <i class="bi bi-exclamation-triangle-fill"></i> {{ Session::get('error-login') }}
        </div>
        @endif
    </div>
    <div class=" modal__body">
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="center">
                    <p class="suth-form-switch-btn" style="margin: 0 auto; text-align: center;">Đăng
                        nhập</p>
                </div>
                <form action="{{route('clients.post-login')}}" method="post">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Tài khoản</label>
                            <input type="text" class="define-input" placeholder="Nhập tài khoản ..." name="TenTK">
                            @error('taikhoan')
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Mật khẩu</label>
                            <input type="password" class="define-input" placeholder="Nhập mật khẩu ..." name="MatKhau">
                            @error('matkhau')
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="auth-form__group" style="display: flex;">
                            <input type="checkbox" id="check-box">
                            <label for="check-box" style="margin-left: 10px; margin-bottom: 20px;">Remember
                                me.</label>
                        </div>
                    </div>
                    <div class="auth-form__controls" style="margin-top: 10px;">
                        <button type="submit" class="btn btn-primary" style="border-radius: 20px; margin: 0 auto; width: 100%;" disabled id="login-button">Đăng
                            nhập</button>
                    </div>
                    @csrf
                </form>
                <div class="auth-form__help define-forget" style="justify-content: flex-end; margin-top: 20px;">
                    <a href="#">Quên mật khẩu?</a>
                </div>


                
            </div>

            <div class="auth-form__socials">
                <a href="#" class=" auth-form__socials--facebook btn-a btn--size-s btn--width-icon">
                    <span class="auth-form__socials-title" style="color: white;"><i class="bi bi-facebook"></i> Kết
                        nối
                        với
                        Facebook</span>
                </a>
                <a href="#" class="auth-form__socials--google btn-a btn--size-s btn--width-icon">
                    <i class="auth-form__socials-icon fa-brands fa-google"></i>
                    <span class="auth-form__socials-title"><i class="bi bi-google"></i> Kết nối với
                        Google</span>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Lắng nghe sự kiện khi người dùng nhập vào các trường input
        $('input.define-input').on('input', function() {
            // Kiểm tra xem các trường input có dữ liệu hợp lệ hay không
            var tenTK = $('input[name="TenTK"]').val();
            var matKhau = $('input[name="MatKhau"]').val();

            if (tenTK.trim() !== '' && matKhau.trim() !== '') {
                // Nếu dữ liệu hợp lệ, bật nút "Đăng nhập"
                $('#login-button').prop('disabled', false);
            } else {
                // Nếu có ít nhất một trường không hợp lệ hoặc rỗng, tắt nút "Đăng nhập"
                $('#login-button').prop('disabled', true);
            }
        });
    });
</script>