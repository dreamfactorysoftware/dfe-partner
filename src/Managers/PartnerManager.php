<?php namespace DreamFactory\Enterprise\Partner\Managers;

use DreamFactory\Enterprise\Common\Managers\BaseManager;
use DreamFactory\Enterprise\Partner\Contracts\BusinessPartner;
use DreamFactory\Enterprise\Partner\Exceptions\PartnerException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PartnerManager extends BaseManager
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @param string      $partnerId
     * @param string|null $key
     * @param mixed       $default
     *
     * @return array|mixed
     */
    public function config($partnerId, $key = null, $default = null)
    {
        /** @type BusinessPartner $_partner */
        $_partner = $this->resolve($partnerId);

        return $key ? $_partner->getPartnerDetail($key, $default) : $_partner->getPartnerDetails();
    }

    /**
     * @param string $partnerId
     *
     * @return \DreamFactory\Enterprise\Partner\Contracts\BrandDecorator
     */
    public function brand($partnerId)
    {
        /** @type BusinessPartner $_partner */
        $_partner = $this->resolve($partnerId);

        return $_partner->getPartnerBrand();
    }

    /**
     * Register a partner with the system
     *
     * @param string                                                     $partnerId
     * @param \DreamFactory\Enterprise\Partner\Contracts\BusinessPartner $partner
     *
     * @return $this
     */
    public function register($partnerId, BusinessPartner $partner)
    {
        return $this->manage($partnerId, $partner);
    }

    /**
     * Unregister a partner with the system
     *
     * @param string $partnerId
     *
     * @return $this
     */
    public function unregister($partnerId)
    {
        return $this->unmanage($partnerId);
    }

    /**
     * Handle a partner request
     *
     * @param string  $partnerId
     * @param Request $request
     *
     * @return mixed
     * @throws \DreamFactory\Enterprise\Partner\Exceptions\PartnerException
     */
    public function request($partnerId, Request $request)
    {
        try {
            /** @type BusinessPartner $_partner */
            $_partner = $this->resolve($partnerId);

            return $_partner->getPartnerResponse($request);
        } catch (\InvalidArgumentException $_ex) {
            throw new PartnerException($partnerId, 'Bad request', Response::HTTP_BAD_REQUEST);
        }
    }
}