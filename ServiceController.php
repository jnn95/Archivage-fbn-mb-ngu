<?php
    require_once 'Classes/Service.class.php';
    require_once 'Controllers/Midelware.php';

    if(isset($_POST['btne'])){
        $var1=securisation($_POST['libs']);
        if(!empty($var1)){
            $se=new Service("",$var1);
            $se->EnreServ();
            header('location:Indexa.php?inc=serv'); 
        }
    }elseif(isset($_POST['btnu'])){
        $code=securisation($_POST['is']);
        $var2=securisation($_POST['libs']);
        $se=new Service($code,$var2);
        $se->ModServ();
        header('location:Indexa.php?inc=liste');
    }elseif(isset($_POST['BtnS'])){
        $code=securisation($_POST['BtnS']);
        $se=new Service("","");
        $se->SuppServ($code);
        header('location:Indexa.php?inc=liste');
    }
?>