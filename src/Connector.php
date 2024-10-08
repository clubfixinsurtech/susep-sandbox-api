<?php

namespace Susep;

use Saloon\Http\Connector as SaloonConnector;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;

class Connector extends SaloonConnector
{
    use ClientCredentialsGrant;

    private ?string $subdomain;

    public function __construct(
        private bool            $production = true
    )
    {
        $this->subdomain = $this->production ? 'www2' : 'homolog2';
    }

    public function resolveBaseUrl(): string
    {
        return "https://{$this->subdomain}.susep.gov.br/safe";
    }

    protected function defaultConfig(): array
    {
        return [
            'verify' => false, // $this->production,
        ];
    }
}
