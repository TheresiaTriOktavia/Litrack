<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litrack - Login</title>
    <style>
        :root {
            --primary-color: #4F46E5;
            --primary-light: #6366F1;
            --secondary-color: #10B981;
            --text-color: #374151;
            --light-gray: #F3F4F6;
            --medium-gray: #E5E7EB;
            --dark-gray: #6B7280;
            --error-color: #EF4444;
            --white: #FFFFFF;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-gray);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-color);
        }

        .login-container {
            width: 100%;
            max-width: 28rem;
            padding: 2rem;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .litrack-logo {
            height: 4.5rem;
            margin-bottom: 1rem;
        }

        .login-title {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .login-subtitle {
            font-size: 1rem;
            color: var(--dark-gray);
        }

        .login-card {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow-md);
        }

        .alert {
            padding: 0.875rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.9375rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .alert-danger {
            background-color: #FEE2E2;
            color: var(--error-color);
            border: 1px solid #FECACA;
        }

        .alert-success {
            background-color: #D1FAE5;
            color: var(--secondary-color);
            border: 1px solid #A7F3D0;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.9375rem;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            color: var(--dark-gray);
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid var(--medium-gray);
            border-radius: 0.5rem;
            font-size: 0.9300rem;
        }

        .form-input:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .form-input.is-invalid {
            border-color: var(--error-color);
        }

        .error-message {
            font-size: 0.8125rem;
            color: var(--error-color);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            font-size: 0.875rem;
        }

        .remember-me {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-password:hover {
            color: #4338CA;
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            background-color: var(--primary-color);
            color: var(--white);
            padding: 0.875rem 1rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #4338CA;
            transform: translateY(-1px);
        }

        .register-link {
            text-align: center;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .register-link a {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .form-input {
                padding-left: 2rem;
            }
        }
    </style>
</head>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const rememberCheckbox = document.getElementById('remember');

        // Load stored credentials if available
        if (localStorage.getItem('remember') === 'true') {
            emailInput.value = localStorage.getItem('email') || '';
            passwordInput.value = localStorage.getItem('password') || '';
            rememberCheckbox.checked = true;
        }

        // Save credentials on form submit
        document.querySelector('.login-form').addEventListener('submit', function () {
            if (rememberCheckbox.checked) {
                localStorage.setItem('email', emailInput.value);
                localStorage.setItem('password', passwordInput.value);
                localStorage.setItem('remember', 'true');
            } else {
                localStorage.removeItem('email');
                localStorage.removeItem('password');
                localStorage.removeItem('remember');
            }
        });
    });
</script>
<body>
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-logo">
                <img src="/logo.png" alt="Litrack" class="litrack-logo">
                <h2 class="login-title">Welcome Back</h2>
                <p class="login-subtitle">Please enter your credentials to login</p>
            </div>

            <div class="login-card">

                {{-- Success flash message --}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                {{-- Login failed message --}}
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <form action="{{ route('authenticate') }}" method="POST" class="login-form">
                    @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                        </svg>
                    </span>
                    <input type="email" id="email" name="email" class="form-input @error('email') is-invalid @enderror"
                        placeholder="Enter your email" value="{{ old('email') }}" autocomplete="email" required>
                </div>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                    </span>
                    <input type="password" id="password" name="password" class="form-input @error('password') is-invalid @enderror"
                        placeholder="Enter your password" autocomplete="current-password" required>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                    </div>

                    <button type="submit" class="login-button">
                        <span>Login</span>
                    </button>

                    <div class="register-link">
                        Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
