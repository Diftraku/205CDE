<?php
require(APPPATH.'libraries/REST_Controller.php');
class Chat extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('chat_model');
        $this->load->helper('url_helper');
    }

    public function messages_get()
    {
        $this->response($this->chat_model->get_messages());
    }

    public function message_post()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() === TRUE)
        {
            $this->chat_model->add_message();
            $this->response(['status' => 'ok']);
        }
        else {
            $this->response(['status' => 'error'], 418);
        }
    }
}
