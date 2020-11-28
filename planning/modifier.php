
<!--<html>
   <head>
       <title>Réception de paramètres dans l'URL</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body>
   
   <p>Bonjour  !</p>-->
   
   

<html>
<head>

	<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="stagepme";
$strcch="mysql:host=$servername;
dbname=$dbname";
   
   $a=$_GET['id_evenement'];
  
   $b=$_GET['ident'];
   
   //echo date('Y-m-d H:i:s');
   try{
$con=new PDO($strcch,$username,$password);

$r=$con->query("SELECT end FROM evenement where id='$a'");
$req="Delete from evenement where id='$a'";
$req1="update utilisateur set score=score+10 where identifiant='$b';";
$req2="update utilisateur set salaire=500 where score>300 and score<500;";
$req3="update utilisateur set salaire=700 where score>500 and score<700);";
$req4="update utilisateur set salaire=1000 where score>700 ;";


$donnees = $r->fetch();
//echo $donnees["end"];
if ($donnees["end"]>date('Y-m-d H:i:s'))
{
$con->exec($req1);
}
$con->exec($req);
$con->exec($req2);
$con->exec($req3);
$con->exec($req4);
}
catch (PDOException $e)
{echo $e->Get_Message();}

?>


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
    <!--TITLE--><h1>l'evenement est validé</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Si vous terminé la tache dans avant la date de fin vous aurez +10 a votre Score,
	Il faut s'identifier une autre fois  .</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	
    <!--FOOTER-->
	


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