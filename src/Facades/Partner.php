<?php namespace DreamFactory\Enterprise\Partner\Facades;

use DreamFactory\Enterprise\Partner\Contracts\BrandDecorator;
use DreamFactory\Enterprise\Partner\Contracts\BusinessPartner;
use DreamFactory\Enterprise\Partner\Managers\PartnerManager;
use DreamFactory\Enterprise\Partner\Providers\PartnerServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed config($key = null, $default = null);
 * @method static BrandDecorator brand($partnerId);
 * @method static PartnerManager register($partnerId, BusinessPartner $partner);
 * @method static PartnerManager unregister($partnerId);
 * @method static BusinessPartner resolve($partnerId);
 * @method static mixed request($partnerId, Request $request);
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
