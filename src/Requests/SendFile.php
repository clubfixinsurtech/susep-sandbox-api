<?php

namespace Susep\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Body\HasMultipartBody;

class SendFile extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $agendaId,
        private readonly string $file,
    )
    {
    }

    public function resolveEndpoint(): string
    {
        return "/SRD-ApiGateway/v1/envios";
    }

    protected function defaultBody(): array
    {
        return [
            new MultipartValue(
                name: 'agendaEntidadeId',
                value: $this->agendaId
            ),
            new MultipartValue(
                name: 'conteudo',
                value: $this->file,
                filename: 'file2.json'
            ),
        ];
    }
}
