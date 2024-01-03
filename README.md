# SRD/SUSEP API @ClubFix

[![Maintainer](http://img.shields.io/badge/maintainer-@clubfixinsurtech-blue.svg?style=flat-square)](https://twitter.com/sergiodanilojr)
[![Source Code](http://img.shields.io/badge/source-clubfixinsurtech/susep-sandbox-api-blue.svg?style=flat-square)](https://github.com/clubfixinsurtech/susep-sandbox-api)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/clubfixinsurtech/susep-sandbox-api.svg?style=flat-square)](https://packagist.org/packages/clubfixinsurtech/susep-sandbox-api)
[![Latest Version](https://img.shields.io/github/release/clubfixinsurtech/susep-sandbox-api.svg?style=flat-square)](https://github.com/clubfixinsurtech/susep-sandbox-api/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/clubfixinsurtech/susep-sandbox-api.svg?style=flat-square)](https://scrutinizer-ci.com/g/clubfixinsurtech/susep-sandbox-api)
[![Total Downloads](https://img.shields.io/packagist/dt/clubfixinsurtech/susep-sandbox-api.svg?style=flat-square)](https://packagist.org/packages/clubfixinsurtech/susep-sandbox-api)

###### SRD/SUSEP API Component.

Consumo da API da SUSEP no programa Sandbox. O programa Sandbox é um ambiente de testes para o mercado de seguros, previdência complementar aberta e capitalização. O objetivo é permitir que as empresas testem seus produtos e serviços antes de colocá-los em produção.
Este componente dispõe de recursos que podem ser utilizados para envio de arquivos de prestação de contas à SUSEP.

### Highlights

- Simple installation (Instalação simples)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

This component is available via Composer:

```bash
composer require clubfixinsurtech/susep-sandbox-api
```

## Documentation

##### Basic Usage:

```php
<?php

// Inicialize o Connector definindo o ambiente de trabalho
// 

$connector = new Susep\Connector(production: false);

// Definindo o Token de Acesso
$auth = new \Susep\Requests\Auth(
    clientId: $env('SUSEP_CLIENT_ID'),
    clientSecret: $env('SUSEP_CLIENT_SECRET'),
    username: $env('SUSEP_USERNAME'),
    password: $env('SUSEP_PASSWORD')
);

$authResponse = $connector->send($auth);
$token = $authResponse->json('access_token');

$connector->withTokenAuth($token);


// Obtendo os dados da Agenda com suas respectivas competências

$agendaInfoRequest = $connector->send(new \Susep\Requests\AgendaInfo);

$agenda = $agendaInfo->json();
$agendaId = $agenda['agendaEntidadeId'];

// Enviando os dados de acordo com um competência

$sendFileReq = new \Susep\Requests\SendFile(
    agendaId: $agendaInfo->json('id'),
    files: json_encode([/*...*/])
);

$responseSentFile = $connector->send($sendFileReq);

$response = $responseSentFile->json();
```

## Credits

- [Clubfix](https://clubfix.com.br) (Team)

## License

The MIT License (MIT). Please see [License File](https://github.com/clubfixinsurtech/susep-sandbox-api/blob/master/LICENSE) for more information.
