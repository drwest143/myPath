<?
session_start();

$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");


switch ($_REQUEST['action']) {
    case 'save':
        //    print_r($_POST);exit;
        $sql = "update tbl_campaigns set daily_budget ='" . $_POST['budget'] .
            "', total_budget='" . $_POST['total_budget'] . "', sell_price='" . $_POST['sell_price'] .
            "', advertiser='" . $_POST['advertiser'] . "' , sales_person='" . $_POST['sp'] .
            "' where campaign_id='" . $_POST['campaign_id'] . "'";
        $result = $M->query($sql);
        echo $sql; //'Saved!';
        exit;
        break;


    default:
        $sql = "select * from tbl_campaigns where campaign_id='" . $_REQUEST['campaign_id'] .
            "'";
}


$result = $M->query($sql);
$r = $result->fetch_assoc();

$offerURL = $r['offerURL'];

$sql = "SELECT * FROM tbl_advertisers A";

//echo $sql; exit;
$result2 = $M->query($sql);


while ($r2 = $result2->fetch_assoc()) {
    $advertisers[$r2['advertiser_id']] = $r2['advertiser_name'];
}

$sql = "SELECT * FROM tbl_salesperson S";

//echo $sql; exit;
$result3 = $M->query($sql);


while ($r3 = $result3->fetch_assoc()) {
    $salespersons[$r3['sales_id']] = $r3['name'];
}






?>

<script>
$(document).ready(function(){
    $('.affiliate_chosen').chosen();
    $('#addReferrer').click(function(){
        alert('added');
    });
    
        $('#status').click(function(){
 
                var butt = $(this);               
                if($('#camp_status').val()==0){
                    
                        $('#camp_status').val('1');
                        $(this).html('* Active');
                        butt.removeClass( "inactive" ).addClass( "active" );
                        
                        alert($('#camp_status').val());
                    }else
                    {
                    
                        $('#camp_status').val('0');
                        $(this).html('* Maintenance Mode');
                        butt.removeClass( "active" ).addClass( "inactive" );
                        alert($('#camp_status').val());
                    }
        });
 
});


</script>
<style>
.style2{text-align: right;}        
.style3{text-align: left;font-weight: bold;}       
.active{color: green;}
.inactive {color: red;}         
</style>
<h3 class="header_style" style="width: auto;"><?=$r['campaign_name']?> Settings</h3>
<hr />

<form enctype="text/plain" method="GET" action="camp_edit.php">

       <table style="width: 100%;">

            <tr>
                <td class="style3">
                    1. How much do we get paid for this lead?</td>
                <td class="style2">
                    <input title="This price is what we earn per lead Accepted." type="text" id="sell_price_<?= $r['campaign_id'] ?>" value="<?= number_format($r['sell_price'],
2) ?>" /></td>
            </tr>
            <tr style="background-color: silver;">
                <td class="style3">
                    2. How many can we sell this month?</td>
                <td class="style2">
                   <input type="text" title="This controls the total allocation, setting this will limit the number of leads we will process this calendar month."  id="total_budget_<?= $r['campaign_id'] ?>" value="<?= $r['total_budget'] ?>"  /></td>
            </tr>
            <tr>
                <td class="style3">
                    3. How many can we sell per day?</td>
                <td class="style2">
                    <input title="This controls the daily allocation, setting this will limit the number of leads we will process." type="text" id="daily_budget_<?= $r['campaign_id'] ?>" value="<?= $r['daily_budget'] ?>"  /></td>
            </tr>
            <tr style="background-color: silver;">
                <td class="style3">
                    4. Who is going to pay us?</td>
                <td class="style2">
                    <select class="affiliate_chosen" style="width: 200px;" id="advertiser_<?= $r['campaign_id'] ?>" >
