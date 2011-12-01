<?php
include("include/main.inc.php");
//solo para administradores
$validateUser = new ValidateUser($_SESSION[Config::$arrKeySession['user']],1);
if (!$validateUser->validateLevel()){
    die("<script type=\"text/javascript\">alert('No tiene autorizacion para estar aqui');location.href='index.php'</script>");
}

$title = "Administrador de empresas";
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
                <div id="areacompaniesmanager"></div>
            </div>
            <?php include("views/footer.html"); ?>
        </div>
    </body>
</html>
