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

    /**
     * @type string The name of the service in the IoC
     */
    const IOC_NAME = 'dfe.mount';

    //********************************************************************************
    //* Public Methods
    //********************************************************************************

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
                return new PartnerManager($app);
            }
        );
    }

}
