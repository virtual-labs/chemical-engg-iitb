<?
	$a[]="one";
	$a[]="two";
	$a[]="three";
	$a[]="four";			
 ?>
<html>
<head>

<script language="javascript"> 
	function showValues(){
		var a=new Array;
	<?
		for($i=0;$i<count($a); $i++){
			echo "a[$i]='".$a[$i]."';\n";
		}			
	 ?>
		for(i=0;i<a.length;i++)
			alert(a[i]);
	}
 </script>
</head>

<body onload="showValues()">
</body>
</html>
