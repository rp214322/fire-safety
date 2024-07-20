@extends('layouts.app')
@section('content')
<div class="breadcrumb-option set-bg" data-setbg="{{ asset('images/firesite2.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Our Services</h2>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Our Services</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services__item">
                    <img style="height: 84px" src="{{ asset('images/fireLogo.jpeg') }}" alt="">
                    <h5>Fire System Designing</h5>
                    <p>The fire safety design is the means by which legal and client fire safety goals are delivered in practice.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="{{ asset('front/img/services/services-2.png') }}" alt="">
                    <h5>Installation</h5>
                    <p>Ensuring fire safety during Installation is vital. Implementing comprehensive measures is crucial for safeguarding the structure and its occupants.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="{{ asset('front/img/services/services-4.png') }}" alt="">
                    <h5>Support 24/7</h5>
                    <p>Regardless of the size and complexity of a building, a fire strategy has a crucial part to play in demonstrating compliance with fire safety legislation.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services__item">
                    <img style="height: 84px" src="{{ asset('images/fireLogo.jpeg') }}" alt="">
                    <h5>Construction</h5>
                    <p>Ensuring fire safety during construction is vital. Implementing comprehensive measures is crucial for safeguarding the structure and its occupants.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services__item">
                    <img style="height: 84px" src="{{ asset('images/fireLogo.jpeg') }}" alt="">
                    <h5>Fire Risk Assessment</h5>
                    <p>A fire risk assessment is a process of identifying fire hazards and evaluating the risks to people, property, assets and environment arising from them.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="services__item">
                    <img style="height: 84px" src="{{ asset('images/fireLogo.jpeg') }}" alt="">
                    <h5>Audits</h5>
                    <p>Audit is the most essential part of the any system to check the functionality and adequacy to meet the goals with respective focused area.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
