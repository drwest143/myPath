<?
$sql = "SELECT
        R.referrer,
R.referrer_price,
R.daily_budget,
R.active as `status`,
A.referrer_name
FROM
tbl_campaigns C
INNER JOIN tbl_referrers R ON R.campaign_id = C.campaign_id
INNER JOIN tbl_affiliates A ON R.referrer = A.referrer where R.campaign_id='" .
            $_REQUEST['campaign_id'] . "' order by R.referrer";
 
 //echo $sql; exit;
        $result2 = $M->query($sql);



?><h3 class="header_style" style="width: auto;">Allowed Traffic</h3>
<table style="width: 100%;">
<tr>
	<th class="header_style">Traffic Source</th>
	<th class="header_style">Price</th>
    <th class="header_style">Daily Budget</th>
    <th class="header_style">Test</th>
    <th class="header_style">Active?</th>
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
    <td><a href="http://www.thedwspot.com/myPath/myPath.php?cid_a=I&aid=<?=$r2['referrer']?>&cid=<?= $_REQUEST['campaign_id'] ?>"  target="_blank">I</a>
<a href="http://www.thedwspot.com/myPath/myPath.php?cid_a=C&aid=<?=$r2['referrer']?>&cid=<?= $_REQUEST['campaign_id'] ?>"  target="_blank">C</a>
<a href="http://www.thedwspot.com/myPath/myPath.php?cid_a=S&aid=<?=$r2['referrer']?>&cid=<?= $_REQUEST['campaign_id'] ?>" target="_blank">S</a></td>
    <?if($r2['status'] == 1){echo "<td class='active'>Active";}else{echo "<td class='inactive'>Disabled";}?>          
    </td>
</tr>
<?}?>
</table>