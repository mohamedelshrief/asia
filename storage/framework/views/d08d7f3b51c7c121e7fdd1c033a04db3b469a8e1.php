<?php if(setting('newsletter_enabled') && json_decode(Cookie::get('show_newsletter_popup', true))): ?>
    <newsletter-popup inline-template>
        <div class="modal newsletter-wrap fade">
            <div class="modal-dialog modal-dialog-centered" style="width: 500px !important">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="newsletter-inner">
                            <div class="card">
                                <div class="card-body" style="padding: 40px 20px">
                                        <h3>Currently Website In Beta Version. Appreciate your patience
                                            <br/>
                                            <span style="display: block;float:right">الموقع حاليا في النسخة التجريبية. أقدر صبرك
                                            </span>
                                            </h3>
                                        </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="las la-times"></i>
                            </button>
                            <!--div class="newsletter-left">
                                <h1 class="title">
                                    <?php echo e(trans('storefront::layout.subscribe_to_our_newsletter')); ?>

                                </h1>

                                <p class="sub-title">
                                    <?php echo e(trans('storefront::layout.subscribe_to_our_newsletter_subtitle')); ?>

                                </p>

                                <form @submit.prevent="subscribe" class="newsletter-form">
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            v-model="email"
                                            class="form-control"
                                            placeholder="<?php echo e(trans('storefront::layout.enter_your_email_address')); ?>"
                                        >

                                        <span class="error-message" v-if="error" v-text="error"></span>

                                        <button class="btn btn-primary btn-subscribe" v-if="subscribed">
                                            <i class="las la-check"></i>
                                            <?php echo e(trans('storefront::layout.subscribed')); ?>

                                        </button>

                                        <button
                                            class="btn btn-primary btn-subscribe"
                                            :class="{ 'btn-loading': subscribing }"
                                            v-else
                                        >
                                            <?php echo e(trans('storefront::layout.subscribe')); ?>

                                        </button>
                                    </div>

                                    <span class="error-message" v-if="error" v-text="error"></span>
                                </form>

                                <p class="info-text">
                                    <?php echo e(trans('storefront::layout.by_subscribing')); ?> <a href="<?php echo e($privacyPageUrl); ?>"><?php echo e(trans('storefront::layout.privacy_policy')); ?></a>
                                </p>

                                <div class="form-group newsletter-checkbox">
                                    <div class="form-check">
                                        <input type="checkbox" v-model="disable_popup" id="do_not_show_popup_again">

                                        <label for="do_not_show_popup_again" class="form-check-label">
                                            <?php echo e(trans('storefront::layout.don\'t_show_this_popup_again')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="newsletter-right" style="background-image: url(<?php echo e($newsletterBgImage); ?>)"></div>

                            <button type="button" class="close" data-dismiss="modal">
                                <i class="las la-times"></i>
                            </button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </newsletter-popup>
<?php endif; ?>
<?php /**PATH /var/www/html/asiamp/Themes/Storefront/views/public/layout/newsletter_popup.blade.php ENDPATH**/ ?>