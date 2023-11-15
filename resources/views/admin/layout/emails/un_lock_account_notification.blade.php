<!-- File: resources/views/emails/lock_account_notification.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lock Account Notification</title>
</head>
<body>
    <p>Xin chào {{$Fullname}},</p>

    <p>Tài khoản của bạn với tài khoản: {{ $TenTK }} đã được mở khóa hoạt động trở lại.</p>
    <p>Đây là mật khẩu mới cho tài khoản của bạn: <strong>{{$NewPass}}</strong></p>

    <p>Trân trọng,<br>
    {{ config('app.name') }}</p>
</body>
</html>
