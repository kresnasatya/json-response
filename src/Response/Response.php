<?php

namespace Response;

class Response
{
    /**
    * This function based on https://gist.github.com/james2doyle/33794328675a6c88edd6
    */
    public static function json($data = [], $status = 200)
    {
        ob_start();

        // clear the old headers
        header_remove();
        
        // set the actual code
        http_response_code($status);
        
        // set the header to make sure cache is forced
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        
        // treat this as json
        header('Content-Type: application/json');
        
        // return the encoded json
        return json_encode($data);
    }
}
