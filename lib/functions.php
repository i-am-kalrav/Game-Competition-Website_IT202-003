<?php
require_once(__DIR__ . "/db.php");
$BASE_PATH = '/Project/';//This is going to be a helper for redirecting to our base project path since it's nested in another folder

function se($v, $k = null, $default = "", $isEcho = true) {
    if (is_array($v) && isset($k) && isset($v[$k])) {
        $returnValue = $v[$k];
    } else if (is_object($v) && isset($k) && isset($v->$k)) {
        $returnValue = $v->$k;
    } else {
        $returnValue = $v;
        if (is_array($returnValue) || is_object($returnValue)) {
            $returnValue = $default;
        }
    }
    if (!isset($returnValue)) {
        $returnValue = $default;
    }
    if ($isEcho) {
        //https://www.php.net/manual/en/function.htmlspecialchars.php
        echo htmlspecialchars($returnValue, ENT_QUOTES);
    } else {
        //https://www.php.net/manual/en/function.htmlspecialchars.php
        return htmlspecialchars($returnValue, ENT_QUOTES);
    }
}
function sanitize_email($email = "") {
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}
function is_valid_email($email = "") {
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
}
//User Helpers
function is_logged_in() {
    return isset($_SESSION["user"]); //se($_SESSION, "user", false, false);  <---------- Function to know if logged in or not
}
function has_role($role) {//                                                 <---------- Function to check for roles
    if (is_logged_in() && isset($_SESSION["user"]["roles"])) {
        foreach ($_SESSION["user"]["roles"] as $r) {
            if ($r["name"] === $role) {
                return true;
            }
        }
    }
    return false;
}
function get_username() {
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "username", "", false);
    }
    return "";
}
function get_user_email() {
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "email", "", false);
    }
    return "";
}
function get_user_id() {
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "id", false, false);
    }
    return false;
}
//flash message system
function flash($msg = "", $color = "info") {
    $message = ["text" => $msg, "color" => $color];
    if (isset($_SESSION['flash'])) {
        array_push($_SESSION['flash'], $message);
    } else {
        $_SESSION['flash'] = array();
        array_push($_SESSION['flash'], $message);
    }
}

function getMessages() {
    if (isset($_SESSION['flash'])) {
        $flashes = $_SESSION['flash'];
        $_SESSION['flash'] = array();
        return $flashes;
    }
    return array();
}
//end flash message system
/**
 * Generates a unique string based on required length.
 * The length given will determine the likelihood of duplicates
 */
function get_random_str($length) {
    //https://stackoverflow.com/a/13733588
    //$bytes = random_bytes($length / 2);
    //return bin2hex($bytes);

    //https://stackoverflow.com/a/40974772
    return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 36)), 0, $length);
}
/*function get_or_create_account() {
    if (is_logged_in()) {
        //let's define our data structure first
        //id is for internal references, account_number is user facing info, and balance will be a cached value of activity
        $account = ["id" => -1, "account_number" => false, "balance" => 0, "quarry_vouchers" => 0];
        //this should always be 0 or 1, but being safe
        $query = "SELECT id, account, balance, quarry_vouchers from Accounts where user_id = :uid LIMIT 1";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":uid" => get_user_id()]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                //account doesn't exist, create it
                $created = false;
                //we're going to loop here in the off chance that there's a duplicate
                //it shouldn't be too likely to occur with a length of 12, but it's still worth handling such a scenario

                //you only need to prepare once
                $query = "INSERT INTO Accounts (account, user_id) VALUES (:an, :uid)";
                $stmt = $db->prepare($query);
                $user_id = get_user_id(); //caching a reference
                $account_number = "";
                while (!$created) {
                    try {
                        $account_number = get_random_str(12);
                        $stmt->execute([":an" => $account_number, ":uid" => $user_id]);
                        $created = true; //if we got here it was a success, let's exit
                        flash("Welcome! Your account has been created successfully", "success");
                    } catch (PDOException $e) {
                        $code = se($e->errorInfo, 0, "00000", false);
                        //if it's a duplicate error, just let the loop happen
                        //otherwise throw the error since it's likely something looping won't resolve
                        //and we don't want to get stuck here forever
                        if (
                            $code !== "23000"
                        ) {
                            throw $e;
                        }
                    }
                }
                //loop exited, let's assign the new values
                $account["id"] = $db->lastInsertId();
                $account["account_number"] = $account_number;
            } else {
                //$account = $result; //just copy it over
                $account["id"] = $result["id"];
                $account["account_number"] = $result["account"];
                $account["balance"] = $result["balance"];
                $account["quarry_vouchers"] = $result["quarry_vouchers"];
            }
        } catch (PDOException $e) {
            flash("Technical error: " . var_export($e->errorInfo, true), "danger");
        }
        $_SESSION["user"]["account"] = $account; //storing the account info as a key under the user session
        //Note: if there's an error it'll initialize to the "empty" definition around line 84

    } else {
        flash("You're not logged in", "danger");
    }
}*/

