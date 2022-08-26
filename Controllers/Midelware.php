<?php
    function securisation($donnee){
        $donnee=htmlspecialchars($donnee);
        $donnee=trim($donnee);
        $donnee=stripslashes($donnee);
        $donnee=strip_tags($donnee);
        return $donnee;
    }
?>