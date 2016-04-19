<?php

class Chat_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_messages()
    {
        $query = $this->db->get('chat');
        return $query->result_array();
    }

    public function add_message()
    {
        $this->load->helper('url');


        $data = array(
            'nickname' => $this->input->post('nickname'),
            'message' => $this->input->post('message'),
            'posted' => time(),
            'ip' => $_SERVER['REMOTE_ADDR']
        );

        return $this->db->insert('chat', $data);
    }
}
