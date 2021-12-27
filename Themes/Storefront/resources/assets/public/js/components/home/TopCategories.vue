<template>
    <section class="top-brands-wrap top-categories-wrap clearfix">
        <div class="container">
            <div class="top-categories clearfix">
                <a
                    v-for="(topCategory, index) in topCategories"
                    :key="index"
                    class="top-brand-image"
                >
                    <!-- :href="topCategory.url" -->

                    <span>
                        <!-- <img :src="topBrand.logo.path" alt="brand logo" /> -->
                        <i class="las la-stopwatch"></i>
                    </span>
                    <!-- <h6>{{topCategory.name}}</h6> -->
                    <h6>Accessories</h6>
                </a>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ["topCategories"],
};
</script>
