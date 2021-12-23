<?php
session_start();
session_unset();
session_destroy();
//setcookie("PHPSESSID", "", time()-3600);           Logout doesn't allow to log back in afterwards by clicking the back or forward button
session_start();
require_once(__DIR__ . "/../../lib/functions.php");
flash("You have been logged out", "success");
//die(header("Location: login.php"));
redirect("login.php");
