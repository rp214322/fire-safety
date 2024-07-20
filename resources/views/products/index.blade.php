@extends('layouts.app')
@section('content')
<div class="breadcrumb-option set-bg" data-setbg="{{ asset('images/firesite2.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Product</h2>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="car__filter__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="car__filter__option__item">
                                    <h6>Show On Page</h6>
                                    <select id="perPage">
                                        <option value="{!! route('products.list',array_merge(request()->query(), ['per_page' => 10])) !!}" {!! $request->per_page == 10 ? 'selected' : '' !!}>10</option>
                                        <option value="{!! route('products.list',array_merge(request()->query(), ['per_page' => 50])) !!}" {!! $request->per_page == 50 ? 'selected' : '' !!}>50</option>
                                        <option value="{!! route('products.list',array_merge(request()->query(), ['per_page' => 100])) !!}" {!! $request->per_page == 100 ? 'selected' : '' !!}>100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="car__filter__option__item car__filter__option__item--right">
                                    <h6>Sort By</h6>
                                    <select id="sortBy">
                                        <option value="{!! route('products.list',array_merge(request()->query(), ['sort_by' => 'desc'])) !!}" {!! $request->sort_by == "DESC" ? 'selected' : '' !!}>Price: Highest Fist</option>
                                        <option value="{!! route('products.list',array_merge(request()->query(), ['sort_by' => 'asc'])) !!}" {!! $request->sort_by == "ASC" ? 'selected' : '' !!}>Price: Lowest Fist</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-4">
                                <div class="car__item">
                                    <div class="car__item__pic__slider owl-carousel">
                                        {{-- @foreach ($product->gallery as $photo)
                                            <img src="{{ $photo->file_url('thumb') }}" alt="">
                                        @endforeach --}}
                                    </div>
                                    <div class="car__item__text">
                                        <div class="car__item__text__inner">
                                            <h5><a href="{!! route('product.show',$product->slug) !!}">{!! $product->name !!}</a></h5>
                                            <ul>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
<script>
    jQuery(document).ready(function(){
        var filterSlider = $(".filter-price-range");
        filterSlider.slider({
            range: true,
            min: 1,
            max: 10000000,
            values: [2000000, 5000000],
            slide: function (event, ui) {
                $("#filterAmount").val("[ " + "₹" + ui.values[0] + " - ₹" + ui.values[1] + " ]");
            }
        });
        $("#filterAmount").val("[ " + "₹" + $(".filter-price-range").slider("values", 0) + " - ₹" + $(".filter-price-range").slider("values", 1) + " ]");

        jQuery("#perPage, #sortBy").on('change',function(){
            window.location.href = jQuery(this).val();
        });
    });
</script>
@endsection
