@extends('layouts.app')
@section('content')
    <div class="breadcrumb-option set-bg" data-setbg="{{ asset('images/firesite2.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <h2>Let’s Work Together</h2>
                            <p>To make requests for further information, contact us via our social channels.</p>
                        </div>
                        <ul>
                            <li><span>Email</span> ILifeFire@gmail.com</li>
                            <li><span>Contact</span> +91 9865896636</li>
                        </ul>
                        <div class="section-title">
                            <h2>Our Office</h2>
                            <p>605, Titenium Square, Thaltej, Ahmedabad, Gujarat, India</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        @include('shared.flash')
                        <form action="{{ route('sendMail') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="phone" placeholder="Contact Number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="email" placeholder="Email" required email>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="subject" placeholder="Subject" required email>
                                </div>
                            </div>
                            <textarea placeholder="Your Question" name="description"></textarea>
                            <button type="submit" class="site-btn">Submit Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
