<?php namespace DreamFactory\Enterprise\Partner\Http\Controllers;

use DreamFactory\Enterprise\Common\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class PartnerController extends BaseController
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /** @inheritdoc */
    public function __construct(Request $request)
    {
        //  Must be authorized partner
        $this->middleware('auth.partner');
    }

    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        abort(403);
    }

}