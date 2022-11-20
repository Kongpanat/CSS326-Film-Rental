<?php require_once('connect.php'); 
	$film_id=$_GET['film_id'];
	//echo $film_id;
	session_start();
	$_SESSION['film_id']=$film_id;
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Film</title>
    <meta name="description" content="Core HTML Project">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/lightcase/lightcase.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Work+Sans:300,400,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="https://file.myfontastic.com/7vRKgqrN3iFEnLHuqYhYuL/icons.css" rel="stylesheet">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>

<body data-spy="scroll" data-target="#navbar-nav-header" class="static-layout">
    <div class="boxed-page">
        <nav id="gtco-header-navbar" class="navbar navbar-expand-lg py-4">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <span class="lnr lnr-moon"></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header"
                    aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="lnr lnr-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-nav-header">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_film.php">Add Film</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id="gtco-contact-form" class="bg-white">
            <div class="container">
                <div class="section-content">
                    <!-- Section Title -->
                    <div class="title-wrap">
                        <h1 class="display-2 mb-4">Film Detail</h1><br>
                    </div>
                    <!-- Detail -->

                    <div class="row">
                        <!-- film Content Holder -->
                        <div class="col-md-8 offset-md-2 mt-4">
						<?php ?>
							<form method="post" name="post" action="filmeditbackend.php?film_id=<?=$film_id?>">
								<div class="row">
									<p><strong>Film Title: </strong></p>
									<div class="col-md-3 form-input">
										<input type="text" class="form-control" id="title" name="title" placeholder="">
									</div>
								</div>
								<div class="row">
									<p><strong>Release Year: </strong></p>
									<div class="col-md-3 form-input">
										<input type="text" class="form-control" id="year" name="year" placeholder="">
									</div>
								</div>
								<div class="row">
									<p><strong>Genre: </strong></p>
									<div class="col-md-3 form-input">
										<input type="text" class="form-control" id="genre" name="genre" placeholder="">
									</div>
								</div>
								<div class="row">
									<p><strong>Length: </strong></p>
									<div class="col-md-3 form-input">
										<input type="text" class="form-control" id="length" name="length" placeholder="">
									</div>
								</div>
								<div class="row">
									<p><strong>Rating: </strong></p>
									<div class="col-md-3 form-input">
										<input type="text" class="form-control" id="rating" name="rating" placeholder="">
									</div>
								</div>
								<div class="row">
									<p><strong>Rental Rate: </strong></p>
									<div class="col-md-3 form-input">
										<input type="text" class="form-control" id="rating" name="rentalrate" placeholder="">
									</div>
								</div>
								<div class="col-md-12 form-input">
									<textarea type="text" class="form-control" style="height:12em;" id="detail" name="detail" placeholder="">
										<--type new one-->
									</textarea>
								</div>
								<br>
								<div class="col-md-8 offset-md-2 contact-form-holder mt-4">
									<div class="col-md-12 form-btn text-center">
										<input class="btn btn-block btn-secondary btn-red" type="submit" name="submit1" value="UPLOAD">
									
									</div>
									<?php
										/*if(isset($_POST['submit1'])){
											//echo $film_id;
											if(!empty($film_id)) {
												$x = 'filmeditbackend.php?film_id='.$film_id;
												echo ("<script LANGUAGE='JavaScript'>
													window.location.href='$x';
													</script>");
											}else{
											}
										}*/
										?>
								</div>
							</form>
                        </div>
                        <!-- End of film content Holder-->
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Form Section -->

        <footer class="mastfoot mb-3 bg-white py-4 border-top">
            <div class="inner container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center">
                        <p class="mb-0">&copy; 2019 Moon. All Right Reserved. Design by <a
                                href="https://gettemplates.co" target="_blank">GetTemplates.co</a>.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- External JS -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script src="vendor/bootstrap/popper.min.js"></script>
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js "></script>
    <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="vendor/isotope/isotope.min.js"></script>
    <script src="vendor/lightcase/lightcase.js"></script>
    <script src="vendor/waypoints/waypoint.min.js"></script>
    <script src="vendor/countTo/jquery.countTo.js"></script>

    <!-- Main JS -->
    <script src="js/app.min.js "></script>
    <script src="//localhost:35729/livereload.js"></script>
</body>

</html>