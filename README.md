#### Form Validation 
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