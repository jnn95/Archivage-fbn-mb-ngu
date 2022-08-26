<?php
    include_once 'Conn.class.php';

    Class Service
    {
        private $IdSer;
        private $Lib;
        private $c;

        public function __construct($is,$l){
            $this->IdSer=$is;
            $this->Lib=$l;
            $this->c=new Conn;
        }

        public function ChargerService()
        {
            $req=$this->c->getcon()->query("SELECT * FROM service ORDER BY LibServ ASC");
            while ($val=$req->fetch()) {
                echo "<option value=".$val['idService'].">".$val['LibServ']."</option>";
            }
            $req->closeCursor();
        }

        public function EnreServ(){
            $req=$this->c->getcon()->prepare("INSERT INTO service(LibServ) VALUES (?)");
            $req->execute(array($this->Lib));
            echo '<script>alert("Enregistrement réussi");</script>';
        }

        public function SuppServ($Is){
            if (!empty($Is)) {
                $req=$this->c->getcon()->prepare("DELETE FROM service WHERE idService=:cle");
                $req->execute(array('cle'=>$Is)) or die(print_r($req->errorInfo()));    
            }
        }

        public function ModServ(){
                $req=$this->c->getcon()->prepare("UPDATE service SET LibServ=:lib WHERE idService=:cle");
                $req->execute(array('lib'=>$this->Lib,'cle'=>$this->IdSer)) or die(print_r($req->errorInfo()));
        }

        public function AffServ(){
            $rec=$this->c->getcon()->query("SELECT * from service");
            while ($ligne=$rec->fetch()){
                echo "<tr>
                            <td>".$ligne['idService']."</td>
                            <td>".$ligne['LibServ']."</td>
                            <td>
                                <form method='post' action='ServiceController.php'>
                                        <a class='btn btn-warning btn-xs' href='Indexa.php?inc=servUp&id=".$ligne['idService']."'>Modifier</a>
                                        <button class='btn btn-danger btn-xs' type='submit' name='BtnS' value=".$ligne['idService'].">Supprimer</button>
                                </form>
                            </td>
                    </tr>";
            }
            $rec->closeCursor();
        }

        public function GetLib()
        {
            $rec=$this->c->getcon()->query("SELECT LibServ FROM service WHERE idService=$this->IdSer");
            while ($ligne=$rec->fetch()) {
                return $ligne['LibServ'];
            }
            $rec->closeCursor();
        }

        public function Compter()
        {
            $rec=$this->c->getcon()->query("SELECT count(LibServ) as nbr FROM service");
            while ($ligne=$rec->fetch()){
                return $ligne['nbr'];
            }
            $rec->closeCursor();
        }
    }
?>