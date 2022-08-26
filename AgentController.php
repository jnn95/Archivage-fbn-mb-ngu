<?php
    require_once 'Classes/Agent.class.php';
    require_once 'Controllers/Midelware.php';

    if(isset($_POST['btnea'])){
        $var1=securisation($_POST['Nom']);
        $var2=securisation($_POST['Psnom']);
        $var3=securisation($_POST['Pnom']);
        $var4=securisation($_POST['phone']);
        $var5=securisation($_POST['mel']);
        $var6=securisation($_POST['Ids']);
        if(!empty($var1)&&!empty($var6)){
            $a=new Agent("",$var1,$var2,$var3,$var4,$var5,$var6);
            $a->EnreAgent();
            header('location:Indexa.php?inc=ag'); 
        }
    }elseif(isset($_POST['btnm'])){
        $code=securisation($_POST['Id']);
        $var1=securisation($_POST['Nom']);
        $var2=securisation($_POST['Psnom']);
        $var3=securisation($_POST['Pnom']);
        $var4=securisation($_POST['phone']);
        $var5=securisation($_POST['mel']);
        $var6=securisation($_POST['Ids']);
        $a=new Agent($code,$var1,$var2,$var3,$var4,$var5,$var6);
        $a->ModAgent();
        header('location:Indexa.php?inc=liste');
    }elseif(isset($_POST['BtnSu'])){
        $code=securisation($_POST['BtnSu']);
        $a=new Agent($code,$var1,$var2,$var3,$var4,$var5,$var6);
        $a->SupAgent();
        header('location:Indexa.php?inc=liste');
    }
?>