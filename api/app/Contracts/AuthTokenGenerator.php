<?php

namespace App\Contracts;
use Illuminate\Http\Client\Response as ClientResponse;
interface AuthTokenGenerator
{
    public function generateTokens(array $data, string $type): ClientResponse;
}