/*function get_or_create_user() {
    if (is_logged_in()) {
        //let's define our data structure first
        //id is for internal references, account_number is user facing info, and balance will be a cached value of activity
        $user = ["id" => -1, "account_number" => false, "balance" => 0, "quarry_vouchers" => 0];
        //this should always be 0 or 1, but being safe
        $query = "SELECT id, account, balance, quarry_vouchers from Accounts where user_id = :uid LIMIT 1";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":uid" => get_user_id()]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                //account doesn't exist, create it
                $created = false;
                //we're going to loop here in the off chance that there's a duplicate
                //it shouldn't be too likely to occur with a length of 12, but it's still worth handling such a scenario

                //you only need to prepare once
                $query = "INSERT INTO Users (account, user_id) VALUES (:an, :uid)";
                $stmt = $db->prepare($query);
                $user_id = get_user_id(); //caching a reference
                $account_number = "";
                while (!$created) {
                    try {
                        $account_number = get_random_str(12);
                        $stmt->execute([":an" => $account_number, ":uid" => $user_id]);
                        $created = true; //if we got here it was a success, let's exit
                        flash("Welcome! Your account has been created successfully", "success");
                    } catch (PDOException $e) {
                        $code = se($e->errorInfo, 0, "00000", false);
                        //if it's a duplicate error, just let the loop happen
                        //otherwise throw the error since it's likely something looping won't resolve
                        //and we don't want to get stuck here forever
                        if (
                            $code !== "23000"
                        ) {
                            throw $e;
                        }
                    }
                }
                //loop exited, let's assign the new values
                $account["id"] = $db->lastInsertId();
                $account["account_number"] = $account_number;
            } else {
                //$account = $result; //just copy it over
                $account["id"] = $result["id"];
                $account["account_number"] = $result["account"];
                $account["balance"] = $result["balance"];
                $account["quarry_vouchers"] = $result["quarry_vouchers"];
            }
        } catch (PDOException $e) {
            flash("Technical error: " . var_export($e->errorInfo, true), "danger");
        }
        $_SESSION["user"]["account"] = $account; //storing the account info as a key under the user session
        //Note: if there's an error it'll initialize to the "empty" definition around line 84

    } else {
        flash("You're not logged in", "danger");
    }
}*/

function redirect($path) {
    //header headache
    //https://www.php.net/manual/en/function.headers-sent.php#90160
    /*headers are sent at the end of script execution otherwise they are sent when the buffer reaches it's limit and emptied */
    if (!headers_sent()) {
        //php redirect
        die(header("Location: " . get_url($path)));
    }
    //javascript redirect
    echo "<script>window.location.href='" . get_url($path) . "';</script>";
    //metadata redirect (runs if javascript is disabled)
    echo "<noscript><meta http-equiv=\"refresh\" content=\"0;url=" . get_url($path) . "\"/></noscript>";
    die();
}

function get_user_account_id() {
    if (is_logged_in() && isset($_SESSION["user"]["account"])) {
        return (int)se($_SESSION["user"]["account"], "id", 0, false);
    }
    return 0;
}

