<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="social-links">
                    <ul>
                        <li>
                            <a href="#"><i class="icon icon-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="icon icon-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="icon icon-youtube-play"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="icon icon-behance-square"></i></a>
                        </li>
                    </ul>
                </div>
                <!--social-links-->
            </div>
            <div class="col-md-6">
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

                    @if(!Empty(Session()->user))
                    <div class="taikhoan">
                        <a class="user-account for-buy" id="account-link"><i class="icon icon-user"></i><span>
                                {{$user->username}} </span></a>
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
                        <a href="#"><span>Đăng ký</span></a>
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
                                    <form>
                                        <div class="auth-form__form">
                                            <div class="auth-form__group">
                                                <label for="" style="text-align: left;">Tài khoản</label>
                                                <input type="text" class="define-input"
                                                    placeholder="Nhập tài khoản ...">
                                            </div>
                                            <div class="auth-form__group">
                                                <label for="" style="text-align: left;">Mật khẩu</label>
                                                <input type="password" class="define-input"
                                                    placeholder="Nhập mật khẩu ...">
                                            </div>
                                            <div class="auth-form__group" style="display: flex;">
                                                <input type="checkbox" id="check-box">
                                                <label for="check-box"
                                                    style="margin-left: 10px; margin-bottom: 20px;">Remember
                                                    me.</label>
                                            </div>
                                        </div>
                                        <div class="auth-form__controls" style="margin-top: 10px;">
                                            <button class="btn btn-primary"
                                                style="border-radius: 20px; margin: 0 auto; width: 100%;">Đăng
                                                nhập</button>
                                        </div>
                                        <div class="auth-form__help define-forget"
                                            style="justify-content: flex-end; margin-top: 20px;">
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
                    <script>
                    const login_click = document.getElementById('login-click');
                    const login_form_click = document.getElementById('login-form-click');
                    const form_click = document.getElementById('form-click');
                    login_click.addEventListener('click', function(event) {
                        if (login_form_click.style.display === 'none') {
                            login_form_click.style.display = 'flex';
                        }
                    });
                    form_click.addEventListener('click', function(event) {
                        if (event.target === form_click) {
                            login_form_click.style.display = 'none';
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