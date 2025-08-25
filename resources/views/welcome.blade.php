<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catering - Welcome</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #4a7c59;
            --secondary-color: #8d5b4c;
            --accent-color: #f8b400;
            --light-bg: #FDFDFC;
            --dark-bg: #0a0a0a;
            --light-text: #1b1b18;
            --dark-text: #EDEDEC;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
            color: var(--light-text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
        }

        .dark-mode {
            background-color: var(--dark-bg);
            color: var(--dark-text);
        }

        .welcome-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .welcome-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .dark-mode .welcome-card {
            background: #161615;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.05);
        }

        .welcome-left {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-right {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 30px;
            color: var(--accent-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #3c6a48;
            border-color: #3c6a48;
        }

        .btn-outline-light {
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }

        .feature-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .feature-list i {
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .theme-switch {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
        }

        @media (max-width: 992px) {
            .welcome-left {
                padding: 30px;
            }

            .welcome-right {
                padding: 30px;
            }
        }

        @media (max-width: 768px) {
            .welcome-left {
                text-align: center;
            }

            .feature-list li {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Theme Switch -->
    <div class="theme-switch" id="themeSwitch">
        <i class="fas fa-moon"></i>
    </div>

    <div class="welcome-container">
        <header class="mb-4">
            <nav class="d-flex justify-content-end">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </header>

        <div class="welcome-card">
            <div class="row g-0">
                <div class="col-lg-6 welcome-left">
                    <div class="logo">
                        <i class="fas fa-utensils me-2"></i>Catering
                    </div>
                    <h1 class="mb-3">Welcome to Our Catering Service</h1>
                    <p class="lead mb-4">Professional catering solutions for all your events</p>

                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Professional chef administration</li>
                        <li><i class="fas fa-check"></i> Event planning assistance</li>
                        <li><i class="fas fa-check"></i> On-time delivery and setup</li>
                    </ul>
                </div>
                <div class="col-lg-6 welcome-right">
                    <div class="text-center mb-4">
                        <h2>Let's Get Started</h2>
                        <p class="text-muted">Sign in or create an account to access our services</p>
                    </div>

                    <div class="d-grid gap-2">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">
                                Go to Dashboard <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                Sign In <i class="fas fa-sign-in-alt ms-2"></i>
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                                    Create Account <i class="fas fa-user-plus ms-2"></i>
                                </a>
                            @endif
                        @endauth
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-muted">Or contact us directly</p>
                        <a href="#" class="btn btn-link">
                            <i class="fas fa-phone me-2"></i>+254742735159
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-4">
            <p class="text-muted">&copy; {{ date('Y') }} Catering. All rights reserved.</p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Dark mode functionality
        document.addEventListener('DOMContentLoaded', function() {
            const themeSwitch = document.getElementById('themeSwitch');
            const icon = themeSwitch.querySelector('i');

            // Check for saved theme preference
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.body.classList.add('dark-mode');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }

            themeSwitch.addEventListener('click', function() {
                document.body.classList.toggle('dark-mode');

                if (document.body.classList.contains('dark-mode')) {
                    localStorage.setItem('darkMode', 'enabled');
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    localStorage.setItem('darkMode', null);
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            });
        });
    </script>
</body>
</html>
