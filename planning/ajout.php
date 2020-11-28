
<html>
<head>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>

<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="index.html" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>L 'Ajout est terminé avec succes</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Il faut s'identifier une autre fois  .</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	
    <!--FOOTER-->
	
	<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="stagepme";
$strcch="mysql:host=$servername;
dbname=$dbname";



try{
$con=new PDO($strcch,$username,$password);

$req="INSERT INTO `ressources`(`idressource`,`type`, `libr`, `service`, `cout`, `nom`, `prenom`, `adresse`, `telephone`, `email`, `disponibilitede`, `disponibilitea`, `competence`, `reference`, `libelletache`) VALUES ('$_POST[idrr]','$_POST[typer]','$_POST[libr]','$_POST[servr]','$_POST[coutr]','$_POST[nomr]','$_POST[prenomr]','$_POST[adrr]','$_POST[telr]','$_POST[emailr]','$_POST[dr]','$_POST[df]','$_POST[cr]','$_POST[refr]','$_POST[libt]')";
$con->exec($req);

}
catch (PDOException $e)
{echo $e->Get_Message();}




?>

    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="S'identifier" class="button" /><!--END LOGIN BUTTON-->
    
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>