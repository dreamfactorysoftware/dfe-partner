<?php namespace DreamFactory\Enterprise\Partner\Facades;

use DreamFactory\Enterprise\Partner\Providers\PartnerServiceProvider;
use Illuminate\Support\Facades\Facade;

/**
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