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
                    <a href="{{route('clients.user.cart')}}" class="cart for-buy"><i class="icon icon-clipboard"></i><span> Cart:(0 $)</span></a>

                    <div class="taikhoan">
                        <a class="user-account for-buy" id="account-link"><i class="icon icon-user"></i><span>
                                Account </span></a>
                        <!-- <div id="account-dropdown" class="account-dropdown">
                            <a href="{{route('clients.user.profile')}}" class="dropdown-item">Thông tin tài khoản</a>
                            <a class="dropdown-item">Login</a>
                        </div> -->
                       
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
                    
                        
                    </div>

                </div>

                <!--top-right-->
            </div>

        </div>
    </div>
</div>