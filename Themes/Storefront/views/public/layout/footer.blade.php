<footer class="footer-wrap">
    <div class="container">
        <div class="footer">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-5 col-md-8">
                        <div class="contact-us">
                            <a class="logo" href="{{ route('admin.dashboard.index') }}">
                                <img src="{{url('/images/logo.png')}}" width="75%" />
                            </a>
                            <p>
                                Asia Mobile Group started its journey in 2004 in order to provide a unique shopping experience
                            </p>
                            <!-- <h4 class="title">{{ trans('storefront::layout.contact_us') }}</h4> -->

                            <!-- <ul class="list-inline contact-info">
                                @if (setting('store_phone') && ! setting('store_phone_hide'))
                                    <li>
                                        <i class="las la-phone"></i>
                                        <span>{{ setting('store_phone') }}</span>
                                    </li>
                                @endif

                                @if (setting('store_email') && ! setting('store_email_hide'))
                                    <li>
                                        <i class="las la-envelope"></i>
                                        <span>{{ setting('store_email') }}</span>
                                    </li>
                                @endif

                                @if (setting('storefront_address'))
                                    <li>
                                        <i class="las la-map"></i>
                                        <span>{{ setting('storefront_address') }}</span>
                                    </li>
                                @endif
                            </ul> -->

                            @if (social_links()->isNotEmpty())
                            <ul class="list-inline social-links">
                                @foreach (social_links() as $icon => $socialLink)
                                <li>
                                    <a href="{{ $socialLink }}">
                                        <i class="{{ $icon }}"></i>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>

                    <div class="about col-lg-12 col-md-10">
                        <!-- <div class="col-lg-4 col-md-5"> -->
                        <div class="footer-links">
                            <h4 class="title">{{ trans('storefront::layout.my_account') }}</h4>

                            <ul class="list-inline">
                                <li>
                                    <a href="{{ route('account.dashboard.index') }}">
                                        {{ trans('storefront::account.pages.dashboard') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('account.orders.index') }}">
                                        {{ trans('storefront::account.pages.my_orders') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('account.reviews.index') }}">
                                        {{ trans('storefront::account.pages.my_reviews') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('account.profile.edit') }}">
                                        {{ trans('storefront::account.pages.my_profile') }}
                                    </a>
                                </li>

                                @auth
                                <li>
                                    <a href="{{ route('logout') }}">
                                        {{ trans('storefront::account.pages.logout') }}
                                    </a>
                                </li>
                                @endauth
                            </ul>
                        </div>
                        <!-- </div> -->

                        @if ($footerMenuOne->isNotEmpty())
                        <!-- <div class="col-lg-4 col-md-5"> -->
                        <div class="footer-links">
                            <h4 class="title">{{ setting('storefront_footer_menu_one_title') }}</h4>

                            <ul class="list-inline">
                                @foreach ($footerMenuOne as $menuItem)
                                <li>
                                    <a href="{{ $menuItem->url() }}" target="{{ $menuItem->target }}">
                                        {{ $menuItem->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- </div> -->
                        @endif

                        @if ($footerMenuTwo->isNotEmpty())
                        <!-- <div class="col-lg-4 col-md-5"> -->
                        <div class="footer-links">
                            <h4 class="title">{{ setting('storefront_footer_menu_two_title') }}</h4>

                            <ul class="list-inline">
                                @foreach ($footerMenuTwo as $menuItem)
                                <li>
                                    <a href="{{ $menuItem->url() }}" target="{{ $menuItem->target }}">
                                        {{ $menuItem->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- </div> -->
                        @endif

                        @if ($footerTags->isNotEmpty())
                        <!-- <div class="col-lg-4 col-md-7">
                            <div class="footer-links footer-tags">
                                <h4 class="title">{{ trans('storefront::layout.tags') }}</h4>

                                <ul class="list-inline">
                                    @foreach ($footerTags as $footerTag)
                                    <li>
                                        <a href="{{ $footerTag->url() }}">
                                            {{ $footerTag->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> -->
                        @endif
                    </div>
                </div>
            </div>

            <div class="footer-middle">
                <div class="row align-items-center">
                    <div class="phone-address">
                        <img src="{{url('/images/dial-no.png')}}" width="auto" />
                        <div>
                            <h5>0097137666586</h5>
                            <span>Working 24/7</span>
                        </div>
                    </div>
                    <div class="download">
                        <div class="content">
                            <a href="#">Download App On Mobile:</a>
                            <span>15% Discount On Your First Purchase</span>
                        </div>
                        <div>
                            <span>
                                <img src="{{url('/images/download.png')}}" width="auto" />
                            </span>
                            <span>
                                <img src="{{url('/images/download-link.png')}}" width="auto" />
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="row align-items-center">
                    <!-- <div class="col-md-9 col-sm-18"> -->
                    <div class="footer-text">
                        {!! $copyrightText !!}
                    </div>
                    <!-- </div> -->

                    <!-- <div class="col-md-9 col-sm-18"> -->
                    <div class="footer-text footer-terms">
                        <a href="#">Legal</a>
                        <a href="#">Privay Policy</a>
                        <a href="#">Terms And Conditions</a>
                    </div>
                    <!-- </div> -->
                    <!-- @if ($acceptedPaymentMethodsImage->exists)
                        <div class="col-md-9 col-sm-18">
                            <div class="footer-payment">
                                <img src="{{ $acceptedPaymentMethodsImage->path }}" alt="accepted payment methods">
                            </div>
                        </div>
                    @endif -->
                </div>
            </div>
        </div>
    </div>
</footer>
