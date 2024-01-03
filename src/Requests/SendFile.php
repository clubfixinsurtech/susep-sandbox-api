<?php

namespace Susep\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

class SendFile extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $agendaId,
        private readonly string $files,
    )
    {
    }

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

    protected function defaultBody(): array
    {
        return [
            'agendaEntidadeId' => $this->agendaId,
            'conteudo' => $this->files,
        ];
    }
}
