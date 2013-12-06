<?
$M = new mysqli('174.143.22.102', 'DRWest', 'Mexico143', 'glb_process');


switch ($_REQUEST['action']) {
    case 'save':
        $sql = "update tbl_referrers set daily_budget ='" . $_REQUEST['budget'] .
            "' where campaign_id='" . $_REQUEST['campaign_id'] . "' and referrer='".$_REQUEST['refID']."'";
        $result = $M->query($sql);
        echo 'Saved!';
        exit;
        break;


    default:
        $sql = "SELECT
RF.daily_budget,
C.campaign_name,
RF.referrer
FROM
tbl_campaigns AS C
INNER JOIN tbl_referrers AS RF ON C.campaign_id = RF.campaign_id where C.campaign_id='" .
            $_REQUEST['campaign_id'] . "' and RF.referrer='".$_REQUEST['refID']."'";
}

//echo $sql;

$result = $M->query($sql);
$r = $result->fetch_assoc();

?>

<?if($_REQUEST['action']==''){?>
<form method="get" id="<?= $_REQUEST['campaign_id'] ?>_<?= $r['referrer']?>" enctype="text/plain" action="">
<p>Enter Daily Budget for <?= $r['campaign_name'] ?></p><input type="text" id="daily_budget_<?= $_REQUEST['campaign_id'] ?>_<?= $r['referrer']?>"  />
<p>Enter Cost for  <?= $r['campaign_name'] ?></p><input type="text" id="daily_budget_<?= $_REQUEST['campaign_id'] ?>_<?= $r['referrer']?>"  />
<input type="hidden" value="<?= $r['referrer'] ?>" id="refID_<?= $_REQUEST['campaign_id'] ?>_<?= $r['referrer']?>" />
<input type="hidden" value="save" id="action" />
</form>

<?}?>