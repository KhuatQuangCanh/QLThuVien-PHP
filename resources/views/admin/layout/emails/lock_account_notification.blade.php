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

    <p>Tài khoản của bạn với tên tài khoản: {{ $TenTK }} đã bị khóa. Nếu có bất kỳ câu hỏi hoặc cần hỗ trợ, vui lòng liên hệ với chúng tôi qua hotline: <strong>19008198</strong>.</p>

    <p>Trân trọng,<br>
    {{ config('app.name') }}</p>
</body>
</html>
