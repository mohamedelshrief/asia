<?php

declare(strict_types=1);

namespace PackageVersions;

use Composer\InstalledVersions;
use OutOfBoundsException;

class_exists(InstalledVersions::class);

/**
 * This class is generated by composer/package-versions-deprecated, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 *
 * @deprecated in favor of the Composer\InstalledVersions class provided by Composer 2. Require composer-runtime-api:^2 to ensure it is present.
 */
final class Versions
{
    /**
     * @deprecated please use {@see self::rootPackageName()} instead.
     *             This constant will be removed in version 2.0.0.
     */
    const ROOT_PACKAGE_NAME = 'envaysoft/fleetcart';

    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    const VERSIONS          = array (
  'algolia/algoliasearch-client-php' => '2.8.0@d9781147ae433f5bdbfd902497d748d60e70d693',
  'astrotomic/laravel-translatable' => 'v11.9.1@d853a3c34be42941dc83c5cddd9e1e98c71abae1',
  'aws/aws-crt-php' => 'v1.0.2@3942776a8c99209908ee0b287746263725685732',
  'aws/aws-sdk-php' => '3.204.5@1f690db4dfd66d0c729f4f8db12431bb047b4900',
  'brick/math' => '0.9.3@ca57d18f028f84f777b2168cd1911b0dee2343ae',
  'cache/adapter-common' => '1.2.0@6b87c5cbdf03be42437b595dbe5de8e97cd1d497',
  'cache/filesystem-adapter' => '1.1.0@1501ca71502f45114844824209e6a41d87afb221',
  'cache/hierarchical-cache' => '1.1.0@ba3746c65461b17154fb855068403670fd7fa2d3',
  'cache/predis-adapter' => '1.1.0@e57cc73e5615f0321b249861253ee62b2a499aa8',
  'cache/tag-interop' => '1.0.1@909a5df87e698f1665724a9e84851c11c45fbfb9',
  'cartalyst/sentinel' => 'v5.1.0@6f641c0c6fda3627a6aee9d1cd3c409e73e4fd0d',
  'cartalyst/support' => 'v5.1.2@1bf18efdc7e1c7bd4adabdbccfac48ce0fa946fe',
  'clue/stream-filter' => 'v1.5.0@aeb7d8ea49c7963d3b581378955dbf5bc49aa320',
  'composer/package-versions-deprecated' => '1.11.99.4@b174585d1fe49ceed21928a945138948cb394600',
  'darryldecode/cart' => '4.2.1@2ad23e070af341da80300ef990b1fb529af88893',
  'defuse/php-encryption' => 'v2.3.1@77880488b9954b7884c25555c2a0ea9e7053f9d2',
  'doctrine/cache' => '2.1.1@331b4d5dbaeab3827976273e9356b3b453c300ce',
  'doctrine/dbal' => '2.13.5@d92ddb260547c2a7b650ff140f744eb6f395d8fc',
  'doctrine/deprecations' => 'v0.5.3@9504165960a1f83cc1480e2be1dd0a0478561314',
  'doctrine/event-manager' => '1.1.1@41370af6a30faa9dc0368c4a6814d596e81aba7f',
  'doctrine/inflector' => '2.0.4@8b7ff3e4b7de6b2c84da85637b59fd2880ecaa89',
  'doctrine/lexer' => '1.2.1@e864bbf5904cb8f5bb334f99209b48018522f042',
  'dragonmantank/cron-expression' => 'v3.1.0@7a8c6e56ab3ffcc538d05e8155bb42269abf1a0c',
  'drewm/mailchimp-api' => 'v2.5.4@c6cdfab4ca6ddbc3b260913470bd0a4a5cb84c7a',
  'egulias/email-validator' => '2.1.25@0dbf5d78455d4d6a41d186da50adc1122ec066f4',
  'ezyang/htmlpurifier' => 'v4.13.0@08e27c97e4c6ed02f37c5b2b20488046c8d90d75',
  'fideloper/proxy' => '4.4.1@c073b2bd04d1c90e04dc1b787662b558dd65ade0',
  'firebase/php-jwt' => 'v5.5.1@83b609028194aa042ea33b5af2d41a7427de80e6',
  'florianv/exchanger' => '2.7.2@9e632ab8ab8b32c52628d775bbf21125d2c4d3af',
  'florianv/swap' => '4.3.0@88edd27fcb95bdc58bbbf9e4b00539a2843d97fd',
  'graham-campbell/result-type' => 'v1.0.4@0690bde05318336c7221785f2a932467f98b64ca',
  'guzzlehttp/guzzle' => '7.4.0@868b3571a039f0ebc11ac8f344f4080babe2cb94',
  'guzzlehttp/promises' => '1.5.1@fe752aedc9fd8fcca3fe7ad05d419d32998a06da',
  'guzzlehttp/psr7' => '2.1.0@089edd38f5b8abba6cb01567c2a8aaa47cec4c72',
  'instamojo/instamojo-php' => '0.4@99dc50bf008be77be84f447607e416f73f319904',
  'jackiedo/dotenv-editor' => '1.2.0@f93690a80915d51552931d9406d79b312da226b9',
  'laminas/laminas-diactoros' => '2.8.0@0c26ef1d95b6d7e6e3943a243ba3dc0797227199',
  'laravel/framework' => 'v8.73.2@0e1c63315eeaee5920552ff042bd820bb4014533',
  'laravel/helpers' => 'v1.4.1@febb10d8daaf86123825de2cb87f789a3371f0ac',
  'laravel/legacy-factories' => 'v1.1.1@8091d6d64e0e6ea22fb3326ef0b21936d0a0217c',
  'laravel/passport' => 'v10.2.2@7981abed1a0979afd4a5a8bec81624b8127a287f',
  'laravel/scout' => 'v9.3.2@0137c70efb164eeeb8115a9ebb1517263b6a64ac',
  'laravel/serializable-closure' => 'v1.0.4@8148e72e6c2c3af7f05640ada1b26c3bca970f8d',
  'laravel/socialite' => 'v5.2.6@b5c67f187ddcf15529ff7217fa735b132620dfac',
  'laravel/tinker' => 'v2.6.2@c808a7227f97ecfd9219fbf913bad842ea854ddc',
  'laravelcollective/html' => 'v6.2.1@ae15b9c4bf918ec3a78f092b8555551dd693fde3',
  'lcobucci/jwt' => '3.4.6@3ef8657a78278dfeae7707d51747251db4176240',
  'league/commonmark' => '1.6.6@c4228d11e30d7493c6836d20872f9582d8ba6dcf',
  'league/event' => '2.2.0@d2cc124cf9a3fab2bb4ff963307f60361ce4d119',
  'league/flysystem' => '1.1.6@627be7fcde84c71aa0f15097fcf48fd5f2be5287',
  'league/flysystem-aws-s3-v3' => '1.0.29@4e25cc0582a36a786c31115e419c6e40498f6972',
  'league/flysystem-cached-adapter' => '1.1.0@d1925efb2207ac4be3ad0c40b8277175f99ffaff',
  'league/mime-type-detection' => '1.9.0@aa70e813a6ad3d1558fc927863d47309b4c23e69',
  'league/oauth1-client' => 'v1.10.0@88dd16b0cff68eb9167bfc849707d2c40ad91ddc',
  'league/oauth2-server' => '8.3.3@f5698a3893eda9a17bcd48636990281e7ca77b2a',
  'maatwebsite/excel' => '3.1.34@d7446f0e808d83be128835c4b403c9e4a65b20f3',
  'maatwebsite/laravel-sidebar' => '2.4.0@8da48f5f256eeae7f880ed350e48801b52005e11',
  'maennchen/zipstream-php' => '2.1.0@c4c5803cc1f93df3d2448478ef79394a5981cc58',
  'markbaker/complex' => '3.0.1@ab8bc271e404909db09ff2d5ffa1e538085c0f22',
  'markbaker/matrix' => '3.0.0@c66aefcafb4f6c269510e9ac46b82619a904c576',
  'mcamara/laravel-localization' => '1.6.2@645819da9ef29f3ba7588d9b4598799caf0b2463',
  'mehedi/laravel-captcha' => 'v3.2.0@3c67ac7b6b0aa1f9083606d83400051ef719d569',
  'mehedi/stylist' => 'dev-master@cd58cab1c9ffb8230e1e565c0681cb8941ca42d9',
  'meilisearch/meilisearch-php' => 'v0.18.3@8d649236dde23292d2f4b637dc3f71d1d56437f5',
  'mexitek/phpcolors' => 'v0.4@89bf30473a68dc8845e46e9db3e536b969e18c11',
  'monolog/monolog' => '2.3.5@fd4380d6fc37626e2f799f29d91195040137eba9',
  'mtdowling/jmespath.php' => '2.6.1@9b87907a81b87bc76d19a7fb2d61e61486ee9edb',
  'myclabs/php-enum' => '1.8.3@b942d263c641ddb5190929ff840c68f78713e937',
  'nesbot/carbon' => '2.54.0@eed83939f1aed3eee517d03a33f5ec587ac529b5',
  'nikic/php-parser' => 'v4.13.1@63a79e8daa781cac14e5195e63ed8ae231dd10fd',
  'nwidart/laravel-modules' => '8.2.0@6ade5ec19e81a0e4807834886a2c47509d069cb7',
  'nyholm/psr7' => '1.4.1@2212385b47153ea71b1c1b1374f8cb5e4f7892ec',
  'opis/closure' => '3.6.2@06e2ebd25f2869e54a306dda991f7db58066f7f6',
  'paragonie/constant_time_encoding' => 'v2.4.0@f34c2b11eb9d2c9318e13540a1dbc2a3afbd939c',
  'paragonie/random_compat' => 'v9.99.100@996434e5492cb4c3edcb9168db6fbb1359ef965a',
  'paypal/paypal-checkout-sdk' => '1.0.2@19992ce7051ff9e47e643f28abb8cc1b3e5f1812',
  'paypal/paypalhttp' => '1.0.1@7b09c89c80828e842c79230e7f156b61fbb68d25',
  'paytm/paytmchecksum' => 'v1.1.0@a032d3cbeb3846720c2c606b9f3c8057c355042e',
  'php-http/client-common' => '2.4.0@29e0c60d982f04017069483e832b92074d0a90b2',
  'php-http/curl-client' => '2.2.1@2ed4245a817d859dd0c1d51c7078cdb343cf5233',
  'php-http/discovery' => '1.14.1@de90ab2b41d7d61609f504e031339776bc8c7223',
  'php-http/httplug' => '2.2.0@191a0a1b41ed026b717421931f8d3bd2514ffbf9',
  'php-http/message' => '1.12.0@39eb7548be982a81085fe5a6e2a44268cd586291',
  'php-http/message-factory' => 'v1.0.2@a478cb11f66a6ac48d8954216cfed9aa06a501a1',
  'php-http/promise' => '1.1.0@4c4c1f9b7289a2ec57cde7f1e9762a5789506f88',
  'phpoffice/phpspreadsheet' => '1.20.0@44436f270bb134b4a94670f3d020a85dfa0a3c02',
  'phpoption/phpoption' => '1.8.0@5455cb38aed4523f99977c4a12ef19da4bfe2a28',
  'phpseclib/phpseclib' => '3.0.12@89bfb45bd8b1abc3b37e910d57f5dbd3174f40fb',
  'predis/predis' => 'v1.1.9@c50c3393bb9f47fa012d0cdfb727a266b0818259',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.1.1@8622567409010282b7aeebe4bb841fe98b58dcaf',
  'psr/event-dispatcher' => '1.0.0@dbefd12671e8a14ec7f180cab83036ed26714bb0',
  'psr/http-client' => '1.0.1@2dfb5f6c5eff0e91e20e913f8c5452ed95b86621',
  'psr/http-factory' => '1.0.1@12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
  'psr/http-message' => '1.0.1@f6561bf28d520154e4b0ec72be95418abe6d9363',
  'psr/log' => '1.1.4@d49695b909c3b7628b6289db5479a1c204601f11',
  'psr/simple-cache' => '1.0.1@408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
  'psy/psysh' => 'v0.10.11@38017532bba35d15d28dcc001b4274df0251c4a1',
  'ralouphie/getallheaders' => '3.0.3@120b605dfeb996808c31b6477290a714d356e822',
  'ramsey/collection' => '1.2.2@cccc74ee5e328031b15640b51056ee8d3bb66c0a',
  'ramsey/uuid' => '4.2.3@fc9bb7fb5388691fd7373cd44dcb4d63bbcf24df',
  'razorpay/razorpay' => '2.8.1@4ad7b6a5bd9896305858ec0a861f66020e39f628',
  'rmccue/requests' => 'v1.8.0@afbe4790e4def03581c4a0963a1e8aa01f6030f1',
  'spatie/laravel-newsletter' => '4.10.0@c3b9061a8410650aeab1416ed76e1afb57adc685',
  'spatie/once' => '2.2.1@e6c13ae474a7d4b30975ef6a502a593874ac12d2',
  'spatie/schema-org' => '3.4.0@066463b6f10eb9f7617f879302ed382aa6bdbf54',
  'stripe/stripe-php' => 'v7.107.0@a90f74037261ed376c0d37066f396c48809c8e99',
  'swayok/alternative-laravel-cache' => '5.4.13@3fee1f4eeb1c88d29ff3869a36d970f9f254f5f9',
  'swiftmailer/swiftmailer' => 'v6.3.0@8a5d5072dca8f48460fce2f4131fcc495eec654c',
  'symfony/console' => 'v5.3.11@3e7ab8f5905058984899b05a4648096f558bfeba',
  'symfony/css-selector' => 'v5.3.4@7fb120adc7f600a59027775b224c13a33530dd90',
  'symfony/deprecation-contracts' => 'v2.5.0@6f981ee24cf69ee7ce9736146d1c57c2780598a8',
  'symfony/error-handler' => 'v5.3.11@eec73dd7218713f48a7996583a741b3bae58c8d3',
  'symfony/event-dispatcher' => 'v5.3.11@661a7a6e085394f8513945669e31f7c1338a7e69',
  'symfony/event-dispatcher-contracts' => 'v2.5.0@66bea3b09be61613cd3b4043a65a8ec48cfa6d2a',
  'symfony/finder' => 'v5.3.7@a10000ada1e600d109a6c7632e9ac42e8bf2fb93',
  'symfony/http-client-contracts' => 'v2.5.0@ec82e57b5b714dbb69300d348bd840b345e24166',
  'symfony/http-foundation' => 'v5.3.11@d1e7059ebeb0b8f9fe5eb5b26eacd2e3c1f371cc',
  'symfony/http-kernel' => 'v5.3.12@f53025cd1d91b1af85d6d9e17eefa98e31ee953b',
  'symfony/intl' => 'v5.3.11@6025b5307045b2fdcd844c1dfa2b02873b1d856c',
  'symfony/mime' => 'v5.3.11@dffc0684f10526db12c52fcd6238c64695426d61',
  'symfony/options-resolver' => 'v5.3.7@4b78e55b179003a42523a362cc0e8327f7a69b5e',
  'symfony/polyfill-ctype' => 'v1.23.0@46cd95797e9df938fdd2b03693b5fca5e64b01ce',
  'symfony/polyfill-iconv' => 'v1.23.0@63b5bb7db83e5673936d6e3b8b3e022ff6474933',
  'symfony/polyfill-intl-grapheme' => 'v1.23.1@16880ba9c5ebe3642d1995ab866db29270b36535',
  'symfony/polyfill-intl-idn' => 'v1.23.0@65bd267525e82759e7d8c4e8ceea44f398838e65',
  'symfony/polyfill-intl-normalizer' => 'v1.23.0@8590a5f561694770bdcd3f9b5c69dde6945028e8',
  'symfony/polyfill-mbstring' => 'v1.23.1@9174a3d80210dca8daa7f31fec659150bbeabfc6',
  'symfony/polyfill-php72' => 'v1.23.0@9a142215a36a3888e30d0a9eeea9766764e96976',
  'symfony/polyfill-php73' => 'v1.23.0@fba8933c384d6476ab14fb7b8526e5287ca7e010',
  'symfony/polyfill-php80' => 'v1.23.1@1100343ed1a92e3a38f9ae122fc0eb21602547be',
  'symfony/polyfill-php81' => 'v1.23.0@e66119f3de95efc359483f810c4c3e6436279436',
  'symfony/process' => 'v5.3.12@e498803a6e95ede78e9d5646ad32a2255c033a6a',
  'symfony/psr-http-message-bridge' => 'v2.1.2@22b37c8a3f6b5d94e9cdbd88e1270d96e2f97b34',
  'symfony/routing' => 'v5.3.11@fcbc2b81d55984f04bb704c2269755fa5aaf5cca',
  'symfony/service-contracts' => 'v2.5.0@1ab11b933cd6bc5464b08e81e2c5b07dec58b0fc',
  'symfony/string' => 'v5.3.10@d70c35bb20bbca71fc4ab7921e3c6bda1a82a60c',
  'symfony/translation' => 'v5.3.11@17a965c8f3b1b348cf15d903ac53942984561f8a',
  'symfony/translation-contracts' => 'v2.5.0@d28150f0f44ce854e942b671fc2620a98aae1b1e',
  'symfony/var-dumper' => 'v5.3.11@a029b3a11b757f9cc8693040339153b4745a913f',
  'tightenco/ziggy' => '0.9.4@82ea6ec6cb6ab3545b0245310b2a424316fe48d8',
  'tijsverkoyen/css-to-inline-styles' => '2.2.3@b43b05cf43c1b6d849478965062b6ef73e223bb5',
  'twilio/sdk' => '6.31.2@be59275f0fc311cb45d5303d47bffaa06a19d6e5',
  'typicms/nestablecollection' => '1.1.22@3a9e323c64ce56fad445d8708d870143741eb589',
  'vlucas/phpdotenv' => 'v5.4.0@d4394d044ed69a8f244f3445bcedf8a0d7fe2403',
  'voku/portable-ascii' => '1.5.6@80953678b19901e5165c56752d087fc11526017c',
  'vonage/client' => '2.4.0@29f23e317d658ec1c3e55cf778992353492741d7',
  'vonage/client-core' => '2.9.3@927d4594b1e3d034efcee87eed79c33f443353ef',
  'vonage/nexmo-bridge' => '0.1.0@62653b1165f4401580ca8d2b859f59c968de3711',
  'webmozart/assert' => '1.10.0@6964c76c7804814a842473e0c8fd15bab0f18e25',
  'wikimedia/composer-merge-plugin' => 'v2.0.1@8ca2ed8ab97c8ebce6b39d9943e9909bb4f18912',
  'yajra/laravel-datatables-oracle' => 'v9.18.2@f4eebc1dc2b067058dfb91e7c067de862353c40f',
  'barryvdh/laravel-debugbar' => 'v3.6.4@3c2d678269ba60e178bcd93e36f6a91c36b727f1',
  'beyondcode/laravel-dump-server' => '1.7.0@e27c7b942ab62f6ac7168359393d328ec5215b89',
  'beyondcode/laravel-query-detector' => '1.5.0@4a3a0cfb5d5ddc5da59d530ef5c13e260adc6d07',
  'facade/flare-client-php' => '1.9.1@b2adf1512755637d0cef4f7d1b54301325ac78ed',
  'facade/ignition' => '2.17.1@317f6110c1977b50e06365bbb155fbe5079035ec',
  'facade/ignition-contracts' => '1.0.2@3c921a1cdba35b68a7f0ccffc6dffc1995b18267',
  'fakerphp/faker' => 'v1.16.0@271d384d216e5e5c468a6b28feedf95d49f83b35',
  'filp/whoops' => '2.14.4@f056f1fe935d9ed86e698905a957334029899895',
  'maximebf/debugbar' => 'v1.17.3@e8ac3499af0ea5b440908e06cc0abe5898008b3c',
  'nunomaduro/collision' => 'v5.10.0@3004cfa49c022183395eabc6d0e5207dfe498d00',
  'symfony/debug' => 'v4.4.31@43ede438d4cb52cd589ae5dc070e9323866ba8e0',
  'envaysoft/fleetcart' => 'dev-main@e8bbfa066081dfaffaca444eec54b7a2103d1266',
);

    private function __construct()
    {
    }

    /**
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function rootPackageName() : string
    {
        if (!self::composer2ApiUsable()) {
            return self::ROOT_PACKAGE_NAME;
        }

        return InstalledVersions::getRootPackage()['name'];
    }

    /**
     * @throws OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function getVersion(string $packageName): string
    {
        if (self::composer2ApiUsable()) {
            return InstalledVersions::getPrettyVersion($packageName)
                . '@' . InstalledVersions::getReference($packageName);
        }

        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }

    private static function composer2ApiUsable(): bool
    {
        if (!class_exists(InstalledVersions::class, false)) {
            return false;
        }

        if (method_exists(InstalledVersions::class, 'getAllRawData')) {
            $rawData = InstalledVersions::getAllRawData();
            if (count($rawData) === 1 && count($rawData[0]) === 0) {
                return false;
            }
        } else {
            $rawData = InstalledVersions::getRawData();
            if ($rawData === null || $rawData === []) {
                return false;
            }
        }

        return true;
    }
}
