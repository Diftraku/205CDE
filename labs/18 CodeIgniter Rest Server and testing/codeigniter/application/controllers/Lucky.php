<?php
require(APPPATH . 'libraries/REST_Controller.php');

class Lucky extends REST_Controller
{

    function word_get()
    {
        $word = file_get_contents('http://randomword.setgetgo.com/get.php');
        $this->response($this->format_response(filter_var($word, FILTER_SANITIZE_STRING)));
    }

    function number_get()
    {
        $this->response($this->format_response(rand(0, getrandmax())));
    }

    function method_not_allowed()
    {
        send_response(null, false, 405, 'Method not allowed');
    }

    function format_response($payload = null, $success = true, $code = 200, $message = 'OK')
    {
        $response = ['code' => $code, 'success' => $success];
        if ($code != 200 && $message != 'OK') {
            header('HTTP/' . $_SERVER['SERVER_PROTOCOL'] . ' ' . $code . ' ' . $message, true);
            if ($success != true) {
                $response['reason'] = $message;
            }
        }
        if (!is_null($payload)) {
            $response['payload'] = $payload;
        }
        return($response);
    }
}