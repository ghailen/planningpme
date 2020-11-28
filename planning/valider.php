<html>
<head>
<!--NAVBAR BOOTSRAP-->
 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!--END NAVBAR BOOTSRAP-->


<!--bar-->
	
	
	
	<nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
		<li><a href="inscrire.html">Ajout Utilisateur</a></li>
	    <li><a href="ajoutr.html">Ajout Ressource</a></li>
      </ul>
   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="deconnexion.html">Deconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	

<!--SCRIPTSInscrire-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--ENDSCRIPTSInscrire-->
</head>


<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="stagepme";
$strcch="mysql:host=$servername;
dbname=$dbname";


$con=new PDO($strcch,$username,$password);

echo '<center><h1><font color="#0B0B61" >Les Informations de l utilisateur : '; echo $_POST["f"]; echo ' </font></h1></center>';
 
$s=$con->query("SELECT * FROM utilisateur  where identifiant='$_POST[f]';");
while ($dn = $s->fetch())
 {
 echo '<br>';
echo '<div class="panel panel-default">';
 echo ' <!-- Default panel contents -->';

 echo ' <table class="table">';
    echo ' <tr><td> <b>Nom</b> </td><td> <b>Prenom</b> </td><td> <b>Salaire</b> </td><td> <b>Nombre d heure</b> </td><td> <b>Score</b> </td></tr>';
echo ' <tr><td >' ; 
echo $dn['nom'] ;
	echo ' </td><td> ' ;
echo $dn['prenom'];
echo ' </td><td> ';
echo $dn['salaire'];
echo ' </td><td> ';
echo $dn['nombreheure'];
echo ' </td><td> ';
echo $dn['score'];
echo ' </td></tr>' ;

 echo ' </table>';
echo '</div>';
 
 }



$r=$con->query("SELECT * FROM evenement  where idutilisateur='$_POST[f]';");

 echo '<center><h1><font color="#0B0B61" >La Liste des Taches de l utilisateur : '; echo $_POST["f"]; echo ' </font></h1></center>';
 

 
 echo ' <br><br>';
   echo '<h1>Les couleurs des evenements :</h1>';
 echo '  <br>';
  echo ' <table border=0>';
   echo '<tr> <td> <b>Un Conge : <br><br> <b/></td> <td> <img src="green.png"></img> <br><br></td> </tr>';
   echo '<tr> <td> <b>Une Tache : <br><br> <b/></td> <td><img src="blue.png"></img> <br><br> </td> </tr>';
    echo  '<tr> <td><b>Pas d evenement : <br><br> <b/></td> <td> <img src="bluee.png"></img> <br><br></td> </tr>';
   
    echo ' </table>';
 
 
 
$n=$r->rowCount();
if ($n==0)
echo '<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Informations</h3>
  </div>
  <div class="panel-body">
    Pas de taches
  </div>
</div>';
else 
$i=0;

 while ($d = $r->fetch())
{ 
if ($d['title']=='conges')
{echo '<br>';
echo '<div class="panel panel-success">';
 echo ' <!-- Default panel contents -->';
  echo '<div class="panel-heading">Informations Sur l evenement</div>';
  echo'<div class="panel-body">';
  
  echo'</div>';

 
 echo ' <table class="table">';
    echo ' <tr><td> <b>Utilisateur</b> </td><td> <b>evenement</b> </td><td> <b>Date de debut</b> </td><td> <b>Date de fin</b> </td><td> <b>Ressources</b> </td></tr>';
echo ' <tr><td >' ; 
echo $d['idutilisateur'] ;
	echo ' </td><td> ' ;
echo $d['title'];
echo ' </td><td> ';
echo $d['start'];
echo ' </td><td> ';
echo $d['end'];
echo ' </td><td> ';
echo $d['ressource'];
echo ' </td></tr>' ;

 echo ' </table>';
echo '</div>';
}

else

{echo '<br>';
echo '<div class="panel panel-primary">';
 echo ' <!-- Default panel contents -->';
  echo '<div class="panel-heading">Informations Sur l evenement</div>';
  echo'<div class="panel-body">';
  
  echo'</div>';

 
 echo ' <table class="table">';
    echo ' <tr><td> <b>Utilisateur</b> </td><td> <b>evenement</b> </td><td> <b>Date de debut</b> </td><td> <b>Date de fin</b> </td><td> <b>Ressources</b> </td></tr>';
echo ' <tr><td >' ; 
echo $d['idutilisateur'] ;
	echo ' </td><td> ' ;
echo $d['title'];
echo ' </td><td> ';
echo $d['start'];
echo ' </td><td> ';
echo $d['end'];
echo ' </td><td> ';
echo $d['ressource'];
echo ' </td></tr>' ;

 echo ' </table>';
echo '</div>';
}


} 
?>
<body>
</body>
</html>