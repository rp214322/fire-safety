@extends('layouts.app')

@section('content')
<section class="hero spad set-bg" style="height: 550px" data-setbg="{{ asset('images/fire-safety-banner.webp') }}"></section>

<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Best Services</span>
                    <h2>Our Fire Guard Solution</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services__item">
                    <img style="height: 84px" src="{{ asset('images/fireLogo.jpeg') }}" alt="Fire System Designing">
                    <h5>Fire System Designing</h5>
                    <p>The fire safety design is the means by which legal and client fire safety goals are delivered in practice.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="{{ asset('front/img/services/services-2.png') }}" alt="Installation">
                    <h5>Installation</h5>
                    <p>Ensuring fire safety during installation is vital. Implementing comprehensive measures is crucial for safeguarding the structure and its occupants.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="{{ asset('front/img/services/services-4.png') }}" alt="Support 24/7">
                    <h5>Support 24/7</h5>
                    <p>Regardless of the size and complexity of a building, a fire strategy plays a crucial part in demonstrating compliance with fire safety legislation.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="car spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Best Fire Guard Solution Product</h2>
                </div>
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Most Popular Fire Guard Product</li>
                </ul>
            </div>
        </div>
        <div class="row car-filter">
            @foreach (App\Models\Product::orderByDesc('created_at')->limit(3)->get() as $product)
                <div class="col-lg-4 col-md-6 col-sm-6 mix">
                    <div class="car__item">
                        <div class="car__item__pic__slider owl-carousel">
                            {{-- @foreach ($product->gallery as $photo)
                                <img src="{{ $photo->file_url('thumb') }}" alt="{{ $product->name }}">
                            @endforeach --}}
                        </div>
                        <div class="car__item__text">
                            <div class="car__item__text__inner">
                                <h5><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h5>
                            </div>
                            <div class="car__item__price">
                                <h6>₹{{ $product->price }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="chooseus spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="chooseus__text">
                    <div class="section-title">
                        <h2>Why People Choose Us</h2>
                        <p>We Provide the Best Basic Fire Prevention Solution</p>
                    </div>
                    <ul>
                        <li><i class="fa fa-check-circle"></i> Maintain heating equipment.</li>
                        <li><i class="fa fa-check-circle"></i> Stay cautious while cooking.</li>
                        <li><i class="fa fa-check-circle"></i> Handle candles with care.</li>
                        <li><i class="fa fa-check-circle"></i> Properly dispose of smoking materials.</li>
                        <li><i class="fa fa-check-circle"></i> Inspect electrical wiring regularly.</li>
                    </ul>
                    <a href="{{ route('about') }}" class="primary-btn">About Us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="chooseus__video set-bg">
        <img src="{{ asset('images/firevideo.jpg') }}" alt="Choose Us Video">
        <a href="https://youtube.com/watch?v=cnn-yvszLXE" class="play-btn video-popup"><i class="fa fa-play"></i></a>
    </div>
</section>
@endsection
