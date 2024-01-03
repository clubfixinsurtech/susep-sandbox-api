<?php

require_once __DIR__ . '/vendor/autoload.php';

// =====================================================================

// SETUP

$connector = new Susep\Connector(production: false);

$auth = new \Susep\Requests\Auth(
    clientId: 'susep',
    clientSecret: 'susep',
    username: 'admin',
    password: 'admin',
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
