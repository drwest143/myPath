

<style>

td .inner {
    
    text-align: center;
    font-size: 1em;
}



</style>



<?

session_start();
$s=0;
$a=0;
$ep=0;
$em=0;

$salesPerson = $_REQUEST['salesperson'];

$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");




if ($salesPerson!=''){
 $sql="SELECT
S.campaign_id,
R.campaign_name,
sum(S.gross_post) AS Submitted,
sum(S.accepted) AS Sales,
sum(S.accepted)/ sum(S.gross_post) AS Conv,
(
		sum(S.revenue)- Sum(S.pub_cost)
	)/ sum(S.accepted) AS EPC,
sum(S.revenue) AS `Earned+`,
Sum(S.pub_cost) AS `Paid-`,
(
		sum(S.revenue)- Sum(S.pub_cost)
	) AS Net
FROM
campaign_summary AS S
INNER JOIN tbl_campaigns AS R ON S.campaign_id = R.campaign_id
INNER JOIN tbl_salesperson ON tbl_salesperson.sales_id = R.sales_person
WHERE
report_date between '".$_SESSION['start_date']."' and '".$_SESSION['end_date']."' and R.sales_person='" . $salesPerson. "' GROUP BY
R.campaign_name;
";
 //echo $sql; exit;
 
 }else{
 
  $sql="SELECT
S.campaign_id,
R.campaign_name,
R.offerURL,
tbl_referrers.daily_budget,
sum(S.gross_post) as `Submitted`,
sum(S.accepted) as `Sales`,
sum(S.accepted)/sum(S.gross_post) as `Conv`,
(sum(S.revenue)-Sum(S.pub_cost))/sum(S.accepted) as `EPC`,
sum(S.revenue) as `Earned+`,
Sum(S.pub_cost) as `Paid-`,
(sum(S.revenue)-Sum(S.pub_cost)) as `Net`
FROM
campaign_summary AS S
INNER JOIN tbl_campaigns AS R ON S.campaign_id = R.campaign_id
INNER JOIN tbl_referrers ON R.campaign_id = tbl_referrers.campaign_id
INNER JOIN tbl_affiliates ON tbl_referrers.referrer = tbl_affiliates.referrer AND tbl_affiliates.referrer = S.referrer
WHERE
report_date between '".$_SESSION['start_date']."' and '".$_SESSION['end_date']."' and 
S.referrer='".$_REQUEST['ref']."'

GROUP BY
S.campaign_id;
";

}
//echo $sql; exit;

$result=$M->query($sql);



?><table id="affiliates" style="width: 100%;">
<thead><tr>

	
	<th class="header_style" style="width: 35%;text-align: left;" >Campaign</th>
	<th class="header_style">Submitted</th>
	<th class="header_style">Sales</th>
	<th class="header_style">Conv</th>
	<th colspan="2" class="header_style">Budget</th>
	<th class="header_style">Earned+</th>
	<th class="header_style">Paid-</th>
    <th class="header_style">Net</th>
</tr></thead><tbody>
<?$color='#cccccc';
while($r=$result->fetch_assoc()){
    
    if ($color=='#FFFFFF'){
        $color='#cccccc';
    }else{
        $color='#FFFFFF';
    }
    
    ?>

<tr style="background-color:<?=$color?>;">
  
	<td class="inner" style="width:25%;text-align: left;"><a href="http://<?=$r['offerURL']?>" target="_blank"><?=$r['campaign_name']?></a></td>

	<td ><? echo number_format($r['Submitted']); $s=$s+$r['Submitted'];?></td>
	<td ><? echo number_format($r['Sales']); $a=$a+$r['Sales'];?></td>
	<td ><?=number_format($r['Conv']*100,2)?>%</td>
	<td ><?=number_format($r['daily_budget'])?></td>
    <td><span class="ui-icon ui-icon-pencil edit_budget" title="<?=$r['campaign_id']?>" ></span></td>    
	<td >$<?echo number_format($r['Earned+'],2); $ep=$ep+$r['Earned+'];?></td>
	<td >$<?echo number_format($r['Paid-'],2); $em=$em+$r['Paid-'];?></td>
    <td >$<?=number_format($r['Net'],2)?></td>
</tr>

<?}?></tbody><tfoot>
<tr>
   <!-- 

	<th></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header"><?=number_format($s)?></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header"><?=number_format($a)?></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header"><?=number_format(($a/$s)*100,2)?>%</th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header">$<?=number_format(($ep-$em)/$a,2)?></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header">$<?=number_format($ep,2)?></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header">$<?=number_format($em,2)?></th>
    <th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header">$<?=number_format($ep-$em,2)?></th>
</tr>
-->
</tfoot>
</table>