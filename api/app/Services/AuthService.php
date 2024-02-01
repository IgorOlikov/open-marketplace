<?php

namespace App\Services;

use App\Contracts\AuthTokenGenerator;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response as ClientResponse;
class AuthService implements  AuthTokenGenerator
{
    public function generateTokens(array $data, string $type): ClientResponse
    {

        $data = array_merge($data, $this->getClientData(), ['grant_type' => $type, 'scope' => '']);


        return Http::asForm()->post(env('CONTAINER_NGINX_URL').'/oauth/token', $data);
    }

    private function getClientData(): array
    {
        return [
            'client_id' => config('passport.password_grant_client.id'),
            'client_secret' => config('passport.password_grant_client.secret'),
        ];
    }


}
