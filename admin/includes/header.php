<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
//DB connection string and Global variable
include '../db/dbsetup.php';
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap admin panel 2/2/2015">
    <meta name="author" content="Ryan Jones">

    <title>Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <?php
	$sqlSetup = mysql_query("SELECT tinymce, portfolioheading FROM setup");
	$rowSetup  = mysql_fetch_array($sqlSetup);
	
	$sqlLanding = mysql_query("SELECT heading FROM landing");
	$rowLanding  = mysql_fetch_array($sqlLanding);
	
	$sqlAbout = mysql_query("SELECT heading FROM aboutus");
	$rowAbout  = mysql_fetch_array($sqlAbout);

	$sqlContact = mysql_query("SELECT heading FROM contactus");
	$rowContact  = mysql_fetch_array($sqlContact);
	
	$sqlFooter = mysql_query("SELECT heading FROM footer");
	$rowFooter  = mysql_fetch_array($sqlFooter);
	
	$sqlSocial = mysql_query("SELECT heading FROM socialmedia");
	$rowSocial  = mysql_fetch_array($sqlSocial);
	
	if (isset($_SESSION["user_id"]) AND isset($_SESSION["user_name"]) AND $rowSetup["tinymce"]==1) {
	?>
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script type="text/javascript">
			tinymce.init({
				selector: "textarea.tinymce",
		    plugins: "link image code",
		    //relative_urls: false,
		    //remove_script_host: true,
		    document_base_url: '$image_url',
		    //convert_urls: true,
		    resize: "both",
		    image_list: [ 
		   	<?php 
				if ($handle = opendir($image_dir)) {
					while (false !== ($imgfile = readdir($handle))) {
						if ('.' === $imgfile) continue;
						if ('..' === $imgfile) continue;
						if ($imgfile==="Thumbs.db") continue;
						if ($imgfile===".DS_Store") continue;
						if ($imgfile==="index.html") continue;

						echo "{title: '".$imgfile."', value: '".$image_url.$imgfile."'},";
					}
					closedir($handle);
				}
		    ?>
    		],
    		menu: {//insert menu options here
  			},
 				toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | code"
			});
		</script>
	<?php 
	}
	?>
</head>
<body>

    <div id="wrapper">
<?php
if ($_GET["debug"]) {
	error_reporting(E_ALL | E_WARNING | E_NOTICE);
	ini_set('display_errors', TRUE);
}

if (isset($_SESSION["user_id"]) AND isset($_SESSION["user_name"])) {
?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="setup.php">Admin Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo $_SESSION["user_name"]?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../index.php" target="_blank"><i class="fa fa-fw fa-home"></i> View My Site</a>
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
             </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="setup.php"><i class="fa fa-fw fa-gear"></i> Setup</a>
                    </li>
                    <li>
                        <a href="landing.php"><i class="fa fa-fw fa-rocket"></i> <?php echo $rowLanding["heading"]?></a>
                    </li>
                    <li>
                        <a href="portfolio.php"><i class="fa fa-fw fa-table"></i> <?php echo $rowSetup["portfolioheading"]?></a>
                    </li>
                    <li>
                        <a href="aboutus.php"><i class="fa fa-fw fa-edit"></i> <?php echo $rowAbout["heading"]?></a>
                    </li>
					<li>
                        <a href="services.php"><i class="fa fa-fw fa-table"></i> Services</a>
                    </li>
					<li>
                        <a href="team.php"><i class="fa fa-fw fa-table"></i> Team</a>
                    </li>
                    <li>
                        <a href="contactus.php"><i class="fa fa-fw fa-edit"></i> <?php echo $rowContact["heading"]?></a>
                    </li>
                    <li>
                        <a href="footer.php"><i class="fa fa-fw fa-edit"></i> <?php echo $rowFooter["heading"]?></a>
                    </li>
                    <li>
                        <a href="socialmedia.php"><i class="fa fa-fw fa-facebook-square"></i> <?php echo $rowSocial["heading"]?></a>
                    </li>
                    <li>
                        <a href="uploads.php"><i class="fa fa-fw fa-folder"></i> Uploads</a>
                    </li>
                    <li>
                        <a href="editor.php"><i class="fa fa-fw fa-css3"></i> Styles</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<?php
} 
?>
        <div id="page-wrapper">
            <div class="container-fluid">
<?php
	
	//Redirect user if session not set
	if (basename($_SERVER['PHP_SELF'])!='index.php') {
		if (!$_SESSION["user_name"] AND !$_SESSION["user_id"]) {
			//redirect to login page if not installing
			if (basename($_SERVER['PHP_SELF'])!='install.php') {
				echo "<script>window.location.href='index.php';</script>"; //but this works.
			}
		}
	}
?>