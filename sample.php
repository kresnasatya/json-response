<?php

require 'vendor/autoload.php';

use Response\Response as Response;

$response = new Response;

echo Response::json(200, 'Ok, looks good to me!', array(1,2,3));

echo "\n";