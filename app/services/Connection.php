<?php

namespace App\services;

use GuzzleHttp\Client;

class ConnectionApi
{
    //el curl de toda la vida pero moderno
    public function getData(string $method, string $uri, array $options)
    {
        $client = new Client();
        $res = $client->request($method, $uri, $options);
        echo $res->getStatusCode();
        // "200"
        echo $res->getHeader('content-type')[0];
        // 'application/json; charset=utf8'
        echo $res->getBody();
        // {"type":"User"...'


    }
    public function getDataAsync(string $method, string $uri, array $options)
    {
        // Send an asynchronous request.
        $client = new Client();
        $request = new \GuzzleHttp\Psr7\Request($method, $uri);
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();
    }
    public function sendData(string $method, string $uri, array $data)
    {

        $client = new Client();
        $response = $client->request($method, $uri, [
            'form_params' => $data

        ]);
    }
    
    //Esta funcion hay que retocarla para enviar archivos
    // public function sendDataMultipart(string $method, string $uri, array $data)
    // {

    //     $client = new Client();
    //     $response = $client->request('POST', 'http://httpbin.org/post', [
    //         'multipart' => [
    //             [
    //                 'name'     => 'field_name',
    //                 'contents' => 'abc'
    //             ],
    //             [
    //                 'name'     => 'file_name',
    //                 'contents' => Psr7\Utils::tryFopen('/path/to/file', 'r')
    //             ],
    //             [
    //                 'name'     => 'other_file',
    //                 'contents' => 'hello',
    //                 'filename' => 'filename.txt',
    //                 'headers'  => [
    //                     'X-Foo' => 'this is an extra header to include'
    //                 ]
    //             ]
    //         ]
    //     ]);
    // }
}
