<?php

class Users
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login($data){

        $sql = "SELECT * FROM user WHERE name='$data->login' AND password='$data->password'";

        $result = $this->conn->query($sql);

        $row = $result->fetch();

        if($row) {
            return ['message' => 'Success login', 'token' => $this->generateToken()];
        } else {
            return ['message' => 'Error login'];
        }

    }

    public function generateToken()
    {
        return str_shuffle('QWERTYUIOPASDFGHJKLZXCVBNM12567890wertyuiopghjkbnmdfg');
    }

}