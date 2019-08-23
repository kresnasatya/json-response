<?php

require 'vendor/autoload.php';

use Response\Response as Response;

try {
    $numbers = array('1', '2', '3');

    $message = array('message' => 'Sorry, something is error');

    $data = array(
        'data' => array(
            'foo' => 'bar',
            'bar' => 'qux',
            'qux' => 'lol'
        )
    );

    $objectInArray[] = new stdClass;
    $objectInArray[] = new stdClass;

    $response = new Response;

    // By default status code is 200
    echo Response::json($numbers);

    echo "\n";

    // Set status code
    echo Response::json($message, 422);

    echo "\n";

    echo Response::json($data);

    echo "\n";

    echo Response::json($objectInArray);
} catch (Exception $e) {
    return $e->getMessage();
}