<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Premium Electronics Store</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Minimal custom CSS for specific styling that Bootstrap doesn't cover */
        .product-img-container {
            height: 220px;
            overflow: hidden;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .product-img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.05);
        }

        .product-category {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .previous-price {
            text-decoration: line-through;
        }

        .discount-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 10px;
            border-radius: 20px;
            z-index: 1;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="%234361ee" opacity="0.05"/></svg>');
            background-size: cover;
        }

        @media (max-width: 768px) {
            .hero-section::before {
                width: 100%;
                opacity: 0.1;
            }
        }

        .category-btn {
            border-radius: 20px;
            margin: 0 5px 10px;
        }

        .footer-link {
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
        }

        .copyright {
            border-top: 1px solid #495057;
            padding-top: 1.5rem;
            margin-top: 2rem;
        }
    </style>
</head>

<body class="pt-5">
    <!-- Header / Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <!-- Logo / Site Name -->
            <a class="navbar-brand text-primary fw-bold fs-4" href="#">
                <i class="fas fa-laptop-code text-danger"></i>
                <span class="ms-2">TechShop</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active bg-primary bg-opacity-10 text-primary rounded" href="#">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark rounded" href="#">
                            <i class="fas fa-store me-1"></i> Shop
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark rounded" href="#">
                            <i class="fas fa-tags me-1"></i> Deals
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark rounded" href="#">
                            <i class="fas fa-envelope me-1"></i> Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark rounded" href="#">
                            <i class="fas fa-shopping-cart me-1"></i> Cart
                            <span class="badge bg-danger rounded-pill">3</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mt-4">
        <!-- Hero Section -->
        <section class="hero-section bg-light bg-gradient rounded-3 p-4 p-md-5 mb-5 position-relative overflow-hidden">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="text-primary fw-bold mb-2">Summer Tech Sale</h1>
                    <p class="text-muted fs-5 mb-4">Up to 40% off on premium electronics. Limited time offer on the latest gadgets and devices.</p>
                    <a href="#" class="btn btn-primary btn-lg">
                        Shop Now <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-laptop text-primary opacity-75" style="font-size: 8rem;"></i>
                </div>
            </div>
        </section>

        <!-- Category Filter -->
        <section class="category-filter mb-4">
            <h2 class="h4 mb-3">Browse by Category</h2>
            <div class="d-flex flex-wrap">
                <button class="btn btn-primary category-btn active">All Products</button>
                <button class="btn btn-outline-primary category-btn">Laptops</button>
                <button class="btn btn-outline-primary category-btn">Phones</button>
                <button class="btn btn-outline-primary category-btn">Audio</button>
                <button class="btn btn-outline-primary category-btn">Wearables</button>
                <button class="btn btn-outline-primary category-btn">Accessories</button>
            </div>
        </section>

        <!-- Product Section -->
        <section class="product-section mb-5">
            <h2 class="h3 mb-4">Featured Products</h2>

            <div class="row">
                <!-- Product Card 1 -->
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="discount-badge bg-danger text-white fw-bold">25% OFF</div>
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGFwdG9wfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" class="product-img" alt="UltraBook Pro Laptop">
                        </div>
                        <div class="card-body">
                            <div class="product-category text-primary fw-bold mb-2">Laptops</div>
                            <h3 class="card-title fw-semibold fs-5 mb-2">UltraBook Pro X1</h3>
                            <p class="card-text text-muted small">14-inch display, 16GB RAM, 512GB SSD, Intel i7 processor</p>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-primary fw-bold fs-4 me-3">$1,299.99</span>
                                <span class="text-muted previous-price">$1,599.99</span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">
                                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="discount-badge bg-danger text-white fw-bold">15% OFF</div>
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8c21hcnRwaG9uZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" class="product-img" alt="Smartphone X">
                        </div>
                        <div class="card-body">
                            <div class="product-category text-primary fw-bold mb-2">Phones</div>
                            <h3 class="card-title fw-semibold fs-5 mb-2">SmartPhone X12 Pro</h3>
                            <p class="card-text text-muted small">6.7-inch OLED, 256GB storage, triple camera, 5G capable</p>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-primary fw-bold fs-4 me-3">$899.99</span>
                                <span class="text-muted previous-price">$1,059.99</span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">
                                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aGVhZHBob25lc3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" class="product-img" alt="Wireless Headphones">
                        </div>
                        <div class="card-body">
                            <div class="product-category text-primary fw-bold mb-2">Audio</div>
                            <h3 class="card-title fw-semibold fs-5 mb-2">NoiseCancel Pro Max</h3>
                            <p class="card-text text-muted small">Wireless over-ear headphones with 30h battery, noise cancellation</p>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-primary fw-bold fs-4 me-3">$249.99</span>
                                <span class="text-muted previous-price">$299.99</span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">
                                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="discount-badge bg-danger text-white fw-bold">30% OFF</div>
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8d2F0Y2h8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" class="product-img" alt="Smart Watch">
                        </div>
                        <div class="card-body">
                            <div class="product-category text-primary fw-bold mb-2">Wearables</div>
                            <h3 class="card-title fw-semibold fs-5 mb-2">FitTrack Smart Watch 5</h3>
                            <p class="card-text text-muted small">Health & fitness tracker, heart rate monitor, GPS, waterproof</p>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-primary fw-bold fs-4 me-3">$199.99</span>
                                <span class="text-muted previous-price">$285.99</span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">
                                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 5 -->
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c3BlYWtlcnxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" class="product-img" alt="Portable Speaker">
                        </div>
                        <div class="card-body">
                            <div class="product-category text-primary fw-bold mb-2">Audio</div>
                            <h3 class="card-title fw-semibold fs-5 mb-2">BassBoost Portable Speaker</h3>
                            <p class="card-text text-muted small">360° sound, waterproof, 20h battery, Bluetooth 5.2</p>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-primary fw-bold fs-4 me-3">$89.99</span>
                                <span class="text-muted previous-price">$119.99</span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">
                                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 6 -->
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="discount-badge bg-danger text-white fw-bold">20% OFF</div>
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1600003263720-95b45a4035d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dGFibGV0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" class="product-img" alt="Tablet">
                        </div>
                        <div class="card-body">
                            <div class="product-category text-primary fw-bold mb-2">Tablets</div>
                            <h3 class="card-title fw-semibold fs-5 mb-2">TabPlus 10-inch Tablet</h3>
                            <p class="card-text text-muted small">10.5" display, 128GB storage, stylus support, 12MP camera</p>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-primary fw-bold fs-4 me-3">$349.99</span>
                                <span class="text-muted previous-price">$439.99</span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">
                                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 7 -->
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8a2V5Ym9hcmR8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" class="product-img" alt="Keyboard">
                        </div>
                        <div class="card-body">
                            <div class="product-category text-primary fw-bold mb-2">Accessories</div>
                            <h3 class="card-title fw-semibold fs-5 mb-2">Mechanical Gaming Keyboard</h3>
                            <p class="card-text text-muted small">RGB backlit, mechanical switches, wrist rest, USB passthrough</p>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-primary fw-bold fs-4 me-3">$79.99</span>
                                <span class="text-muted previous-price">$99.99</span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">
                                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 8 -->
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="discount-badge bg-danger text-white fw-bold">10% OFF</div>
                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y2FtZXJhfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" class="product-img" alt="Camera">
                        </div>
                        <div class="card-body">
                            <div class="product-category text-primary fw-bold mb-2">Cameras</div>
                            <h3 class="card-title fw-semibold fs-5 mb-2">PhotoMaster Mirrorless Camera</h3>
                            <p class="card-text text-muted small">24.2MP, 4K video, 3-inch touchscreen, with kit lens</p>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-primary fw-bold fs-4 me-3">$749.99</span>
                                <span class="text-muted previous-price">$829.99</span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">
                                    <i class="fas fa-cart-plus me-2"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">TechShop</h5>
                    <p class="text-secondary">Your one-stop shop for premium electronics and tech gadgets. We offer the latest products at competitive prices with excellent customer service.</p>
                    <div class="d-flex mt-4">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <h5 class="fw-bold mb-3">Shop</h5>
                    <a href="#" class="footer-link text-secondary">Laptops</a>
                    <a href="#" class="footer-link text-secondary">Smartphones</a>
                    <a href="#" class="footer-link text-secondary">Audio</a>
                    <a href="#" class="footer-link text-secondary">Wearables</a>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <h5 class="fw-bold mb-3">Support</h5>
                    <a href="#" class="footer-link text-secondary">Contact Us</a>
                    <a href="#" class="footer-link text-secondary">FAQ</a>
                    <a href="#" class="footer-link text-secondary">Shipping</a>
                    <a href="#" class="footer-link text-secondary">Returns</a>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Newsletter</h5>
                    <p class="text-secondary">Subscribe to get updates on new products and exclusive offers.</p>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="copyright text-center">
                <p class="text-secondary mb-0">&copy; 2023 TechShop. All rights reserved. | <a href="#" class="text-secondary">Privacy Policy</a> | <a href="#" class="text-secondary">Terms of Service</a></p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Simple script for category filtering -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Category filter buttons
            const categoryButtons = document.querySelectorAll('.category-btn');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => {
                        btn.classList.remove('active', 'btn-primary');
                        btn.classList.add('btn-outline-primary');
                    });
                    // Add active class to clicked button
                    this.classList.remove('btn-outline-primary');
                    this.classList.add('active', 'btn-primary');

                    // In a real application, this would filter the products
                    // For this demo, we'll just show an alert
                    const category = this.textContent.trim();
                    if (category !== 'All Products') {
                        alert(`Filtering by ${category} - In a real application, this would filter the product list.`);
                    }
                });
            });

            // Add to Cart button functionality
            const addToCartButtons = document.querySelectorAll('.btn-primary');
            addToCartButtons.forEach(button => {
                if (button.textContent.includes('Add to Cart')) {
                    button.addEventListener('click', function() {
                        const productCard = this.closest('.product-card');
                        const productTitle = productCard.querySelector('.card-title').textContent;
                        const currentPrice = productCard.querySelector('.text-primary.fs-4').textContent;

                        // Update cart badge
                        const cartBadge = document.querySelector('.navbar .badge');
                        let currentCount = parseInt(cartBadge.textContent);
                        cartBadge.textContent = currentCount + 1;

                        // Show feedback
                        const originalHTML = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check me-2"></i> Added!';
                        this.classList.remove('btn-primary');
                        this.classList.add('btn-success');

                        setTimeout(() => {
                            this.innerHTML = originalHTML;
                            this.classList.remove('btn-success');
                            this.classList.add('btn-primary');
                        }, 2000);

                        console.log(`Added to cart: ${productTitle} for ${currentPrice}`);
                    });
                }
            });
        });
    </script>
</body>

</html>