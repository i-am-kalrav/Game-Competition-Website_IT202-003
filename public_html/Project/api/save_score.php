<?php
$response = ["message" => "An error occurred", "status" => 400];
error_log("Req: " . var_export($_POST, true));
if (isset($_POST["score"])) {
    session_start(); 
    require(__DIR__ . "/../../../lib/functions.php"); 
    
    if (is_logged_in()) {
        $user = get_user_id();
        $score = (int)se($_POST, "score", 0, false);
        error_log("user $user got score of $score");
        if ($user > 0 && $score >= 0) {
            $query = "INSERT INTO Scores (score, user_id) VALUES (:score, :uid)";
            $db = getDB();
            $stmt = $db->prepare($query);
            try {
                $stmt->execute([":score" => $score, ":uid" => $user]);
                $response["status"] = 200; //200 means ok
                $response["message"] = "Created new entry with id " . $db->lastInsertId();
            } catch (PDOException $e) {
                $response["message"] = var_export($e->errorInfo, true);
                error_log("error saving score: " . var_export($e, true));
            }
        }
    } else {
        $response["message"] = "User must be logged in";
        error_log("user not logged in");
    }
} else {
    $response["message"] = "Missing expected field 'score'";
    error_log("missing score field");
}
error_log("sending response: " . var_export($response, true));
echo json_encode($response);