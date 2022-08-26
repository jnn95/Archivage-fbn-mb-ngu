<?php
    include_once 'Conn.class.php';

    class Agent
    {
        private $idagent;
        private $Nom;
        private $Postnom;
        private $Prenom;
        private $Tel;
        private $Mail;
        private $idServ;
        private $c;
        
        public function __construct($id,$val1,$val2,$val3,$val4,$val5,$val6){
            $this->idagent=$id;
            $this->Nom=$val1;
            $this->Postnom=$val2;
            $this->Prenom=$val3;
            $this->Tel=$val4;
            $this->Mail=$val5;
            $this->idServ=$val6;
            $this->c=new Conn;
        }
       
        public function ChargerAgent()
        {
            $req=$this->c->getcon()->query("SELECT concat(Nom,' ',Postnom,' ',Prenom) as noma,idAgent FROM agent ORDER BY Nom ASC");
            while ($val=$req->fetch()) {
                echo "<option value=".$val['idAgent'].">".$val['noma']."</option>";
            }
            $req->closeCursor();
        }

        public function EnreAgent(){
            $req=$this->c->getcon()->prepare("INSERT INTO agent (Nom,Postnom,Prenom,Tel,Mail,idService) VALUES (?,?,?,?,?,?)");
            $req->execute(array($this->Nom,$this->Postnom,$this->Prenom,$this->Tel,$this->Mail,$this->idServ));
            echo '<script>alert("Enregistrement réussi");</script>';
        }

        public function AfficherAgent(){
            $rec=$this->c->getcon()->query("SELECT * from agent JOIN service ON agent.idService=service.idService");
            while ($ligne=$rec->fetch()) {
                echo "<tr>
                            <td>".$ligne['Nom'].'-'.$ligne['Postnom'].'-'.$ligne['Prenom']."</td>
                            <td>".$ligne['Tel']."</td>
                            <td>".$ligne['Mail']."</td>
                            <td>".$ligne['LibServ']."</td>
                    
                            <td>
                                <form method='post' action='AgentController.php'>
                                        <a class='btn btn-warning btn-xs' href='Indexa.php?inc=agu&ig=".$ligne['idAgent']."'>Modifier</a>
                                        <button class='btn btn-danger btn-xs' type='submit' name='BtnSu' value=".$ligne['idAgent'].">Supprimer</button>
                                </form>
                            </td>
                    </tr>";
            }
            $rec->closeCursor();
        }

        public function Compter()
        {
            $rec=$this->c->getcon()->query("SELECT count(idAgent) as nbr FROM agent");
            while ($ligne=$rec->fetch()){
                return $ligne['nbr'];
            }
            $rec->closeCursor();
        }

        public function SupAgent(){
            $req=$this->c->getcon()->prepare("DELETE FROM agent WHERE idAgent=:cle");
            $req->execute(array('cle'=>$this->idagent)) or die(print_r($req->errorInfo()));
        }

        public function ModAgent(){
            $req=$this->c->getcon()->prepare("UPDATE agent SET idAgent=:idg,Nom=:n,Postnom=:pn,Prenom=:pre,Tel=:te,Mail=:ma,idService=:ids WHERE idAgent=:cle");
            $req->execute(array('idg'=>$this->idagent,'n'=>$this->Nom,'pn'=>$this->Postnom,'pre'=>$this->Prenom,'te'=>$this->Tel,'ma'=>$this->Mail,'ids'=>$this->idServ,'cle'=>$this->idagent)) or die(print_r($res->errorInfo()));
        }

        public function RechAgent($rech){
            if(!empty($rech))
            {
                $rec=$this->c->getcon()->query("SELECT * from agent JOIN service ON agent.idService=service.idService WHERE Nom=:cle");
                $rec->execute(array('cle'=>$rech)) or die(print_r($req->errorInfo()));
                while ($ligne=$rec->fetch()) 
                {
                    echo "<tr>
                                <td>".$ligne['Nom']."</td>
                                <td>".$ligne['Postnom'].'-'.$ligne['Prenom']."</td>
                                <td>".$ligne['Tel']."</td>
                                <td>".$ligne['Mail']."</td>
                                <td>".$ligne['LibServ']."</td>
                        </tr>";
                }
                $rec->closeCursor();
            }
        }

        public function GetNom()
        {
            $rec=$this->c->getcon()->query("SELECT Nom FROM agent WHERE idAgent=$this->idagent");
            while ($ligne=$rec->fetch()) {
                return $ligne['Nom'];
            }
            $rec->closeCursor();
        }

        public function GetPoNom()
        {
            $rec=$this->c->getcon()->query("SELECT Postnom FROM agent WHERE idAgent=$this->idagent");
            while ($ligne=$rec->fetch()) {
                return $ligne['Postnom'];
            }
            $rec->closeCursor();
        }

        public function GetPreNom()
        {
            $rec=$this->c->getcon()->query("SELECT Prenom FROM agent WHERE idAgent=$this->idagent");
            while ($ligne=$rec->fetch()) {
                return $ligne['Prenom'];
            }
            $rec->closeCursor();
        }

        public function GetTel()
        {
            $rec=$this->c->getcon()->query("SELECT Tel FROM agent WHERE idAgent=$this->idagent");
            while ($ligne=$rec->fetch()) {
                return $ligne['Tel'];
            }
            $rec->closeCursor();
        }

        public function GetMail()
        {
            $rec=$this->c->getcon()->query("SELECT Mail FROM agent WHERE idAgent=$this->idagent");
            while ($ligne=$rec->fetch()) {
                return $ligne['Mail'];
            }
            $rec->closeCursor();
        }

        public function GetServ()
        {
            $rec=$this->c->getcon()->query("SELECT idService FROM agent WHERE idAgent=$this->idagent");
            while ($ligne=$rec->fetch()) {
                return $ligne['idService'];
            }
            $rec->closeCursor();
        }
    }
    

?>