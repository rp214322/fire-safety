 <footer class="footer set-bg" data-setbg="{{ asset('front/img/footer-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('images/fireLogo.jpeg') }}" alt=""></a>
                        </div>
                        <p>Any questions? Let us know in office at 605, Titenium Square, Thaltej, Ahmedabad, Gujarat, India or call us
                            on +91 987 6589 635</p>
                        <div class="footer__social">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google"><i class="fa fa-google"></i></a>
                            <a href="#" class="skype"><i class="fa fa-skype"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="footer__brand">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Contact: +91 985 6589 632</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Email: ILifeFire@gmail.com</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Inquiry</a></li>
                            @if(Auth::check())
                                <li><a href="#FeedbackModel" data-toggle="modal" data-target="#FeedbackModel"><i class="fa fa-angle-right"></i>Feedback</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer__copyright__text">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="fa fa-fire" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">ILifeFire</a></p>
            </div>
        </div>
    </footer>
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="FeedbackModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="javascript:;" method="post" id="FeedbackForm">
                    @csrf
                    @if(Auth::check())
                        <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                    @endif
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Place Your Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <div class="modal_form">
                        <div class="form-group">
                            <div class="my-rating"></div>
                            <input type="hidden" name="rating" id="rateInput">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" cols="30" rows="10" class="form-control" placeholder="description" required></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="javascript:;" type="submit" class="btn btn-primary place_feedback">Submit</a>
                    </div>
                    </form>
            </div>
        </div>
    </div>
