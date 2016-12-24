<?php
session_start();
include '../session.php';
//var_dump($GLOBALS['userdetails']->id);
//var_dump($_SESSION);
require 'vendor/autoload.php';

//new \Pixie\Connection('mysql', $config, 'QB');

$query = QB::table('villas')->where('user_id', '=', $GLOBALS['userdetails']->id);
$result = $query->get();



?>

<!doctype html>
<html lang="en">
<?php include "header.inc.php"; ?>
<body>
	<!--login modal-->
	<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	  <div class="modal-content">
	      <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	          <h1 class="text-center">Login</h1>
	      </div>
	      <div class="modal-body">
	          <form class="form col-md-12 center-block">
	            <div class="form-group">
	              <input class="form-control input-lg" placeholder="Email" type="text">
	            </div>
	            <div class="form-group">
	              <input class="form-control input-lg" placeholder="Password" type="password">
	            </div>
	            <div class="form-group">
	              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
	              <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
	            </div>
	          </form>
	      </div>
	      <div class="modal-footer">
	          <div class="col-md-12">
	          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			  </div>
	      </div>
	  </div>
	  </div>
	</div>
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
                <li class="active">
                    <a href="dashboard.html">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>

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
                    <a class="navbar-brand" href="#">Dashboard</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List Villa</h4>
                                <p class="category">Berikut ini list villa yang dapat Anda kelola</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Nama Vila</th>
                                    	<th>Deskripsi</th>
                                    	<th>Latitude</th>
                                    	<th>Longtitude</th>
																			<th>Harga</th>
																			<th>Action</th>
                                    </thead>
                                    <tbody>
																			<?php
																			foreach ($result as $row) {

																							?>
                                        <tr>
                                        	<td><?php echo $row->name; ?></td>
                                        	<td><?php echo $row->description; ?></td>
                                        	<td><?php echo $row->latitude; ?></td>
                                        	<td><?php echo $row->longtitude; ?></td>
                                        	<td><?php echo $row->price; ?></td>
																					<th><a href="edit.php?id=<?php echo $row->id; ?>"><i class="ti-pencil-alt" title="Edit"></i></a>
																						  <a onclick="return confirm('Kamu yakin mau hapus <?php echo $row->name; ?>?\nAwas kangen! Data yang udah dihapus ga bisa kembali.');" href="../handler.php?page=villa&action=delete&id=<?php echo $row->id; ?>"><i class="ti-trash" title="Delete"></i></a>
																					</th>

																				</tr>
																					<?php
																				}
																		?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
												<div class="text-left">
														<a href="add.php" class="btn btn-info btn-fill btn-wd">Tambah Villa</a>
												</div>
												<div class="clearfix"></div>
                    </div>



                </div>
            </div>
        </div>


                <?php include_once "footer.inc.php";?>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "Selamat datang."

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>

</html>
