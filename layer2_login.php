<?php
session_start();
ob_start();
?>

<html>
<head>

<script>
function changeIt(img)
{
var name = img.src;
window.location.href = "layer3_login.php?var=" + name;
}
</script>



<title>
Layer 2!
</title>
</head>
<?php
echo '<body bgcolor="#2d545e" text="#FFFFFF" marginwidth="45"> <br><center><u><b><font face="calibri" color="red" size=8>STRAVENGERS TEAM </font><font face="calibri" size ="8" color="blue">LOGIN SYSTEM</font></b></u></center>
<br><center><b><u><font face="calibri" color="white" size=6>GRAPHICAL PASSWORD PASSAGE</font></u></b></center>
<a href="logout.php"><font color="white">Logout</font></a><hr color="#CC0000">
<center><h4><font color="red">Image Layer 2/5</font></h4><br><i>Selecting any image will redirect you the next layer !<br><br>
Choose your Image ::<br><br>';
	
        $var=$_GET['var'];
		$_SESSION['a'][6]=$_GET['var'];	
		$_SESSION['layer1']=$_GET['var'];
$ar[0]="wood.";
$ar[1]="edu.";
$ar[2]="bit.";
$ar[3]="two.";
$ar[4]="virus.";
shuffle($ar);
echo '<center>';
for($i=0;$i<=4;$i++)
echo '<img src="images\\'.$ar[$i].'jpg" onclick="changeIt(this)" height="120" width="120"> ';
echo '</center>
</body>';			
?>

</body>
</html>