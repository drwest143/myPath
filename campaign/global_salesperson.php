<script>

$(document).ready(function(){
    
    $('.slide_camp').click(function(){
    var el = $("#" + this.title);
    $('.camp_slide').slideUp("100");
    
    var buttt = $('.'+this.title);
   // var trow =  $('#tr_' + this.title );
    
    //trow.backgroundColor="red";
    
    if(el.is(':visible')){
        buttt.removeClass( "ui-icon-minus" ).addClass( "ui-icon-plus" );
    el.slideUp("100");
    return false;
    }else{
        el.html("<center><img src='/myPath/js/loading_bar.gif' /></center>");
    el.slideDown("100");
    buttt.removeClass( "ui-icon-plus" ).addClass( "ui-icon-minus" );
    $.ajax({
            type: "POST",
            url: "/myPath/campaign/get_campaign.php",
            data:{"salesperson": this.title}, 
            success: function(data){
               
               el.html(data);
     }
    });
    return false;
    }
});
    
    
});

</script>



<?
session_start();
$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");

$sql="SELECT
SP.`name`,
SP.sales_id,
R.sell_price AS Price,
sum(S.gross_post) AS Submitted,
sum(S.accepted) AS Sales,
sum(S.accepted)/sum(S.gross_post) AS Conv,
sum(S.revenue) AS `Earned+`,
Sum(S.pub_cost) AS `Paid-`,
(sum(S.revenue)-Sum(S.pub_cost)) AS Net
FROM
campaign_summary AS S
INNER JOIN tbl_campaigns AS R ON S.campaign_id = R.campaign_id
INNER JOIN tbl_salesperson AS SP ON SP.sales_id = R.sales_person
WHERE
S.report_date BETWEEN '".$_SESSION['start_date']."' and '".$_SESSION['end_date']."' 
GROUP BY
SP.`name`";

//echo $sql; exit;
$result=$M->query($sql);

?>


  <table id="affiliates" style="width: 100%;">

<thead><tr>
    <th></th>
	<th style="width: 25%;text-align: left;" class="header_style">Sales Person</th>
    <th class="header_style"><? if($_SESSION['admin']==true){?>Actions<?}?></th>
	<th class="header_style">Submitted</th>
	<th class="header_style">Sales</th>
	<th class="header_style">Conv</th>
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

<tr style="background-color:<?=$color?>;" id="tr_<?=$r['sales_id']?>">
    <td ><span class="ui-icon ui-icon-plus slide_camp <?=$r['sales_id']?>" title="<?=$r['sales_id']?>" ></span></td>
	<td style="text-align: left;"><?=$r['name']?></td>
	<td><? if($_SESSION['admin']==true){?><span class="ui-icon ui-icon-circle-plus edit_aff" title="<?=$r['sales_id']?>" ></span><?}?></td>
	<td><? echo number_format($r['Submitted']); $s=$s+$r['Submitted'];?></td>
	<td><? echo number_format($r['Sales']); $a=$a+$r['Sales'];?></td>
	<td><?=number_format($r['Conv']*100,2)?>%</td>
	<td>$<?echo number_format($r['Earned+'],2); $ep=$ep+$r['Earned+'];?></td>
	<td>$<?echo number_format($r['Paid-'],2); $em=$em+$r['Paid-'];?></td>
    <td>$<?=number_format($r['Net'],2)?></td>
</tr>
<tr style="background-color: aliceblue;">
<td colspan="11">
<div id="<?=$r['sales_id']?>" title="<?=$r['sales_id']?>" class="camp_slide" style="float: right;width: 75%;display: none;-webkit-box-shadow: -3px 3px 3px rgba(50, 50, 50, 0.5);
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
<tr>

	<th></th>
	<th></th>
    <th class="header_style"></th>
	<th class="header_style"><?=number_format($s)?></th>
	<th class="header_style"><?=number_format($a)?></th>
	<th class="header_style"><?=number_format(($a/$s)*100,2)?>%</th>
	
	<th class="header_style">$<?=number_format($ep,2)?></th>
	<th class="header_style">$<?=number_format($em,2)?></th>
    <th class="header_style">$<?=number_format($ep-$em,2)?></th>
</tr></tfoot>
</table>  
