<?php namespace DreamFactory\Enterprise\Partner\Facades;

use DreamFactory\Enterprise\Partner\Contracts\BrandDecorator;
use DreamFactory\Enterprise\Partner\Contracts\BusinessPartner;
use DreamFactory\Enterprise\Partner\Managers\PartnerManager;
use DreamFactory\Enterprise\Partner\Providers\PartnerServiceProvider;
use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed config(string $key = null, mixed $default = null);
 * @method static BrandDecorator brand(string $partnerId);
 * @method static PartnerManager register(string $partnerId, BusinessPartner $partner);
 * @method static PartnerManager unregister(string $partnerId);
 * @method static mixed request(string $partnerId, $request = []);
 *
 */
class Partner extends Facade
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PartnerServiceProvider::IOC_NAME;
    }
}