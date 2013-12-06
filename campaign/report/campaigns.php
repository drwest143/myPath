<?include_once ('/var/www/html/thedwspot.com/myPath/c_header.php');
$start_date1 = (isset($_REQUEST['start_date']) && !empty($_REQUEST['start_date']) ?
    trim($_REQUEST['start_date']) : date("Y-m-d"));
$end_date1 = (isset($_REQUEST['end_date']) && !empty($_REQUEST['end_date']) ?
    trim($_REQUEST['end_date']) : date("Y-m-d"));
$_SESSION['pub'] = (isset($_REQUEST['subids']) && !empty($_REQUEST['subids']) ?
    trim($_REQUEST['subids']) : '');
$tier1 = (isset($_REQUEST['tierlevel']) && !empty($_REQUEST['tierlevel']) ? trim
    ($_REQUEST['tierlevel']) : '');

// echo $tier1;

$_SESSION['start_date'] = date("Y-m-d", strtotime($start_date1));
$start_date = date("Y-m-d", strtotime($start_date1));
$_SESSION['end_date'] = date("Y-m-d", strtotime($end_date1));
$end_date = date("Y-m-d", strtotime($end_date1));

?>
<script>

function pageonce_stats(){ 
	displayBox = $('#reportingBox');
	startDate = $('#start_date').val();
	endDate = $('#end_date').val();
	sub_ids = $('#subids').val();
	tier=$('#tierlevel').val();
	displayBox.html("");
    window.location.href='http://www.thedwspot.com/myPath/campaign/report/campaigns.php?start_date='+startDate+'&end_date='+endDate;

}

$(document).ready(function () {
    
	$('.dateP').datepicker({
		dateFormat: 'yy-mm-dd'
	});
    

    
    $("#campaigns_main").tablecloth({ theme: "paper" });
    $("#affiliates").tablecloth({ theme: "paper" });
    
    $('.edit_aff').click(function () {
        var mySTR = this.title;
        var dataArray = mySTR.split(',');
        var refID = dataArray[0];
        var campID = this.title;
        // alert(refID);
        $.ajax({
            type: "POST",
            url: "/myPath/campaign/affiliate_edit.php",
            data: {
                "campaign_id": campID
            },
            success: function (data) {
                $('#dialog').html(data);
                $('#dialog').dialog({
                    width: 700,
                    height: 450,
                    title: "Add Affiliate " + refID + " to campaign",
                    buttons: [{
                        text: "Add",
                        click: function () {
                            saveAffiliate(campID);
                            $('#dialog').html('');
                            $(this).dialog("close");
                            var current_index = $("#tabs").tabs("option", "selected");
                            $("#tabs").tabs('load', current_index);
                        }
                    }, {
                        text: "Cancel",
                        click: function () {
                            $('#dialog').html('');
                            $(this).dialog("close");
                            var current_index = $("#tabs").tabs("option", "selected");
                            $("#tabs").tabs('load', current_index);
                        }
                    }]
                });
            }
        });
    });
    $('.edit_camp').click(function () {
        var campID = this.title;
        $.ajax({
            type: "POST",
            cache: false,
            url: "/myPath/campaign/camp_edit.php",
            data: {
                "campaign_id": campID
            },
            success: function (data) {
                $('#dialog').html(data);
                $('#dialog').dialog({
                    width: 1000,
                    height:650,
                    title: "Edit Campaign Settings",
                    buttons: [{
                        text: "Update",
                        click: function () {
                            saveCampaign(campID);
                            $(this).html('');
                            $(this).dialog("close");
                            var current_index = $("#tabs").tabs("option", "selected");
                            $("#tabs").tabs('load', current_index);
                        }
                    }, {
                        text: "Cancel",
                        click: function () {
                            $(this).dialog("close");
                            var current_index = $("#tabs").tabs("option", "selected");
                            $("#tabs").tabs('load', current_index);
                        }
                    }]
                });
            }
        });
    });
    //	$('#affiliates').tablesorter({
    //     widgets: ['zebra']
    //	});
    $('.camp_aff').slideUp("100");
    $('.slide_aff').click(function () {
        var el = $("#" + this.title);
        var eltd = $('#td_'+ this.title);
        $('.camp_aff').slideUp("100");
        var buttt = $('.' + this.title);
        // var trow =  $('#tr_' + this.title );
        //trow.backgroundColor="red";
        if (el.is(':visible')) {
            buttt.removeClass("icon-minus").addClass("icon-plus");
            el.slideUp("100");
            eltd.slideUp("100");
            return false;
        }
        else {
            el.html("<center><img src='/myPath/js/loading_bar.gif' /></center>");
            el.slideDown("100");
            eltd.slideDown("100");
            buttt.removeClass("icon-plus").addClass("icon-minus");
            $.ajax({
                type: "GET",
                url: "/myPath/campaign/get_affiliates.php",
                data: "view=3&ref=" + this.title,
                success: function (data) {
                    el.html(data);
                }
            });
            return false;
        }
    }); /*$("#affiliates").tablesorter();*/
});

