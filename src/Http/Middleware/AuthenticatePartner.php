<?php namespace DreamFactory\Enterprise\Partner\Http\Middleware;

use Closure;
use DreamFactory\Enterprise\Common\Traits\EntityLookup;
use DreamFactory\Enterprise\Common\Traits\VerifiesSignatures;
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
        /**
         * @todo verify partner code in URL
         */

        return $next($request);
    }
}