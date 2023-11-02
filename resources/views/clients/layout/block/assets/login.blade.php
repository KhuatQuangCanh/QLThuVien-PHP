<!-- Login form -->
<div class="modal">
    <div class="modal__overlay"></div>
    <div class="modal__body">
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="center">
                    <p class="suth-form-switch-btn" style="margin: 0 auto; text-align: center;">Đăng
                        nhập</p>
                </div>
                <form action="" method="post">

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <label for="">Tài khoản</label>
                            <input type="text" class="define-input" placeholder="Nhập tài khoản ...">
                        </div>
                        <div class="auth-form__group">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="define-input" placeholder="Nhập mật khẩu ...">
                        </div>
                        <div class="auth-form__group" style="display: flex;">
                            <input type="checkbox">
                            <label for="" style="margin-left: 10px; margin-bottom: 20px;">Remember
                                me.</label>
                        </div>
                    </div>
                    <div class="auth-form__controls" style="margin-top: 10px;">
                        <button class="btn btn-primary" style="border-radius: 20px; margin: 0 auto; width: 100%;">Đăng
                            nhập</button>
                    </div>
                    <div class="auth-form__help define-forget" style="justify-content: flex-end; margin-top: 20px;">
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                </form>


                <div class="define-forget">
                    <p>Bạn chưa có tài khoản? </p>
                    <a href="#">Đăng ký tài khoản.</a>
                </div>
            </div>

            <div class="auth-form__socials">
                <a href="#" class=" auth-form__socials--facebook btn-a btn--size-s btn--width-icon">
                    <span class="auth-form__socials-title" style="color: white;"><i class="bi bi-facebook"></i> Kết nối
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
<!--end login form -->