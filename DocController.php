<?php
    require_once 'Classes/Document.class.php';
    require_once 'Controllers/Midelware.php';

    if(isset($_POST['btna'])){
        $var1=securisation($_POST['titre']);
        //$var2=securisation($_POST['doc']);
        $var3=securisation($_POST['dt']);

        $var5=securisation($_POST['ref']);
        $var6=securisation($_POST['code']);

        $file_name=$_FILES['doc']['name'];
        $var4='Archives/'.$file_name;
        $nomp='Archives/'.$file_name;
        $file=$_FILES['doc'];
        $tmp_name = $_FILES["doc"]["tmp_name"];
        $ext=strtolower(substr($file['name'], -3));
        $all_ext=array("jpg","png","jpeg");
                    if (in_array($ext, $all_ext)) {
                        move_uploaded_file($file["tmp_name"], $var4);
                    }else{ 
                        echo '<script> alert("Erreur importation photo!") ;</script>';
                    }
        $pro=new Document("",$var1,$nomp,$var3,$var5,$var6);
        $pro->AddDoc();
        header('location:Indexa.php?inc=doc');
    }elseif(isset($_POST['btnu'])){
        $var0=securisation($_POST['cd']);
        $var1=securisation($_POST['titre']);
        $var2=securisation($_POST['dt']);
        $var3=securisation($_POST['ref']);
        $var4=securisation($_POST['code']);
        $pro=new Document($var0,$var1,"",$var2,$var3,$var4);
        $pro->ModDoc();
        header('location:Indexa.php?inc=liste');
    }elseif(isset($_POST['BtnSup'])){
        $var0=securisation($_POST['BtnSup']);
        $pro=new Document("","","","","","");
        $pro->SuppDoc($var0);
        header('location:Indexa.php?inc=liste');
    }
?>