function get_user_points() {
    if (is_logged_in() && isset($_SESSION["user"])) {
        //return (int)se($_SESSION["user"]["points"], "points", 0, false);
        return (int)se($_SESSION["user"], "points", 0, false);
    }
    return 0;
}

function get_url($dest) {
    global $BASE_PATH;
    if (str_starts_with($dest, "/")) {
        //handle absolute path
        return $dest;
    }
    //handle relative path
    return $BASE_PATH . $dest;
}

function change_points($points, $user, $reason, $forceAllowZero = false) {
    //I'm choosing to ignore the record of 0 point transactions

    if ($points != 0 || $forceAllowZero) {
        $query = "INSERT INTO PointsHistory (user_id, point_change, reason) 
            VALUES (:uid, :pc, :r)";
        
        $params[":uid"] = $user;
        $params[":r"] = $reason;
        $params[":pc"] = $points;

        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute($params);
            //added for module 10 to only refresh the logged in user's account
            //if it's part of src or dest since this is called during competition winner payout
            //which may not be the logged in user
            if ($user === get_user_id()) {
                refresh_user_points();
                //$_SESSION["user"]["points"];
            }
        } catch (PDOException $e) {
            flash("Point update error occurred: " . var_export($e->errorInfo, true), "danger");
        }
    }
}

function refresh_user_points() {
    if (is_logged_in()) {
        //cache account balance via PointHistory history
        $query = "UPDATE Users set points = (SELECT IFNULL(SUM(point_change), 0) from PointsHistory WHERE user_id = :uid) where id = :uid";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":uid" => get_user_id()]);
            //get_or_create_account(); //refresh session data
            $_SESSION["user"]["points"];
            $query2 = "SELECT points from Users WHERE id = :uid";
            $stmt2 = $db->prepare($query2);
            try {
                $stmt2->execute([":uid" => get_user_id()]);
                $r = $stmt2->fetch();
                $_SESSION["user"]["points"] = (int)se($r, "points", 0, false);
            } catch (PDOException $e) {
                flash("Error refreshing user points: " . var_export($e->errorInfo, true), "danger");
            }
        } catch (PDOException $e) {
            flash("Error refreshing user points: " . var_export($e->errorInfo, true), "danger");
        }
    }
}

function refresh_last_login() {
    if (is_logged_in()) {
        //check if last_login is today
        $query = "SELECT date(last_login) = date(current_timestamp) as same_day from Users where id = :uid";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":uid" => get_user_id()]);
            $r = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($r) {
                $isSameDay = (int)se($r, "same_day", 0, false);
                if ($isSameDay === 1) {
                    change_points(1, get_user_id(), "login_bonus");
                    flash("You received a login bonus of 1 point!", "success");
                }
            }
        } catch (PDOException $e) {
            error_log("Unknown error during date check: " . var_export($e->errorInfo, true));
        }
        //update the timestamp
        $query = "UPDATE Users set last_login = current_timestamp Where id = :uid";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":uid" => get_user_id()]);
        } catch (PDOException $e) {
            error_log("Unknown error during date check: " . var_export($e->errorInfo, true));
        }
    }
}

//function get_top_10($duration = "day") {
function get_top_10($duration = "week") {//             <---------------------------- Function for the weekly, monthly and all-time top scores
    //$d = "day";
    $d = "week";
    //if (in_array($duration, ["day", "week", "month", "lifetime"])) {
    if (in_array($duration, ["week", "month", "lifetime"])) {
        //variable is safe
        $d = $duration;
    }
    $db = getDB();
    //Note: In my project I'll be using modified instead of created datetime since I actually update the score
    //in general, created timestamp is sufficient
    //$query = "SELECT user_id,username, score, Scores.modified from Scores join Users on Scores.user_id = Users.id";
    $query = "SELECT user_id,username, score, Scores.created from Scores join Users on Scores.user_id = Users.id";
    if ($d !== "lifetime") {
        //be very careful passing in a variable directly to SQL, I ensure it's a specific value from line 390
        //$query .= " WHERE modified >= DATE_SUB(NOW(), INTERVAL 1 $d)";
        $query .= " WHERE Scores.created >= DATE_SUB(NOW(), INTERVAL 1 $d)";
    }
    //remember to prefix any ambiguous columns (Users and Scores both have created)
    //$query .= " ORDER BY score Desc, Scores.modified desc LIMIT 10"; //newest of the same score is ranked higher
    $query .= " ORDER BY score Desc, Scores.created desc LIMIT 10"; //newest of the same score is ranked higher

    $stmt = $db->prepare($query);
    $results = [];
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log("Error fetching scores for $d: " . var_export($e->errorInfo, true));
    }
    return $results;
}

