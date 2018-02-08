<?php
$location1 = "Login";
$location2 = "Register";
$locHome = "Index";
$text1 = "Log In";
$text2 = "Sign Up";

if (Session::get('ACCESS') >= 1) {
    $location1 = "Edit";
    $location2 = "Logout";
    $locHome = "Home";
    $text1 = "Edit Profile";
    $text2 = "Log Out";
}

?>
<nav class="navbar navbar-default navigation-clean-button"
     style="background-color: #314265;">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= $locHome ?>" style="color: #ffffff;">Phlick </a>
            <button class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span><span
                        class="icon-bar"></span><span class="icon-bar"></span><span
                        class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <!-- This will be back in use in the future
            <ul class="nav navbar-nav">
                <li role="presentation"><a href="#"
                                           style="color: #ffffff;">Other Sites</a></li>
                <li role="presentation"><a href="#" style="color: #ffffff;">Contact
                        Us</a></li>
            </ul>
            -->
            <p class="navbar-text navbar-right actions">
                <a class="navbar-link login" href="<?= $location1 ?>" style="color: #ffffff;"><?= $text1 ?>
                </a> <a class="btn btn-default action-button" role="button"
                        href="<?= $location2 ?>" style="background-color: #63bb76;"><?= $text2 ?></a>
            </p>
        </div>
    </div>
</nav>
<?php
if(Session::get('message') != NULL){
    if(Session::get('message_type') == 1){
        ?>
        <h2 class="text-danger text-center"><?= Session::get('message') ?></h2>
        <?php
        Session::forget('message');
        Session::forget('message_type');
    }
    else{
        ?>
        <h2 class="text-danger text-center"><?= Session::get('message') ?></h2>
        <?php
        Session::forget('message');
        Session::forget('message_type');
    }
}
?>