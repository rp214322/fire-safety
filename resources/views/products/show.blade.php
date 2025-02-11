@extends('layouts.app')
@section('content')
    <div class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{!! $product->name !!}</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <a href="{{ route('products.list') }}">Product</a>
                            <span>{!! $product->name !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="car-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="car__details__pic">
                        <div class="car__details__pic__large">
                            <img class="car-big-img" src="{{  $product->feature_image()->exists() ? $product->feature_image()->first()->file_url() : asset('front/img/no_image.png') }}" alt="">
                        </div>
                        <div class="car-thumbs">
                            <div class="car-thumbs-track car__thumb__slider owl-carousel">
                                {{-- @foreach ($product->gallery as $photo)
                                <div class="ct" data-imgbigurl="{{ $photo->file_url() }}"><img
                                        src="{{ $photo->file_url('thumb') }}" alt=""></div>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                    <div class="car__details__tab">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="car__details__tab__info">
                                    {!! $product->description !!}
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__model">
                            <ul>
                                <li>Price <span>₹{!! $product->price !!}</span></li>
                            </ul>
                            <a href="#InquiryModel" data-toggle="modal" data-target="#InquiryModel" class="primary-btn">Get Today Is Price</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade bs-example-modal-lg" id="InquiryModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="javascript:;" method="post" id="InquiryForm">
                    @csrf
                    <input type="hidden" name="product_id" value="{!! $product->id !!}">
                    @if(Auth::check())
                        <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                    @endif
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Place Your Inquiry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <div class="modal_form">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{!! Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' !!}" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{!! Auth::check() ? Auth::user()->email : '' !!}" required email>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{!! Auth::check() ? Auth::user()->phone : '' !!}" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" cols="30" rows="10" class="form-control" placeholder="description" required></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="javascript:;" type="submit" class="btn btn-primary place_inquiry">Submit</a>
                    </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".place_inquiry").on("click",function(e){
            var _f = jQuery("#InquiryForm");
            jQuery('#preloder, .loader').show();
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{!! route('product.inquiry') !!}",
                data: jQuery(_f).serialize(),
            })
            .done(function (data) {
                jQuery('#preloder, .loader').hide();
                jQuery("#InquiryModel").modal('hide');
            }).fail(function (error) {
                jQuery('#preloder, .loader').hide();
                jQuery(_f).find(".has-error").remove();
                var response = JSON.parse(error.responseText);
                $.each(error.responseJSON, function (key, value) {
                        var input = '[name=' + key + ']';
                        jQuery(_f).find(input).parent().find(".has-error").length == 0 ? jQuery(_f).find(input).parent().append("<span class='has-error'>"+ value +"</span>") : jQuery(_f).find(input).parent().find('.has-error').html(value);
                });
            });
        });
    });
</script>
@endsection
