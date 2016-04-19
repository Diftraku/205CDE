<?php

require(APPPATH.'libraries/REST_Controller.php');

class Persons extends REST_Controller {

    // GET method implementation for .../Persons/list
    function list_get() {

        // establish connection to MongoDB server
        $connection = new MongoClient();

        // select database
        $db = $connection->company;

        // select collection
        $collection = $db->persons;

        // retrieve all items in collection
        $cursor = $collection->find();

        if($cursor->hasNext())
        {
            $this->response(iterator_to_array($cursor));
        }

        // close connection
        $connection->close();
    }

    // POST method implementation for .../Persons/add
    function add_post() {

        // establish connection to MongoDB server
        $connection = new MongoClient();

        // select database
        $db = $connection->company;

        // select collection
        $collection = $db->persons;
        $current_id = array_values(iterator_to_array($collection->find()->sort(['id' => -1])->limit(1)))[0]['id'];

        $this->response($collection->insert(['id' => $current_id+1, 'first name' => $this->post('first_name'), 'last name' => $this->post('last_name'), 'salary' => intval($this->post('salary'))]));

        // close connection
        $connection->close();
    }
}

