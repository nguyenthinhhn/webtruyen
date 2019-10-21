@extends('frontend.layouts.main')

@section('head')
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('/about/css/open-iconic-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('/about/css/animate.css')}}">

<link rel="stylesheet" href="{{ asset('/about/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ asset('/about/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{ asset('/about/css/magnific-popup.css')}}">

<link rel="stylesheet" href="{{ asset('/about/css/aos.css')}}">

<link rel="stylesheet" href="{{ asset('/about/css/ionicons.min.css')}}">

<link rel="stylesheet" href="{{ asset('/about/css/flaticon.css')}}">
<link rel="stylesheet" href="{{ asset('/about/css/icomoon.css')}}">
<link rel="stylesheet" href="{{ asset('/about/css/style.css')}}">
@endsection

@section('content')
<section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-5 col-lg-5 d-flex">
                <div class="img-about img d-flex align-items-stretch">
                    <div class="overlay"></div>
                    <div class="img d-flex align-self-stretch align-items-center" style="background-image:url(about/images/about.jpg);">
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-7 pl-md-5">
                <div class="row justify-content-start pb-3">
                    <div class="col-md-12 heading-section">
                        <ul class="about-info mt-4 px-md-0 px-2">
                            <li class="d-flex"><span>Name:</span> <span>Nguyễn Văn Thịnh</span></li>
                            <li class="d-flex"><span>Date of birth:</span> <span>01-01-1998</span></li>
                            <li class="d-flex"><span>Address:</span> <span>Phú Xuyên - Hà Nội</span></li>
                            <li class="d-flex"><span>Email:</span> <span>nguyenthinhhn98@gmail.com</span></li>
                            <li class="d-flex"><span>Phone: </span> <span>0342025533</span></li>
                        </ul>
                    </div>
                </div>
                <h2 class="heading">Education</h2>
                <div class="resume-wrap d-flex" style="margin-bottom: 0;">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-ideas"></span>
                    </div>
                    <div class=" pl-2">
                       <span class="date">2014-2015 Zent education</span>
                        <p>A small river named  regelialia.</p>
                        <p>A small river named  regelialia.</p>
                    </div>
                </div><br>
                <div class="resume-wrap d-flex" style="margin-bottom: 0;">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-ideas"></span>
                    </div>
                    <div class="text pl-2">
                        <span class="date">2014-2015 Zent education</span>
                        <p>A small river named  regelialia.</p>
                        <p>A small river named  regelialia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/golang.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/php3.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/lar.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/partner-3.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/front.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/vue.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
        </div>
    </div>
</section>

<section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-7 col-lg-7">
                <div class="row justify-content-start pb-3">
                    <div class="col-md-12 heading-section">
                        <ul class="about-info mt-4 px-md-0 px-2">
                            <li class="d-flex"><span>Name:</span> <span>Nguyễn Văn Thịnh</span></li>
                            <li class="d-flex"><span>Date of birth:</span> <span>01-01-1998</span></li>
                            <li class="d-flex"><span>Address:</span> <span>Phú Xuyên - Hà Nội</span></li>
                            <li class="d-flex"><span>Email:</span> <span>nguyenthinhhn98@gmail.com</span></li>
                            <li class="d-flex"><span>Phone: </span> <span>0342025533</span></li>
                        </ul>
                    </div>
                </div>
                <h2 class="heading">Education</h2>
                <div class="resume-wrap d-flex" style="margin-bottom: 0;">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-ideas"></span>
                    </div>
                    <div class=" pl-2">
                       <span class="date">2014-2015 Zent education</span>
                        <p>A small river named  regelialia.</p>
                        <p>A small river named  regelialia.</p>
                    </div>
                </div><br>
                <div class="resume-wrap d-flex" style="margin-bottom: 0;">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-ideas"></span>
                    </div>
                    <div class="text pl-2">
                        <span class="date">2014-2015 Zent education</span>
                        <p>A small river named  regelialia.</p>
                        <p>A small river named  regelialia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 d-flex">
                <div class="img-about img d-flex align-items-stretch">
                    <div class="overlay"></div>
                    <div class="img d-flex align-self-stretch align-items-center" style="background-image:url(about/images/about.jpg);">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/php3.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/golang.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/front.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/vue.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-sm">
                <a href="#" class="partner"><img src="{{ asset('/about/images/partner-3.png')}}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center">
                <h2 class="mb-4">Contact Me</h2>
            </div>
        </div>

        <div class="row d-flex contact-info mb-5">
            <div class="col-md-6 col-lg-4 d-flex">
                <div class="align-self-stretch box text-center p-4 shadow">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="icon-map-signs"></span>
                    </div>
                    <div>
                        <h3 class="mb-4">Address</h3>
                        <p>147 - Chiến Thắng - Tân Triều - Thanh trì </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex">
                <div class="align-self-stretch box text-center p-4 shadow">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="icon-phone2"></span>
                    </div>
                    <div>
                        <h3 class="mb-4">Contact Number</h3>
                        <p><a href="tel://1234567920">0342025533</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex">
                <div class="align-self-stretch box text-center p-4 shadow">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="icon-paper-plane"></span>
                    </div>
                    <div>
                        <h3 class="mb-4">Email Address</h3>
                        <p><a href="mailto:info@yoursite.com">nguyenthinhhn98@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row no-gutters block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form action="#" class="bg-light p-4 p-md-5 contact-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div class="img" style="background-image: url(about/images/about.jpg);"></div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
<script src="{{ asset('/about/js/jquery.min.js')}}"></script>
<script src="{{ asset('/about/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{ asset('/about/js/popper.min.js')}}"></script>
<script src="{{ asset('/about/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/about/js/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('/about/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('/about/js/jquery.stellar.min.js')}}"></script>
<script src="{{ asset('/about/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('/about/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('/about/js/aos.js')}}"></script>
<script src="{{ asset('/about/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{ asset('/about/js/scrollax.min.js')}}"></script>

<script src="{{ asset('/about/js/main.js')}}"></script>

@endsection
