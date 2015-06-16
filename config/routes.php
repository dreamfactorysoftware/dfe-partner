<?php
//******************************************************************************
//* Partner Services Routes
//******************************************************************************

Route::group(['namespace' => 'DreamFactory\\Enterprise\\Partner\\Http\\Controllers'], function () {
    /** Partner integration */
    \Route::any('partner/{id}', ['uses' => 'PartnerController@handleRequest']);
});