<option value="ALL" selected='selected' >Type to Find</option>
    <? foreach ($advertisers as $advertiser => $value) {

?>
<? if ($advertiser == $r['advertiser']) { ?>
    <option value="<? echo $advertiser; ?>" selected='selected' ><? echo $advertiser; ?> - <? echo
        $value; ?></option>
<? } else { ?>
    <option value="<? echo $advertiser; ?>" ><? echo $advertiser; ?> - <? echo $value; ?></option>
<? }
} ?>    
</select></td>
            </tr>
            <tr>
                <td class="style3">
                    5. Who is responsible for this program?</td>
                <td class="style2">
                    <select class="affiliate_chosen" style="width: 200px;" id="salesperson_<?= $r['campaign_id'] ?>" >
<option value="ALL" selected='selected' >Type to Find</option>
    <? foreach ($salespersons as $salesperson => $value) {

?>
<? if ($salesperson == $r['sales_person']) { ?>
    <option value="<? echo $salesperson; ?>" selected='selected' ><? echo $salesperson; ?> - <? echo
        $value; ?></option>
<? } else { ?>
    <option value="<? echo $salesperson; ?>" ><? echo $salesperson; ?> - <? echo
$value; ?></option>
<? }
} ?>    
</select></td>
          
            
        </table>
        
    
<input type="hidden" value="<?= $_REQUEST['campaign_id'] ?>" id="campaign_id_<?= $_REQUEST['campaign_id'] ?>" />
<input type="hidden" value="save" id="action" />


</form>











<?
////////////////////////////////////////////////////////////////////////////////////////////////
//referrer edit
        $sql = "select referrer,referrer_name from tbl_affiliates  order by referrer asc;";
        $result = $M->query($sql);
        
                


while($r=$result->fetch_assoc()){
    $campaigns[$r['referrer']]=$r['referrer_name'];
}


//$r = $result->fetch_assoc();


?>
<br />

<hr />

<div style="width: 49%;float: left;" ><h3 class="header_style" style="width: auto;">Add Traffic</h3>
<table style="width: 100%;">
<tr>
<th class="header_style" >Traffic Source</th>
<th class="header_style" >Price</th>
<th class="header_style" >Daily Budget</th>
<th class="header_style" >Active?</th>
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
<td>$<input style="width: 30%;" type="text" id="sell_price"  /></td>
<td><input style="width: 30%;" type="text" id="daily_budget" /></td>
<td>
<input type="button" value="Add" id="addReferrer" />

</td>
</tr>
</table>
</div>
<div style="width: 49%;float: right;" id="referrerList" >
<? include('referrers.php');?>

</div>
<br /><br /><br />


<div style="margin: 20px 0px 20px 0px;">
<iframe id="frame1" src="http://<?=$offerURL?>" marginheight="15" frameborder="0" onLoad="autoResize1('iframe1');"  width="100%" height="100%" scrolling="auto" ></iframe>
</div>








































  <? if ($_SESSION['admin'] == tru1e) { ?>
<hr />Admin Settings


<table style="width: 100%;">

  </tr>

            <tr style="background-color: silver;" >
                <td class="style3">
                    Campaign Status</td>
                <td class="style2">
                  <? if ($r['status'] == 1) {
        echo "<p id='status' class='active'>Active</p>";
    } else {
        echo "<p  id='status' class='inactive'>Maintenance Mode</p>";
    } ?>          
    
    
    <input type="hidden" value="<?=$r['status']?>" id="camp_status" />
    
     </td>                 
            </tr>

            <!--  <tr >
              
            
                <td class="style3">
                    Toggle Campaign Status</td>
                <td class="style2">
                  <? if ($r['status'] == 1) {?>
                  <input type="button" value="Deactivate" id="toggleStatus" />
                  <?}else{ ?>
                  <input type="button" value="Activate" id="toggleStatus" />
                  
                  <? }?>
                  
                </td> 
                                                    
            </tr>-->
  
         

</table>
<hr />

   <? } 
   
   $M->close();
   
   ?>


