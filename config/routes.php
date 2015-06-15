<?php
//******************************************************************************
//* Partner Services Routes
//******************************************************************************

use DreamFactory\Enterprise\Partner\Http\Middleware\AuthenticatePartner;

Route::group(['namespace' => 'DreamFactory\\Enterprise\\Partner\\Http\\Controllers'], function () {
    //  Load middlewares...
    !$this->app->bound('auth.partner') && $this->singleton('auth.partner', function ($app) {
        return new AuthenticatePartner($app);
    });

    \Route::group(['middleware' => 'auth.partner'], function () {
        \Route::resource('partner', 'PartnerController');
    });
});

