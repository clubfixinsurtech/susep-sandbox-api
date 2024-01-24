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

//$agendaInfo = $connector->send(new \Susep\Requests\AgendaInfo);
//
//$agendaInfo->onError(function (\Saloon\Http\Response $response) {
//    dd($response->json(), $response->status());
//});

// dd($agendaInfo->json());

// =====================================================================

// Sending Files

//$premium = [...array_filter($agendaInfo->json('retorno'), fn($agenda) => $agenda['tipoEnvioId'] === 5)];
//// dd($premium[0]['agendaEntidadeId']);
//$jsonFile = __DIR__.'/storage/file.json';
//
//$sendFileReq = new \Susep\Requests\SendFile(
//    agendaId: $premium[0]['agendaEntidadeId'],
//    file: $jsonFile,
//);
//
//$responseSentFile = $connector->send($sendFileReq);
//
//$responseSentFile->onError(function (\Saloon\Http\Response $response) {
//    dd($response->json(), $response->status(), $response->getRequest());
//});
//
//dd($responseSentFile->json());

//======================================================================
// Result Sent File

$resultSentFileReq = new \Susep\Requests\ResultSentFile(
    envioId: 'fc92a29e-263c-4f8c-abad-dc69b895b08a'
);

$response= $connector->send($resultSentFileReq);

dd($response->json());
