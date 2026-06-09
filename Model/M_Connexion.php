<?php

    class Connexion
    {
       public $server='localhost';
       public $dbname='cars_ehm';
       public $user='root';
       public $pass='';
       static $cnx=null;

       public function __construct($ser='localhost',$dbname='cars_ehm',$user='root',$pass='')
        {
            $this->server=$ser;
            $this->dbname=$dbname;
            $this->user=$user;
            $this->pass=$pass;
            

        }
        public function connexion()
        {
            try 
            {
                Connexion::$cnx =new PDO("mysql:host={$this->server};dbname={$this->dbname}",$this->user,$this->pass);
            } 
            catch (PDOException  $er) 
            {         }
        }

        public function Deconnexion()
        {
            Connexion::$cnx =null;
        }


    }
?>