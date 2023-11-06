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

                    @if(!Empty(session('fullname')))
                    <div class="taikhoan">
                        <a class="user-account for-buy" id="account-link"><i class="icon icon-user"></i><span>
                                {{session('fullname')}} </span></a>
                        <div id="account-dropdown" class="account-dropdown"
                            style="width: 180px; background-color: white;">
                            <a href="{{route('clients.user.profile',session('id'))}}" class="dropdown-item">Thông tin
                                tài khoản</a>
                            <a href="{{route('clients.user.logout')}}" class="dropdown-item">Đăng xuất</a>
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

                    @include('clients.layout.block.asset.login')

                    @include('clients.layout.block.asset.registration')

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
                    form_click.addEventListener('click', function(event) {
                        if (event.target === form_click) {
                            login_form_click.style.display = 'none';
                        }
                    });

                    register_click.addEventListener('click', function() {
                        if (register_form_click.style.display === 'none') {
                            register_form_click.style.display = 'flex';
                        }
                    });
                    form_register_click.addEventListener('click', function(event) {
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