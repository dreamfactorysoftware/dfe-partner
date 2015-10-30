<?php namespace DreamFactory\Enterprise\Partner\Providers;

use DreamFactory\Enterprise\Common\Providers\BaseServiceProvider;
use DreamFactory\Enterprise\Partner\Facades\Partner;
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
        $_configPath = realpath(__DIR__ . '/../../config') . DIRECTORY_SEPARATOR;

        //  Add our routes...
        if (file_exists($_routeFile = $_configPath . 'routes.php')) {
            //  Bind auth.partner
            $this->singleton('auth.partner', 'DreamFactory\Enterprise\Partner\Http\Middleware\AuthenticatePartner');

            /** @noinspection PhpIncludeInspection */
            include $_routeFile;
        }

        //  Config
        if (file_exists($_configFile = $_configPath . 'partner.php')) {
            $this->publishes([$_configFile => config_path('partner.php'),], 'config');
        }

        $this->publishes([$_configPath . 'assets' => public_path('/vendor/dfe-partner/assets')], 'public');

        foreach (config('partner', []) as $_pid => $_config) {
            if (isset($_config['class'])) {
                $_partner = new $_config['class']($_pid, $_config);
                Partner::register($_pid, $_partner);
            }
        }
    }

    /** @inheritdoc */
    public function register()
    {
        $this->singleton(static::IOC_NAME,
            function ($app){
                return new PartnerManager($app);
            });
    }

    /** @inheritdoc */
    public function provides()
    {
        return array_merge(parent::provides(), ['auth.partner']);
    }

}
