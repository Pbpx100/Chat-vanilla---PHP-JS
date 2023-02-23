<?php
session_start();
if (isset($_SESSION['unique_id'])) { // if user is logged in 
    header("location: users.php");
}
?>

<?php
include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>realtime chat</header>
            <form action="">
                <div class="error-txt"></div>

                <div class="field input">
                    <label for="">Email Adress</label>
                    <input type="text" name="email" placeholder="Enter your email adress">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue ot Chat">
                </div>
            </form>
            <div class="link">Not yet signed up?

                <a href="index.php">Signup now</a>
            </div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>

</body>

</html>