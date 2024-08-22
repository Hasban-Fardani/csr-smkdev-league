<?php

namespace App\Filament\Auth;

use Filament\Http\Middleware\Authenticate as MiddlewareAuthenticate;

class Authenticate extends MiddlewareAuthenticate
{
    protected function authenticate($request, array $guards): void
    {
        parent::authenticate($request, $guards);
        abort_if($request->user()->hasVerifiedEmail(), 403);
    }
}
