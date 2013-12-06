<script>
$(document).ready(function(){ 
$('.edit_budget').click(function(){

    var mySTR = this.title;
    var arr = mySTR.split(','); 
    var campID = arr[0];
    var refID = arr[1];

        
        $.ajax({
            type: "POST",
            url: "/myPath/campaign/camp_edit_budget.php",
            data:
            {"campaign_id": campID,
             "refID": refID   
            },
             //"view=2&campaign_id=" + campID +"&refID="+refID,
            success: function (data) {

                $('#dialog').html(data);
                $('#dialog').dialog({
                    width: 350,
                    title: "Edit Campaign Budget",
                    buttons: [{
                            text: "Update",
                            click: function () {
                                
                                saveBudget(campID,refID);
                                $(this).dialog("close");
                                var current_index = $("#tabs").tabs("option","selected");
                                $("#tabs").tabs('load',current_index);                   
                            }
                        },
                        {
                            text: "Cancel",
                            click: function () {
                                $(this).dialog("close");
                            }
                        }
                    ]
                });
            
            }
        });

	});
});

</script>


<script>
function saveBudget(campID,refID){
    
   var budgetField='daily_budget_'+ campID +'_' + refID;
   var budget=document.getElementById(budgetField).value;
    
    
    //alert(budgetField);
    
        $.ajax({
        type: "POST",
        url: "/myPath/campaign/camp_edit_budget.php",
        data: 
        {"action": 'save',"campaign_id": campID,"budget": budget,"refID": refID},
        
        //"action=save&campaign_id=" + campID + "&budget="+ budget +"&refID="+refID ,
        success: function (data2) {
                alert(data2);
                document.getElementById(budgetField).value=budget;
        }
      }); 


}

</script>

<style>

td .inner {
    
    text-align: center;
    font-size: 1em;
}



</style><?

session_start();
$s=0;
$a=0;
$ep=0;
$em=0;

$salesPerson = $_REQUEST['salesperson'];




$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");




if ($salesPerson!=''){
 $sql="SELECT
S.referrer,
S.campaign_id,
A.referrer_name,
RF.referrer_price,
sum(S.gross_post) AS Submitted,
sum(S.accepted) AS Sales,
sum(S.accepted)/sum(S.gross_post) AS Conv,
RF.daily_budget AS Budget,
sum(S.revenue) AS `Earned+`,
Sum(S.pub_cost) AS `Paid-`,
(sum(S.revenue)-Sum(S.pub_cost)) AS Net
FROM
campaign_summary AS S
INNER JOIN tbl_affiliates AS A ON S.referrer = A.referrer
INNER JOIN tbl_referrers AS RF ON RF.referrer = A.referrer
INNER JOIN tbl_campaigns AS C ON C.campaign_id = RF.campaign_id AND S.campaign_id = C.campaign_id
WHERE
report_date between '".$_SESSION['start_date']."' and '".$_SESSION['end_date']."' and C.sales_person='" . $salesPerson. "' GROUP BY
S.referrer;
";
 //echo $sql; exit;
 
 }else{
 
  $sql="SELECT
S.referrer,
S.campaign_id,
A.referrer_name,
RF.referrer_price,
sum(S.gross_post) AS Submitted,
sum(S.accepted) AS Sales,
sum(S.accepted)/sum(S.gross_post) AS Conv,
RF.daily_budget AS Budget,
sum(S.revenue) AS `Earned+`,
Sum(S.pub_cost) AS `Paid-`,
(sum(S.revenue)-Sum(S.pub_cost)) AS Net
FROM
campaign_summary AS S
INNER JOIN tbl_affiliates AS A ON S.referrer = A.referrer
INNER JOIN tbl_referrers AS RF ON RF.referrer = A.referrer
INNER JOIN tbl_campaigns AS C ON C.campaign_id = RF.campaign_id AND S.campaign_id = C.campaign_id
WHERE
report_date between '".$_SESSION['start_date']."' and '".$_SESSION['end_date']."' and 
S.campaign_id ='".$_REQUEST['ref']."' GROUP BY
S.referrer;
";

}
//echo $sql; 

$result=$M->query($sql);



?><table id="affiliates" style="width: 100%;">
<thead><tr>

	
	<th  style="width: 30%;text-align: left;" >Affiliate</th>
		<th colspan="2" >Budget</th>
        <th >Impressions</th>
	<th >Sales</th>
	<th >Conv</th>

	<th >Earned+</th>
    <th >Pub Cost</th>
	<th >Paid-</th>
    <th >Net</th>
</tr></thead><tbody>
<?$color='#cccccc';
while($r=$result->fetch_assoc()){
    
   
    ?>

<tr>
  
	<td  style="width:25%;text-align: left;"><?=$r['referrer_name']?></td>
<td ><?=number_format($r['Budget'])?></td>
<td><span class="icon icon-pencil edit_budget" title="<?=$r['campaign_id']?>,<?=$r['referrer']?>" ></span></td>
	<td ><? echo number_format($r['Submitted']); $s=$s+$r['Submitted'];?></td>
	<td ><? echo number_format($r['Sales']); $a=$a+$r['Sales'];?></td>
	<td ><?=number_format($r['Conv']*100,2)?>%</td>
	
    
	<td >$<?echo number_format($r['Earned+'],2); $ep=$ep+$r['Earned+'];?></td>
	  <td >$<?echo number_format($r['referrer_price'],2);?></td>
    <td >$<?echo number_format($r['Paid-'],2); $em=$em+$r['Paid-'];?></td>
    <td >$<?=number_format($r['Net'],2)?></td>
</tr>

<?}?></tbody><tfoot>
<!--
<tr>
    

	<th></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header"><?=number_format($s)?></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header"><?=$a?></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header"><?=number_format(($a/$s)*100,2)?>%</th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header">$<?=number_format(($ep-$em)/$a,2)?></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header">$<?=number_format($ep,2)?></th>
	<th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header">$<?=number_format($em,2)?></th>
    <th class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header  header">$<?=number_format($ep-$em,2)?></th>
</tr>
-->
</tfoot>
</table>