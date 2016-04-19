<?php
class Chat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('chat_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->helper('form');
        $data['chat'] = $this->chat_model->get_messages();
        $data['title'] = 'Chat';

        $this->load->view('templates/header', $data);
        $this->load->view('chat/index', $data);
        $this->load->view('templates/footer');
    }

    public function send()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() === TRUE)
        {
            $this->chat_model->add_message();
        }
        redirect('chat/index');
    }
}
