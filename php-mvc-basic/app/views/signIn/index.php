<?php
include __DIR__ . '/../header.php';
?>
<div id="body">
<?php
if($message != ""){?>
    <div class="col alert alert-danger d-flex justify-content-center align-items-center" role="alert">
    <? echo $message ?> <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button></div><?
}?>
    <h1>Log in</h1>
    <div class="colm-form">
        <form class="form-container" method="post" action="/signIn/signIn">
            <input type="text" id="username" placeholder="Username" name="usernameinput">
            <input type="password" id="password" placeholder="Password" name="passwordinput">
            <input type="submit" class="btn btn-primary btn-lg" name="login" value="Login">
        </form>
    </div>
</div>
<?php

include __DIR__ . '/../footer.php';
?>