<template>
    <section class="banner-wrap one-column-banner">
        <div class="container">
            <a
                :href="banner.call_to_action_url"
                class="banner"
                :target="banner.open_in_new_window ? '_blank' : '_self'"
            >
                <div class='banner-content'>
                    <h2>Shop And Save <span>Save Big</span> On Hottest Tablets</h2>
                    <button>
                        <span>Starting At</span>
                        <span><i class="fas fa-dollar-sign"></i>79<sup>99</sup></span>
                    </button>
                </div>
                <img :src="banner.image.path" alt="banner" />
            </a>
        </div>
    </section>
</template>

<script>
export default {
    props: ["banner"],
};
</script>
