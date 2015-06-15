<?php namespace DreamFactory\Enterprise\Partner\Contracts;

/**
 * An object that can decorate brands
 */
interface BrandDecorator
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
    public function getLogo($asIcon = false);

    /**
     * Return the brand copyright for rendering
     *
     * @param bool $minimal If true, a minimal copyright message is requested
     *
     * @return string
     */
    public function getCopyright($minimal = false);

    /**
     * Return the brand copy content for rendering
     *
     * @param bool $minimal If true, minimal content is requested
     *
     * @return string
     */
    public function getCopy($minimal = false);

    /**
     * Return the name of this brand
     *
     * @param bool|true $minimal If true, returns only the shortest legal name. Otherwise, full legal name
     *
     * @return mixed
     */
    public function getName($minimal = true);

    /**
     * Return the description of this brand
     *
     * @param bool|true $minimal If true, returns only a snippet of text, otherwise the full description.
     *
     * @return mixed
     */
    public function getDescription($minimal = true);
}