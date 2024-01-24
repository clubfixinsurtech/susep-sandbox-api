<?php

namespace Susep\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ResultSentFile extends Request
{
    protected Method $method = Method::GET;
    public function __construct(private readonly string  $envioId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/SRD-ApiGateway/v1/envios/resultado/{$this->envioId}";
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }
}
