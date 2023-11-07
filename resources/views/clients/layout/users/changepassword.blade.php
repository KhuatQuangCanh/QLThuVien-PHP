<div class="modal" id="form-changepass-click" style="display: none;">
    <div class="modal__overlay" id="form-change-one-click">
    </div>
    <div class=" modal__body">
        <div class="auth-form">
            <div class="auth-form__container">
                <div class="center">
                    <p class="suth-form-switch-btn" style="margin: 0 auto; text-align: center;">Đổi mật khẩu</p>
                </div>
                <form action="{{route('clients.user.post-change-password',Session('id'))}}" method="post">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Mật khẩu hiện tại</label>
                            <input type="password" class="define-input" placeholder="Mật khẩu hiện tại ..."
                                name="currentpass">
                            @error('currentpass')
                            <span style="color: red; text-align: right;">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Mật khẩu mới</label>
                            <input type="password" class="define-input" placeholder="Mật khẩu mới ..." name="newpass">
                            @error('newpass')
                            <span style="color: red;text-align: left;">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="auth-form__group">
                            <label for="" style="text-align: left;">Nhập lại mật khẩu mới</label>
                            <input type="password" class="define-input" placeholder="Nhập lại mật khẩu mới ..."
                                name="enterpass">
                            @error('enterpass')
                            <span style="color: red;text-align: left;">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="auth-form__controls" style="margin-top: 10px;">
                        <button type="submit" class="btn btn-primary"
                            style="border-radius: 20px; margin: 0 auto; width: 100%;" disabled id="changepass">Đổi mật
                            khẩu</button>
                    </div>
                    @csrf
                </form>

            </div>
        </div>
    </div>

</div>
<script>
$(document).ready(function() {
    // Lắng nghe sự kiện khi người dùng nhập vào các trường input
    $('input.define-input').on('input', function() {
        // Kiểm tra xem các trường input có dữ liệu hợp lệ hay không
        var cuurent_pass = $('input[name="currentpass"]').val();
        var new_pass = $('input[name="newpass"]').val();
        var enter_pass = $('input[name="enterpass"]').val();

        if (cuurent_pass.trim() !== '' && new_pass.trim() !== '' && enter_pass.trim() !== '') {
            // Nếu dữ liệu hợp lệ, bật nút "Đăng nhập"
            $('#changepass').prop('disabled', false);
        } else {
            // Nếu có ít nhất một trường không hợp lệ hoặc rỗng, tắt nút "Đăng nhập"
            $('#changepass').prop('disabled', true);
        }
    });
});
</script>