function saveCampaign(campID) {
    var budget = document.getElementById('campaign_id_' + campID).value;
    //  var campaign_name=document.getElementById('campaign_name_'+campID).value;
    var price = document.getElementById('sell_price_' + campID).value;
    var budget = document.getElementById('daily_budget_' + campID).value;
    alert(budget);
    var tbudget = document.getElementById('total_budget_' + campID).value;
    var adv = document.getElementById('advertiser_' + campID).value;
    var sp = document.getElementById('salesperson_' + campID).value;
    $.ajax({
        type: "POST",
        cache: false,
        url: "/myPath/campaign/camp_edit.php",
        data: {
            "action": "save",
            "campaign_id": campID,
            "budget": budget,
            "total_budget": tbudget,
            "sell_price": price,
            "advertiser": adv,
            "sp": sp
        },
        success: function (data2) {
            alert(data2);
            var test = data2;
        }
    });
}

function saveAffiliate(campID) {
    var refID = document.getElementById('referrer').value;
    //alert(campID);
    var price = document.getElementById('sell_price').value;
    var budget = document.getElementById('daily_budget').value;
    $.ajax({
        type: "POST",
        url: "/myPath/campaign/affiliate_edit.php",
        data: {
            "action": 'add',
            "campaign_id": campID,
            "budget": budget,
            "sell_price": price,
            "referrer": refID
        },
        success: function (data2) {
            var current_index = $("#tabs").tabs("option", "selected");
            $("#tabs").tabs('load', current_index);
        }
    });
}
</script>

<?

session_start();
//$_SESSION['start_date'] = date("Y-m-d");
//$_SESSION['end_date'] = date("Y-m-d");



function getCampaignBudgetAllocation($campaign_id){
	
    $returnValue=array(
    'Budget'=>0
    ,'referrer_price'=>0
    );
    
  $M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");
    $sql = "SELECT Sum(RF.daily_budget) AS Budget,RF.referrer_price FROM tbl_campaigns AS R INNER JOIN tbl_referrers AS RF ON RF.campaign_id = R.campaign_id
where RF.campaign_id='".$campaign_id."';";

//echo $sql; exit;

    $result=$M->query($sql);
    $r=$result->fetch_assoc();
    
        $returnValue['Budget'] = $r['Budget'];
        $returnValue['referrer_price'] = $r['referrer_price'];
        return $returnValue;

}

$s=0;
$a=0;
$ep=0;
$em=0;
$b=0;
$new_budget=0;
error_reporting(E_ALL);
//print_r($_SESSION); exit;

$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");

    $sql="SELECT
S.campaign_id,
R.campaign_name,
R.offerURL,
AF.advertiser_name,
AF.loginURL,
R.sell_price AS Price,
R.total_budget as `MBudget`,
sum(S.gross_post) AS Submitted,
sum(S.clicked) AS Clicks,
sum(S.accepted) AS Sales,
sum(S.accepted)/sum(S.gross_post) AS Conv,
sum(S.revenue) AS `Earned+`,
Sum(S.pub_cost) AS `Paid-`,
(sum(S.revenue)-Sum(S.pub_cost)) AS Net

FROM
campaign_summary AS S
INNER JOIN tbl_campaigns AS R ON S.campaign_id = R.campaign_id
INNER JOIN tbl_advertisers AS AF ON AF.advertiser_id = R.advertiser
WHERE
S.report_date between '".$_SESSION['start_date']."' and '".$_SESSION['end_date']."'
GROUP BY
S.campaign_id
order by R.campaign_name;
";
//echo $sql; exit;
$result=$M->query($sql);
//print_r($result); exit;


