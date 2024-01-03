<?php

namespace Susep\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class AgendaInfo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/SRD-ApiGateway/v1/envios";
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }
}
