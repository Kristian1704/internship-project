
<style>
    body, html {
        height: 100%;
        background-repeat: no-repeat;
    background-image: linear-gradient(120deg, rgba(104, 145, 104, 0.65) 60%, rgba(118, 145, 118, 0.25) 60%, rgba(133, 145, 133, 0.3) 55%, rgba(147, 145, 147, 1) 35%, rgba(162, 145, 162, 0.5) 55%, rgba(177, 145, 177, 1) 70%, rgba(191, 145, 191, 1) 0%, rgba(205, 145, 205, 1) 0%, rgba(220, 145, 220, 0.5) 0%, rgba(235, 145, 235, 0.5) 30%); }
    }

</style>
<!DOCTYPE html>
<html>
<body>
<?php include_once "header.php";?>
<!-- Login page  -->
<div class="container" id="enter">
    <div class="card card-container" >
        <span id="error"></span>
        <img id="profile-img" class="profile-img-card" src="../Images/avatar.png"/>
        <p id="profile-name" class="profile-name-card"></p>
        <span id="reauth-email" class="reauth-email"></span>
        <input type="email" name="uname" id="uname" class="form-control mb-2 pb-2" placeholder="Email address">
        <input type="password" name="pass" id="pass" class="form-control mb-2 pb-2" placeholder="Password">
        <button class="btn btn-lg btn-primary btn-block btn-signin"  type="submit" onclick="login();" id="Sign_in">Sign
            in
        </button>
        <button class="btn btn-lg btn-primary btn-block btn-signin post"  type="submit" data-toggle="modal"
                data-target="#exampleModal" id="Sign_in">Sign up
        </button>
    </div>
    <!-- /card-container -->
</div><!-- /container -->


<!-- Register page  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <img id="profile-img" class="profile-img-card" src="../Images/avatar.png"/>
                <h2>Register</h2>
                <span id="error"></span>
                <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col"><input type="text" class="form-control" name="first_name" id="first_name"
                                                placeholder="First Name" required="required" onchange="fillUsername()">
                        </div>
                        <div class="col"><input type="text" class="form-control" name="last_name" id="last_name"
                                                placeholder="Last Name" required="required" onchange="fillUsername()">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="atesia" id="atesia" placeholder="Atesia"
                           required="required">
                </div>
                <div class="form-group">
                    <input type="tel" id="phone" name="phone" placeholder="06..." pattern="[0-9]{10}"
                           required="required">
                </div>
                <div class="form-group" id="demo">
                    <input type="text" id="birthday" name="birthday" class="form-control" placeholder="ditelindja"
                           autocomplete="off" required="required">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                           required="required">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                           disabled>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                           required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Verify"
                           required="required">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="signup()" class="btn btn-primary" id="signup">Register</button>
            </div>
        </div>
    </div>
</div>
</body>
<?php
include_once "footer.php";
?>
<script src="script.js"></script>
</html>