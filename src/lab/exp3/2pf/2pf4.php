<?php
session_start(); 
?>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	
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

<SCRIPT language="JavaScript"
        type="text/javascript">
<!--

function check()
{


    var ans = document.nof.ans.value;

    var res = document.nof.res.value;



if(ans == res)
{
alert("Your answer is correct");
window.location = "2pf5.php";

}
else
{
alert("Invalid answer Try again");
}



}


//-->
</SCRIPT>


</head>
<body>


<div id="container">
<div id="top">
<a href=index.html><img border=0 src=vlabs.jpg></a><br>
</div>

<div id="rightnav">
<p>

</p>
</div>
<div id="content">
<h3>Based on the values of the flow rates selected, typical flow regimes are observed in the pipe. Following is one of them. Select the correct flow regime from the drop down menu</h3>
<?php
$res = $_POST["regime"];
$_SESSION['res'] = $res;
if($res =="stra")
{
echo "<img src=str.png>";
}
else if($res =="wavy")
{
echo "<img src=wavy.png>";
}
else if($res =="annular")
{
echo "<img src=an.png>";
}
else if($res =="slug")
{
echo "<img src=slug.png>";
}
else if($res =="plug")
{
echo "<img src=plug.png>";
}
else if($res =="bubbly")
{
echo "<img src=bub.png>";
}


?>

<p>
<form name=nof>


Select the correct observed flow pattern above: <select name="ans" style="width:200px;height:40px;background-color:#D0F18F;color:#53760D;font:20px cursive;border:solid 1px #6DB72C;background-color:#D0F18F;">
<option value="">Select value</option>
<option value="stra">stratified</option>
<option value="wavy">wavy</option>
<option value="annular">annular</option>
<option value="slug">slug</option>
<option value="plug">plug</option>
<option value="bubbly">bubbly</option>
</select>
<br><br>
<input type="hidden" value="<?php echo $res; ?>" name="res" />
<input type="button" onClick="check();" VALUE="Submit">

</form>

</p>
</div>

<div id="content2">

</div>
<div id="footer">
<p align="center">Virtual labs IIT Bombay</p>
</div>
</div>
</body>
</html>

