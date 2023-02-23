<?php

/** If session is started you are redirect to users.php */
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
}
?>

<?php
include_once "header.php";
?>

<!--signup form - create account in Chat - Mandatory fill all the inputs --->

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Chat in Realtime</header>
            <form action="" enctype="multipart/form-data">

                <!--Here we are gonna display Error message 
                verification of error comming from php/signup.php
                Using Ajax to send information javascript/signup.js-->
                <div class="error-txt">this is an error message</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">first name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="">Last name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email Adress</label>
                    <input type="text" name="email" placeholder="Enter your email adress" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="">Select Image</label>
                    <input type="file" name="image">
                </div>
                <div class="field button">
                    <input type="submit" value="Continue ot Chat">
                </div>
            </form>
            <div class="link">Already signed up?

                <a href="login.php">Login now</a>
            </div>
        </section>
    </div>
    <!-- to show the password -->
    <script src="javascript/pass-show-hide.js"></script>
    <!-- Sending data to our php/signup.php to verificate and save -->
    <script src="javascript/signup.js"></script>
</body>

</html>