<?php
class user
{
    private $id;
    private $name;
    private $username;
    private $password;

    function __construct($array)
    {
        foreach ($array as $user => $value) {
            $this->$user = $value;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
