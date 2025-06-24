<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Litrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F3F4F6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #374151;
        }

        .container {
            max-width: 28rem;
            width: 100%;
            background: #fff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 15px rgba(0,0,0,0.05);
        }

        .title {
            font-size: 1.75rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 0.25rem;
        }

        .subtitle {
            text-align: center;
            color: #6B7280;
            margin-bottom: 2rem;
            font-size: 0.9375rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 0rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.5rem;
            font-size: 0.9300rem;
        }

        input:focus {
            outline: none;
            border-color: #6366F1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .is-invalid {
            border-color: #EF4444;
        }

        .error-message {
            color: #EF4444;
            font-size: 0.8125rem;
            margin-top: 0.25rem;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            background-color: #4F46E5;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn:hover {
            background-color: #4338CA;
        }

        .alert-success {
            background-color: #DCFCE7;
            color: #166534;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.9375rem;
        }

        .back-link {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
        }

        .back-link a {
            color: #4F46E5;
            font-weight: 500;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="title">Reset Password</div>
        <div class="subtitle">Please enter your new password below</div>

        @if (session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email', $email) }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn">Reset Password</button>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">← Back to Login</a>
        </div>
    </div>
</body>
</html>
