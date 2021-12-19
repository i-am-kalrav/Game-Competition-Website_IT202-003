<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!has_role("Admin")) {
    flash("You don't have permission to access this page", "danger");

    die(header("Location: " . $BASE_PATH));
}
?>

<h1>Home</h1>
<h5>Welcome, <?php se(get_username()); ?>!</h5>
<h6>Admin related tasks</h6>