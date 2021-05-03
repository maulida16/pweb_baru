<?php
    session_start();

    if(!($_SESSION)){
        header('location: login.php');
    }

    include 'conn.php';
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM user WHERE id=$id LIMIT 1";

    $rows = mysqli_query($conn,$sql);
    $i = 0;
    mysqli_close($conn);
    $data = mysqli_fetch_assoc($rows);

    $pageTitle = 'Profil @'.$data['username'].' | Profile';
    include 'header.php';
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="./index.php">
                <img src="images/navbar-logo" alt="" width="50px">
            </a>
            <?php if ($_SESSION) : ?>
                <p class="navbar-nav ml-auto mr-4 mt-2 mt-lg-0"><?php echo $_SESSION['username']?></p>
                <a href="update.php" class="mr-4">Update</a> 
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <ul class="navbar-nav ml-auto mr-4 mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="register.php">Register <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
    <!-- <div class="row no-gutters">
        <div class="col-xl-12 img-cover">
            <img src="uploads/<?php //echo $data['image']?>" alt="Foto profil <?php //echo $data['username'] ?>" class="cover-img">
            <div class="overlay-black"></div>
            <img class="profile-img img-responsive img img-thumbnail" src="uploads/<?php //echo $data['image'] ?>" alt="Foto profil <?php //echo  $data['username'] ?>">
            <h2>@<?php //echo $data['username'] ?></h2>
        </div>
    </div> -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
        <table>
        <tr>
            <td>Username</td>
            <td> :</td>
            <td> <?php echo $data['username'];
            ?> </td>
           
        </tr>
        <tr>
        <td>Email</td>
            <td> :</td>
            <td> <?php echo $data['email'];
            ?> </td>
            </tr>
    </table>

    </div>
    </div>

<?php
    include 'footer.php'
?>   