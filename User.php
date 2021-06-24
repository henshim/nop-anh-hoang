<?php


class User
{

    public $name;
    public $email;
    public $pass;

    public function __construct($name,$email, $pass)
    {
        $this->name=$name;
        $this->email=$email;
        $this->pass=$pass;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass): void
    {
        $this->pass = $pass;
    }
}