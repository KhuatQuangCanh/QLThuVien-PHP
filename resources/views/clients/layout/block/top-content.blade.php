<div class="top-content">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="right-element">
                    <div class="action-menu">
                        <div class="search-bar">
                            <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                <i class="icon icon-search"></i>
                            </a>
                            <form role="search" method="get" class="search-box">
                                <input class="search-field text search-input" placeholder="Search" type="search">
                            </form>
                        </div>
                    </div>
                    <a href="{{route('clients.user.cart')}}" class="cart for-buy"><i
                            class="icon icon-clipboard"></i><span> Cart:(0 $)</span></a>

                    @if(!Empty(session('user')))
                    <div class="taikhoan">
                        <a class="user-account for-buy" id="account-link"><i class="icon icon-user"></i><span>
                                {{session('user')}} </span></a>
                        <div id="account-dropdown" class="account-dropdown">
                            <a href="{{route('clients.user.profile')}}" class="dropdown-item">Thông tin tài khoản</a>
                            <a class="dropdown-item">Đăng xuất</a>
                        </div>

                    </div>
                    <script>
                    const accountLink = document.getElementById('account-link');
                    const accountDropdown = document.getElementById('account-dropdown');

                    accountLink.addEventListener('click', function() {
                        if (accountDropdown.style.display === 'block') {
                            accountDropdown.style.display = 'none';
                        } else {
                            accountDropdown.style.display = 'block';
                        }
                    });
                    </script>
                    @else
                    <div class="taikhoan">
                        <a id="login-click"><span>Đăng nhập</span></a>
                        <span>|</span>
                        <a id="register-click"><span>Đăng ký</span></a>
                    </div>
                    <!-- Login form -->
                    <div class="modal" id="login-form-click" style="display: none;">
                        <div class="modal__overlay" id="form-click"></div>
                        <div class="modal__body">
                            <div class="auth-form">
                                <div class="auth-form__container">
                                    <div class="center">
                                        <p class="suth-form-switch-btn" style="margin: 0 auto; text-align: center;">Đăng
                                            nhập</p>
                                    </div>
                                    <form action="{{route('clients.user.login')}}" method="post">
                                        <div class="auth-form__form">
                                            <div class="auth-form__group">
                                                <label for="" style="text-align: left;">Tài khoản</label>
                                                <input type="text" class="define-input" placeholder="Nhập tài khoản ..."
                                                    name="taikhoan">
                                                @error('taikhoan')
                                                <span style="color: red;">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="auth-form__group">
                                                <label for="" style="text-align: left;">Mật khẩu</label>
                                                <input type="password" class="define-input"
                                                    placeholder="Nhập mật khẩu ..." name="matkhau">
                                                @error('matkhau')
                                                <span style="color: red;">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="auth-form__group" style="display: flex;">
                                                <input type="checkbox" id="check-box">
                                                <label for="check-box"
                                                    style="margin-left: 10px; margin-bottom: 20px;">Remember
                                                    me.</label>
                                            </div>
                                        </div>
                                        <div class="auth-form__controls" style="margin-top: 10px;">
                                            <button type="submit" class="btn btn-primary"
                                                style="border-radius: 20px; margin: 0 auto; width: 100%;">Đăng
                                                nhập</button>
                                        </div>
                                        @csrf
                                    </form>
                                    <div class="auth-form__help define-forget"
                                        style="justify-content: flex-end; margin-top: 20px;">
                                        <a href="#">Quên mật khẩu?</a>
                                    </div>


                                    <div class="define-forget">
                                        <p>Bạn chưa có tài khoản? </p>
                                        <a href="#">Đăng ký tài khoản.</a>
                                    </div>
                                </div>

                                <div class="auth-form__socials">
                                    <a href="#" class=" auth-form__socials--facebook btn-a btn--size-s btn--width-icon">
                                        <span class="auth-form__socials-title" style="color: white;"><i
                                                class="bi bi-facebook"></i> Kết nối
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
                    <!-- Register form -->
                    <div class="modal" id="register-form-click" style="display: none;">
                        <div class="modal__overlay" id="form-register-click"></div>
                        <div class="modal__body">
                            <div class="auth-form">
                                <div class="auth-form__container">
                                    <div class="auth-form__header">
                                        <div class="center">
                                            <p class="suth-form-switch-btn" style="margin: 0 auto; text-align: center;">
                                                Đăng ký</p>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="auth-form__form">
                                            <div class="auth-form__group">
                                                <label for="" style="text-align: left;">Họ tên</label>
                                                <input type="text" class="define-input" placeholder="Nhập họ tên ...">
                                            </div>
                                            <div class="auth-form__group">
                                                <label for="" style="text-align: left;">Email</label>
                                                <input type="text" class="define-input" placeholder="Nhập email ...">
                                            </div>
                                            <div class="auth-form__group">
                                                <label for="" style="text-align: left;">Tài khoản</label>
                                                <input type="text" class="define-input"
                                                    placeholder="Nhập tài khoản ...">
                                            </div>
                                            <div class="auth-form__group">
                                                <label for="" style="text-align: left;">Mật khẩu</label>
                                                <input type="text" class="define-input" placeholder="Nhập mật khẩu ...">
                                            </div>
                                            <div class="auth-form__group">
                                                <label for="" style="text-align: left;">Xác nhận lại mật khẩu</label>
                                                <input type="text" class="define-input"
                                                    placeholder="Nhập lại mật khẩu ...">
                                            </div>
                                            <div style="display:flex; justify-content: left;">
                                                <input type="checkbox" id="confim-check-box">
                                                <label for="confim-check-box"
                                                    style="margin-left: 10px; margin-bottom: 20px;">Đồng ý với tất cả
                                                    điều khoản và dịch vu.</label>
                                            </div>
                                        </div>
                                        <div class="auth-form__controls" style="margin-top: 10px;">

                                            <button class="btn btn-primary"
                                                style="border-radius: 20px; margin: 0 auto; width: 100%;">Đăng
                                                ký</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="auth-form__socials">
                                    <a href="#" class=" auth-form__socials--facebook btn-a btn--size-s btn--width-icon">
                                        <span class="auth-form__socials-title" style="color: white;"><i
                                                class="bi bi-facebook"></i> Kết nối
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
                    const login_click = document.getElementById('login-click');
                    const login_form_click = document.getElementById('login-form-click');
                    const form_click = document.getElementById('form-click');

                    const register_click = document.getElementById('register-click');
                    const register_form_click = document.getElementById('register-form-click');
                    const form_register_click = document.getElementById('form-register-click');


                    login_click.addEventListener('click', function() {
                        if (login_form_click.style.display === 'none') {
                            login_form_click.style.display = 'flex';
                        }
                    });
                    form_click.addEventListener('click', function() {
                        if (event.target === form_click) {
                            login_form_click.style.display = 'none';
                        }
                    });

                    register_click.addEventListener('click', function() {
                        if (register_form_click.style.display === 'none') {
                            register_form_click.style.display = 'flex';
                        }
                    });
                    form_register_click.addEventListener('click', function() {
                        if (event.target === form_register_click) {
                            register_form_click.style.display = 'none';
                        }
                    });
                    </script>
                    @endif
                </div>

            </div>

            <!--top-right-->
        </div>

    </div>
</div>
</div>