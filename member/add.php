<?php
session_start();
include '../session.php';
 ?>
<!doctype html>
<html lang="en">
<?php
include "header.inc.php";
 ?>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->


	<div class="sidebar-wrapper">
				<div class="logo">
						<a href="http://www.creative-tim.com" class="simple-text">
								<?php echo $GLOBALS['userdetails']->fullname; ?>
						</a>
				</div>

				<ul class="nav">
						<li>
								<a href="index.php">
										<i class="ti-panel"></i>
										<p>Dashboard</p>
								</a>
						</li>
						<li class="active">
								<a href="edit.php">
										<i class="ti-home"></i>
										<p>Edit Villa</p>
								</a>
						</li>
				</ul>
	</div>
</div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">User Profile</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">

												<li>
						                            <a href="../handler.php?page=logout">
														<i class="ti-user"></i>
														<p>Logout</p>
						                            </a>
						                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-lg-12 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah Villa</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="../handler.php?page=add&action=add">
                                  <input type="hidden" name="userid" class="form-control border-input" placeholder="Villa yang dirindukan" value="<?php echo $GLOBALS['userdetails']->id;?>">
                                    <div class="row">

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Nama Villa</label>
                                                <input type="text" name="villaname" class="form-control border-input" placeholder="Villa yang dirindukan" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Harga per malam</label>
                                                <input type="number" name="price" class="form-control border-input" placeholder="Harga">
                                            </div>
                                        </div>
                                    </div>
																		<div class="row">
																			<div class="col-md-12">
																				<div class="map">
																					<fieldset class="gllpLatlonPicker">
																						<div class="col-md-12">
		                                            <div class="form-group">
																									<label>Cari Peta berdasarkan Kota</label>
																									<input type="text" class="gllpSearchField" placeholder="Jakarta">
																									<input type="button" class="gllpSearchButton" value="cari">
		                                            </div>
		                                        </div>

																	          <div class="gllpMap">Google Maps</div>
																	          <div class="row">
																	            <div class="six columns">
																	              <label>Latitude</label>
																	              <input name="latitude" type="text" class="gllpLatitude border-input" value="" readonly/>
																	            </div>
																	            <div class="six columns">
																	              <label>Longtitude</label>
																	              <input name="longtitude" type="text" class="gllpLongitude u-full-width" value="" readonly/>
																	            </div>

																	          </div>


																	          <input type="hidden" class="gllpZoom" value="3"/>
																	        </fieldset>
																				</div>
																			</div>

																		</div>
																		<!----
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <input name="latitude" type="text" class="gllpLatitude form-control border-input" placeholder="Latitude" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Longtitude</label>
                                                <input name="longtitude" type="text" class="gllpLongitude form-control border-input" placeholder="Latitude" value="">
                                            </div>
                                        </div>
                                    </div>
																	-->
                                    <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label>Alamat Lengkap</label>
                                              <input type="text" name="address" class="form-control border-input" placeholder="Jalan-In Dulu AJa" value="">
                                          </div>
                                      </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea name="description" rows="5" class="form-control border-input" placeholder="Here can be your description"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Tambahkan</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-gmaps-latlon-picker.js"></script>
 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDoNqDy1CX5_DPZXlfSw-3gjMhPeVqi84c&sensor=false"></script>

	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>


    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
