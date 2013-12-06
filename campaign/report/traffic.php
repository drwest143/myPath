<?include_once ('/var/www/html/thedwspot.com/myPath/c_header.php');?>
<script>
$(document).ready(function(){ 

	
//	$('#affiliates').tablesorter({

    //     widgets: ['zebra']
        
//	});
    
    $('.camp_slide').slideUp("100");
$('.slide_camp').click(function(){
    var el = $("#" + this.title);
    var eltd = $("#tdi_" + this.title);
    $('.camp_slide').slideUp("100");
    
    
   // var trow =  $('#tr_' + this.title );
    
    //trow.backgroundColor="red";
    
    if(el.is(':visible')){
    el.slideUp("100");
    eltd.slideUp("100");
    return false;
    }else{
        el.html("<center><img src='/myPath/js/loading_bar.gif' /></center>");
    el.slideDown("100");
    eltd.slideDown("100");
    $.ajax({
            type: "GET",
            url: "/myPath/campaign/get_campaign.php",
            data: "view=3&ref=" + this.title,
            success: function(data){
               
               el.html(data);
     }
    });
    return false;
    }
});


    
	
	/*$("#affiliates").tablesorter();*/
});

</script>
<script>
function saveAffiliate(refID){
    var campID=document.getElementById('campaign_id_'+refID).value;
    //var campaign_name=document.getElementById('campaign_name_'+refID).value;
    //alert(campID);
    var price=document.getElementById('sell_price_'+ refID).value;
    var budget=document.getElementById('daily_budget_'+refID).value;
    

                                                $.ajax({
                                                    type: "GET",
                                                    url: "/myPath/campaign/affiliate_edit.php",
                                                    data: "action=add&campaign_id=" + campID + "&budget="+ budget+"&sell_price="+price+"&referrer="+refID ,
                                                    success: function (data2) {
                                                        alert(data2);
                                                    }
                                                }); 
                                             document.getElementById('sell_price_'+ refID).value='';
                                                document.getElementById('daily_budget_'+refID).value='';
                                                document.getElementById('campaign_id_'+refID).value ='';
//                                                document.getElementById('campaign_name').value='';
//                                                document.getElementById('sell_price').value='';
//                                                document.getElementById('daily_budget').value='';           
                                            }

</script>
<style>

td {
    
    text-align: center;
    font-size: 1em;
}




</style><?

session_start();
//$_SESSION['start_date'] = date("Y-m-d");
//$_SESSION['end_date'] = date("Y-m-d");

$s=0;
$a=0;
$ep=0;
$em=0;
$b-0;


$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");

    $sql="SELECT
    S.campaign_id,
S.referrer,
A.referrer_name,
sum(S.gross_post) as `Submitted`,
sum(S.accepted) as `Sales`,
sum(S.accepted)/sum(S.gross_post) as `Conv`,

sum(S.revenue) as `Earned+`,
Sum(S.pub_cost) as `Paid-`,
(sum(S.revenue)-Sum(S.pub_cost)) as `Net`
FROM
campaign_summary S ,tbl_affiliates A, tbl_referrers R
WHERE
report_date between '".$_SESSION['start_date']."' and '".$_SESSION['end_date']."' 
and A.referrer=S.referrer and R.campaign_id=S.campaign_id and R.referrer=S.referrer
GROUP BY
S.referrer;
";

//echo $sql; exit;
$result=$M->query($sql);



?>
<div class="panel panel-default" style="width: 100%;">
<div class="panel panel-heading">Active Traffic Sources
</div>
<div class="panel-body">
<div style="width: 100%;">

<table id="affiliates" style="width: 100%;" class="table table-hover table-condensed">
<thead><tr>
    <th></th>
	<th style="width: 25%;text-align: left;" >Affiliate ID</th>
	<th style="width: 25%;text-align: left;" >Affiliate</th>
    <th ><? if($_SESSION['admin']==true){?>Actions<?}?></th>
	<th >Submitted</th>
	<th >Sales</th>
	<th >Conv</th>
	<th >Earned+</th>
	<th >Paid-</th>
    <th >Net</th>
</tr></thead><tbody>
<?$color='#cccccc';
while($r=$result->fetch_assoc()){
  
    
    ?>

<tr id="tr_<?=$r['referrer']?>">
    <td ><span class="icon icon-plus slide_camp" title="<?=$r['referrer']?>" ></span></td>
	<td style="text-align: left;"><?=$r['referrer']?></td>
	<td style="text-align: left;"><?=$r['referrer_name']?></td>
	<td><? if($_SESSION['admin']==true){?><span class="icon icon-circle-plus edit_aff" title="<?=$r['referrer']?>" ></span><?}?></td>
	<td><? echo number_format($r['Submitted']); $s=$s+$r['Submitted'];?></td>
	<td><? echo number_format($r['Sales']); $a=$a+$r['Sales'];?></td>
	<td><?=number_format($r['Conv']*100,2)?>%</td>
	<td>$<?echo number_format($r['Earned+'],2); $ep=$ep+$r['Earned+'];?></td>
	<td>$<?echo number_format($r['Paid-'],2); $em=$em+$r['Paid-'];?></td>
    <td>$<?=number_format($r['Net'],2)?></td>
</tr>
<tr id="tdi_<?=$r['referrer']?>" style="display: none;">
<td colspan="11">
<div id="<?=$r['referrer']?>" title="<?=$r['referrer']?>" class="camp_slide" style="float: right;width: 75%;display: none;-webkit-box-shadow: -3px 3px 3px rgba(50, 50, 50, 0.5);
-moz-box-shadow:    -1px 1px 1px  rgba(50, 50, 50, 0.5);
margin-left:2px;
background-color:#cfcfcf;
margin-bottom:8px;
box-shadow:         -1px 1px 1px  rgba(50, 50, 50, 0.5);display:none;margin-top: 0px;">
<?=$r['referrer']?>
</div>
</td>
</tr>
<?}?></tbody><tfoot>
<tr class="panel-footer">
    <th></th>
	<th></th>
	<th></th>
    <th ></th>
	<th ><?=number_format($s)?></th>
	<th ><?=number_format($a)?></th>
	<th ><?=number_format(($a/$s)*100,2)?>%</th>
	
	<th >$<?=number_format($ep,2)?></th>
	<th >$<?=number_format($em,2)?></th>
    <th >$<?=number_format($ep-$em,2)?></th>
</tr></tfoot>
</table>

</div>
</div></div>
<? if($_SESSION['admin']==t2rue){?>
<hr />
<div>
<p >Admin Contols</p>


</div>
<?}?>