function get_latest_scores($user_id, $limit = 10) {
    if ($limit < 1 || $limit > 50) {
        $limit = 10;
    }
    //$query = "SELECT score, modified from Scores where user_id = :id ORDER BY modified desc LIMIT :limit";
    $query = "SELECT score, created from Scores where user_id = :id ORDER BY created desc LIMIT :limit";
    $db = getDB();
    //IMPORTANT: this is required for the execute to set the limit variables properly
    //otherwise it'll convert the values to a string and the query will fail since LIMIT expects only numerical values and doesn't cast
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //END IMPORTANT

    $stmt = $db->prepare($query);
    try {
        $stmt->execute([":id" => $user_id, ":limit" => $limit]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            return $r;
        }
    } catch (PDOException $e) {
        error_log("Error getting latest $limit scores for user $user_id: " . var_export($e->errorInfo, true));
    }
    return [];
}

function join_competition($comp_id){//, $isCreator = false) {
    if ($comp_id <= 0) {
        return "Invalid Competition";
    }
    $db = getDB();
    $query = "SELECT join_fee, paid_out, expires FROM Competitions where id = :id";
    //$query = "SELECT join_fee, paid_out, expires IF(expires <= current_timestamp(), 1, 0) as expired FROM Competitions where id = :id";
    $stmt = $db->prepare($query);
    $comp = [];
    try {
        $stmt->execute([":id" => $comp_id]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            $comp = $r;
        }
    } catch (PDOException $e) {
        error_log("Error fetching competition to join $comp_id: " . var_export($e->errorInfo, true));
        return "Error looking up competition";
    }
    if ($comp && count($comp) > 0) {

        $paid_out = (int)se($comp, "paid_out", 0, false) > 0;
        /*$is_expired = (int)se($comp, "expired", 0, false) > 0;

        /*$query2 = "IF(expires <= current_timestamp(), 1, 0) as expired";
        $stmt2 = $db->prepare($query2);
        try {
            $stmt2->execute();
            $r2 = $stmt2->fetch([":id" => $comp_id]);
            if($r2)
            {
                $is_expired = 1;
            }
        } catch (PDOException $e) {
            flash("Error checking for expiry of competition" . var_export($e->errorInfo, true), "danger");
        }*/

        /*$expiry_date = (int)se($comp, "expires", 0, false) > 0;
        $current_date = "";//current time stamp
        
        if($current_date >= $expiry_date){
            $is_expired = 1;
        }
        else{
            $is_expired = 0;
        }*/
        
        if ($paid_out) {
            flash("You can't join a completed competition", "danger");
            return "You can't join a completed competition";
        }
        /*if ($is_expired) {
            return "You can't join an expired competition";
        }*/
        $balance = (int)se(get_user_points(), null, 0, false);
        $fee = (int)se($comp, "join_fee", 0, false);
        if ($fee > $balance) {
            flash("You can't afford to join this competition", "danger");
            return "You can't afford to join this competition";
        }
        $query = "INSERT INTO CompetitionParticipants (user_id, comp_id) VALUES (:uid, :cid)";
        $stmt = $db->prepare($query);
        $joined = false;
        try {
            $stmt->execute([":uid" => get_user_id(), ":cid" => $comp_id]);
            $joined = true;
        } catch (PDOException $e) {
            $err = $e->errorInfo;
            if ($err[1] === 1062) {
                flash("You already joined this competition", "warning");
                return "You already joined this competition";
            }
            error_log("Error joining competition (CompetitionParticipants): " . var_export($err, true));
        }
        if ($joined) {
            //+1 for the current_reward calculation may be needed as current_participants at that point
            // may not see the latest changed value from the current_participants calculation in the same query
            // so using a +1 since really that's all it should be doing and this should yield an accurate reward value
            $query = "UPDATE Competitions set 
            current_participants = (SELECT count(1) from CompetitionParticipants WHERE comp_id = :cid),
            current_reward = current_reward + ceil(0.5 * (join_fee))
            WHERE id = :cid";
            $stmt = $db->prepare($query);
            try {
                $stmt->execute([":cid" => $comp_id]);
            } catch (PDOException $e) {
                error_log("Error updating competition stats: " . var_export($e->errorInfo, true));
                //I'm choosing not to let failure here be a big deal, only 1 successful update periodically is required
            }
            //this won't record free competitions due to the inner logic of change_points()
            /*if ($isCreator) {
                $fee = 0;
            }*/
            change_points($fee*-1, get_user_id() , "join-comp", true);
            flash("Successfully joined Competition #$comp_id", "success");
            return "Successfully joined Competition #$comp_id";
        } else {
            return "Unknown error joining competition, please try again";
        }
    } else {
        flash("Competition not found", "danger");
        return "Competition not found.";
    }
}
/** Runs an "expensive" query to find the potential top 3 users/players of a competition.
 * Returns their id, username, and max score
 */
