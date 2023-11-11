<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="<?php echo base_url(); ?>assets/evolo/og:site_name" content="" /> <!-- website name -->
	<meta property="<?php echo base_url(); ?>assets/evolo/og:site" content="" /> <!-- website link -->
	<meta property="<?php echo base_url(); ?>assets/evolo/og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="<?php echo base_url(); ?>assets/evolo/og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="<?php echo base_url(); ?>assets/evolo/og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="<?php echo base_url(); ?>assets/evolo/og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="<?php echo base_url(); ?>assets/evolo/og:type" content="article" />

    <!-- Website Title -->
    <title>CAR RENTAL</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/evolo/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/evolo/css/fontawesome-all.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/evolo/css/swiper.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/evolo/css/magnific-popup.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/evolo/css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url('/assets/img/favicon-carrental.png') ?>">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="<?php echo base_url('assets/img/logo-carrental.png') ?>" alt="alternative"></a>
        <!-- <a class="navbar-brand" href="index.html">CAR RENTAL</a> -->
        <!-- <h3><span class="turquoise">CAR</span>-RENTAL</h1> -->

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo base_url('Home') ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#kami" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Kami</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('Home/#Choose_us') ?>"><span class="item-text">Pilih Kami</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="<?php echo base_url('Home/About_us') ?>"><span class="item-text">Tentang Kami</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="<?php echo base_url('Home/#Contact_us') ?>"><span class="item-text">Hubungi Kami</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->
                
                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#service" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Service</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('Pelayanan/homeService') ?>"><span class="item-text">Home Service</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="<?php echo base_url('Pelayanan/dibengkel') ?>"><span class="item-text">Service Di bengkel</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo base_url('User') ?>">Belanja</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php echo base_url('Home/Perawatan') ?>">Tips Perawatan</a>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-1">
                <?php
                if ($this->session->userdata('username')) { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle page-scroll">
                                <img width="25px" alt="image" src="<?php echo base_url('assets/img/avatar/avatar-1.png') ?>" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('username') ?></div>
                            </a>
                            <div class="dropdown-menu">
                                <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
                                <a href="<?= site_url('Profile') ?>" class="dropdown-item">
                                    <i class="far fa-user"></i> Profile
                                </a>

                                <div class="dropdown-items-divide-hr"></div>
                                <?php echo anchor('auth/logout', '<div class="dropdown-item">
                                    <i class="fa fa-sign-out-alt"></i> Logout
                                </div>'); ?>
                            </div>
                        </li>
                    </ul>

                <?php } else { ?>
                    <li><?php echo anchor('Login', '<div class="btn-solid-reg">Login</div>') ?></li>
                <?php } ?>
            </ul>
            <!-- <span class="nav-item social-icons">
                <span class="fa-stack">
                     
                         <a href="#your-link">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                         <i class="fab fa-facebook-f fa-stack-1x"></i>
                     </a>
                </span>
                <span class="fa-stack">
                    <a href="#your-link">
                        <i class="fas fa-circle fa-stack-2x twitter"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span> -->
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
