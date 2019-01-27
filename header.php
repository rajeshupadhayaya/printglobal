
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "https://www.w3.org/TR/html4/strict.dtd">
<!-- Developer:  Rajesh Upadhayaya
      Mail Id: rajeshupadhayaya@gmail.com
 -->
<html lang="de">
	<head>
      <meta name="GENERATOR" content="IMPERIA 10.2.5_1">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>The Demotic Palaeographical Database Project (DPDP) </title>
      <meta name="author" content="">
      <meta name="organization-name" content="">
      <meta name="organization-email" content="aegyptologie@zaw.uni-heidelberg.de">
      <meta name="city" content="Heidelberg">
      <meta name="country" content="Germany - Deutschland">
      <meta name="robots" content="index">
      <meta name="robots" content="follow">
      <meta name="revisit-after" content="3 days">
      <meta http-equiv="imagetoolbar" content="no">
      <meta name="MSSmartTagsPreventParsing" content="true">
      <meta name="keywords" content="ZAW, Zentrum für Altertumswissenschaften, Ägyptologie, Ägyptologisches Institut, Demotic Palaeographical Database Project, DPDP, Demotisch, Papyri">
      <meta name="description" content="">
      <meta name="language" content="de">
      <meta http-equiv="Content-Language" content="de">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="js/jquery-lib.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      
      <link rel="stylesheet" type="text/css" href="css/style_ltr.css" />
      
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDMayGw4GaDq08KCbYNVTw6KKhUZx9iWkM"></script>    
      
    </head>
	<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
      //development environment
       $conn = mysql_connect("localhost", "root", "Dpdp_30_09") or die(mysql_error());

      //testing environment configuration
	// $conn = mysql_connect("localhost", "phpmyadmin", "rajesh") or die(mysql_error());
	mysql_set_charset('utf8',$conn);
      mysql_select_db("dpdp") or die(mysql_error());
	?>
