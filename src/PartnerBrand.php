<?php namespace DreamFactory\Enterprise\Partner;

use DreamFactory\Enterprise\Partner\Contracts\BrandDecorator;
use Illuminate\Support\Collection;

class PartnerBrand extends Collection implements BrandDecorator
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Return the brand logo for rendering
     *
     * @param bool $asIcon If true, return an icon representation of logo
     *
     * @return string
     */
    public function getLogo($asIcon = false)
    {
        return $this->get($asIcon ? 'icon' : 'logo',
            $this->get('logo'));
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
        return $this->getSizedDetail('copyright', $minimal);
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
        return $this->getSizedDetail('copy', $minimal);
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
        return $this->getSizedDetail('name', $minimal);
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
        return $this->getSizedDetail('description', $minimal);
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
        return $this->get($minimal ? $key . '-minimal' : $key,
            $this->get($defaultKey ?: $key));
    }
}
