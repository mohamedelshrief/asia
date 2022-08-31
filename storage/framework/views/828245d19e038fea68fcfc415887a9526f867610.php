<?php $__env->startSection('title', setting('store_tagline')); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->renderUnless(is_null($slider), 'public.home.sections.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <?php if(setting('storefront_features_section_enabled')): ?>
        <home-features :features="<?php echo e(json_encode($features)); ?>"></home-features>
    <?php endif; ?>

    <?php if(setting('storefront_three_column_banners_enabled')): ?>

        <section class="banner-wrap three-column-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <a
                            href='<?php echo e($threeColumnBanners["banner_1"]->call_to_action_url); ?>'
                            class="banner"
                            target="_self"
                        >
                            <div class="banner-content">
                                <span>
                                    <h6><?php echo e(trans('account::attributes.home.shop_from_wide_range_of')); ?></h6>
                                    <h3><?php echo e(trans('account::attributes.home.graphic_cards')); ?></h3>
                                </span>
                                <button class="banner-btn"><?php echo e(trans('account::attributes.home.shop_now')); ?></button>
                            </div>
                            <div style="backgroundImage: `url(<?php echo e($threeColumnBanners["banner_1"]->image->path); ?>)` "></div>
                            <img src="<?php echo e($threeColumnBanners["banner_1"]->image->path); ?>" alt="banner" />
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a
                            href='<?php echo e($threeColumnBanners["banner_2"]->call_to_action_url); ?>'
                            class="banner"
                            target="_self"
                        >
                            <div class="banner-content">
                                <span>
                                    <h6><?php echo e(trans('account::attributes.home.never_run_out_of')); ?></h6>
                                    <h3><?php echo e(trans('account::attributes.home.storage')); ?></h3>
                                </span>
                                <button class="banner-btn"><?php echo e(trans('account::attributes.home.shop_now')); ?></button>
                            </div>
                            <div style="backgroundImage: `url(<?php echo e($threeColumnBanners["banner_2"]->image->path); ?>)` "></div>
                            <img src="<?php echo e($threeColumnBanners["banner_2"]->image->path); ?>" alt="banner" />
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a
                            href='<?php echo e($threeColumnBanners["banner_3"]->call_to_action_url); ?>'
                            class="banner"
                            target="_self"
                        >
                            <div class="banner-content">
                                <span>
                                    <h6><?php echo e(trans('account::attributes.home.make_a_statement')); ?></h6>
                                    <h3><?php echo e(trans('account::attributes.home.iphone')); ?></h3>
                                </span>
                                <button class="banner-btn"><?php echo e(trans('account::attributes.home.shop_now')); ?></button>
                            </div>
                            <div style="backgroundImage: `url(<?php echo e($threeColumnBanners["banner_3"]->image->path); ?>)` "></div>
                            <img src="<?php echo e($threeColumnBanners["banner_3"]->image->path); ?>" alt="banner" />
                        </a>
                    </div>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(setting('storefront_product_tabs_2_section_enabled')): ?>
        <product-tabs-two :data="<?php echo e(json_encode($tabProductsTwo)); ?>"></product-tabs-two>
    <?php endif; ?>

    <?php if(setting('storefront_top_brands_section_enabled')): ?>
        <top-categories :top-categories="<?php echo e(json_encode($topBrands)); ?>"></top-categories>
    <?php endif; ?>

    <!-- <?php if(setting('storefront_featured_categories_section_enabled')): ?>
        <featured-categories :data="<?php echo e(json_encode($featuredCategories)); ?>"></featured-categories>
    <?php endif; ?> -->

    <?php if(setting('storefront_one_column_banner_enabled')): ?>
        <!-- <banner-one-column :banner="<?php echo e(json_encode($oneColumnBanner)); ?>"></banner-one-column>-->
        <section class="banner-wrap one-column-banner">
            <div class="container">
                <a
                    href="<?php echo e($oneColumnBanner->call_to_action_url); ?>"
                    class="banner"
                    target="_self"
                >
                    <div class='banner-content'>
                        <h2><?php echo e(trans('account::attributes.home.oneColumnText')); ?></h2>
                        <button>
                            <span><?php echo e(trans('account::attributes.home.starting_at')); ?></span>
                            <span>AED 79<sup>99</sup></span>
                        </button>
                    </div>
                    <img src="<?php echo e($oneColumnBanner->image->path); ?>" alt="banner" />
                </a>
            </div>
        </section>
    <?php endif; ?>

    <!-- <?php if(setting('storefront_featured_categories_section_enabled')): ?>
        <featured-categories :data="<?php echo e(json_encode($featuredCategories)); ?>"></featured-categories>
    <?php endif; ?> -->

    <!-- <?php if(setting('storefront_two_column_banners_enabled')): ?>
        <banner-two-column :data="<?php echo e(json_encode($twoColumnBanners)); ?>"></banner-two-column>
    <?php endif; ?> -->

    <!-- <?php if(setting('storefront_three_column_full_width_banners_enabled')): ?>
        <banner-three-column-full-width :data="<?php echo e(json_encode($threeColumnFullWidthBanners)); ?>"></banner-three-column-full-width>
    <?php endif; ?> -->

    <?php if(setting('storefront_product_tabs_1_section_enabled')): ?>
        <product-tabs-one :data="<?php echo e(json_encode($productTabsOne)); ?>"></product-tabs-one>
    <?php endif; ?>


    <?php if(setting('storefront_two_column_banners_enabled')): ?>
        <!--<banner-two-column :data="<?php echo e(json_encode($twoColumnBanners)); ?>"></banner-two-column>-->
        <section class="banner-wrap two-column-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <a href="<?php echo e($twoColumnBanners["banner_1"]->call_to_action_url); ?>"
                            class="banner"
                            target="_self">
                            <div class="banner-content">
                                <h3><?php echo e(trans('account::attributes.home.twoBanner_text_1')); ?>

                                </h3>
                                <h6><?php echo e(trans('account::attributes.home.twoBanner_text_2')); ?></h6>
                            </div>
                            <img src="<?php echo e($twoColumnBanners["banner_1"]->image->path); ?>" alt="banner" />
                        </a>
                    </div>

                    <div
                        class="col-md-9"
                        style="display: flex; align-items: flex-end"
                    >
                        <a
                            href="<?php echo e($twoColumnBanners["banner_2"]->call_to_action_url); ?>"
                            class="banner"
                            target="_self"
                        >
                        <div class="banner-content">
                            <h3><?php echo e(trans('account::attributes.home.twoBanner_text_3')); ?>

                            </h3>
                            <h6><?php echo e(trans('account::attributes.home.twoBanner_text_4')); ?></h6>
                        </div>
                            <img src="<?php echo e($twoColumnBanners["banner_2"]->image->path); ?>" alt="banner" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(setting('storefront_product_grid_section_enabled')): ?>
        <product-grid :data="<?php echo e(json_encode($productGrid)); ?>"></product-grid>
    <?php endif; ?>




    <?php if(setting('storefront_flash_sale_and_vertical_products_section_enabled')): ?>
        <flash-sale-and-vertical-products :data="<?php echo e(json_encode($flashSaleAndVerticalProducts)); ?>"></flash-sale-and-vertical-products>
    <?php endif; ?>

    <?php if(setting('storefront_top_brands_section_enabled') && $topBrands->isNotEmpty()): ?>
        <top-brands :top-brands="<?php echo e(json_encode($topBrands)); ?>"></top-brands>
    <?php endif; ?>

    <?php if(setting('storefront_three_column_banners_enabled')): ?>
    <section class="banner-wrap three-column-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a
                        href='<?php echo e($threeColumnBanners["banner_1"]->call_to_action_url); ?>'
                        class="banner"
                        target="_self"
                    >
                        <div class="banner-content">
                            <span>
                                <h6><?php echo e(trans('account::attributes.home.shop_from_wide_range_of')); ?></h6>
                                <h3><?php echo e(trans('account::attributes.home.graphic_cards')); ?></h3>
                            </span>
                            <button class="banner-btn"><?php echo e(trans('account::attributes.home.shop_now')); ?></button>
                        </div>
                        <div style="backgroundImage: `url(<?php echo e($threeColumnBanners["banner_1"]->image->path); ?>)` "></div>
                        <img src="<?php echo e($threeColumnBanners["banner_1"]->image->path); ?>" alt="banner" />
                    </a>
                </div>
                <div class="col-md-6">
                    <a
                        href='<?php echo e($threeColumnBanners["banner_2"]->call_to_action_url); ?>'
                        class="banner"
                        target="_self"
                    >
                        <div class="banner-content">
                            <span>
                                <h6><?php echo e(trans('account::attributes.home.never_run_out_of')); ?></h6>
                                <h3><?php echo e(trans('account::attributes.home.storage')); ?></h3>
                            </span>
                            <button class="banner-btn"><?php echo e(trans('account::attributes.home.shop_now')); ?></button>
                        </div>
                        <div style="backgroundImage: `url(<?php echo e($threeColumnBanners["banner_2"]->image->path); ?>)` "></div>
                        <img src="<?php echo e($threeColumnBanners["banner_2"]->image->path); ?>" alt="banner" />
                    </a>
                </div>

                <div class="col-md-6">
                    <a
                        href='<?php echo e($threeColumnBanners["banner_3"]->call_to_action_url); ?>'
                        class="banner"
                        target="_self"
                    >
                        <div class="banner-content">
                            <span>
                                <h6><?php echo e(trans('account::attributes.home.make_a_statement')); ?></h6>
                                <h3><?php echo e(trans('account::attributes.home.iphone')); ?></h3>
                            </span>
                            <button class="banner-btn"><?php echo e(trans('account::attributes.home.shop_now')); ?></button>
                        </div>
                        <div style="backgroundImage: `url(<?php echo e($threeColumnBanners["banner_3"]->image->path); ?>)` "></div>
                        <img src="<?php echo e($threeColumnBanners["banner_3"]->image->path); ?>" alt="banner" />
                    </a>
                </div>

            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- <?php if(setting('storefront_three_column_full_width_banners_enabled')): ?>
        <banner-three-column-full-width :data="<?php echo e(json_encode($threeColumnFullWidthBanners)); ?>"></banner-three-column-full-width>
    <?php endif; ?> -->

    <!-- <?php if(setting('storefront_two_column_banners_enabled')): ?>
        <banner-two-column :data="<?php echo e(json_encode($twoColumnBanners)); ?>"></banner-two-column>
    <?php endif; ?> -->


    <!-- <?php if(setting('storefront_three_column_banners_enabled')): ?>
        <banner-three-column :data="<?php echo e(json_encode($threeColumnBanners)); ?>"></banner-three-column>
    <?php endif; ?> -->


    <!-- <?php if(setting('storefront_one_column_banner_enabled')): ?>
        <banner-one-column :banner="<?php echo e(json_encode($oneColumnBanner)); ?>"></banner-one-column>
    <?php endif; ?> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/amp/Themes/Storefront/views/public/home/index.blade.php ENDPATH**/ ?>