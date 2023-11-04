<div class="modal" id="register-form-click" style="display: none;">
    <div class="modal__overlay" id="form-register-click">

        @if(session('err-regis'))
        <div class="alert danger" style="background-color: white; color: black; width: 15%; margin-left: 78%; margin-top: 2%; color: red;">
            <i class="bi bi-exclamation-triangle-fill"></i> {{ session('err-regis') }}
        </div>
        @endif
    </div>
    <div class="modal__body">
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <div class="center">
                        <p class="suth-form-switch-btn" style="margin: 0 auto; text-align: center;">
                            Đăng ký</p>
                    </div>
                </div>
                <form action="{{ route('clients.user.post-register') }}" method="post">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Họ tên</label>
                            <input type="text" class="define-input" placeholder="Nhập họ tên ..." name="Fullname" value="{{old('Fullname')}}">
                            @error('Fullname')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Email</label>
                            <input type="email" class="define-input" placeholder="Nhập email ..." name="Email" value="{{old('Email')}}">
                            @error('Email')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Tài khoản</label>
                            <input type="text" class="define-input" placeholder="Nhập tài khoản ..." name="TenTK" value="{{old('TenTK')}}">
                            @error('TenTK')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Mật khẩu</label>
                            <input type="password" class="define-input" placeholder="Nhập mật khẩu ..." name="MatKhau">
                            @error('MatKhau')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Xác nhận lại mật khẩu</label>
                            <input type="password" class="define-input" placeholder="Nhập lại mật khẩu ..." name="confirmMK">
                            @error('confirmMK')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div style="display: flex; justify-content: left;">
                            <input type="checkbox" id="confirm-check-box">
                            <label for="confirm-check-box" style="margin-left: 10px; margin-bottom: 20px;">Đồng ý với
                                tất cả
                                điều khoản và dịch vụ.</label>
                        </div>
                    </div>
                    <div class="auth-form__controls" style="margin-top: 10px;">
                        <button class="btn btn-primary" id="register-button" style="border-radius: 20px; margin: 0 auto; width: 100%;" disabled>Đăng
                            ký</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="auth-form__socials">
                <a href="#" class="auth-form__socials--facebook btn-a btn--size-s btn--width-icon">
                    <span class="auth-form__socials-title" style="color: white;"><i class="bi bi-facebook"></i> Kết nối
                        với Facebook</span>
                </a>
                <a href="#" class="auth-form__socials--google btn-a btn--size-s btn--width-icon">
                    <i class="auth-form__socials-icon fa-brands fa-google"></i>
                    <span class="auth-form__socials-title"><i class="bi bi-google"></i> Kết nối với Google</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Lắng nghe sự kiện khi người dùng thay đổi trạng thái của check box
        $('#confirm-check-box').on('change', function() {
            var agreeTerms = $('#confirm-check-box').is(':checked');

            if (agreeTerms) {
                // Nếu check box "Đồng ý với tất cả điều khoản và dịch vụ" được chọn, bật nút "Đăng ký"
                $('#register-button').prop('disabled', false);
            } else {
                // Nếu check box không được chọn, tắt nút "Đăng ký"
                $('#register-button').prop('disabled', true);
            }
        });
    });
</script>