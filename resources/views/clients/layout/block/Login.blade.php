
<div class="modal">
        <div class="modal__overlay"></div>
        <div class="modal__body">  


        <!-- Login form -->
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng ký</h3>
                        <span class="suth-form-switch-btn">Đăng nhập</span>

                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" placeholder="Nhập email">
                        </div>
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" placeholder="Nhập mật khẩu">
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                            <span class="auth-form__help-separete"></span>
                            <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                        </div>
                    </div>
                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">Muốn thuê sách à. Hãy 
                            <a href="" class="auth-form__text-link">Đăng ký tài khoản</a> đi bạn.
                        </p>
                    </div>

                    <div class="auth-form__controls">
                        <button class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
                        <button class="btn btn--primary">ĐẰNG NHẬP</button>
                    </div>
                </div>


                <div class="auth-form__socials">
                    <a href="" class=" auth-form__socials--facebook btn btn--size-s btn--width-icon">
                        <i class="auth-form__socials-icon fa-brands fa-square-facebook"></i>
                        <span class="auth-form__socials-title">Kết nối với Facebook</span>
                    </a>
                    <a href="" class="auth-form__socials--google btn btn--size-s btn--width-icon">
                        <i class="auth-form__socials-icon fa-brands fa-google"></i>
                        <span class="auth-form__socials-title">Kết nối với Google</span>
                    </a>
                </div>
            </div> 


        </div>
</div>


<!-- <script>
    const registerLink = document.querySelector('.auth-form__text-link');
    const loginForm = document.getElementById('login-form');

    registerLink.addEventListener('click', function(event) {
        event.preventDefault();
        fetch('resources/views/clients/layout/block/Register.blade.php') 
            .then(response => response.text())
            .then(html => {
                const registerFormContainer = document.createElement('div');
                registerFormContainer.innerHTML = html;

                const registerForm = registerFormContainer.querySelector('.auth-form');
                loginForm.style.display = 'none';
                document.body.appendChild(registerForm);
            });
    });
</script> -->