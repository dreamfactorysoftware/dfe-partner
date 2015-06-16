<?php namespace DreamFactory\Enterprise\Partner;

/**
 * A pre-defined partner that provides alert-style top content
 */
class AlertPartner extends SitePartner
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Get the partner's content for placement
     *
     * @param bool $minimal True if minimal content is requested
     *
     * @return string
     */
    public function getWebsiteContent($minimal = false)
    {
        $_brand = $this->getPartnerBrand();
        $_icon = '<img src="' . $_brand->getLogo(true) . '" class="partner-brand">';
        $_context = $this->get('alert-context', 'alert-default');

        //<button type="button" class="close" style="padding-right: 5px;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        $_html = <<<HTML
<div class="alert {$_context} alert-fixed partner-well" role="alert">
    <h3>{$_icon} {$this->getPartnerDetail('name')} <small>{$_brand->getCopyright($minimal)}</small></h3>
    <p>{$_brand->getCopy($minimal)}</p>
</div>
HTML;

        return str_ireplace('__CSRF_TOKEN__', csrf_token(), $_html);
    }
}