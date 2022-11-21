<?php require_once('connect.php'); 
	session_start();
	if(isset($_SESSION['admin_id'])){
		$admin_id=$_SESSION['admin_id'];
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
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
                <a class="navbar-brand d-flex align-items-center" href="home.php">
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
                        <?php if(!isset($admin_id)):?>
                        <li class="nav-item">
                            <a class="nav-link" href="inventory.php">Inventory</a>
                        </li>
						<?php	endif ?>
						<?php if(isset($admin_id)):?>
                        <li class="nav-item">
                            <a class="nav-link" href="add_film.php">Add Film</a>
                        </li>
						<?php	endif ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
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
                        <h1 class="display-2 mb-4">Search Film</h1><br>
                    </div>
                    <!-- End of Section Title -->
                    <div class="row">
                        <!-- Contact Form Holder -->
                        <div class="col-md-8 offset-md-2 contact-form-holder mt-4">
						
                            <form method="post" name="login-form" action="">
												
                                <div class="row">
                                    <div class="col-md-12 form-input">
                                        <select class="form-control" id="title" name="title">
                                            <option value="" disabled selected>Film Title</option>
                                            <!--Do php-->
											<?php
												$q="SELECT * FROM film,film_genre WHERE film.film_id=film_genre.film_id ";
												$result=$mysqli->query($q);
												if(!$result){
													echo "Select failed. Error: ".$mysqli->error ;
													return false;
												}
												while($row=$result->fetch_array()){
											?>
                                            <option value="<?=$row['title']?>"><?=$row['title']?></option>
											<?php } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-12 form-btn text-center">
                                        <input class="btn btn-block btn-secondary btn-red" type="submit" name="submit" value="SEARCH">
                                    </div>
									<?php
											if(isset($_POST['submit'])){
												if(!empty($_POST['title'])) {
													$selected = $_POST['title'];
													$x = 'film.php?title='.$selected;
													echo ("<script LANGUAGE='JavaScript'>
														window.location.href='$x';
														</script>");
												} else {
													echo 'Please select film title.';
												}
											}
									?>
                                </div>
                                <br>
                                <h5>All films</h5>
                                <br>
                                <!--Begin Table-->
                                <table style="text-align: center; border-collapse: collapse; border: 1px solid black; table-layout: fixed; width: 100%;">
                                    <tr>
                                        <th style="border: 1px solid black">Title</th>
                                        <th style="border: 1px solid black">Release Year</th>
                                        <th style="border: 1px solid black">Genre</th>
                                        <th style="border: 1px solid black">Length</th>
                                        <th style="border: 1px solid black">Rental Rate</th>
                                    </tr>
                                    <!--Do php in tr-->
									<?php
											$q="SELECT * FROM film,film_genre WHERE film.film_id=film_genre.film_id ";
											$result=$mysqli->query($q);
											if(!$result){
													echo "Select failed. Error: ".$mysqli->error ;
													return false;
												}
											 while($row=$result->fetch_array()){ ?>
									<tr>
												<td><a href='film.php?title=<?=$row['title']?>'><?=$row['title']?></a></td> 
												<td><?=$row['release_year']?> </td>
												<td><?=$row['genre_name']?></td>
												<td><?=$row['length']?></td>
												<td><?=$row['rental_rate']?></td>
									</tr>
									<?php } ?>
                                </table>
                                <!--End Table-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="mastfoot mb-3 bg-white py-4 border-top">
            <div class="inner container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center">
                        <p class="mb-0">Project CSS326 Movie Rental System</p>
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