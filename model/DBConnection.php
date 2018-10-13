<?php
    namespace model;
    use PDO;

class DBConnection
{
    public $servername;
    public $username;
    public $password;


    public function __construct($servername, $username, $password)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect(){
        return new PDO($this->servername, $this->username, $this->password);
    }


}
?>