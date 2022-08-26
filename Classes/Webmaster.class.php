<?php
    include_once 'Conn.class.php';

    Class Webmaster{
        private $id;
        private $Pseudo;
        private $MPasse;
        private $Rolee;
        private $c;
        
        public function __construct($i,$val0,$val1,$val2){
            $this->id=$i;
            $this->Pseudo=$val0;
            $this->MPasse=$val1;
            $this->Rolee=$val2;
            $this->c=new Conn;
        }

        public function Ident()
        {
            $req=$this->c->getcon()->prepare("INSERT INTO webmaster (Pseudo,Passe,Rolee) VALUES (?,?,?)");
            $req->execute(array($this->Pseudo,$this->MPasse,$this->Rolee));
        }

        public function Auth()
        {
            $val="";
            $req=$this->c->getcon()->prepare("SELECT Rolee FROM webmaster WHERE Pseudo=:nom AND Passe=:ps");
            $req->execute(array('nom'=>$this->Pseudo,'ps'=>$this->MPasse)) or die(print_r($req->errorInfo()));
            while ($ligne=$req->fetch()) {
                $val=$ligne['Rolee'];
            }
            return $val;
            $req->closeCursor(); 
        }

        public function AuthIde()
        {
            $val="";
            $req=$this->c->getcon()->prepare("SELECT idWebmaster FROM webmaster WHERE Pseudo=:nom AND Passe=:ps");
            $req->execute(array('nom'=>$this->Pseudo,'ps'=>$this->MPasse)) or die(print_r($req->errorInfo()));
            while ($ligne=$req->fetch()) {
                $val=$ligne['idWebmaster'];
            }
            return $val;
            $req->closeCursor(); 
        }

        public function SuppMaster($cd)
        {
            if (!empty($cd)) {
                $req=$this->c->getcon()->prepare("DELETE FROM webmaster WHERE idWebmaster=:cle");
                $req->execute(array('cle'=>$cd)) or die(print_r($req->errorInfo())); 
            }  
        }

        public function Modif()
        {
            $req=$this->c->getcon()->prepare("UPDATE webmaster SET Pseudo=:ps,Passe=:pass,Rolee=:ro WHERE idWebmaster=:cle");
            $req->execute(array('ps'=>$this->Pseudo,'pass'=>$this->MPasse,'ro'=>$this->Rolee,'cle'=>$this->id)) or die(print_r($req->errorInfo()));    
        }

        public function GetPseudo()
        {
            $rec=$this->c->getcon()->query("SELECT Pseudo from webmaster WHERE idWebmaster=$this->id");
            while ($ligne=$rec->fetch()) {
                return $ligne['Pseudo'];
            }
            $rec->closeCursor();
        }

        public function GetRole()
        {
            $rec=$this->c->getcon()->query("SELECT Rolee from webmaster WHERE idWebmaster=$this->id");
            while ($ligne=$rec->fetch()) {
                return $ligne['Rolee'];
            }
            $rec->closeCursor();
        }

        public function Liste()
        {
            $rec=$this->c->getcon()->query("SELECT * FROM webmaster");
            while ($ligne=$rec->fetch()){
                echo "<tr>
                            <td>".$ligne['idWebmaster']."</td>
                            <td>".$ligne['Pseudo']."</td>
                            <td>".$ligne['Rolee']."</td>
                    
                            <td>
                                <form method='post' action='WebController.php'>
                                        <a class='btn btn-warning btn-xs' href='registerUp.php?id=".$ligne['idWebmaster']."'>Modifier</a>
                                        <button class='btn btn-danger btn-xs' type='submit' name='BtnSu' value=".$ligne['idWebmaster'].">Supprimer</button>
                                </form>
                            </td>
                    </tr>";
            }
            $rec->closeCursor();   
        }

        public function Compter()
        {
            $rec=$this->c->getcon()->query("SELECT count(idWebmaster) as nbr FROM webmaster");
            while ($ligne=$rec->fetch()){
                return $ligne['nbr'];
            }
            $rec->closeCursor();
        }
    }
?>