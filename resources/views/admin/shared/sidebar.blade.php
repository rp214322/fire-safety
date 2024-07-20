<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{!! route('admin.dashboard') !!}">
            <img src="{{ asset('images/fireLogo.jpeg') }}" alt="" class="dark-logo">
            <img src="{{ asset('images/fireLogo.jpeg') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{!! route('admin.dashboard') !!}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('admin.users.index') !!}" class="dropdown-toggle no-arrow">
                        <span class="micon fi-torsos-all"></span><span class="mtext">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="dropdown-toggle no-arrow">
                        <span class=" micon fa fa-modx"></span><span class="mtext">Product</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('admin.inquiries.index') !!}" class="dropdown-toggle no-arrow">
                        <span class="micon ti-headphone-alt"></span><span class="mtext">Inquiry</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('admin.feedbacks.index') !!}" class="dropdown-toggle no-arrow">
                        <span class="micon fa fa-handshake-o"></span><span class="mtext">Feedback</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
