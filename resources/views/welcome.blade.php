<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In to Outlook</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="login-page">
        <div class="login-form">
            <form id="register-form" method="POST" action="{{ secure_url(route('register', [], false)) }}">
                @csrf
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="show-password">Show</span>
                </div>
                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>
    <script src="{{ secure_asset('js/script.js') }}"></script>
</body>
</html>
