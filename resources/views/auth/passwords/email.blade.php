<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password - Litrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Copy styling dari login.blade.php */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F3F4F6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 28rem;
            width: 100%;
            background: #fff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
        }

        .title {
            font-size: 1.75rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            text-align: center;
            color: #6B7280;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }

        input[type="email"] {
            width: 100%;
            padding: 0.75rem 0rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.5rem;
            font-size: 0.9375rem;
        }

        input[type="email"]:focus {
            outline: none;
            border-color: #6366F1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
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

        .error-message {
            color: #EF4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .alert-success {
            background-color: #DCFCE7;
            color: #166534;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.9375rem;
        }

        .reset-link {
            font-size: 0.875rem;
            margin-top: 0rem;
            background-color: #DCFCE7;
            padding: 0.75rem;
            border-radius: 0.5rem;
            word-break: break-word;
        }

        a {
            color: #4F46E5;
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">Forgot Password</div>
        <p class="subtitle">Enter your email and we'll send you a reset link.</p>

        @if (session('status'))
            <div class="alert-success">
                <strong>Simulasi:</strong> klik link berikut untuk reset password:
                <div class="reset-link">{!! session('status') !!}</div>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Send Reset Link</button>
        </form>

        <div style="text-align:center; margin-top: 1.5rem;">
            <a href="{{ route('login') }}">← Back to Login</a>
        </div>
    </div>
</body>

</html>
