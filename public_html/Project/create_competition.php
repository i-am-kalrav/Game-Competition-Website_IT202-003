<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You must be logged in to access this page", "danger");

    //die(header("Location: " . $BASE_PATH));
    redirect($BASE_PATH);
}
?>
<?php if (isset($_POST["name"])) {
    $name = se($_POST, "name", false, false);
    $starting_reward = (int)se($_POST, "starting_reward", 0, false);
    $cost = $starting_reward + 1;
    $balance = (int)se(get_user_points(), null, 0, false);
    $join_fee = (int)se($_POST, "join_fee", 0, false);
    //$reward_increase = (float)se($_POST, "reward_increase", 0, false);
    $min_participants = (int)se($_POST, "min_participants", 3, false);
    //$payout_split = se($_POST, "payout", 1, false);
    $min_score = (int)se($_POST, "min_score", 3, false);
    $duration = (int)se($_POST, "duration", 3, false);
    /*$first_per = 0;
    $second_per = 0;
    $third_per = 0;*/
    $first_place_per = (int)se($_POST, "first_place_per", false, false);
    $second_place_per = (int)se($_POST, "second_place_per", false, false);
    $third_place_per = (int)se($_POST, "third_place_per", false, false);
    /*switch ($payout_split) {
        case "2":
            $payout = ".8,.2";
            $first_per = 80;
            $second_per = 20;
            break;
        case "3":
            $payout = ".7,.2,.1";
            $first_per = 0;
            $second_per = 0;
            $third_per = 0;
            break;
        case "4":
            $payout = ".6,.3,.1";
            $first_per = 0;
            $second_per = 0;
            $third_per = 0;
            break;
        case "5":
            $payout = ".34,.33,.33";
            $first_per = 0;
            $second_per = 0;
            $third_per = 0;
            break;
        default:
            $payout = "1";
            $first_per = 0;
            $second_per = 0;
            $third_per = 0;
            break;
    }*/
    $isValid = true;
    //validate
    if ($starting_reward < 0) {
        flash("Invalid Starting Reward", "warning");
        $isValid = false;
    }
    if ($cost < 1) {
        flash("Invalid Cost", "danger");
        $isValid = false;
    }
    if ($cost > $balance) {
        flash("You can't afford this, it requires $cost points", "warning");
        $isValid = false;
    }
    if ($min_participants < 3) {
        flash("All competitions require at least 3 participants to payout", "warning");
    }
    if (!!$name === false) {
        flash("Name must be set", "warning");
        $isValid = false;
    }
    if ($join_fee < 0) {
        flash("Entry fee must be free (0) or greater", "warning");
        $isValid = false;
    }
    /*if ($reward_increase < 0.0 || $reward_increase > 1.0) {
        flash("The reward increase can only be between 0% - 100% of the Entry Fee", "warning");
        $isValid = false;
    }*/
    if ($duration < 1 || is_nan($duration)) {
        flash("Competitions must be 1 or more days", "warning");
        $isValid = false;
    }
    if ($isValid) {
        //create competition and deduct cost
        $db = getDB();
        //setting 1 for participants since we'll be adding creator to the comp, this saves an update query
        //using sql to calculate the expires date by passing in a sanitized/validated $duration
        //setting starting_reward and current_reward to the same value
        $query = "INSERT INTO Competitions (name, duration, starting_reward, current_reward, min_participants, min_score, current_participants, join_fee, first_place_per, second_place_per, third_place_per, cost_to_create, expires)
        values (:n, :d, :sr, :sr, :mp, :ms, 1, :ef, :fp, :sp, :tp, :sr+1, DATE_ADD(NOW(), INTERVAL $duration day))";
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([
                ":n" => $name,
                //":c" => get_user_id(),
                ":d" => $duration,
                ":sr" => $starting_reward,
                ":mp" => $min_participants,
                ":ms" => $min_score,
                ":ef" => $join_fee,
                //":ri" => $reward_increase,
                ":fp" => $first_place_per,
                ":sp" => $second_place_per,
                ":tp" => $third_place_per

            ]);
            $comp_id = (int)$db->lastInsertId();
            if ($comp_id > 0) {
                change_points($cost*-1, get_user_id(), "create-comp");
                //TODO creator joins competition for free
                error_log("Attempt to join created competition: " . join_competition($comp_id));//, true));
                flash("Successfully created and joined Competition $name", "success");
            }
        } catch (PDOException $e) {
            error_log("Error creating competition: " . var_export($e->errorInfo, true));
            flash("There was an error creating the competition: " . var_export($e->errorInfo[2]), "danger");
        }
    }
}
?>
<div class="container-fluid">
    <?php $title = "Create Competition";
    include(__DIR__ . "/../../partials/title.php"); ?>
    <form method="POST" autocomplete="off" onsubmit="return validate2()">
        <div>
            <label class="form-label" for="name">Name/Title</label>
            <input class="form-control" type="text" name="name" id="name" required />
        </div>
        <div>
            <label class="form-label" for="sr">Starting Reward</label>
            <input class="form-control" type="number" name="starting_reward" id="sr" min="1" value="1" oninput="document.getElementById('cost').innerText = 1 + (value*1)" required />
        </div>
        <div>
            <label class="form-label" for="ef">Entry Fee</label>
            <input class="form-control" type="number" name="join_fee" id="ef" min="0" value="0" required />
        </div>
        <div>
            <label class="form-label" for="rp">Min. Required Participants</label>
            <input class="form-control" type="number" name="min_participants" id="rp" min="3" value="3" required />
        </div>
        <div>
            <label class="form-label" for="ms">Min. Score for Qualifying to Receive Reward</label>
            <input class="form-control" type="number" name="min_score" id="rp" min="3" value="3" required />
        </div>
        <div>
            <label class="form-label" for="d">Duration in Days</label>
            <input class="form-control" type="number" name="duration" id="d" min="1" value="1" required />
        </div>
        <div>
            <label class="form-label" for="fp">Reward % for 1st Place</label>
            <input class="form-control" type="number" name="first_place_per" id="fp" min="0" value="0" required />
        </div>
        <div>
            <label class="form-label" for="sp">Reward % for 1st Place</label>
            <input class="form-control" type="number" name="second_place_per" id="sp" min="0" value="0" required />
        </div>
        <div>
            <label class="form-label" for="tp">Reward % for 1st Place</label>
            <input class="form-control" type="number" name="third_place_per" id="tp" min="0" value="0" required />
        </div>
        <!--<div>
            <label class="form-label" for="payout">Payout Split</label>
            <select class="form-control" name="payout" required>
                <option value="1">100% to First</option>
                <option value="2">80% to First, 20% to Second</option>
                <option value="3">70% to First, 20% to Second, 10% to Third</option>
                <option value="4">60% to First, 30% to Second, 10% to Third</option>
                <option value="5">34% to First, 33% to Second, 33% to Third</option>
            </select>
        </div>-->
        <div>Cost: <span id="cost">2</span></div>
        <input class="btn btn-primary" type="submit" value="Create" />
    </form>
</div>
<script>
    function validate(form) {
        //TODO add all validations (basically match what you define at the html level for consistency)

        //client side balance validation (just used to reduce server load as we don't trust the client)
        let balance = <?php se(get_user_points(), null, 0); ?> * 1; //convert to int
        let cost = 1 + (form.starting_reward.value * 1);
        if (cost < 1) {
            cost = 1;
        }
        let isValid = true;
        if (cost > balance) {
            flash("You can't afford to create this competition, you need " + cost + " points");
            isValid = false;
        }
        return isValid;
    }
    function validate2(form) {
        var rp1 = parseInt(document.getElementsByName('first_place_per')[0].value);
        var rp2 = parseInt(document.getElementsByName('second_place_per')[0].value);
        var rp3 = parseInt(document.getElementsByName('third_place_per')[0].value);
        //if (rp1 <= -1 || rp2 <= -1 || rp3 <= -1 ){
        if (rp1 + rp2 + rp3 == 100) {
            return true;
        } else {
            flash("Sum of reward %  values (which should all be whole numbers; NO DECIMALS) needs to add up to 100", "warning");
            return false;
        }
        //} else {
        //    flash("Any reward % value cannot be < 0", "warning");
        //    return false;
        //}
    }
</script>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>