<?php
require("include/main.inc.php");
require('models/Model.php');
require('models/ModelCareers.php');

//solo para administradores
$validateUser = new ValidateUser($_SESSION[Config::$arrKeySession['user']],1);
if (!$validateUser->validateLevel()){
    die("<script type=\"text/javascript\">alert('No tiene autorizacion para estar aqui');location.href='index.php'</script>");
}
>>>>>>> origin/master

$title = "Administrador de Carreras";

//mensaje de notificacion de alguna accion
$msgnot = "";
//carrera a eliminar
if (isset($_GET['del'])){
    $_GET['del'] = $_GET['del'] + 0;
    $model = new ModelCareers();
    $modelElim=array();
    $modelElim[ 'id' ]=$_GET[ 'del' ];    
    $return = $model->delete( $modelElim );
    if( $return ) $msgnot = "La carrera se elimino correctamente";
    else "La carrera no se puedo elminiar, favor intente de nuevo, si el problema persiste, favor reportar";
}
//TODO: terminar de llenar los metatags
$meta['keywords'] = "";
$meta['description'] = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        //archivo del title
        include("views/titletag.html");
        //archivo de los metatags
        include("views/metatags.html");
        //archivo de los tags javascript 
        include("views/jstags.html");
        //archivo de los tags css
        include("views/csstags.html");
        ?>
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <?php
                //area del logo
                include("views/logo.html");
                //area del menu principal
                include("views/mainmenu.html");
                ?>
            </div>
            <div id="site_content">
                <?=$msgnot  ? "<div class=\"msg\">$msgnot</div>" : "";?>
                <div id="areacareersmanager"></div>                
            </div>
            <?php include("views/footer.html"); ?>
        </div>
    </body>
</html>
 