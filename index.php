<?php

require_once __DIR__.'/bootstrap/bootstrap.php';

// =====================================================================

// SETUP

$connector = new Susep\Connector(production: false);

// dd($env('SUSEP_CLIENT_ID'));

$auth = new \Susep\Requests\Auth(
    clientId: $env('SUSEP_CLIENT_ID'),
    clientSecret: $env('SUSEP_CLIENT_SECRET'),
    username: $env('SUSEP_USERNAME'),
    password: $env('SUSEP_PASSWORD')
);


$authResponse = $connector->send($auth);

$authResponse->onError(function (\Saloon\Http\Response $response) {
    dd($response->json(), $response->status());
});

$token = $authResponse->json('access_token');

$connector->withTokenAuth($token);

// dd($token);

// =====================================================================

// AgendaInfo

$agendaInfo = $connector->send(new \Susep\Requests\AgendaInfo);

$agendaInfo->onError(function (\Saloon\Http\Response $response) {
    dd($response->json(), $response->status());
});

// dd($agendaInfo->json());

// =====================================================================

// Sending Files

$sendFileReq = new \Susep\Requests\SendFile(
    agendaId: $agendaInfo->json('id'),
    files: json_encode([/*...*/])
);

$responseSentFile = $connector->send($sendFileReq);

$responseSentFile->onError(function (\Saloon\Http\Response $response) {
    dd($response->json(), $response->status());
});

// dd($responseSentFile->json());
