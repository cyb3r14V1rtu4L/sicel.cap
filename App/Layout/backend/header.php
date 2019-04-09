<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Sistema de Captura Electoral | Promovidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="<?php echo $params['plugins'].'bootstrap/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
    <!-- END CORE CSS FRAMEWORK -->

    <!-- BEGIN CSS TEMPLATE -->
    <link href="<?php echo $params['layout_css'].'style.css'?>" rel="stylesheet" type="text/css">
    <link href="<?php echo $params['layout_css'].'responsive.css'?>" rel="stylesheet" type="text/css">

    <!-- END CSS TEMPLATE -->

    <script src="<?php echo $params['plugins'].'jquery/jquery.js'?>" type="text/javascript"></script>

    <!-- SWEET ALERTS -->
    <script src="<?php echo $params['plugins'] ?>bootstrap-sweetalert/js/sweetalert.js" type="text/javascript"></script>
    <link href="<?php echo $params['plugins'] ?>bootstrap-sweetalert/css/sweetalert.css" rel="stylesheet" type="text/css" media="screen"/>

    <!-- FONTAWESOME-->
    <link href="<?php echo $params['plugins'] ?>fontawesome/fontawesome.css" rel="stylesheet" type="text/css" media="screen"/>
   <?php

    if(isset($params['private_css']))
    {
        foreach($params['private_css'] as $script )
        {
            ?>
            <link href="<?php echo $script ?>" rel="stylesheet" type="text/css">
            <?php
        }
    }


    if(isset($params['plugins_css']))
    {
        foreach($params['plugins_css'] as $script )
        {
            ?>
            <link href="<?php echo $script ?>" rel="stylesheet" type="text/css">
            <?php
        }
    }

   if($params['plugins_js'])
   {
       foreach($params['plugins_js'] as $script )
       {
           ?>
           <script src="<?php echo $script ?>" type="text/javascript"></script>
           <?php
       }
   }

   if(isset($params['public_scripts']))
   {
       foreach($params['public_scripts'] as $script )
       {
           ?>
           <script src="<?php echo $script ?>" type="text/javascript"></script>
           <?php
       }
   }

   if(isset($params['private_scripts']))
   {
       foreach($params['private_scripts'] as $script )
       {
           ?>
           <script src="<?php echo $script ?>" type="text/javascript"></script>
           <?php
       }
   }

   if(isset($params['view_js']))
   {
       foreach($params['view_js'] as $script )
       {
           ?>
           <script src="<?php echo $script ?>" type="text/javascript"></script>
           <?php
       }
   }
    /*echo '<pre>';
    print_r($params);
    echo '</pre>';*/
    ?>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body >

<?php if(isset($_SESSION['autenticado'])){ include_once('nav-bar.phtml');} ?>

<!-- BEGIN PAGE CONTAINER-->


<div class="page-content">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
