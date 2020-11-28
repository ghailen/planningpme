<!DOCTYPE html>
<html>
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
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="stagepme";
$strcch="mysql:host=$servername;
dbname=$dbname";


try {
$con=new PDO($strcch,$username,$password);

$req=$con->query("SELECT * FROM `stagepme`.`utilisateur` where `identifiant`='$_POST[username]' and `motdepasse`='$_POST[password]'");

}
catch (PDOException $e)
{echo $e->Get_Message();}



 while ($donnees = $req->fetch())
{

if ($donnees['type']=='admin')
{


?>







<div class="header">


   
<!--bar-->
	
	
	
	<nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><b>Administrateur :</b><?php echo $donnees['identifiant'] ?>  <span class="sr-only">(current)</span></a></li>
        <li><a href="#"><b>Salaire :</b><?php echo $donnees['salaire'] ?> $</a></li>
		<li><a href="#"><b>Nombre D'heure :</b><?php echo $donnees['nombreheure'] ?></a></li>
		<li><a href="#"><b>Score :</b><?php echo $donnees['score'] ?></a></li>
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
	

<!--endbar-->
   <center><h1><font color="#0B0B61" >Bienvenue dans la section de gestion de planning de PME</font></h1></center><!--END TITLE-->

   <br><br>
   
   
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='../lib/cupertino/jquery-ui.min.css' />
<link href='../fullcalendar.css' rel='stylesheet' />
<link href='../fullcalendar.print.css' rel='stylesheet' media='print' />

<!--SCRIPTSInscrire-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--ENDSCRIPTSInscrire-->

<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>

<h1>La liste des utilisateurs :</h1>
<form name='formulaire' method='POST' action='valider.php'>
<select name="f" class="form-control">
<option value="" selected="selected"> Selectionner un utilisateur </option>
<?php

 $res = $con->query('SELECT identifiant FROM utilisateur where type="utilisateur"');
 while ($d = $res->fetch())
{
?>

<option value="<?php echo $d['identifiant']; ?>"> <?php echo $d['identifiant']; ?></option>

<?php

}

?>

</select>

<div class="btn-group" role="group" aria-label="...">
<input type="submit" name="afficher" value="afficher" class="btn btn-default">
 <br>
</div>

</form>
<br><br>

<h1>Le Calendrier D'ajout :</h1>

<br>
<script>

	$(document).ready(function() {
        var date = new Date();
		var D = date.getDate();
		var M = date.getMonth();
		var y = date.getFullYear();
		var calendar = $('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '2015-05-22',
			editable: true,
			
			events: "http://127.0.0.1/stage/planning/events.php",
			selectable: true,
selectHelper: true,
select: function(start, end, allDay) {
 
 var title = prompt('Titre de l evenement(tache ou conge) :');
 var idutilisateur = prompt('le nom de l utilisateur:');
 var ressource = prompt('le nom de la ressource:');
 
 if ((title) && (ressource) && (idutilisateur)){

 var start=moment(start).format('YYYY/MM/DD/HH');
var end=moment(end).format('YYYY/MM/DD/HH');
 $.ajax({
 url: 'http://127.0.0.1/stage/planning/add_tache.php',
 data: 'title='+ title+'&ressource='+ ressource+'&idutilisateur='+idutilisateur+'&start='+ start +'&end='+ end,
 type: "POST",
 success: function(json) {
 alert('l evenement est ajouté');
 }
 });
 calendar.fullCalendar('renderEvent',
 {
 title: title,
 ressource: ressource,
 idutilisateur: idutilisateur,
 start: start,
 end: end,
 allDay: allDay
 },
 true // make the event "stick"
 );
 }
 calendar.fullCalendar('unselect');
},
 

		});
		
	});

</script>
	<?php
}
else if ($donnees['type']=='utilisateur')