function get_competition_top($comp_id) {
    if ($comp_id <= 0) {
        return [];
    }
    $db = getDB();
    //get the max score between created and expires of the particular competition
    //for each registered user of the competition
    //limit results to the top 3 since system only supports first, second, third place

    //Note: whatever is SELECTED or used in ORDER BY must be in the GROUP BY clause, that's why
    // there's the redundant username in the group by
    //Note 2: Joins are expensive, you'd want to profile this with large data sets to see if it needs refactoring
    // it "may" be more efficient to have Username as a subquery in the select rather than as a join

    //reasons for particular tables:
    //users table for username
    //scores to check who is winning
    //UserCompetitions to get users mapped to competition
    //Competitions to get created/expires timestamps
    $query = "SELECT Scores.user_id, Users.username, IFNULL(max(score),0) as 'max_score' FROM Scores 
    JOIN Users on Users.id = Scores.user_id
    JOIN CompetitionParticipants cp on Scores.user_id = cp.user_id 
    JOIN Competitions c on c.id = cp.comp_id 
    WHERE cp.comp_id = :cid AND Scores.created BETWEEN c.created AND c.expires
    GROUP BY Scores.user_id, Users.username ORDER BY max_score desc LIMIT 3";
    $stmt = $db->prepare($query);
    $top = [];
    try {
        $stmt->execute([":cid" => $comp_id]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $top = $r;
        }
    } catch (PDOException $e) {
        error_log("Error fetching competition top winners $comp_id: " . var_export($e->errorInfo, true));
    }
    return $top;
}

