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
window.location.href = "success_regi.php?var=" + name;
}
</script>

<title>
Layer 5!
</title>
</head>
<?php
echo '<body bgcolor="#2d545e" text="#FFFFFF" marginwidth="45"><br><center><b><u><font face="calibri" color="red" size=8>STRAVENGERS TEAM </font><font face="calibri" size ="8" color="blue">LOGIN SYSTEM</font></u></b></center>
<br><center><b><u><font face="calibri" color="white" size=6>GRAPHICAL PASSWORD REGISTRATION</font></u></b></center>
</a><hr color="#CC0000">
<center><h4>Image Layer 5/5</h4><br><font color="orange">Complete all the layers to complete your registration !</font><br><br>
Choose your Image ::<br><br>';
?>

<?php

            $var=$_GET['var'];
			$_SESSION['a'][9]=$_GET['var'];
			$_SESSION['layer4']=$_GET['var'];
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