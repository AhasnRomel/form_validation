<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<?php 


			if (isset($_POST['add_file'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $cell = $_POST['cell'];
                $u_name = $_POST['uname'];


                $cell_len = strlen($cell);

                if(empty($name)){
                    $msg_1 = "<p class='alert alert-danger'>Name Is Required<button class='close' data-dismiss='alert'>&times;</button></p>";
                }
                if(empty($email) ){
                    $msg_2 = "<p class='alert alert-danger'>Email Is Required !<button class='close' data-dismiss='alert'>&times;</button></p>";
                }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $msg_email = "Enter a Valid Email !";
                }
                if(empty($cell)){
                    $msg_3 = "<p class='alert alert-danger'>Cell Is Required !<button class='close' data-dismiss='alert'>&times;</button></p>";
                }elseif( $cell_len !=11 ){
                    $msg_cell = "Enter a Valid Phone Number !";
                }
                if (empty($u_name)){
                    $msg_4 = "<p class='alert alert-danger'>User Name Is Required !<button class='close' data-dismiss='alert'>&times;</button></p>";
                }

                if (empty($name) || empty($email) || empty($cell) || empty($u_name)){
                    $msg_img = "<p class='alert alert-danger'>All Fields Are Required !<button class='close' data-dismiss='alert'>&times;</button></p>";
                }else {

                    //            ## File Upload...

                    $f_name = $_FILES['img']['name'];
                    $f_type = $_FILES['img']['type'];
                    $f_tmp = $_FILES['img']['tmp_name'];
                    $f_size = $_FILES['img']['size'];

                    $u_File = md5(time() . rand()) . $f_name;
                    move_uploaded_file($f_tmp, 'images/' . $u_File);

                    }

            }

	 ?>

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>User Registration Form</h2>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
                        <?php if (isset($msg_1)){echo $msg_1;}?>
						<label for=""></label>
						<input name="name" class="form-control" type="text" placeholder="Enter Your Name">
					</div>
					<div class="form-group">
                        <?php if (isset($msg_2)){echo $msg_2;}?>
						<label for=""><?php if (isset( $msg_email)){ echo "<p style='color:#ff0000'>" . $msg_email . "</p>";} ?></label>
						<input name="email" class="form-control" type="text" placeholder='Enter Your Email'>
					</div>
					<div class="form-group">
                        <?php if (isset($msg_3)){echo $msg_3;}?>
						<label for=""><?php if (isset( $msg_cell)){ echo "<p style='color:red'>" . $msg_cell . "</p>";} ?></label>
						<input name="cell" class="form-control" type="text" placeholder='Enter Your Cell Number'>
					</div>
					<div class="form-group">
                        <?php if (isset($msg_4)){echo $msg_4;}?>
						<label for=""></label>
						<input name="uname" class="form-control" type="text" placeholder="Enter Your Username">

					</div>
                    <div class="form-group">
                        <?php if (isset($msg_img)){echo $msg_img;}?>
                        <label for=""></label>
                        <input name="img" class="form-control" type="file" >

                    </div>
					<div class="form-group">
						<input name="add_file" class="btn btn-secondary" type="submit" value="Submit">
					</div>
                </form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>