<html>
<head>
<title>Zawgyi Normalize & Syllable Breaking (RC 1)</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>

<body>
<?php
include("Zawgyi.php");

//Start Time
$starttime = time()+microtime();
function PtimerStop() {
   global $starttime;
   $endtime = time()+microtime();
   $totaltime = round($endtime - $starttime,4);
   echo 'This page took ' . $totaltime . ' to load.';
}

if(isset($_POST['nor']))
{
$zg=new Zawgyi();
//zawgyi_normaliztion(string,character break,syllable break)
if (isset($_POST['chk']))
$string=$zg->normalize($_POST['nor'],"|",true);
else
$string=$zg->normalize($_POST['nor'],"|",false);


}
else
{
$string="";
}

?>
<form name="zg" method="post" action="<? echo $_SERVER['PHP_SELF']; ?>">
<label>Enter Zawgyi Text</label><br>
<textarea cols="80" rows="10" name="nor">
<? 

if(isset($_POST['nor']))
{
echo stripslashes($_POST['nor']);
}
else
{
echo "ေယဓမၼာ ေဟတုပၸဘဝါ ေတသံ ေဟတံု တထာဂေတာ
အာဟေတသဥၥ ေယာနိေယာေဓါ ဧဝံ ဝါဒီ မဟာသမေဏာ

အေၾကာင္းေၾကာင့္ အက်ဳိးျဖစ္ရာ၏။
အေၾကာင္းမျဖစ္ေစျခင္းတရားကို ျမတ္စြာဘုရားေဟာေတာ္မူ၏။";
}

?>
</textarea>
<input type="submit" value="Normalize">
<br>
<label>Result</label><br>
<textarea cols="80" rows="10" name="res"><?php echo $string; ?></textarea>
<input type="checkbox" name="chk" value="syllable"
<?
if (isset($_POST['chk'])) 
echo "checked=true";
?>
><label>Syllable Breaking Enable</label>
</form>
<?
PtimerStop();

?>
</body>
</html>
