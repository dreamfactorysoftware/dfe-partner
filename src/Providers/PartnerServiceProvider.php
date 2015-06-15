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
        //  Add our routes...
        if (file_exists($_routeFile = realpath(__DIR__ . '/../../config') . DIRECTORY_SEPARATOR . 'routes.php')) {
            /** @noinspection PhpIncludeInspection */
            include $_routeFile;
        }
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

        //  Config
        if (file_exists($_configFile = realpath(__DIR__ . '/../../config') . DIRECTORY_SEPARATOR . 'partner.php')) {
            $this->publishes([$_configFile => config_path('partner.php'),], 'config');
        }
    }

    /** @inheritdoc */
    public function provides()
    {
        return array_merge(parent::provides(), ['auth.partner']);
    }

}