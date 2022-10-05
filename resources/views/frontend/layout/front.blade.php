<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Le Temps De Dieu Officiel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
@include('frontend.partials.topBar')
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">Men <i class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            <a href="" class="dropdown-item">T-shirts</a>
                            <a href="" class="dropdown-item">Sportswear</a>
                            <a href="" class="dropdown-item">Jogging</a>
                            <a href="" class="dropdown-item">shorts</a>
                            <a href="" class="dropdown-item">Caps</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">Women <i class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            <a href="" class="dropdown-item">T-shirts</a>
                            <a href="" class="dropdown-item">Sportswear</a>
                            <a href="" class="dropdown-item">Jogging</a>
                            <a href="" class="dropdown-item">shorts</a>
                            <a href="" class="dropdown-item">Caps</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">Children <i class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            <a href="" class="dropdown-item">T-shirts</a>
                            <a href="" class="dropdown-item">Sportswear</a>
                            <a href="" class="dropdown-item">Jogging</a>
                            <a href="" class="dropdown-item">shorts</a>
                            <a href="" class="dropdown-item">Caps</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">Accessories <i class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            <a href="" class="dropdown-item">Socks</a>
                            <a href="" class="dropdown-item">Bags</a>
                            <a href="" class="dropdown-item">Bracelets</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <img class="img-fluid" src="{{ asset('frontend/img/logo.jpeg') }}" alt="LTDD">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">LTDD</span></h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Shop</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="shop.html" class="dropdown-item">Shop</a>
                                <a href="shop.html" class="dropdown-item">Exposition</a>
                                <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                <a href="checkout.html" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
                        <a href="shop.html" class="nav-item nav-link">Our services</a>
                        <a href="detail.html" class="nav-item nav-link">About us</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        <a href="" class="nav-item nav-link">Login</a>
                        <a href="" class="nav-item nav-link">Register</a>
                    </div>
                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="{{ asset('frontend/img/carousel-1.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Le Temps De Dieu</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Street Wear Style</h3>
                                <a href="" class="btn btn-primary py-md-2 px-md-3 text-white">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="{{ asset('frontend/img/carousel-2.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Le Temps De Dieu n'est pas celui des Hommes</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">LTDD</h3>
                                <a href="" class="btn btn-primary py-md-2 px-md-3 text-white">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->


<!-- Footer Start -->
<div class="container-fluid bg-secondary text-footer mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5 d-inline-block">
            <a href="" class="text-decoration-none">
                <img class="img-fluid" src="{{ asset('frontend/img/logo2.jpeg') }}" width="30%">
            </a>
            <p>
                <h6 class="mb-4 display-5 font-weight-semi-bold">
                    <span class="text-primary font-weight-bold border border-white px-3 mr-1">Le Temps De Dieu n'est pas celui des Hommes.</span>
                </h6>
            </p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Nouvelle route Tam-tam, Yaound&eacute;, Cameroon</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@ltdd.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+237 670 17 57 46</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-footer mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-footer mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-footer mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-footer mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-footer mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-footer mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-footer" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-footer mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-footer mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-footer mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-footer mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-footer mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-footer mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-footer" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-footer mb-4">Newsletter</h5>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                   required="required" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-footer">
                &copy; <a class="text-footer font-weight-semi-bold" href="#">LTDD, Tchatto Mballa</a>. All Rights Reserved. Designed
                by
                <a class="text-facebook font-weight-semi-bold" href="#"><em>Victoire Nkolo</em></a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="{{ asset('frontend/img/payments.png') }}" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('frontend/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('frontend/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>