  <script>
  $(document).ready(function () {
    $('.affiliate_chosen').chosen();
    });
    </script>
 
 <?
$M = new mysqli('174.143.22.102', 'DRWest', 'Mexico143', 'glb_process');


switch ($_REQUEST['action']) {
    case 'save':
        $sql = "update tbl_campaigns set daily_budget ='" . $_REQUEST['budget'] .
            "', campaign_name='".$_REQUEST['campaign_name']."', sell_price='".$_REQUEST['price']."' where campaign_id='" . $_REQUEST['campaign_id'] . "'";
        $result = $M->query($sql);
        echo $sql ; //'Saved!';
        exit;
        break;

 case 'add':
        
        $sql ="select db_name from tbl_campaigns where campaign_id='".$_REQUEST['campaign_id']."';";
       $dbRes= $M->query($sql);
        $r=$dbRes->fetch_assoc();
        $dbName=$r['db_name'];
        $dbRes->free_result();
         
        $sql = "Insert into tbl_referrers (referrer,campaign_id,referrer_price,daily_budget)values('" . $_REQUEST['referrer']. "','" . $_REQUEST['campaign_id']. "','". $_REQUEST['sell_price']. "','". $_REQUEST['budget']."')";            
        $result = $M->query($sql);
       
       $sql ="INSERT INTO `".$dbName."`.`tbl_inlog`(`post_response`,`referrer`)VALUES('Accepted','" . $_REQUEST['referrer']. "');INSERT INTO `".$dbName."`.`tbl_inlog`(`post_response`,`referrer`)VALUES('Lead Declined','" . $_REQUEST['referrer']. "');";
        $result = $M->multi_query($sql);
         
          //echo 'Added';
        exit;
        break;

    default:
        $sql = "select referrer,referrer_name from tbl_affiliates  order by referrer asc;";
        $result = $M->query($sql);
        
        $sql = "SELECT
        R.referrer,
R.referrer_price,
R.daily_budget,
A.referrer_name
FROM
tbl_campaigns C
INNER JOIN tbl_referrers R ON R.campaign_id = C.campaign_id
INNER JOIN tbl_affiliates A ON R.referrer = A.referrer where R.campaign_id='" .
            $_REQUEST['campaign_id'] . "' order by R.referrer";
 
 //echo $sql; exit;
        $result2 = $M->query($sql);
        
}

while($r=$result->fetch_assoc()){
    $campaigns[$r['referrer']]=$r['referrer_name'];
}


//$r = $result->fetch_assoc();
if ($_REQUEST['action']==''){
?><form id="<?=$_REQUEST['referrer']?>"  method="GET" action="camp_edit.php">




<table>
<tr>
<th class="header_style" >Referrer</th>
<th class="header_style" >Price</th>
<th class="header_style" >Daily Budget</th>
</tr>

<tr>
    
	<th>
    <select style="width: 200px;" class="affiliate_chosen" id="referrer" >
<option value="ALL" selected='selected' >Type to Find</option>
    <?foreach ($campaigns as $campaign=>$value) {
        
?>
<?if($campaign==$_REQUEST['referrer']){?>
    <option value="<?echo $campaign;?>" selected='selected' ><?echo $value;?></option>
<?}?>
    <option value="<?echo $campaign;?>" ><?echo $campaign;?> - <?echo $value;?></option>
<?}?>    
</select>
</th>
<th>$<input style="width: 30%;" type="text" id="sell_price"  /></th>
<th><input style="width: 30%;" type="text" id="daily_budget" /></th>
</tr><tr>
<hr /><th colspan="3"><hr />
</th></tr>
<tr>
	<th class="header_style">Referrer Name</th>
	<th class="header_style">Referrer Price</th>
    <th class="header_style">Daily Budget</th>
</tr>

<?while($r2=$result2->fetch_assoc()){
    unset($campaigns[$r2['referrer']]);
    if ($color=='#FFFFFF'){
        $color='#cccccc';
    }else{
        $color='#FFFFFF';
    }
    
    ?>
<tr style="background-color:<?=$color?>;">
	<td><?=$r2['referrer']?> - <?=$r2['referrer_name']?></td>
	<td><?=$r2['referrer_price']?></td>
    <td><?=$r2['daily_budget']?></td>
</tr>
<?}?>



</table>
<input type="hidden" value="<?= $_REQUEST['referrer'] ?>" id="referrer_<?= $_REQUEST['referrer'] ?>" />
<input type="hidden" value="add" id="action" />


</form>
<pre>
<? }
//print_r($campaigns); exit ;

?></pre>