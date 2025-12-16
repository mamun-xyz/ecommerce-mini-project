<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-Commerce Mini Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand-custom {
            font-size: 1.6rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: transform 0.3s ease;
        }

        .navbar-brand-custom:hover {
            transform: scale(1.05);
            color: #fff;
        }

        .navbar-brand-custom i {
            color: #e94560;
        }

        /* Navigation Links */
        .nav-link-custom {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.6rem 1.2rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 5px;
            text-decoration: none;
        }

        .nav-link-custom:hover {
            color: #fff !important;
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        /* Logout Button */
        .logout-btn {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff5252 100%) !important;
            color: white !important;
            font-weight: 600;
            padding: 0.6rem 1.5rem !important;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 5px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(255, 82, 82, 0.3);
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #ff5252 0%, #ff3838 100%) !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 82, 82, 0.4);
            color: white !important;
        }

        .logout-btn:active {
            transform: translateY(0);
        }

        /* User Info */
        .user-info {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            padding: 0.6rem 1.2rem;
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 5px;
        }

        .user-info i {
            color: #e94560;
            font-size: 1.2rem;
        }

        /* Mobile */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(26, 26, 46, 0.98);
                padding: 1rem;
                border-radius: 0 0 15px 15px;
                margin-top: 10px;
            }

            .nav-link-custom,
            .logout-btn,
            .user-info {
                margin: 5px 0;
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand-custom" href="#">
                <i class="fas fa-shopping-bag"></i>
                <span>E-Commerce</span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Categories -->
                    <li class="nav-item">
                        <a class="nav-link-custom" href="{{ route('categories.index') }}">
                            <i class="fas fa-list"></i>
                            <span>Categories</span>
                        </a>
                    </li>

                    <!-- Products -->
                    <li class="nav-item">
                        <a class="nav-link-custom" href="{{ route('products.index') }}">
                            <i class="fas fa-box"></i>
                            <span>Products</span>
                        </a>
                    </li>

                    <!-- User Info -->
                    <li class="nav-item">
                        <div class="user-info">
                            <i class="fas fa-user-circle"></i>
                            <span>{{ auth()->user()->name ?? 'Guest' }}</span>
                        </div>
                    </li>

                    <!-- Logout Button -->
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0; display: inline;">
                            @csrf
                            <button type="submit" class="logout-btn">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container" style="margin-top: 2rem; margin-bottom: 2rem;">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>