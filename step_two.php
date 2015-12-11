
<?php
	//call array
    $first_name = $_POST['name'];
    $creature = "";
    //$creature = $_POST['creature_type'];
	$error = "";
	$hide_open = "";
	$hide_close = "";
	$name_err = "";
	$creature_err = "";
	
	$robotDesc = array("bot is sleek and shiny with more lasers than you can shake a leg at!","borg beep-boops all the live-long day. We don't know how to shut them off, so have fun with that...",".EXE is clunky and in need of repairs. Kinda rustic though.","mech is incredible and huge like those robots from the animes. It comes with a big drill, loads of determination and a dream to pierce the heavens!");
	$alienDesc = array("zorg is small and slimy.","zula is big and green and mean!","nyalien is one we're actually not too sure is really an alien? They look kind of like... a weird cat...","xuluthjgk has to catch their cab back to space.");
    
	

if (isset($_POST['name']) && !empty($_POST['name'])  ) {
       $first_name = $_POST['name'];
        
       $first_name = strip_tags($first_name);
	   $first_name = htmlspecialchars($first_name);
       $first_name = strtolower($first_name);
       $first_name = ucwords($first_name);
	
        } 
if (isset($_POST['creature_type']) && !empty($_POST['creature_type'])  ) {
       $creature = $_POST['creature_type'];
	
        } 

if (empty($_POST['name']) || empty($_POST['creature_type'])) {
	$error = "<p class='red'>Error! Please try again!</p>Required:<br>";
	$hide_open = "<div id='hide'>";
	$hide_close = "</div>";
	
}
if (empty($_POST['name'])) {
	$name_err = "Fill in a name.<br>";
}

if (empty($_POST['creature_type'])) {
	$creature_err = "Select either robot or alien.<br>";
}

 $botsChoice = $first_name.$robotDesc[mt_rand (0, 3)];
 $aliensChoice = $first_name.$alienDesc[mt_rand (0, 3)];

if ($creature == 'alien') {
	$resultsDesc = $aliensChoice;
	$resultsPic = "<img src='images/alien.png' alt='alien' height='228' width='158'>";
} else {
	$resultsDesc = $botsChoice;
	$resultsPic = "<img src='images/robot.png' alt='alien' height='189' width='183'>";
}

// EMAIL FUNCTION
//	  $to = "eric.chen@senecacollege.com";
//    $subject = "Creature Generator";
//    $message = 'Name: '.$first_name.', Creature Type: '.$creature.', Message:'.$resultsDesc;
//
//    mail($to,$subject,$message);


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Creature Generator</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/uniform.default.css">
<style>
	.red {color: red;}
	#hide {display: none;}
</style>
</head>
<body>

<div id="holder">

<h1>Seneca College</h1>
<h2>Webmaster Program</h2>
<h3>Creature Generator</h3>

<p>Step right up, step right up! Learn your creature-name in 3 short steps!</p>

<h4>Step Two: Results</h4>

<?php
	echo $error;
	echo $name_err;
	echo $creature_err;
	echo $hide_open;
?>



<p>Thanks <?php echo $first_name; ?>.</p>

<p>Today is <?php echo date('l F jS, Y') ?> and it’s been a busy
day. But don’t worry! Your beautiful <?php echo $creature; ?> child is ready and waiting for you to pick it up!</p>

<p>When you are ready to see the results, <a id="click" href="#">click here</a></p>

<p id="maker_results">
	<?php
		echo $resultsDesc."<br><br>";
//		echo "<br>".$first_name.$robotDesc[mt_rand (0, 3)];
//		echo "<br>".$first_name.$alienDesc[mt_rand (0, 3)];
		echo $resultsPic;
		
	?>
	
</p>
<?php echo $hide_close; ?>

</div>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/jquery.uniform.min.js"></script>
<script>
jQuery("select, input:checkbox, input:radio, input:file, input:text, input:submit, textarea").uniform();
</script>

<script>
	//jquery
	
	
		$("#maker_results").hide();
	
	
	$(document).ready(function () {
    
     $("#click").click(function (e) {
        e.preventDefault();
        
		 $("#maker_results").slideDown(500);
        
    });

}); //ready
	
</script>
</body>
</html>
