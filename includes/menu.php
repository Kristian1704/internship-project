<nav class="navbar navbar-expand-md navbar-dark bg-info">
    <a class="navbar-brand" href="index.php?page=">Welcome <?php echo $_SESSION['first_name'] ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?php
            if ($_SESSION['Roli']=='admin')
                echo ' <li class="nav-item " id="user">
                <a class="nav-link" href="index.php?page=userlist">User<span class="sr-only">(current)</span></a>
            </li>'
            ?>


            <li class="nav-item" id="profili">
                <a class="nav-link" href="index.php?page=profile">Profile<span class="sr-only">(current)</span></a>
            </li>

            <?php
            if ($_SESSION['Roli']=='admin')
                echo  '<li class="nav-item " id="check_in">
                <a class="nav-link" href="index.php?page=checkin">Check in<span class="sr-only">(current)</span></a>
            </li>'
            ?>
            <?php
            if ($_SESSION['Roli']=='admin')
                echo  '<li class="nav-item " id="paga">
                <a class="nav-link" href="index.php?page=pagat">Wages<span class="sr-only">(current)</span></a>
            </li>'
            ?>
            <?php
            if ($_SESSION['Roli']=='admin')
                echo  '<li class="nav-item " id="produktet">
                <a class="nav-link" href="index.php?page=Produktet">Products<span class="sr-only">(current)</span></a>
            </li>'
            ?>
        </ul>

        <a href="http://localhost/Internship_Project/Login" style="margin: 2px" class="btn btn-dark">Logout</a>
    </div>
</nav>