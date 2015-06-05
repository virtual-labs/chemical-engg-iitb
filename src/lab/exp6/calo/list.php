<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<title>Virtual labs project</title>
		<!-- IMPORTANT!!! Include the stylesheet *BEFORE* the JavaScript (necessary for Safari 3.1.1) -->
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		
		<script src="js/jquery-1.2.6.min.js" type="text/javascript"></script>
		<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
		<script src="js/jquery.kwicks-1.5.1.pack.js" type="text/javascript"></script>
		
		<script type="text/javascript">
		
			$().ready(function() {
									$('.kwicks').kwicks({
						min : 30,
						spacing : 3,
						isVertical : true
					});
							});
		</script>

		</script>
	</head>
	
	<body><center>

<?
$val = $_GET["mode"];
if ($val=="home")
	{

	$message = $val;
	

	// where is the socket server?
	$host="10.102.26.50";
	$port = 8001;
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$socket1 = socket_connect($socket, $host, $port) or die("Could not connect to server\n");

	//send string to server
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	

       
 

	// get server response
	}
?>


		<ul class="kwicks horizontal" >
			<li id="kwick_1"><a href="nof1.html"><img border=0 src="lam_final2.jpg"></a></li>
			<li id="kwick_2"></li>
			<li id="kwick_3"></li>
			<li id="kwick_4"></li>
		</ul>
</center>
	</body>
</html>
