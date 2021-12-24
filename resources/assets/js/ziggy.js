    var Ziggy = {
        namedRoutes: {"debugbar.openhandler":{"uri":"_debugbar\/open","methods":["GET","HEAD"],"domain":null},"debugbar.clockwork":{"uri":"_debugbar\/clockwork\/{id}","methods":["GET","HEAD"],"domain":null},"debugbar.assets.css":{"uri":"_debugbar\/assets\/stylesheets","methods":["GET","HEAD"],"domain":null},"debugbar.assets.js":{"uri":"_debugbar\/assets\/javascript","methods":["GET","HEAD"],"domain":null},"debugbar.cache.delete":{"uri":"_debugbar\/cache\/{key}\/{tags?}","methods":["DELETE"],"domain":null},"bone.captcha.image":{"uri":"captcha\/image","methods":["GET","HEAD"],"domain":null},"bone.captcha.image.tag":{"uri":"captcha\/image_tag","methods":["GET","HEAD"],"domain":null},"install.pre_installation":{"uri":"install\/pre-installation","methods":["GET","HEAD"],"domain":null},"install.configuration.show":{"uri":"install\/configuration","methods":["GET","HEAD"],"domain":null},"install.configuration.post":{"uri":"install\/configuration","methods":["POST"],"domain":null},"install.complete":{"uri":"install\/complete","methods":["GET","HEAD"],"domain":null},"license.create":{"uri":"license","methods":["GET","HEAD"],"domain":null},"license.store":{"uri":"license","methods":["POST"],"domain":null},"account.dashboard.index":{"uri":"account","methods":["GET","HEAD"],"domain":null},"account.profile.edit":{"uri":"account\/profile","methods":["GET","HEAD"],"domain":null},"account.profile.update":{"uri":"account\/profile","methods":["PUT"],"domain":null},"account.orders.index":{"uri":"account\/orders","methods":["GET","HEAD"],"domain":null},"account.orders.show":{"uri":"account\/orders\/{id}","methods":["GET","HEAD"],"domain":null},"account.downloads.index":{"uri":"account\/downloads","methods":["GET","HEAD"],"domain":null},"account.downloads.show":{"uri":"account\/downloads\/{id}","methods":["GET","HEAD"],"domain":null},"account.wishlist.index":{"uri":"account\/wishlist","methods":["GET","HEAD"],"domain":null},"account.reviews.index":{"uri":"account\/reviews","methods":["GET","HEAD"],"domain":null},"account.addresses.index":{"uri":"addresses","methods":["GET","HEAD"],"domain":null},"account.addresses.store":{"uri":"addresses","methods":["POST"],"domain":null},"account.addresses.update":{"uri":"addresses\/{id}","methods":["PUT"],"domain":null},"account.addresses.destroy":{"uri":"addresses\/{id}","methods":["DELETE"],"domain":null},"account.change_default_address":{"uri":"addresses\/change-default-address","methods":["POST"],"domain":null},"brands.index":{"uri":"brands","methods":["GET","HEAD"],"domain":null},"brands.products.index":{"uri":"brands\/{brand}\/products","methods":["GET","HEAD"],"domain":null},"cart.index":{"uri":"cart","methods":["GET","HEAD"],"domain":null},"cart.items.store":{"uri":"cart\/items","methods":["POST"],"domain":null},"cart.items.update":{"uri":"cart\/items\/{cartItemId}","methods":["PUT"],"domain":null},"cart.items.destroy":{"uri":"cart\/items\/{cartItemId}","methods":["DELETE"],"domain":null},"cart.clear.store":{"uri":"cart\/clear","methods":["POST"],"domain":null},"cart.shipping_method.store":{"uri":"cart\/shipping-method","methods":["POST"],"domain":null},"cart.cross_sell_products.index":{"uri":"cart\/cross-sell-products","methods":["GET","HEAD"],"domain":null},"categories.index":{"uri":"categories","methods":["GET","HEAD"],"domain":null},"categories.products.index":{"uri":"categories\/{category}\/products","methods":["GET","HEAD"],"domain":null},"checkout.create":{"uri":"checkout","methods":["GET","HEAD"],"domain":null},"checkout.store":{"uri":"checkout","methods":["POST"],"domain":null},"checkout.complete.store":{"uri":"checkout\/{orderId}\/complete","methods":["GET","HEAD"],"domain":null},"checkout.complete.show":{"uri":"checkout\/complete","methods":["GET","HEAD"],"domain":null},"checkout.payment_canceled.store":{"uri":"checkout\/{orderId}\/payment-canceled","methods":["GET","HEAD"],"domain":null},"compare.index":{"uri":"compare","methods":["GET","HEAD"],"domain":null},"compare.store":{"uri":"compare","methods":["POST"],"domain":null},"compare.destroy":{"uri":"compare\/{productId}","methods":["DELETE"],"domain":null},"compare.related_products.index":{"uri":"compare\/related-products","methods":["GET","HEAD"],"domain":null},"contact.create":{"uri":"contact","methods":["GET","HEAD"],"domain":null},"contact.store":{"uri":"contact","methods":["POST"],"domain":null},"cart.coupon.store":{"uri":"cart\/coupon","methods":["POST"],"domain":null},"cart.coupon.destroy":{"uri":"cart\/coupon","methods":["DELETE"],"domain":null},"current_currency.store":{"uri":"current-currency\/{code}","methods":["GET","HEAD"],"domain":null},"subscribers.store":{"uri":"subscribers","methods":["POST"],"domain":null},"home":{"uri":"\/","methods":["GET","HEAD"],"domain":null},"products.index":{"uri":"products","methods":["GET","HEAD"],"domain":null},"products.show":{"uri":"products\/{slug}","methods":["GET","HEAD"],"domain":null},"suggestions.index":{"uri":"suggestions","methods":["GET","HEAD"],"domain":null},"products.price.show":{"uri":"products\/{id}\/price","methods":["POST"],"domain":null},"products.reviews.index":{"uri":"products\/{productId}\/reviews","methods":["GET","HEAD"],"domain":null},"products.reviews.store":{"uri":"products\/{productId}\/reviews","methods":["POST"],"domain":null},"countries.states.index":{"uri":"countries\/{code}\/states","methods":["GET","HEAD"],"domain":null},"tags.products.index":{"uri":"tags\/{tag}\/products","methods":["GET","HEAD"],"domain":null},"cart.taxes.store":{"uri":"cart\/taxes","methods":["POST"],"domain":null},"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"login.post":{"uri":"login","methods":["POST"],"domain":null},"login.redirect":{"uri":"login\/{provider}","methods":["GET","HEAD"],"domain":null},"login.callback":{"uri":"login\/{provider}\/callback","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["GET","HEAD"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"register.post":{"uri":"register","methods":["POST"],"domain":null},"reset":{"uri":"password\/reset","methods":["GET","HEAD"],"domain":null},"reset.post":{"uri":"password\/reset","methods":["POST"],"domain":null},"reset.complete":{"uri":"password\/reset\/{email}\/{code}","methods":["GET","HEAD"],"domain":null},"reset.complete.post":{"uri":"password\/reset\/{email}\/{code}","methods":["POST"],"domain":null},"wishlist.store":{"uri":"wishlist","methods":["POST"],"domain":null},"wishlist.destroy":{"uri":"wishlist\/{productId}","methods":["DELETE"],"domain":null},"wishlist.products.index":{"uri":"wishlist\/products","methods":["GET","HEAD"],"domain":null},"storefront.featured_category_products.index":{"uri":"storefront\/featured-categories\/{categoryNumber}\/products","methods":["GET","HEAD"],"domain":null},"storefront.tab_products.index":{"uri":"storefront\/tab-products\/sections\/{sectionNumber}\/tabs\/{tabNumber}","methods":["GET","HEAD"],"domain":null},"storefront.product_grid.index":{"uri":"storefront\/product-grid\/tabs\/{tabNumber}","methods":["GET","HEAD"],"domain":null},"storefront.flash_sale_products.index":{"uri":"storefront\/flash-sale-products","methods":["GET","HEAD"],"domain":null},"storefront.vertical_products.index":{"uri":"storefront\/vertical-products\/{columnNumber}","methods":["GET","HEAD"],"domain":null},"storefront.newsletter_popup.store":{"uri":"storefront\/newsletter-popup","methods":["POST"],"domain":null},"storefront.newsletter_popup.destroy":{"uri":"storefront\/newsletter-popup","methods":["DELETE"],"domain":null},"storefront.cookie_bar.destroy":{"uri":"storefront\/cookie-bar","methods":["DELETE"],"domain":null}},
        baseUrl: 'http://localhost:8000/',
        baseProtocol: 'http',
        baseDomain: 'localhost',
        basePort: 8000,
        defaultParameters: []
    };

    if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }