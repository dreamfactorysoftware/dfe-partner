<?php namespace DreamFactory\Enterprise\Partner\Http\Controllers;

use DreamFactory\Enterprise\Common\Http\Controllers\BaseController;
use DreamFactory\Enterprise\Partner\Facades\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
     * @param Request $request The request
     * @param string  $pid     The partner ID
     *
     * @return mixed
     */
    public function handleRequest(Request $request, $pid)
    {
        try {
            return Partner::request($pid, $request);
        } catch (\Exception $_ex) {
            //  Log and bail
            Log::error('Exception handling partner request: ' . $_ex->getMessage());

            //  wtf
            abort(404);
        }

        //  Not going to get here...
        return false;
    }

}
