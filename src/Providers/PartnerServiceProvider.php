<?php namespace DreamFactory\Enterprise\Partner\Providers;

use DreamFactory\Enterprise\Common\Providers\BaseServiceProvider;
use DreamFactory\Enterprise\Partner\Services\PartnerService;

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
    /**
     * @type string The name of our config file
     */
    const CONFIG_NAME = 'partner.php';

    //********************************************************************************
    //* Public Methods
    //********************************************************************************

    /** @inheritdoc */
    public function boot()
    {
        //  Config
        if (file_exists($_configFile = realpath(__DIR__ . '/../../config') . DIRECTORY_SEPARATOR . static::CONFIG_NAME)) {
            $this->publishes([$_configFile => config_path(static::CONFIG_NAME),], 'config');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->singleton(
            static::IOC_NAME,
            function ($app) {
                return new PartnerService($app);
            }
        );
    }
}
