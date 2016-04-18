<?php
$components = parse_url($_SERVER['REQUEST_URI']);
$components['path'] = explode('/', $components['path']);
// Pop the first bit off
array_shift($components['path']);
$query = explode('&', $components['query']);
$components['query'] = array();
foreach ($query as $query_kv) {
    list($key,$val) = explode('=', $query_kv);
    // Put em back in the stack and sanitize
    $components['query'][filter_var($key, FILTER_SANITIZE_STRING)] = filter_var($val, FILTER_SANITIZE_STRING);
}

header('Content-type', 'application/json');

if ($components['path'][0] == 'lucky') {
    if ($components['path'][1] == 'word') {
        send_response(['word'=>get_lucky_word()]);
    }
    else if ($components['path'][1] == 'number') {
        send_response(['number'=>get_lucky_number()]);
    }
    else {
        send_response(['word'=>get_lucky_word(),'number'=>get_lucky_number()]);
    }
}
else {
    method_not_allowed();
}

function get_lucky_word() {
    $word = file_get_contents('http://randomword.setgetgo.com/get.php');
    return filter_var($word, FILTER_SANITIZE_STRING);
}

function get_lucky_number() {
    return rand(0, getrandmax());
}

function method_not_allowed() {
    send_response(null, false, 405, 'Method not allowed');
}

function send_response($payload=null, $success=true, $code=200, $message='OK') {
    $response = ['code'=>$code,'success'=>$success];
    if ($code != 200 && $message != 'OK') {
        header('HTTP/'.$_SERVER['SERVER_PROTOCOL'].' '.$code.' '.$message, true);
        if ($success != true) {
            $response['reason'] = $message;
        }
    }
    if (!is_null($payload)) {
        $response['payload'] = $payload;
    }
    print(json_encode($response));
}