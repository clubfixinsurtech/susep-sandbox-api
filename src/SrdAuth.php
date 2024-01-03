<?php

namespace SUSEP;

use Saloon\Contracts\Authenticator;
use Saloon\Http\PendingRequest;
use SUSEP\Requests\Auth;

class SrdAuth implements Authenticator
{
    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $username,
        private readonly string $password,
        private readonly string $grantType = 'password',
        private readonly string $scope = 'SRD'
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function set(PendingRequest $pendingRequest): void
    {
        $authRequest = new Auth(
            clientId: $this->clientId,
            clientSecret: $this->clientSecret,
            username: $this->username,
            password: $this->password,
            grantType: $this->grantType,
            scope: $this->scope,
        );



        $pendingRequest->withTokenAuth();
    }
}
