<?php
if(isset($_COOKIE["selecionidioma.php"])){
    if($_COOKIE["selecionidioma"]=="sp"){
        header("location:pag_español.php");
    }else if($_COOKIE["selecionidioma.php"]=="en"){
        header("location:pag_ingles.php");
    }
}
?>
