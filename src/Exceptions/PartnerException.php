<?php namespace DreamFactory\Enterprise\Partner\Exceptions;

use Exception;

/**
 * Generic partner exception
 */
class PartnerException extends \Exception
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /**
     * @type string The partner ID
     */
    protected $partnerId;

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @param string          $partnerId
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct($partnerId, $message = "", $code = 0, \Exception $previous = null)
    {
        $this->partnerId = $partnerId;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

}
