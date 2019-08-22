<?php

namespace Response;

class Response
{
    /**
    * This function based on https://gist.github.com/james2doyle/33794328675a6c88edd6
    */
    public static function json($code = 200, $message = null, $data = null)
    {
        // clear the old headers
        header_remove();
        
        // set the actual code
        http_response_code($code);
        
        // set the header to make sure cache is forced
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        
        // treat this as json
        header('Content-Type: application/json');
        
        $status = array(
            200 => '200 OK',
            400 => '400 Bad Request',
            422 => 'Unprocessable Entity',
            500 => '500 Internal Server Error'
        );
        
        // ok, validation error, or failure
        header('Status: '.$status[$code]);
        
        // return the encoded json
        return json_encode(array(
            'status' => $code < 300, // success or not?
            'message' => $message,
            'data' => $data
        ));
    }
}