?>
<div id="dialog"></div>
<div class="row-fluid">
<div class="span2">
<div class="panel panel-default" style="width: 100%;">
<div class="panel-heading panel-success">filter
</div>


<div class="panel-body">
    <form action='<?echo $_SERVER['PHP_SELF']?>' method="POST" onsubmit='pageonce_stats(); return false;'>
    
    
    
       <div class="control-group">
      <!-- Name -->
      
      <div class="controls">
    <input type='text' id='start_date' class="dateP"	name="start_date"  value="<?echo $_SESSION['start_date'];?>"/>
        <p class="help-block">Start Date</p>
      </div>
    </div>
       <div class="control-group">
      <!-- Name -->
     
      <div class="controls">
    <input type='text' id='end_date' class="dateP"	name="start_date"  value="<?echo $_SESSION['end_date'];?>"/>
        <p class="help-block">Ending Date</p>
      </div>
    </div>

<input type='submit' value='filter' style="width: 140px;" class="btn btn-danger" /><br />
    </form>




</div>
</div>

</div>
<div class="span10">
<div class="panel panel-default" style="width: 100%;">
<div class="panel panel-heading">Active Campaigns
</div>
<div class="panel-body">
<div style="width: 100%;">
<table id="campaigns_main" class="table table-hover" style="width: 100%;">
<thead><tr>
    <th >Actions </th>
	<th style="width: 25%;" >Campaign</th>
	<th  style="width: 20%;">Advertiser</th>
        
    <? if($_SESSION['admin']==true){?><th  >Monthly Budget</th><?}?>
	<th  >Allocated Budget</th>
    <th >CPA</th>
    <th >Imp.</th>
    <th >Clicks</th>
    <th >CTR</th>
	<th >Sales</th>
	<th >Conv</th>
	<th >Earned+</th>
    <th >Paid-</th>
    <th >Net</th>
</tr></thead><tbody>
<?
$color='#cccccc';

while($r=$result->fetch_assoc()){
    
   
    $new_budget=getCampaignBudgetAllocation($r['campaign_id']);
   // echo $new_budget; exit;
    ?>

<tr  id="tr_<?=$r['campaign_id']?>">
    <td ><span style="float: left;" class="icon icon-plus slide_aff <?=$r['campaign_id']?>" title="<?=$r['campaign_id']?>" ></span><span class="icon icon-pencil edit_camp" title="<?=$r['campaign_id']?>"></span></td>
	<td style="text-align: left;"><a href="http://<?=$r['offerURL']?>" target="_blank"><?=$r['campaign_name']?></a> </td>
	<td style="text-align: left;"><a href="<?=$r['loginURL']?>" target="_blank"><?=$r['advertiser_name']?></a></td>
        
    <? if($_SESSION['admin']==true){?><td><?echo number_format($r['MBudget']); $mb=$mb+$r['MBudget']; ?></td><?}?>
    <td><?echo number_format($new_budget['Budget']); $b=$b+$new_budget['Budget']; ?></td>
    <td>$<?echo number_format($r['Price'],2);?></td>
	<td><? echo number_format($r['Submitted']); $s=$s+$r['Submitted'];?></td>
    <td><? echo number_format($r['Clicks']); $c=$c+$r['Clicks'];?></td>
    <td><? echo number_format(($r['Clicks']/$r['Submitted'])*100,2);?>%</td>
	<td><? echo number_format($r['Sales']); $a=$a+$r['Sales'];?></td>
	<td><?=number_format($r['Conv']*100,2)?>%</td>
	
    <!-- <td><span class="icon icon-pencil edit_budget" title="<?=$r['campaign_id']?>" ></span></td> -->
	
    <td>$<?echo number_format($r['Earned+'],2); $ep=$ep+$r['Earned+'];?></td>
    
	<td>$<?echo number_format($r['Paid-'],2); $em=$em+$r['Paid-'];?></td>
    <td>$<?=number_format($r['Net'],2)?></td>
</tr>
<tr>
<td id="td_<?=$r['campaign_id']?>" style="display: none;" colspan="<?if($_SESSION['admin']==true){?>13<?}else{?>14<?}?>">
<div id="<?=$r['campaign_id']?>" title="<?=$r['campaign_id']?>" class="camp_aff" style="float: right;width: 75%;display: none;-webkit-box-shadow: -3px 3px 3px rgba(50, 50, 50, 0.5);
-moz-box-shadow:    -1px 1px 1px  rgba(50, 50, 50, 0.5);
margin-left:2px;
background-color:#ffffff;
margin-bottom:8px;
box-shadow:         -1px 1px 1px  rgba(50, 50, 50, 0.5);margin-top: 0px;">
</div>
</td>
</tr>
<?}?></tbody><tfoot>
<tr>
    <td></td>
    <td></td>
    <td></td>    
	
	
    <?if($_SESSION['admin']==true){?><th  ><?=number_format($mb)?></th><?}?>
    <th  ><?=number_format($b)?></th>
    <th >CPA</th>  
	<th ><?=number_format($s)?></th>
    <th ><?=number_format($c)?></th>
    	<th ><?=number_format(($c/$s)*100,2)?>%</th>
	<th ><?=number_format($a)?></th>
  
	<th ><?=number_format(($a/$s)*100,2)?>%</th>

	<th  >$<?=number_format($ep,2)?></th>

    <th >$<?=number_format($em,2)?></th>
    <th >$<?=number_format($ep-$em,2)?></th>
