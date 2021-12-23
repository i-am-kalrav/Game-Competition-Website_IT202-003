<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You must be logged in to access this page", "danger");

    //die(header("Location: " . $BASE_PATH));
    redirect($BASE_PATH);
}
$comp_id = (int)se($_GET, "id", -1, false);
if ($comp_id < 1) {
    flash("Invalid competition", "danger");
    //die(header("Location: competitions.php"));
    redirect("competitions.php");
}

$result = [];
$db = getDB();
/*$query = "SELECT name, current_reward, min_participants, current_participants, first_place_per, second_place_per, third_place_per, created, expires
FROM Competitions c JOIN CompetitionParticipants cp on c.id = cp.comp_id WHERE c.id = :cid";*/
/*$query = "SELECT Competitions.id, name, current_reward, min_participants, min_score, current_participants, join_fee, IF(comp_id is null, 0, 1) as joined, first_place_per, second_place_per, third_place_per, created, expires
FROM Competitions c JOIN CompetitionParticipants cp on c.id = cp.comp_id WHERE c.id = :cid";*/
$query = "SELECT Competitions.id as id, name, Competitions.created as created, Competitions.expires as expires, CompetitionParticipants.user_id as user_id, current_reward, min_score, first_place_per, second_place_per, third_place_per
        FROM Competions c JOIN CompetitionParticipants cp ON c.id = cp.comp_id
        WHERE c.id = :cid ";
$stmt = $db->prepare($query);
try {
    $stmt->execute([":cid" => $comp_id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $result = $r;
    }
} catch (PDOException $e) {
    flash("Error looking up competition details", "danger");
    error_log("Error looking up competition details: " . var_export($e->errorInfo, true));
}
$top = [];
if (!!$result === true) {
    $top = get_competition_top($comp_id);
}
?>
<div class="container-fluid">
    <?php $title = "Competition " . se($result, "name", "", false);
    include(__DIR__ . "/../../partials/title.php"); ?>
    <div class="card">
        <div class="card-body">
            <div class="card-subtitle">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col">
                        Created: <?php se($result, "created"); ?>
                    </div>
                    <div class="col">
                        Ends: <?php se($result, "expires"); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Current Reward: <?php se($result, "current_reward"); ?>
                    </div>
                    <div class="col">
                        Minimum Score to qualify to Reward: <?php se($result, "min_score"); ?>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row">
                    <div class="col">
                        1st Place Reward %: <?php se($result, "first_place_per"); ?>
                    </div>
                    <div class="col">
                        2nd Place Reward %: <?php se($result, "second_place_per"); ?>
                    </div>
                    <div class="col">
                        3rd Place Reward %: <?php se($result, "third_place_per"); ?>
                    </div>
                </div>
            </div>
            <div class="card-text">
                <table class="table">
                    <thead>
                        <th>Place</th>
                        <th>User</th>
                        <th>Score</th>
                    </thead>
                    <tbody>
                        <?php if ($top && count($top) > 0) : ?>
                            <?php foreach ($top as $key => $score) : ?>
                                <tr>

                                    <td><?php se($key + 1); ?></td>
                                    <td><a href="profile.php?id=<?php se($score, "user_id"); ?>"><?php se($score, "username"); ?></a></td>
                                    <td><?php se($score, "max_score"); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td>No recorded scores yet</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>