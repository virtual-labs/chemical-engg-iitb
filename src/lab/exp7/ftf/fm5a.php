<?php
session_start(); 
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	






<SCRIPT language="JavaScript"
        type="text/javascript">
<!--

function checkAnswer()
{


 element = document.getElementById('ar').style;
    element.display = 'none';
element = document.getElementById('br').style;
    element.display = 'none';

element = document.getElementById('cr').style;
    element.display = 'none';
element = document.getElementById('dr').style;
    element.display = 'none';
element = document.getElementById('er').style;
    element.display = 'none';
element = document.getElementById('aw').style;
    element.display = 'none';
element = document.getElementById('bw').style;
    element.display = 'none';
element = document.getElementById('cw').style;
    element.display = 'none';
element = document.getElementById('dw').style;
    element.display = 'none';
element = document.getElementById('ew').style;
    element.display = 'none';



  var s = "?";

  var result = document.quizform.result.value;



if(document.quizform.cc[0].checked == true)
{
s = document.quizform.cc[0].value;
}
if(document.quizform.cc[1].checked == true)
{
s = document.quizform.cc[1].value;
}
if(document.quizform.cc[2].checked == true)
{
s = document.quizform.cc[2].value;
}
if(document.quizform.cc[3].checked == true)
{
s = document.quizform.cc[3].value;
}
if(document.quizform.cc[4].checked == true)
{
s = document.quizform.cc[4].value;
}
 
// no choice was selected
  //
  if("?" == s)
  {
    alert("Please make a selection.");
    return false;
  }

  // check if we have the correct
  // choice selected
  //
  if(s == result)
  {
   
    img =s+"r";
	 element = document.getElementById(img).style;
    element.display = 'inline';
  }
  else
  {

    img =s+"w";	
	
    element = document.getElementById(img).style;
    element.display = 'inline';
  }



}


//-->
</SCRIPT>


	<style type="text/css" media="screen">

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
width: 20%;
margin: 0;
padding: 1em;
}

#content
{
width: 800;
margin-left: 0px;
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
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>

<div id="content">
<?php


include_once("config.inc.php");

	$res = $_POST["result"];

	

	



?>

<FORM name="volu" action="fm6.php"  method="post">
 <h2>Calculate and enter the value of the theortical pressure drop,experimental pressure drop and precentage error you have just computed::</h2>

<h3>Experimental pressure drop : <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="<?php echo $res; ?>" NAME="time"> </h3>

<h3>Theortical pressure drop : <INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="vol"> </h3>


<h3>Precentage error :	<INPUT style="width:90px;height:50px;background-color:#D0F18F;color:#53760D;font:24px/30px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;" TYPE="text" VALUE="" NAME="rey"> </h3>




<input type="image" src="next.jpg" alt="Submit button">


</FORM>
</div>


<div id="footer">
Cellulose lab IIT Bombay
</div>
</div>
</body>
</html>

