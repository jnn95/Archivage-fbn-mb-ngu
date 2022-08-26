<?php
    class Conn{
        private $serv='localhost';
        private $dbname='dbarchi;charset=utf8';
        private $user='root';
        private $pass='';

        public function getcon(){
            try{
                return $conex=new PDO("mysql:host=".$this->serv.";dbname=".$this->dbname,$this->user,$this->pass);
            }catch(PDOException $ex){ 
                return $ex->getMessage();
            }
        }
    }
?>