{


 ?>




<div class="header">


   
<!--bar-->
	
	


	<nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><b>Utilisateur :</b><?php echo $donnees['identifiant'] ?>  <span class="sr-only">(current)</span></a></li>
		<li><a href="#"><b>Salaire :</b><?php echo $donnees['salaire'] ?>$</a></li>
		<li><a href="#"><b>Nombre D'heure :</b><?php echo $donnees['nombreheure'] ?></a></li>
		<li><a href="#"><b>Score :</b><?php echo $donnees['score'] ?></a></li>
      </ul>
   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="deconnexion.html">Deconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	


<!--endbar-->
   <center><h1><font color="#0B0B61" >Bienvenue dans la section de planning de PME</font></h1></center><!--END TITLE-->

   <br><br>
   <h1>Les couleurs des evenements :</h1>
   <br>
   <table border=0>
    <tr> <td> <b>Un Conge : <br><br> <b/></td> <td> <img src="green.png"></img> <br><br></td> </tr>
   <tr> <td> <b>Une Tache : <br><br> <b/></td> <td><img src="blue.png"></img> <br><br> </td> </tr>
    <tr> <td><b>Pas d evenement : <br><br> <b/></td> <td> <img src="bluee.png"></img> <br><br></td> </tr>
   
   </table>
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='../lib/cupertino/jquery-ui.min.css' />
<link href='../fullcalendar.css' rel='stylesheet' />
<link href='../fullcalendar.print.css' rel='stylesheet' media='print' />

<!--SCRIPTSInscrire-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--ENDSCRIPTSInscrire-->

<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>



	<form name='f' action='valider.php' method='POST'>
	

<?php

	
	$con=new PDO($strcch,$username,$password);

$req=$con->query("SELECT * FROM evenement  where idutilisateur='$_POST[username]'");
$n=$req->rowCount();
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
 while ($donnees = $req->fetch())
{ 
if ($donnees['title']=='conges')
{echo '<br>';
echo '<div class="panel panel-success">';
 echo ' <!-- Default panel contents -->';
  echo '<div class="panel-heading">Informations Sur l evenement</div>';
  echo'<div class="panel-body">';
   echo ' <p>Si vous avez terminé cet evenement cliquer sur l image <img src="valider.jpg"> de la colonne validation </p>';
  echo'</div>';

 
 echo ' <table class="table">';
    echo ' <tr><td> <b>Utilisateur</b> </td><td> <b>evenement</b> </td><td> <b>Date de debut</b> </td><td> <b>Date de fin</b> </td><td> <b>Ressources</b> </td><td><b>Validation</b></td></tr>';
echo ' <tr><td >' ; 
echo $donnees['idutilisateur'] ;
	echo ' </td><td> ' ;
echo $donnees['title'];
echo ' </td><td> ';
echo $donnees['start'];
echo ' </td><td> ';
echo $donnees['end'];
echo ' </td><td> ';
echo $donnees['ressource'];
echo ' </td><td>' ;
echo '<a href="modifier.php?id_evenement='.$donnees["id"].'&ident='.$donnees["idutilisateur"].'"><img src="valider.jpg"></a>';
echo '</td></tr>' ;

 echo ' </table>';
echo '</div>';

echo '<input type="hidden"  name="id_evenement" size="20" value="'.$donnees["id"].'"/><br/>';

echo '<div class="btn-group" role="group" aria-label="...">';

 echo '<br>';
echo '</div> ';
}



else
{
echo '<br>';
echo '<div class="panel panel-primary">';
 echo ' <!-- Default panel contents -->';
  echo '<div class="panel-heading">Informations Sur l evenement</div>';
  echo'<div class="panel-body">';
   echo ' <p>Si vous avez terminé cet evenement cliquer sur l image <img src="valider.jpg"> de la colonne validation </p>';
  echo'</div>';

 
 echo ' <table class="table">';
    echo ' <tr><td> <b>Utilisateur</b> </td><td> <b>evenement</b> </td><td> <b>Date de debut</b> </td><td> <b>Date de fin</b> </td><td> <b>Ressources</b> </td><td><b>Validation</b></td></tr>';
echo ' <tr><td >' ; 
echo $donnees['idutilisateur'] ;
	echo ' </td><td> ' ;
echo $donnees['title'];
echo ' </td><td> ';
echo $donnees['start'];
echo ' </td><td> ';
echo $donnees['end'];
echo ' </td><td> ';
echo $donnees['ressource'];

echo ' </td><td>';
echo '<a href="modifier.php?id_evenement='.$donnees["id"].'&ident='.$donnees["idutilisateur"].'"><img src="valider.jpg"></a>';
echo '</td></tr>' ;

 echo ' </table>';
echo '</div>';
echo '<input type="hidden"  name="id_evenement" size="20" value="'.$donnees["id"].'"/><br/>';
echo '<div class="btn-group" role="group" aria-label="...">';
 
 
 echo '<br>';
echo '</div> ';
}



}




}
}

?>

 
<form/>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>
<br><br>


</body>

</html>
