<?php
session_start(); 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/jquery.stopwatch.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/cal2.jquery.stopwatch.js"></script>

<SCRIPT language="JavaScript"
        type="text/javascript">
<!--

function check()
{


    var vol = document.time.vol.value;

    var temp = document.time.temp.value;


function IsNumeric(strString)
   //  check for valid numeric strings	
   {
   var strValidChars = "0123456789.-";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
   }




 if (vol.length == 0) 
      {
      alert("Please enter a value.");
	document.time.vol.focus();
      } 
   else if (IsNumeric(document.time.vol.value) == false) 
      {
      alert("Please check - non numeric value!");
	document.time.vol.focus();
      }
	else if (document.time.vol.value < 1 || document.time.vol.value > 100)
{alert("Please Enter the number in the Range 1-100");
document.time.vol.focus();
}
else
{
document.time.submit();
}


}


//-->
</SCRIPT>


<style type="text/css">
body
{
 font-family: "Helvetica Neue", "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
        font-size: 14px;
        margin-top: .5em; color: #666;

}
#container
{
width: 90%;
margin: 10px auto;
background-color: #fff;
color: #333;
border: 10px solid gray;
line-height: 130%;
}

#top
{
padding: .5em;
background-color: #FFFFFF;
border-bottom: 0px solid gray;
}

#top h1
{
padding: 0;
margin: 0;
}

#leftnav
{
float: left;
width: 160px;
margin: 0;
padding: 1em;
}

#rightnav
{
float: right;
width: 300px;
margin: 0;
padding: 1em;
}

#content
{
width: 500px;
margin-left: 150px;
border-left: 0px solid gray;
margin-right: 0px;
border-right: 0px solid gray;
padding: 1em;
#max-width: 36em;

}


#content2
{
width: 800;
margin-left: 0px;
border-left: 0px solid gray;
margin-right: 0px;
border-right: 0px solid gray;
border-top: 0px solid gray;
padding: 1em;
#max-width: 36em;
}

#footer
{
clear: both;
margin: 0;
padding: .5em;
color: #333;
background-color: #ddd;
border-top: 0px solid gray;
}

#leftnav p, #rightnav p { margin: 0 0 1em 0; }
#content h2 { margin: 0 0 .5em 0; }
</style>
</head>
<body>
  <div id="container">
<?php
if($_GET['k'])
{
$k = $_GET["k"];
}
else
{
$k = $_POST["kal"];
}
$cp1=$_SESSION['cp1'];
$cp2=$_SESSION['cp2'];
?>
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg style="margin-left:20%"></a><br>
<center>
<h1>Heat of Mixing</h1>
<p>In this part you will take 0-100 ml of benzene first. Note the temperature of the system.Acetone is added to the system when you are NEXT to make up total volume to 100 ml. There will be either temperature drop or rise.</p><br>
<img src="cal.jpg">
</center>
</div>

<div id="content">

<center>
		
    
    <form name="time" method="post" action="cal4a.php">
<input name=timer type="hidden" value=""><br>
<input name="kal" type="hidden" value="<?php echo $k; ?>"><br>
<input name="cp1" type="hidden" value="<?php echo $cp1; ?>"><br>
<input name="cp2" type="hidden" value="<?php echo $cp2; ?>"><br>
<h3>Enter volume for benzene: <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="vol"> ml</h3>
<h3>Temperature of system :      <INPUT style="width:90px;height:30px;background-color:#D0F18F;color:#53760D;font:20px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="298.0" NAME="temp" readonly=true> K</h3>
<img onClick="check();" src="next.jpg" alt="Submit button">
</form>
</center>
  </div>
	


<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>
