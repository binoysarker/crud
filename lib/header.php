<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>CRUD with OOP and PDO</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="inc/css/tether.min.css">
    <link href="inc/css/font-awesome.min.css" rel="stylesheet">
    <link href="inc/css/bootstrap.min.css" rel="stylesheet">

<?php
 include 'lib/Session.php';
 Session::init();
 ?>     
  </head>
  <body>
    <div class="container bg-faded">
    	<div class="row">
    		<div class="col-lg-12">
    			        <nav class="navbar navbar-light navbar-toggleable bg-faded">
                                <a class="navbar-brand" href="index.php">CRUD with OOP and PDO</a>
                                <ul class="nav navbar-nav offset-5">
                                    <li class="nav-item active">
                                        <a class="nav-tabs" href="index.php">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    
                                    
                                </ul>
                                
                            </nav>	
    		</div>
    	</div>
    </div>