<?php
    include_once 'Conn.class.php';

    Class Document{
        private $idDocument;
        private $LibDoc;
        private $Fils;
        private $DateScan;
        private $RefFiche;
        private $idAgent;
        private $c;
        
        public function __construct($j,$val0,$val1,$val2,$val3,$val4){
            $this->idDocument=$j;
            $this->LibDoc=$val0;
            $this->Fils=$val1;
            $this->DateScan=$val2;
            $this->RefFiche=$val3;
            $this->idAgent=$val4;
            $this->c=new Conn;
        }

        public function AddDoc(){
            $req=$this->c->getcon()->prepare("INSERT INTO document(LibDoc, Fils, DateScan, RefFiche, idAgent) VALUES (?,?,?,?,?)");
            $req->execute(array($this->LibDoc,$this->Fils,$this->DateScan,$this->RefFiche,$this->idAgent));
            echo '<script>alert("Enregistrement réussi");</script>';
        }

        public function SuppDoc($idd){
            if (!empty($idd)) {
                $req=$this->c->getcon()->prepare("DELETE FROM document WHERE idDocument=:cle");
                $req->execute(array('cle'=>$idd)) or die(print_r($req->errorInfo()));  
            }
        }

        public function ModDoc(){
                $req=$this->c->getcon()->prepare("UPDATE document SET LibDoc=:lib,DateScan=:dt,RefFiche=:ref,idAgent=:idg WHERE idDocument=:cle");
                $req->execute(array('lib'=>$this->LibDoc,'dt'=>$this->DateScan,'ref'=>$this->RefFiche,'idg'=>$this->idAgent,'cle'=>$this->idDocument)) or die(print_r($req->errorInfo())); 
        }
        
        public function AffDoc(){
            $rec=$this->c->getcon()->query("SELECT * FROM document JOIN agent ON document.idAgent=agent.idAgent");
            while ($ligne=$rec->fetch()) {
                echo "<tr>
                            <td>".$ligne['LibDoc']."</td>
                            <td>".$ligne['DateScan']."</td>
                            <td>".$ligne['RefFiche']."</td>
                            <td>".$ligne['Nom']."</td>
                            <td>
                                <div class='table-data-feature'>
                                <form method='post' action='DocController.php'>
                                    <a class='item' data-toggle='tooltip' data-placement='top' name='' type='submit' title='Ouvrir' href=".$ligne['Fils'].">
                                        <i class='zmdi zmdi-mail-send'></i>
                                    </a>
                                    <a href='Indexa.php?inc=docu&id=".$ligne['idDocument']."' class='item' data-toggle='tooltip' data-placement='top' name='Btnup' title='Modification'>
                                        <i class='zmdi zmdi-edit'></i>
                                    </a>
                                    <button class='item' data-toggle='tooltip' data-placement='top' name='BtnSup' type='submit' title='Suppression' value=".$ligne['idDocument'].">
                                        <i class='zmdi zmdi-delete'></i>
                                    </button>
                                </form>
                                </div>
                            </td>
                    </tr>";
            }
            $rec->closeCursor();
        }

        public function RechDoc($arg){
            if(!empty($arg))
            {
                $rec=$this->c->getcon()->query("SELECT * FROM document JOIN agent ON document.idAgent=agent.idAgent WHERE DateScan=:cle");
                $rec->execute(array('cle'=>$arg)) or die(print_r($req->errorInfo()));
                while ($ligne=$rec->fetch()) {
                    echo "<tr>
                            <td>".$ligne['LibDoc']."</td>
                            <td>".$ligne['Fils']."</td>
                            <td>".$ligne['DateScan']."</td>
                            <td>".$ligne['RefFiche']."</td>
                            <td>".$ligne['Nom']."</td>
                    </tr>";
                }
                $rec->closeCursor();
            }
        }

        public function GetTitre()
        {
            $rec=$this->c->getcon()->query("SELECT LibDoc FROM document WHERE idDocument=$this->idDocument");
            while ($ligne=$rec->fetch()) {
                return $ligne['LibDoc'];
            }
            $rec->closeCursor();
        }

        public function Compter()
        {
            $rec=$this->c->getcon()->query("SELECT count(LibDoc) as nbr FROM document");
            while ($ligne=$rec->fetch()) {
                return $ligne['nbr'];
            }
            $rec->closeCursor();
        }

        public function GetDt()
        {
            $rec=$this->c->getcon()->query("SELECT DateScan FROM document WHERE idDocument=$this->idDocument");
            while ($ligne=$rec->fetch()) {
                return $ligne['DateScan'];
            }
            $rec->closeCursor();
        }

        public function GetRef()
        {
            $rec=$this->c->getcon()->query("SELECT RefFiche FROM document WHERE idDocument=$this->idDocument");
            while ($ligne=$rec->fetch()) {
                return $ligne['RefFiche'];
            }
            $rec->closeCursor();
        }

        public function GetIdA()
        {
            $rec=$this->c->getcon()->query("SELECT idAgent FROM document WHERE idDocument=$this->idDocument");
            while ($ligne=$rec->fetch()) {
                return $ligne['idAgent'];
            }
            $rec->closeCursor();
        }
        
    }
?>