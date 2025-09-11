<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RiverSand Mining Co. - Quality Sand Extraction and Supply</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')
</head>

<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <i class="bi bi-envelope me-2"></i> info@riversandmining.com
                    <i class="bi bi-telephone ms-3 me-2"></i> +123 456 7890
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i
                            class="bi bi-box-arrow-in-right me-1"></i>Client Login</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal"><i
                            class="bi bi-person-plus me-1"></i>Register</a>
                    <a href="#"><i class="bi bi-globe me-1"></i> English</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <i class="fas fa-mountain"></i>
                RiverSand Mining Co.
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sand Extraction</a></li>
                            <li><a class="dropdown-item" href="#">Transportation</a></li>
                            <li><a class="dropdown-item" href="#">Quality Testing</a></li>
                            <li><a class="dropdown-item" href="#">Consultation</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#river-points">River Points</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1>Premium Quality Sand Extraction and Supply</h1>
                        <p>Providing high-quality sand for construction and industrial projects with sustainable mining
                            practices since 1995.</p>
                        <a href="#services" class="btn btn-hero">Our Services</a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#quoteModal" class="btn btn-register">Request
                            Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="quick-links">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-4">
                    <div class="quick-link-card">
                        <i class="fas fa-file-contract"></i>
                        <h5>Active Tenders</h5>
                        <p>Current bidding opportunities</p>
                        <a href="#">View <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="quick-link-card">
                        <i class="fas fa-cubes"></i>
                        <h5>Sand Stock</h5>
                        <p>Available sand types and quantities</p>
                        <a href="#">Check <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="quick-link-card">
                        <i class="fas fa-certificate"></i>
                        <h5>Certifications</h5>
                        <p>Quality and environmental standards</p>
                        <a href="#">See <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="quick-link-card">
                        <i class="fas fa-download"></i>
                        <h5>Downloads</h5>
                        <p>Brochures, certificates, and reports</p>
                        <a href="#">Download <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="https://images.unsplash.com/photo-1593463318912-6c2b8e1b1a4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            alt="Sand Mining" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">About RiverSand Mining Co.</h2>
                    <div class="about-text">
                        <p>Established in 1995, RiverSand Mining Co. has been a leading provider of high-quality sand
                            for construction and industrial applications. We are committed to sustainable mining
                            practices that minimize environmental impact while meeting the growing demand for sand.</p>
                        <p>Our state-of-the-art extraction and processing facilities ensure that we deliver consistent,
                            high-quality sand that meets the strictest industry standards. We serve clients across
                            construction, concrete production, and manufacturing sectors.</p>
                        <div class="about-features">
                            <div class="about-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Sustainable and environmentally responsible mining</span>
                            </div>
                            <div class="about-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>High-quality sand with consistent properties</span>
                            </div>
                            <div class="about-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Efficient logistics and timely delivery</span>
                            </div>
                            <div class="about-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Competitive pricing and flexible terms</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Our Services</h2>
                <p class="lead">Comprehensive sand mining and supply solutions</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <h4>Sand Extraction</h4>
                        <p>Professional sand extraction from riverbeds using environmentally sustainable methods and
                            modern equipment.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h4>Transportation</h4>
                        <p>Reliable and efficient transportation services to deliver sand to your site on time, every
                            time.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-vial"></i>
                        </div>
                        <h4>Quality Testing</h4>
                        <p>Rigorous quality control and testing to ensure our sand meets all required specifications and
                            standards.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4>Consultation</h4>
                        <p>Expert consultation on sand selection, usage, and application for your specific project
                            requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- River Points Section -->
    <section id="river-points" class="events-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Our River Points</h2>
                <p class="lead">Strategic locations for sustainable sand extraction</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="event-card">
                        <div class="event-img position-relative">
                            <img src="https://images.unsplash.com/photo-1593463318912-6c2b8e1b1a4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                alt="River Point A" class="img-fluid">
                            <div class="event-date">
                                <span>A</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <h4>North Bank River Point</h4>
                            <div class="event-meta">
                                <span><i class="fas fa-map-marker-alt"></i> North District</span>
                                <span><i class="fas fa-cubes"></i> 15,200 CFT</span>
                            </div>
                            <p>Our largest extraction point with high-quality construction grade sand and easy access to
                                major highways.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="event-card">
                        <div class="event-img position-relative">
                            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                alt="River Point B" class="img-fluid">
                            <div class="event-date">
                                <span>B</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <h4>South Bank River Point</h4>
                            <div class="event-meta">
                                <span><i class="fas fa-map-marker-alt"></i> South District</span>
                                <span><i class="fas fa-cubes"></i> 12,800 CFT</span>
                            </div>
                            <p>Specialized in premium quality sand with advanced processing facilities for consistent
                                quality.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="event-card">
                        <div class="event-img position-relative">
                            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                alt="River Point C" class="img-fluid">
                            <div class="event-date">
                                <span>C</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <h4>East Bank River Point</h4>
                            <div class="event-meta">
                                <span><i class="fas fa-map-marker-alt"></i> East District</span>
                                <span><i class="fas fa-cubes"></i> 10,500 CFT</span>
                            </div>
                            <p>Eco-friendly extraction point with fine sand ideal for specialized construction
                                applications.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Project Gallery</h2>
                <p class="lead">A glimpse into our sand mining operations</p>
            </div>
            <div class="gallery-filter">
                <button class="active" data-filter="all">All</button>
                <button data-filter="extraction">Extraction</button>
                <button data-filter="transport">Transport</button>
                <button data-filter="quality">Quality Control</button>
                <button data-filter="projects">Projects</button>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 gallery-item" data-category="extraction">
                    <img src="https://images.unsplash.com/photo-1593463318912-6c2b8e1b1a4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Sand Extraction" class="img-fluid">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="transport">
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Sand Transport" class="img-fluid">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="quality">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Quality Control" class="img-fluid">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="projects">
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Construction Project" class="img-fluid">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="extraction">
                    <img src="https://images.unsplash.com/photo-1593463318912-6c2b8e1b1a4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Sand Extraction" class="img-fluid">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item" data-category="projects">
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Construction Project" class="img-fluid">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title text-white">What Our Clients Say</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            "RiverSand Mining Co. has been our trusted sand supplier for over 5 years. Their quality is
                            consistent, and their delivery is always on time. Highly recommended!"
                        </div>
                        <div class="testimonial-author">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80"
                                alt="Client">
                            <div>
                                <h5>David Johnson</h5>
                                <span>Construction Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            "The quality of sand from RiverSand Mining Co. is exceptional. It meets all our
                            specifications and has improved the quality of our concrete products significantly."
                        </div>
                        <div class="testimonial-author">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80"
                                alt="Client">
                            <div>
                                <h5>Michael Chen</h5>
                                <span>Concrete Manufacturer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            "We appreciate RiverSand Mining Co.'s commitment to sustainable practices. Their
                            environmentally responsible approach aligns with our company values."
                        </div>
                        <div class="testimonial-author">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80"
                                alt="Client">
                            <div>
                                <h5>Sarah Williams</h5>
                                <span>Project Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Contact Us</h2>
                <p class="lead">Get in touch for inquiries and quotes</p>
            </div>
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="contact-info">
                        <h4 class="mb-4">Contact Information</h4>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h5>Head Office</h5>
                                <p>123 Mining Road, River City, RC 12345</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <div>
                                <h5>Phone</h5>
                                <p>+123 456 7890</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h5>Email</h5>
                                <p>info@riversandmining.com</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h5>Office Hours</h5>
                                <p>Monday - Friday: 8:00 AM - 6:00 PM</p>
                                <p>Saturday: 9:00 AM - 2:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email" required>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Subject" required>
                        <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
                        <button type="submit" class="btn btn-submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h5>About RiverSand Mining Co.</h5>
                        <p>We are a leading provider of high-quality sand for construction and industrial applications,
                            committed to sustainable mining practices.</p>
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#river-points">River Points</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h5>Services</h5>
                        <ul>
                            <li><a href="#">Sand Extraction</a></li>
                            <li><a href="#">Transportation</a></li>
                            <li><a href="#">Quality Testing</a></li>
                            <li><a href="#">Consultation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h5>Newsletter</h5>
                        <p>Subscribe to our newsletter for updates on tenders and services.</p>
                        <form class="mt-3">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Your Email">
                                <button class="btn btn-primary" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2023 RiverSand Mining Co. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Client Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="clientEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="clientEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="clientPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="clientPassword" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="clientRemember">
                            <label class="form-check-label" for="clientRemember">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <div class="text-center mt-2">
                            <a href="#" class="text-decoration-none">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Quote Request Modal -->
    <div class="modal fade" id="quoteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Request a Quote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quoteName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="quoteName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quoteCompany" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="quoteCompany">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quoteEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="quoteEmail" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quotePhone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="quotePhone" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sandType" class="form-label">Sand Type</label>
                            <select class="form-select" id="sandType" required>
                                <option value="" selected disabled>Select Sand Type</option>
                                <option value="construction">Construction Grade</option>
                                <option value="premium">Premium Quality</option>
                                <option value="specialized">Specialized</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity (CFT)</label>
                            <input type="number" class="form-control" id="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="deliveryLocation" class="form-label">Delivery Location</label>
                            <input type="text" class="form-control" id="deliveryLocation" required>
                        </div>
                        <div class="mb-3">
                            <label for="quoteMessage" class="form-label">Additional Information</label>
                            <textarea class="form-control" id="quoteMessage" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Request Quote</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <span class="lightbox-close">&times;</span>
        <img src="" alt="Gallery Image">
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/js/front.js') }}"></script>
    @stack('scripts')
</body>

</html>