<?php namespace DreamFactory\Enterprise\Partner;

use DreamFactory\Enterprise\Common\Packets\ErrorPacket;
use DreamFactory\Enterprise\Partner\Contracts\BrandDecorator;
use DreamFactory\Enterprise\Partner\Contracts\BusinessPartner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class Partner extends Collection implements BusinessPartner
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /**
     * @type string
     */
    protected $partnerId;

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @param string $partnerId
     * @param array  $items
     */
    public function __construct($partnerId, $items = [])
    {
        parent::__construct($items);

        $this->partnerId = $partnerId;
    }

    /** @inheritdoc */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /** @inheritdoc */
    public function getPartnerDetails()
    {
        return $this->all();
    }

    /** @inheritdoc */
    public function getPartnerDetail($key, $default = null)
    {
        return $this->get($key, $default);
    }

    /**
     * Get the partner's brand decorator
     *
     * @return BrandDecorator
     */
    public function getPartnerBrand()
    {
        if (null === ($_brand = $this->get('brand'))) {
            throw new \RuntimeException('No "brand" information found for this partner.');
        }

        if (is_array($_brand)) {
            $this->put('brand', $_brand = new PartnerBrand($_brand));
        }

        return $_brand;
    }

    /**
     * Handle a partner event/request.
     *
     * @param array $request
     *
     * @return mixed
     */
    public function getPartnerResponse(Request $request)
    {
        return ErrorPacket::create(Response::HTTP_BAD_REQUEST);
    }

}