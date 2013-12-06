<?php

$M = new mysqli("174.143.22.102", "DRWest", "Mexico143", "glb_process");

foreach ($_REQUEST as $key => $value) {
    $$key = trim(urldecode($value));
    $requestData[$key] = trim(urldecode($value));
}


switch ($action) {
    //toggles the status of the campaign.
    case 'toggleStatus':
        if ($status != 1) {
            $sql = "update glb_process.tbl_campaigns set status='1' where campaign_id='" . $campaignid .
                "';";
        } else {
            $sql = "update glb_process.tbl_campaigns set status='0' where campaign_id='" . $campaignid .
                "';";
        }
        //echo $sql;
        $M->query($sql);
        break;

    default:
}
$M->close();
?>