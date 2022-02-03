@extends('public.layout')

@section('title', setting('store_tagline'))

@section('content')
    @includeUnless(is_null($slider), 'public.home.sections.slider')

    @if (setting('storefront_features_section_enabled'))
        <home-features :features="{{ json_encode($features) }}"></home-features>
    @endif

    @if (setting('storefront_three_column_banners_enabled'))

        <section class="banner-wrap three-column-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <a
                            href='{{$threeColumnBanners["banner_1"]->call_to_action_url}}'
                            class="banner"
                            target="_self"
                        >
                            <div class="banner-content">
                                <span>
                                    <h6>{{ trans('account::attributes.home.shop_from_wide_range_of') }}</h6>
                                    <h3>{{ trans('account::attributes.home.graphic_cards') }}</h3>
                                </span>
                                <button class="banner-btn">{{ trans('account::attributes.home.shop_now') }}</button>
                            </div>
                            <div style="backgroundImage: `url({{$threeColumnBanners["banner_1"]->image->path}})` "></div>
                            <img src="{{$threeColumnBanners["banner_1"]->image->path}}" alt="banner" />
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a
                            href='{{$threeColumnBanners["banner_2"]->call_to_action_url}}'
                            class="banner"
                            target="_self"
                        >
                            <div class="banner-content">
                                <span>
                                    <h6>{{ trans('account::attributes.home.never_run_out_of') }}</h6>
                                    <h3>{{ trans('account::attributes.home.storage') }}</h3>
                                </span>
                                <button class="banner-btn">{{ trans('account::attributes.home.shop_now') }}</button>
                            </div>
                            <div style="backgroundImage: `url({{$threeColumnBanners["banner_2"]->image->path}})` "></div>
                            <img src="{{$threeColumnBanners["banner_2"]->image->path}}" alt="banner" />
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a
                            href='{{$threeColumnBanners["banner_3"]->call_to_action_url}}'
                            class="banner"
                            target="_self"
                        >
                            <div class="banner-content">
                                <span>
                                    <h6>{{ trans('account::attributes.home.make_a_statement') }}</h6>
                                    <h3>{{ trans('account::attributes.home.iphone') }}</h3>
                                </span>
                                <button class="banner-btn">{{ trans('account::attributes.home.shop_now') }}</button>
                            </div>
                            <div style="backgroundImage: `url({{$threeColumnBanners["banner_3"]->image->path}})` "></div>
                            <img src="{{$threeColumnBanners["banner_3"]->image->path}}" alt="banner" />
                        </a>
                    </div>

                </div>
            </div>
        </section>
    @endif


    @if (setting('storefront_top_brands_section_enabled'))
        <top-categories :top-categories="{{ json_encode($topBrands) }}"></top-categories>
    @endif

    <!-- @if (setting('storefront_featured_categories_section_enabled'))
        <featured-categories :data="{{ json_encode($featuredCategories) }}"></featured-categories>
    @endif -->

    @if (setting('storefront_one_column_banner_enabled'))
        <!-- <banner-one-column :banner="{{ json_encode($oneColumnBanner) }}"></banner-one-column>-->
        <section class="banner-wrap one-column-banner">
            <div class="container">
                <a
                    href="{{$oneColumnBanner->call_to_action_url}}"
                    class="banner"
                    target="_self"
                >
                    <div class='banner-content'>
                        <h2>{{ trans('account::attributes.home.oneColumnText') }}</h2>
                        <button>
                            <span>{{ trans('account::attributes.home.starting_at') }}</span>
                            <span>AED 79<sup>99</sup></span>
                        </button>
                    </div>
                    <img src="{{$oneColumnBanner->image->path}}" alt="banner" />
                </a>
            </div>
        </section>
    @endif

    <!-- @if (setting('storefront_featured_categories_section_enabled'))
        <featured-categories :data="{{ json_encode($featuredCategories) }}"></featured-categories>
    @endif -->

    <!-- @if (setting('storefront_two_column_banners_enabled'))
        <banner-two-column :data="{{ json_encode($twoColumnBanners) }}"></banner-two-column>
    @endif -->

    <!-- @if (setting('storefront_three_column_full_width_banners_enabled'))
        <banner-three-column-full-width :data="{{ json_encode($threeColumnFullWidthBanners) }}"></banner-three-column-full-width>
    @endif -->

    @if (setting('storefront_product_tabs_1_section_enabled'))
        <product-tabs-one :data="{{ json_encode($productTabsOne) }}"></product-tabs-one>
    @endif

    @if (setting('storefront_two_column_banners_enabled'))
        <!--<banner-two-column :data="{{ json_encode($twoColumnBanners) }}"></banner-two-column>-->
        <section class="banner-wrap two-column-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <a href="{{$twoColumnBanners["banner_1"]->call_to_action_url}}"
                            class="banner"
                            target="_self">
                            <div class="banner-content">
                                <h3>{{ trans('account::attributes.home.twoBanner_text_1') }}
                                </h3>
                                <h6>{{ trans('account::attributes.home.twoBanner_text_2') }}</h6>
                            </div>
                            <img src="{{$twoColumnBanners["banner_1"]->image->path}}" alt="banner" />
                        </a>
                    </div>

                    <div
                        class="col-md-9"
                        style="display: flex; align-items: flex-end"
                    >
                        <a
                            href="{{$twoColumnBanners["banner_2"]->call_to_action_url}}"
                            class="banner"
                            target="_self"
                        >
                        <div class="banner-content">
                            <h3>{{ trans('account::attributes.home.twoBanner_text_3') }}
                            </h3>
                            <h6>{{ trans('account::attributes.home.twoBanner_text_4') }}</h6>
                        </div>
                            <img src="{{$twoColumnBanners["banner_2"]->image->path}}" alt="banner" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (setting('storefront_product_grid_section_enabled'))
        <product-grid :data="{{ json_encode($productGrid) }}"></product-grid>
    @endif

    @if (setting('storefront_product_tabs_2_section_enabled'))
        <product-tabs-two :data="{{ json_encode($tabProductsTwo) }}"></product-tabs-two>
    @endif

    @if (setting('storefront_flash_sale_and_vertical_products_section_enabled'))
        <flash-sale-and-vertical-products :data="{{ json_encode($flashSaleAndVerticalProducts) }}"></flash-sale-and-vertical-products>
    @endif

    @if (setting('storefront_top_brands_section_enabled') && $topBrands->isNotEmpty())
        <top-brands :top-brands="{{ json_encode($topBrands) }}"></top-brands>
    @endif

    @if (setting('storefront_three_column_banners_enabled'))
    <section class="banner-wrap three-column-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a
                        href='{{$threeColumnBanners["banner_1"]->call_to_action_url}}'
                        class="banner"
                        target="_self"
                    >
                        <div class="banner-content">
                            <span>
                                <h6>{{ trans('account::attributes.home.shop_from_wide_range_of') }}</h6>
                                <h3>{{ trans('account::attributes.home.graphic_cards') }}</h3>
                            </span>
                            <button class="banner-btn">{{ trans('account::attributes.home.shop_now') }}</button>
                        </div>
                        <div style="backgroundImage: `url({{$threeColumnBanners["banner_1"]->image->path}})` "></div>
                        <img src="{{$threeColumnBanners["banner_1"]->image->path}}" alt="banner" />
                    </a>
                </div>
                <div class="col-md-6">
                    <a
                        href='{{$threeColumnBanners["banner_2"]->call_to_action_url}}'
                        class="banner"
                        target="_self"
                    >
                        <div class="banner-content">
                            <span>
                                <h6>{{ trans('account::attributes.home.never_run_out_of') }}</h6>
                                <h3>{{ trans('account::attributes.home.storage') }}</h3>
                            </span>
                            <button class="banner-btn">{{ trans('account::attributes.home.shop_now') }}</button>
                        </div>
                        <div style="backgroundImage: `url({{$threeColumnBanners["banner_2"]->image->path}})` "></div>
                        <img src="{{$threeColumnBanners["banner_2"]->image->path}}" alt="banner" />
                    </a>
                </div>

                <div class="col-md-6">
                    <a
                        href='{{$threeColumnBanners["banner_3"]->call_to_action_url}}'
                        class="banner"
                        target="_self"
                    >
                        <div class="banner-content">
                            <span>
                                <h6>{{ trans('account::attributes.home.make_a_statement') }}</h6>
                                <h3>{{ trans('account::attributes.home.iphone') }}</h3>
                            </span>
                            <button class="banner-btn">{{ trans('account::attributes.home.shop_now') }}</button>
                        </div>
                        <div style="backgroundImage: `url({{$threeColumnBanners["banner_3"]->image->path}})` "></div>
                        <img src="{{$threeColumnBanners["banner_3"]->image->path}}" alt="banner" />
                    </a>
                </div>

            </div>
        </div>
    </section>
    @endif
    <!-- @if (setting('storefront_three_column_full_width_banners_enabled'))
        <banner-three-column-full-width :data="{{ json_encode($threeColumnFullWidthBanners) }}"></banner-three-column-full-width>
    @endif -->

    <!-- @if (setting('storefront_two_column_banners_enabled'))
        <banner-two-column :data="{{ json_encode($twoColumnBanners) }}"></banner-two-column>
    @endif -->

    <!-- @if (setting('storefront_product_grid_section_enabled'))
        <product-grid :data="{{ json_encode($productGrid) }}"></product-grid>
    @endif -->

    <!-- @if (setting('storefront_three_column_banners_enabled'))
        <banner-three-column :data="{{ json_encode($threeColumnBanners) }}"></banner-three-column>
    @endif -->

    <!-- @if (setting('storefront_product_tabs_2_section_enabled'))
        <product-tabs-two :data="{{ json_encode($tabProductsTwo) }}"></product-tabs-two>
    @endif -->

    <!-- @if (setting('storefront_one_column_banner_enabled'))
        <banner-one-column :banner="{{ json_encode($oneColumnBanner) }}"></banner-one-column>
    @endif -->
@endsection
