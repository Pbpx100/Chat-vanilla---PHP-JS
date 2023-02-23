<?php
session_start();
include_once "config.php";

//Getting data from index.php 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];


if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {

    //Filtering the email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = pg_query($conn, "SELECT email from users WHERE email ='{$email}'  ");

        /**Verifying if the email is already indatabase 
         If the email is not in database we are gonna save the data*/

        if (pg_num_rows($query) > 0) {
            echo "$email - not valid already exist";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];

                // Getting temporary name to save the image
                $tmp_name = $_FILES['image']['tmp_name'];

                //Exploding image name with a (.) to separete in array
                $img_explode = explode('.', $img_name);
                //Getting last element = extension
                $img_ext = end($img_explode);
                $extensions = ['png', 'jpeg', 'jpg'];
                //Lookinng for coincidence of extensions allowed
                if (in_array($img_ext, $extensions) === true) {
                    //saving image mixed with timestamp
                    $time = time();
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                        $status = "Active now";
                        //Creating random id  -> Saved in unique_id
                        $random_id = rand(time(), 10000000);
                        //Inserting in database
                        $query = pg_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, image, status)
                        VALUES(  ' {$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}','{$new_img_name}', '{$status}' )");
                        if ($query) {
                            //Selecting the user amd give a session -> sending the success value to javascript/signup.js
                            $query = pg_query($conn, "SELECT *FROM users WHERE email = '{$email}'");
                            if (pg_num_rows($query) > 0) {
                                $row = pg_fetch_assoc($query);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                        } else {
                            echo "Something went wrong";
                        }
                    }
                } else {
                    echo "select an valid image - jpge, jpg or png";
                }
            } else {
                echo "Please select an image";
            }
        }
    } else {
        echo "$email is no valid email";
    }
} else {
    echo "All input field are required";
}
