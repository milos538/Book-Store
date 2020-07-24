<?php
    require_once('core/Route.php');
    use App\Core\Route;
    return [
        Route::get('#^user/register/?$#',                                           'Main', 'getRegister'),
        Route::post('#^user/register/?$#',                                          'Main', 'postRegister'),
        Route::get('#^user/login/?$#',                                              'Main', 'getLogin'),
        Route::post('#^user/login/?$#',                                             'Main', 'postLogin'),
        Route::get('#^user/logout/?$#',                                             'Main', 'getLogout'),


        Route::get('#^contact/?$#',                                                 'Main', 'contact'),
        Route::get('#^about/?$#',                                                   'Main', 'about'),
        Route::get('#^cart/?$#',                                                    'Main', 'cart'),

        Route::get('#search\/[A-z0-9 ]{1,}#',                                       'Main','search'),

        Route::get('#((priceu|priced|nameu|named){1})\b#',                          'Main','sorted'),

        Route::get('#(category)\/((bestsellers|newreleases|comingsoon){1})\b#',     'Main','category'),

        Route::get('#^book/([0-9]+)/?$#',                                           'Book','book'),

        Route::get('#^cart/all?$#',                                                 'Cart','getBookmarks'),
        Route::get('#^cart/clear?$#',                                               'Cart','clear'),
        Route::get('#^cart/add/([0-9]+)/?$#',                                       'Cart','addBookmark'),

        Route::get('#.*#',                                                          'Main','home'),
        Route::post('#.*#',                                                          'Main','home'),
    ];