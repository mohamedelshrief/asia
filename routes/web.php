<?php

use Illuminate\Support\Facades\Route;

Route::get('install/pre-installation', 'InstallController@preInstallation')->name('install.pre_installation');
Route::get('install/configuration', 'InstallController@getConfiguration')->name('install.configuration.show');
Route::post('install/configuration', 'InstallController@postConfiguration')->name('install.configuration.post');
Route::get('install/complete', 'InstallController@complete')->name('install.complete');

Route::get('license', 'LicenseController@create')->name('license.create');
Route::post('license', 'LicenseController@store')->name('license.store');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$data = [
    "applinks"=>[
        "apps"=>[],
        "details"=>[
            [
                "appIDs"=>[
                    "258J7YRDVF.com.apmpllc.asiamp"
                ],
                "appID"=>"258J7YRDVF.com.apmpllc.asiamp",
                "components"=>[
                    [
                        "/"=>"/",
                        "comment"=>"Home Page",
                    ],
                    [
                        "/"=>"/$(lang)/products/*",
                        "comment"=>"Product Detail Page",
                    ],
                    [
                        "/"=>"/??/products/*",
                        "comment"=>"Product Detail Page",
                    ],
                    [
                        "/"=>"/products/*",
                        "comment"=>"Product Detail Page",
                    ],
                ],
                "paths"=>["/","/$(lang)/*", "/$(lang)/products/*", "/??/products/*", "/products/*"],
            ]
        ]
    ],
    "webcredentials"=>[
        "apps"=>[
            "258J7YRDVF.com.apmpllc.asiamp"
        ]
    ],
];
Route::get('apple-app-site-association', function() use($data){
    return response()->json($data);
});

Route::get('{any}/apple-app-site-association', function() use($data){
    return response()->json($data);
});