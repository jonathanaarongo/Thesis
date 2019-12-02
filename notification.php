<?php
date_default_timezone_set('Asia/Manila');
//NOTIFICATION FOR WEIGHT
include("includes/db.php");
$ref = "WeightAdd";
$data = $database->getReference($ref)->getValue();
$output = '';
foreach ($data as $key => $data1) {
    if ($data1['comment_status'] == 0) {
        ?>
        <div class="alert alert_default">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                <small><em>has exceeded weight limit with <?php echo $data1["weight"]; ?> lbs.</em></small>
            </p>
        </div>
<?php
    }
    $data = [
        'comment_status' => 1
    ];

    $pushData = $database->getReference("WeightAdd/" . $key)->update($data);
}
?>

<?php
//NOTIFICATION FOR BLOOD SUGAR
include("includes/db.php");
$ref = "BloodSugarAdd";
$data = $database->getReference($ref)->getValue();
$output = '';
foreach ($data as $key => $data1) {
    if ($data1['comment_status'] == 0 && $data1['bsField'] >= 120) {
        ?>
        <div class="alert alert_default">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                <small><em>has exceeded blood sugar limit with <?php echo $data1["bsField"]; ?> mg/dL</em></small>
            </p>
        </div>
<?php
    }
    $data = [
        'comment_status' => 1
    ];

    $pushData = $database->getReference("BloodSugarAdd/" . $key)->update($data);
}
?>

<?php
//NOTIFICATION FOR BLOOD PRESSURE
include("includes/db.php");
$ref = "BloodPressureAdd";
$data = $database->getReference($ref)->getValue();
$output = '';
foreach ($data as $key => $data1) {
    if ($data1['comment_status'] == 0) {
        if ($data1['systolic'] >= 130 && $data1['diastolic'] >= 89) {
            ?>
            <div class="alert alert_default">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                    <small><em>has exceeded systolic limit with <?php echo $data1["systolic"]; ?> and</em></small>
                    <small><em>has exceeded diastolic limit with <?php echo $data1["diastolic"]; ?> </em></small>
                </p>
            </div>
        <?php
                } else if ($data1['systolic'] >= 130) {
                    ?>
            <div class="alert alert_default">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                    <small><em>has exceeded systolic limit with <?php echo $data1["systolic"]; ?> </em></small>
                </p>
            </div>
        <?php
                } else if ($data1['diastolic'] >= 89) {
                    ?>
            <div class="alert alert_default">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                    <small><em>has exceeded diastolic limit with <?php echo $data1["diastolic"]; ?> </em></small>
                </p>
            </div>
<?php
        }
    }
    $data = [
        'comment_status' => 1
    ];

    $pushData = $database->getReference("BloodPressureAdd/" . $key)->update($data);
}
?>

<?php
//NOTIFICATION FOR KICK COUNTER
include("includes/db.php");
$ref = "KickAdd";
$data = $database->getReference($ref)->getValue();
$kickarray = array();
$startdate = date('Y-m-d');

foreach ($data as $key => $data1) {
    $date = str_replace('-', '/', $data1['date']);
    $newDate = date("Y-m-d", strtotime($date));

    if ($_SESSION['email'] == $data1['usermail']) {

        if ($startdate == $newDate) {
            array_push($kickarray, $data1['kick']);
        } else {
            if (array_sum($kickarray) <= 9) {
                ?>
                <div class="alert alert_default">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                        <small><em>has only received <?php array_sum($kickarray); ?> kicks today. </em></small>
                    </p>
                </div>
    <?php
                }
                $kickarray = array();
                $timearray = array();
                array_push($kickarray, $data1['kick']);
                $startdate = $newDate;
            }
        }
        $data = [
            'comment_status' => 1
        ];

        $pushData = $database->getReference("KickAdd/" . $key)->update($data);
    }
    if (array_sum($kickarray) <= 9 && $startdate > date("Y-m-d")) {
        ?>
    <div class="alert alert_default">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
            <small><em>has only received <?php array_sum($kickarray); ?> kicks today. </em></small>
        </p>
    </div>
<?php
    $data = [
        'comment_status' => 1
    ];

    $pushData = $database->getReference("KickAdd/" . $key)->update($data);
}
?>


<?php
//NOTIFICATION FOR APPOINTMENTS
include("includes/db.php");
$ref = "Calendar";
$data = $database->getReference($ref)->getValue();
$output = '';
foreach ($data as $key => $data1) {
    if ($data1['comment_status'] == 0 && $data1['sendBy'] == "patient") {
        if (date("Y-m-d") == date("Y-m-d", strtotime($data1['date'] . " -3 days")) || date("Y-m-d") == date("Y-m-d", strtotime($data1['date'] . " -2 days")) || date("Y-m-d") == date("Y-m-d", strtotime($data1['date'] . " -1 days"))) {
            ?>
            <div class="alert alert_default">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                    <small><em>has a nearby appointment on <?php echo $data1["date"]; ?> </em></small>
                </p>
            </div>
        <?php
                }
                if ($data1['status'] == "Pending") {
                    ?>
            <div class="alert alert_default">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                    <small><em>requested an appointment on <?php echo $data1["date"]; ?> </em></small>
                </p>
            </div>
        <?php
                } else if ($data1['status'] == "Approved") {
                    ?>
            <div class="alert alert_default">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                    <small><em>approved an appointment on <?php echo $data1["date"]; ?> </em></small>
                </p>
            </div>
        <?php
                } else if ($data1['status'] == "Cancelled") {
                    ?>
            <div class="alert alert_default">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                    <small><em>cancelled an appointment on <?php echo $data1["date"]; ?> </em></small>
                </p>
            </div>
<?php
        }
    }
    $data = [
        'comment_status' => 1
    ];

    $pushData = $database->getReference("Calendar/" . $key)->update($data);
}
?>

<?php
//NOTIFICATION FOR QUESTIONS
include("includes/db.php");
$ref = "AskAdd";
$data = $database->getReference($ref)->getValue();
$output = '';
foreach ($data as $key => $data1) {
    if ($data1['comment_status'] == 0) {
        ?>
        <div class="alert alert_default">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><strong>Patient with email <?php echo $data1["usermail"]; ?></strong>
                <small><em>has asked a question <?php echo $data1["question"]; ?> </em></small>
            </p>
        </div>
<?php
    }
    $data = [
        'comment_status' => 1
    ];

    $pushData = $database->getReference("AskAdd/" . $key)->update($data);
}
?>