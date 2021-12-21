<?php
session_start();
require_once(__DIR__ . "/../../lib/functions.php");
//$final = $_REQUEST["${score}"];
if (isset($_POST["score"])){
    $final = $_POST['score'];
    new_score($final);
    /*$user = get_user_id();
    $db = getDB();
    $query = "INSERT INTO Scores (score, user_id) VALUES (:score, :uid)";
    $stmt = $db->prepare($query);
    try {
        $stmt->execute([ ":score" => $newScore, ":uid" => $user]);
        error_log("Created new score entry for $user to $newScore");
    } catch (PDOException $e) {
        error_log("Error creating record for today's score for $user with $newScore: " . var_export($e->errorInfo, true));
    }*/
}

?>