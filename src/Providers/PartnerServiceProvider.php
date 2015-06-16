<?php namespace DreamFactory\Enterprise\Partner\Providers;

use DreamFactory\Enterprise\Common\Providers\BaseServiceProvider;
use DreamFactory\Enterprise\Partner\Managers\PartnerManager;

/**
 * Register the partner service
 */
class PartnerServiceProvider extends BaseServiceProvider
{
    //******************************************************************************
    //* Constants
    //******************************************************************************

    /** @inheritdoc */
    const IOC_NAME = 'dfe.partner';

    //********************************************************************************
    //* Public Methods
    //********************************************************************************

    /** @inheritdoc */
    public function boot()
    {
        $_configPath = realpath(__DIR__ . '/../../config');

        //  Add our routes...
        if (file_exists($_routeFile = $_configPath . DIRECTORY_SEPARATOR . 'routes.php')) {
            //  Bind auth.partner
            $this->singleton('auth.partner',
                'DreamFactory\\Enterprise\\Partner\\Http\\Middleware\\AuthenticatePartner');

            /** @noinspection PhpIncludeInspection */
            include $_routeFile;
        }

        //  Config
        if (file_exists($_configFile = $_configPath . DIRECTORY_SEPARATOR . 'partner.php')) {
            $this->publishes([$_configFile => config_path('partner.php'),], 'config');
        }

        $this->publishes([$_configPath . '/assets' => public_path('/vendor/dfe-partner')], 'public');
    }

    /** @inheritdoc */
    public function register()
    {
        $this->singleton(
            static::IOC_NAME,
            function ($app) {
                return new PartnerManager($app);
            }
        );
    }

    /** @inheritdoc */
    public function provides()
    {
        return array_merge(parent::provides(), ['auth.partner']);
    }

}