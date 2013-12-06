<?php

$logBot=false;
if (strpos($_SERVER['HTTP_USER_AGENT'],'bot')!=0){
  $logBot=true;
}

$serverData = serialize($_SERVER);
require_once '/var/www/html/thedwspot.com/myPath/includes/Mobile_Detect.php';
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') :
    'computer');

if ($deviceType == 'phone') {
    foreach ($detect->getRules() as $name => $regex) {
        $check = $detect->{'is' . $name}();
        if ($check) {
            $deviceType = $name;
        }
    }
}

//detect if Iphone
if ($detect->isiphone()) {
    $iphone = '1';
}
else {
    $iphone = '0';
}
;

error_reporting(E_ALL);
//log incoming user ip with lead ID
$con = new mysqli('10.0.3.135', 'drwest', 'Mexico143', 'myPath');

if (strpos($_SERVER['HTTP_USER_AGENT'], "Chrome") != 0) {
    $browser = 'Chrome';
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") != 0) {
    $browser = 'Internet Explorer';
}
elseif (strpos($_SERVER['HTTP_USER_AGENT'], "Firefox") != 0) {
    $browser = 'FireFox';
}
else {
    $browser = 'Other';
}



$transID = uniqid('DW-');
$referrer = $_REQUEST['aid'];
$select = "Select * from tbl_campaigns where campaign_id='" . $_REQUEST['cid'] .
    "';";
$updateUser = "Insert Into activity_log(ip,browser,campaign_id,deviceType,isIphone,serverinfo) values('" .
    $_SERVER['REMOTE_ADDR'] . "','" . $browser . "','" . $_REQUEST['cid'] .
    "','" . $deviceType . "','" . $iphone . "','".$con->real_escape_string($serverData)."');";
//echo $updateUser; exit;

$res = $con->query($updateUser);
$campRes = $con->query($select);
$campInfo = $campRes->fetch_assoc();
$leadID = $con->insert_id;

if($logBot==false){

switch ($_REQUEST['cid_a']) {
    case 'I':
        $response = "Impression";
        $insertRec = "INSERT INTO `myPath`.`" . $campInfo['feedTable'] . "`
        (`app_id`,`post_response`,`referrer`,`trans_id`)VALUES
        ('" . $leadID . "',
        '" . $response . "',
        '" . $referrer . "',
        '" . $transID . "');
        ";
        
        $res = $con->query($insertRec);    
       
        if ($campInfo['popup'] != '') {?>
        <script>
        
       
            myWindow = window.open('<?=$campInfo['popup']?>&lid=<?=$transID?>', '<?=$campInfo['popup']?>', 'height=300,width=500');
        
        
        </script>
        <?}?>
        <script>
            redirect('<?=$campInfo['offerURL']?>','<?=$referrer?>');
            function redirect(url,ref){
                window.location.href='http://'+url+'&referrer='+ref;
            }
        </script>
        <?
        break;

    case 'S':
        $response = "Accepted";
        $payout=$_REQUEST['payout'];
        $updatePayout = "Update tbl_campaigns set sell_price='".$payout."' where campaign_id='".$campInfo['campaign_id']."';";
        
        $res=$con->query($updatePayout);
        
        $insertRec = "INSERT INTO `myPath`.`" . $campInfo['feedTable'] . "`
        (`app_id`,`post_response`,`referrer`,`trans_id`)VALUES
        ('" . $leadID . "',
        '" . $response . "',
        '" . $referrer . "',
        '" . $transID . "');
        ";
        
        $res = $con->query($insertRec);    


        break;

    case 'C':
        $response = "Clicked";
        $insertRec = "INSERT INTO `myPath`.`" . $campInfo['feedTable'] . "`
        (`app_id`,`post_response`,`referrer`,`trans_id`)VALUES
        ('" . $leadID . "',
        '" . $response . "',
        '" . $referrer . "',
        '" . $transID . "');
        ";
        
        $res = $con->query($insertRec);    
        ?><script>
            redirect('<?=$campInfo['post_url']?>');
            function redirect(url){
                window.location.href='http://'+url;
            }
        </script><?

        break;

    default:
}

}







//echo 'Leadid->'.$leadID;


$con->close();

//print_r($campInfo);
//var_dump($leadID);

//print_r($_SERVER);



?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  ga('create', 'UA-43829983-1', 'thedwspot.com');
  ga('send', 'pageview');
    
</script>
