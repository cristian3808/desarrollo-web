<?php
if(!$_COOKIE["selecionidioma.php"]){
    header("Location:selecionidioma.php");
    //condision si no encuentra la cookie lo redirecciona a la pagina de seleccion
}else if ($_COOKIE["selecionidioma.php"]="sp"){
    header("location:pag_español.php");
    //si el usuario selecciona idioma español lo redirecciona a la pagina en español
}else if ($_COOKIE["selecionidioma.php"]=="en"){
    header("location:pag_ingles.php");
    //si el usuario selecciona idioma ingles lo redirecciona a la pagina en ingles
};
?>