<?php
class Model {
    private $file = "messages.txt";

    public function messages() {
        if (file_exists($this->file)) {
            return file($this->file);
        } else {
            return array();
        }
    }

    public function add_message($nickname, $message) {
        set_cookie('nickname', $nickname, time()+3600);
        $message = date("H:i:s") . ' <' . $nickname . '> '. $message;
        file_put_contents($this->file, "{$message}\n", FILE_APPEND);
    }
}