</tr></tfoot>
</table>
</div>

</div>




<? $result=$M->query($sql);


$s=0;
$a=0;
$ep=0;
$em=0;
$b=0;
$new_budget=0;

 ?>

<div style="display: none;">
<table id="campaigns" style="width: 100%;">
<thead><tr>
	<th style="width: 25%;" >Campaign</th>
	<th  style="width: 20%;">Advertiser</th>
        
    
	<th  >Allocated Budget</th>
    <th >CPA</th>
    <th >Submitted</th>
	<th >Sales</th>
	<th >Conv</th>
	<th >Earned+</th>
    <th >Paid-</th>
    <th >Net</th>
</tr></thead><tbody>
<?
$color='#cccccc';

while($r=$result->fetch_assoc()){
    
  
    $new_budget=getCampaignBudgetAllocation($r['campaign_id']);
   // echo $new_budget; exit;
    ?>

<tr id="tr_<?=$r['campaign_id']?>">
    
	<td  class="edit_camp" title="<?=$r['campaign_id']?>" ><?=$r['campaign_name']?></td>
	<td ><a href="#" id="advert_edit"></a><?=$r['advertiser_name']?></td>
	<td><?echo number_format($new_budget['Budget']); $b=$b+$new_budget['Budget']; ?></td>
    <td>$<?echo number_format($r['Price'],2);?></td>
	<td><? echo number_format($r['Submitted']); $s=$s+$r['Submitted'];?></td>
	<td><? echo number_format($r['Sales']); $a=$a+$r['Sales'];?></td>
	<td><?=number_format($r['Conv']*100,2)?>%</td>
	
    <!-- <td><span class="icon icon-pencil edit_budget" title="<?=$r['campaign_id']?>" ></span></td> -->
	
    <td>$<?echo number_format($r['Earned+'],2); $ep=$ep+$r['Earned+'];?></td>
    
	<td>$<?echo number_format($r['Paid-'],2); $em=$em+$r['Paid-'];?></td>
    <td>$<?=number_format($r['Net'],2)?></td>
</tr>
<?}?></tbody><tfoot>
<tr class="panel-footer">
    <td></td>
    <td></td>    
    <th  ><?=number_format($b)?></th>
    <th >CPA</th>  
	<th ><?=number_format($s)?></th>
	<th ><?=number_format($a)?></th>
  
	<th ><?=number_format(($a/$s)*100,2)?>%</th>

	<th  >$<?=number_format($ep,2)?></th>

    <th >$<?=number_format($em,2)?></th>
    <th >$<?=number_format($ep-$em,2)?></th>
</tr></tfoot>
</table>



</div>

</div>
<?include ('/var/www/html/thedwspot.com/myPath/campaign/report/traffic.php');?></div>





</div>


</div>
<div class="panel-footer"><a href="privacy">Privacy Policy</a></div>