<?php namespace DreamFactory\Enterprise\Partner\Contracts;

use Illuminate\Http\Request;

interface BusinessPartner
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Get the partner's designated identifier
     *
     * @return string
     */
    public function getPartnerId();

    /**
     * Get the partner's brand decorator
     *
     * @return BrandDecorator
     */
    public function getPartnerBrand();

    /**
     * Retrieves a single partner detail
     *
     * @param string     $key
     * @param mixed|null $default
     *
     * @return mixed
     */
    public function getPartnerDetail($key, $default = null);

    /**
     * Retrieves an array of all partner information
     *
     * @return array
     */
    public function getPartnerDetails();

    /**
     * Handle a partner event/request.
     *
     * @param array $request
     *
     * @return mixed
     */
    public function getPartnerResponse(Request $request);
}