function calc_winners_or_expire() {
    error_log("Starting calc/expire process");
    //do time check
    $db = getDB();
    //added limit to do up to 25 item bursts for "higher volume" site
    $query = "SELECT id, current_reward, first_place_per, second_place_per, third_place_per, min_participants, current_participants, min_score FROM Competitions c 
    WHERE c.expires <= CURRENT_TIMESTAMP AND c.paid_out = 0 LIMIT 25";
    $stmt = $db->prepare($query);
    $results = [];
    $total = 0;
    $numPaid = 0;
    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error looking up expired competitions: " . var_export($e->errorInfo, true));
    }
    if ($results && count($results) > 0) {
        foreach ($results as $comp) {
            $min = (int)se($comp, "min_participants", 3, false);
            $cur = (int)se($comp, "current_participants", 0, false);
            $min_score = (int)se($_POST, "min_score", false, false);
            $first_place_per = (int)se($_POST, "first_place_per", false, false);
            $second_place_per = (int)se($_POST, "second_place_per", false, false);
            $third_place_per = (int)se($_POST, "third_place_per", false, false);
            $paid_out = 0;
            $comp_id = (int)se($comp, "id", 0, false);
            $total_reward = (int)se($comp, "current_reward", 0, false);
            //unwrapping my implementation of payouts
            //per the proposal, you'll be doing this differently
            /*$payouts = se($comp, "payouts", "", false);
            $payouts = explode(",", $payouts);
            $payouts = array_map(function ($v) {
                return floatval($v);
            }, $payouts);*/
            if ($cur >= $min) {
                //valid to calc rewards
                $top = get_competition_top($comp_id);
                if (isset($payouts[0]) && isset($top[0])) {
                    $reward = ceil($total_reward * ($first_place_per/100));
                    if ($reward > 0) {
                        $user_account = get_user_id(se($top[0], "user_id", 0));
                        /*$query = "SELECT (max(Scores.score)) as max_score FROM Scores JOIN CompetitionParticipants cp on Scores.user_id = cp.user_id
                        JOIN Competitions c on c.id = cp.comp_id 
                        WHERE cp.comp_id = :cid AND c.created <= Scores.created < c.expires";
                        $r = 0;
                        $stmt = $db->prepare($query);
                        try {
                            $stmt->execute([":cid" => $comp_id]);
                            $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        } catch (PDOException $e) {
                            flash("Couldn't fetch max_score of 1st ranker for the duration.", "warning");
                        }*/
                        $r = $top[0]["max_score"];
                        if ($user_account > 0 && $r >= $min_score) {
                            change_points($reward, $user_account, "comp-reward");
                            $paid_out = 1;
                        }
                    }
                }
                if (isset($payouts[1]) && isset($top[1])) {
                    $reward = ceil($total_reward * ($second_place_per/100));
                    if ($reward > 0) {
                        $user_account = get_user_id(se($top[1], "user_id", 0));
                        $r = $top[1]["max_score"];
                        if ($user_account > 0 && $r >= $min_score) {
                            change_points($reward, $user_account, "comp-reward");
                            $paid_out = 1;
                        }
                    }
                }
                if (isset($payouts[2]) && isset($top[2])) {
                    $reward = ceil($total_reward * ($third_place_per/100));
                    if ($reward > 0) {
                        $user_account = get_user_id(se($top[2], "user_id", 0));
                        $r = $top[1]["max_score"];
                        if ($user_account > 0 && $r >= $min_score) {
                            change_points($reward, $user_account, "comp-reward");
                            $paid_out = 1;
                        }
                    }
                }
            } else {
                //just expire (this is here purely as a note)
            }
            //prevent the competition from being recalculated or from showing as active
            $query = "UPDATE Competitions set paid_out = :po WHERE id = :cid";
            $stmt = $db->prepare($query);
            try {
                //Note: if this fails and the previous payout(s) succeeded it could duplicate reward players
                $stmt->execute([":cid" => $comp_id, ":po" => $paid_out]);
                $total++;
                if ($paid_out) {
                    $numPaid++;
                }
            } catch (PDOException $e) {
                error_log("Error updating competition to paid out or expired: " . var_export($e->errorInfo, true));
            }
        }
    }
    error_log("Processed $total competitions: $numPaid paid out and " . ($total - $numPaid) . " expired");
}

function new_score($score) {  
    //$points_today = $newScore;
    $user = get_user_id();
    
    //$query = "INSERT INTO Scores(score, user_id) VALUES(newScore, $user)";
    $db = getDB();
    //$stmt = $db->prepare($query);
    $query = "INSERT INTO Scores (score, user_id) VALUES (:score, :uid)";
    $stmt = $db->prepare($query);
    try {
        $stmt->execute([ ":score" => $score, ":uid" => $user]);
        error_log("Created new score entry for $user to $score");
    } catch (PDOException $e) {
        error_log("Error creating record for today's score for $user with $score: " . var_export($e->errorInfo, true));
    }
    return;
}
