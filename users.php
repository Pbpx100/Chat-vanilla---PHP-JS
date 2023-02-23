<?php
//Case not set session with an "unique_id" redirect to login.php file
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>
<?php
include_once "header.php";
?>
<!---List of users start--->

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                include_once "php/config.php";
                $query = pg_query($conn, "SELECT * FROM  users WHERE unique_id = '{$_SESSION['unique_id']}'");
                if (pg_num_rows($query) > 0) {
                    $row = pg_fetch_assoc($query);
                }
                ?>
                <div class="content">
                    <img src="php/images/<?php echo $row['image'] ?>" alt="">
                    <div class="details"><span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']  ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span>select an user to start</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
<!---List of users end--->

</html>