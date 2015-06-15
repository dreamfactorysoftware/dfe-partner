<?php namespace DreamFactory\Enterprise\Partner;

use DreamFactory\Enterprise\Partner\Contracts\BrandDecorator;
use DreamFactory\Enterprise\Partner\Contracts\BusinessPartner;

class PartnerBrand implements BrandDecorator
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /**
     * @type \DreamFactory\Enterprise\Partner\Contracts\BusinessPartner
     */
    protected $partner;

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @param \DreamFactory\Enterprise\Partner\Contracts\BusinessPartner $partner The partner
     */
    public function __construct(BusinessPartner $partner)
    {
        $this->partner = $partner;
    }

    /**
     * Return the brand logo for rendering
     *
     * @param bool $asIcon If true, return an icon representation of logo
     *
     * @return string
     */
    public function getLogo($asIcon = false)
    {
        return $this->partner->getPartnerDetail(
            $asIcon ? 'brand.icon' : 'brand.logo',
            $this->partner->getPartnerDetail('brand.logo')
        );
    }

    /**
     * Return the brand copyright for rendering
     *
     * @param bool $minimal If true, a minimal copyright message is requested
     *
     * @return string
     */
    public function getCopyright($minimal = false)
    {
        return $this->getSizedDetail('brand.copyright', $minimal);
    }

    /**
     * Return the brand copy content for rendering
     *
     * @param bool $minimal If true, minimal content is requested
     *
     * @return string
     */
    public function getCopy($minimal = false)
    {
        return $this->getSizedDetail('brand.copy', $minimal);
    }

    /**
     * Return the name of this brand
     *
     * @param bool|true $minimal If true, returns only the shortest legal name. Otherwise, full legal name
     *
     * @return string
     */
    public function getName($minimal = true)
    {
        return $this->getSizedDetail('brand.name', $minimal);
    }

    /**
     * Return the description of this brand
     *
     * @param bool|true $minimal If true, returns only a snippet description. Otherwise, the full description.
     *
     * @return string
     */
    public function getDescription($minimal = true)
    {
        return $this->getSizedDetail('brand.description', $minimal);
    }

    /**
     * @param string      $key
     * @param bool|false  $minimal    If true, return the minimal version, or default
     * @param string|null $defaultKey The key to use for default value if not $key
     *
     * @return string
     */
    protected function getSizedDetail($key, $minimal = false, $defaultKey = null)
    {
        return $this->partner->getPartnerDetail(
            $minimal
                ? $key . '-minimal'
                : $key,
            $this->partner->getPartnerDetail($defaultKey ?: $key)
        );
    }
}
