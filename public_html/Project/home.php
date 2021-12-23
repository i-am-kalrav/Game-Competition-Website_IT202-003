<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    //die(header("Location: login.php"));
    redirect("login.php");
}
?>
<h1>Home</h1>
<h5>Welcome, <?php se(get_username()); ?>!</h5>
<div class="row">
    <div class="col-8">
    </div>
    <div class="col-4">
        <?php
        $duration = "week";
        include(__DIR__ . "/../../partials/highscore_table.php");

        $duration = "month";
        include(__DIR__ . "/../../partials/highscore_table.php");

        $duration = "lifetime";
        include(__DIR__ . "/../../partials/highscore_table.php");
        ?>
    </div>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>