<?php namespace DreamFactory\Enterprise\Partner\Http\Middleware;

use Closure;
use DreamFactory\Enterprise\Common\Traits\EntityLookup;
use DreamFactory\Enterprise\Common\Traits\VerifiesSignatures;
use DreamFactory\Enterprise\Database\Models\ServiceUser;
use Illuminate\Http\Request;

class AuthenticatePartner
{
    //******************************************************************************
    //* Traits
    //******************************************************************************

    use EntityLookup, VerifiesSignatures;

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Authenticate an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        $_token = $request->input('access-token');
//        $_partner = $request->input('partner-id');
//
//        //  Just plain ol' bad...
//        if (empty($_token) || empty($_partner)) {
//            \Log::error('[auth.partner] bad request: no token or partner-id present');
//
//            return ErrorPacket::create(Response::HTTP_BAD_REQUEST);
//        }
//
//        /** @type AppKey $_key */
//        try {
//            $_key = AppKey::where('partner_id', $_partner)->firstOrFail();
//            $this->_setSigningCredentials($_partner, $_key->client_secret);
//        } catch (\Exception $_ex) {
//            \Log::error('[auth.partner] forbidden: invalid "partner-id" [' . $_partner . ']');
//
//            return ErrorPacket::create(Response::HTTP_FORBIDDEN, 'Invalid "partner-id"');
//        }
//
//        if (!$this->_verifySignature($_token, $_partner, $_key->client_secret)) {
//            \Log::error('[auth.partner] bad request: signature verification fail');
//
//            return ErrorPacket::create(Response::HTTP_BAD_REQUEST);
//        }
//
//        try {
//            $_owner = $this->_locateOwner($_key->owner_id, $_key->owner_type_nbr);
//        } catch (ModelNotFoundException $_ex) {
//            \Log::error('[auth.partner] unauthorized: invalid "user" assigned to id#' . $_key->id);
//
//            return ErrorPacket::create(Response::HTTP_UNAUTHORIZED);
//        }

        $_owner = ServiceUser::first();

        $request->setUserResolver(function () use ($_owner) {
            return $_owner;
        });

        return $next($request);
    }
}