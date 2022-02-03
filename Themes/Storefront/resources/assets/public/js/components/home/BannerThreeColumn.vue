<template>
    <section class="banner-wrap three-column-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a
                        :href="data.banner_1.call_to_action_url"
                        class="banner"
                        :target="
                            data.banner_1.open_in_new_window
                                ? '_blank'
                                : '_self'
                        "
                    >
                        <div class="banner-content">
                            <span>
                                <h6>Shop From Wide Range Of</h6>
                                <h3>Graphic Cards</h3>
                                {{ $trans('storefront::product_card.available') }}
                            </span>
                            <button class="banner-btn">Shop Now</button>
                        </div>
                        <div style=" backgroundImage: `url(${data.banner_1.image.path})` "></div>
                        <img :src="data.banner_1.image.path" alt="banner" />
                    </a>
                </div>

                <div class="col-md-6">
                    <a
                        :href="data.banner_2.call_to_action_url"
                        class="banner"
                        :target="
                            data.banner_2.open_in_new_window
                                ? '_blank'
                                : '_self'
                        "
                    >
                        <div class="banner-content">
                            <span>
                                <h6>Never run out of</h6>
                                <h3>Storage</h3>
                            </span>
                            <button class="banner-btn">Shop Now</button>
                        </div>
                        <img :src="data.banner_2.image.path" alt="banner" />
                    </a>
                </div>

                <div class="col-md-6">
                    <a
                        :href="data.banner_3.call_to_action_url"
                        class="banner"
                        :target="
                            data.banner_3.open_in_new_window
                                ? '_blank'
                                : '_self'
                        "
                    >
                        <div class="banner-content">
                            <span>
                                <h6>Make A Statement</h6>
                                <h3>Iphone</h3>
                            </span>
                            <button class="banner-btn">Shop Now</button>
                        </div>
                        <img :src="data.banner_3.image.path" alt="banner" />
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ["data"],
};
</script>
