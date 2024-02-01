<?php

namespace App\Http\Controllers\Api\v1;

use App\Contracts\AuthTokenGenerator;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OAuthController extends Controller
{
    public const TYPE_PASSWORD = 'password';

    public const TYPE_REFRESH = 'refresh_token';


    public function __construct(private AuthTokenGenerator $tokenGenerator)
    {
    }

    public function token(Request $request): array
    {

        $response = $this->tokenGenerator
            ->generateTokens($this->credentials($request), static::TYPE_PASSWORD);

        if ($response->status() !== Response::HTTP_OK) {
            throw ValidationException::withMessages(['email' => [trans('auth.failed')]]);
        }

        return $response->json();
    }

    public function refresh(Request $request)
    {
        //dd($request);

        return $this->tokenGenerator
            ->generateTokens($request->only('refresh_token'), static::TYPE_REFRESH);



    }


    private function credentials(Request $request): array
    {
        return [
            'username' => $request->get('email'),
            'password' => $request->get('password'),
        ];
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            ]);
    }



}
