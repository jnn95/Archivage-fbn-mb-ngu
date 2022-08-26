<?php
    require_once 'Classes/Webmaster.class.php';
    require_once 'Controllers/Midelware.php';

    if(isset($_POST['btne'])){
        $var1=securisation($_POST['name']);
        $var2=securisation($_POST['pass']);
        $var3=securisation($_POST['passrep']);
        $var4=securisation($_POST['role']);
        if($var2==$var3){
            $pass=md5($var2);
            $w=new Webmaster("",$var1,$pass,$var4);
            $w->Ident();
            header('location:Index.php');
        }else{
            header('location:Register.php?msg=1');
        }
    }elseif(isset($_POST['btnu'])){
        $var0=securisation($_POST['code']);
        $var1=securisation($_POST['name']);
        $var2=securisation($_POST['pass']);
        $var3=securisation($_POST['role']);
        $pass=md5($var2);
        $w=new Webmaster($var0,$var1,$pass,$var3);
        $w->Modif();
        header('location:Indexa.php?inc=liste');
    }elseif(isset($_POST['BtnSu'])){
        $co=securisation($_POST['BtnSu']);
        $w=new Webmaster("","","","");
        $w->SuppMaster($co);
        header('location:Indexa.php?inc=liste');
    }elseif(isset($_POST['BtnLog'])){
        $var0=securisation($_POST['pseudo']);
        $var1=securisation($_POST['pass']);
        $pass=md5($var1);
        $log=new Webmaster("",$var0,$pass,"");
        if($log->Auth()=="Admin"){
            session_start();
            $_SESSION['r']=$log->Auth();
            $_SESSION['ps']=$var0;
            $_SESSION['mp']=$pass;
            header('location:Indexa.php');
        }else{
            header('location:Index.php?msg=1');
        }
    }
?>