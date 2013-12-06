<?php

//forte_stats.php

session_start();
foreach ($_SESSION as $field => $value) {
    $$field = $value;
}
foreach ($_COOKIE as $field => $value) {
    $$field = $value;
}
if (!isset($access) || $access != "true") {
    header("Location: index.php");
    exit;
}

?>
<?php

include ("c_header.php");

?>
<script src="/myPath/stats/chosen/chosen.jquery.js"></script>
 <link rel="stylesheet" href="/myPath/stats/chosen/chosen.css" />
 
<style>
html { 
  padding:0px;
  margin:0px;
}

body {
  background-color: #ffffff;
  font-size: 12px;
  font-family: Verdana, Arial, SunSans-Regular, Sans-Serif;
  color:#564b47;  
  padding:0px 0px;
  margin:37px 0px 0px 0px;
}

#content1 {
  float: left;
  width: 84%;
  background-color: #fff;
  margin:0px 0px 0px 0px;
  overflow: auto;
  height: auto;
  
} 

#menu {
  float: left;
  width: 15%;
  background-color: #cfcfcf;
  margin:0px 0px 0px 0px;
  height: 100%;
  overflow: auto;
}
.navBar
{
  vertical-align: middle;  
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 35px;
  z-index: 999;
}


.header_style{
    
    	font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
	color: #ffffff;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-transform: uppercase;
	text-align: center;
	padding: 6px 6px 6px 12px;
	background: #DE9E28 url(images/bg_header.jpg) no-repeat;
}
.header_text{
    
font-size: small ;
}

.ui-tabs .ui-tabs-nav li.ui-state-processing a { cursor: text;background-repeat: no-repeat; background-image: url('/myPath/js/loading.gif'); }
</style>
<script type="text/javascript">
function timedRefresh(timeoutPeriod) {
    var interval = setInterval(refreshPage, timeoutPeriod);
}

function refreshPage() {
    if ($("input[name=autoRefreshCheckboxes]").is(":checked")) {
        var current_index = $("#tabs").tabs("option","selected");
                                $("#tabs").tabs('load',current_index);     
    }
}
   timedRefresh(10000);
$(document).ready(function () {
    

    
	$('.dateP').datepicker({
		dateFormat: 'yy-mm-dd'
	});
	startDate = $('#start_date').val();
	endDate = $('#end_date').val();
	ref = $('#subids').val();
	$('#tabs').tabs();
	$('#cpaDetective').hide();
	$('#buyerDeclines').hide();
	$('#dialog').hide();
	$('#url').hide();
	$('#invaliddata').hide();
	$('#profanity').hide();
    
   
});

function pageonce_stats(){ 
	displayBox = $('#reportingBox');
	startDate = $('#start_date').val();
	endDate = $('#end_date').val();
	sub_ids = $('#subids').val();
	tier=$('#tierlevel').val();
	displayBox.html("");
    window.location.href='http://www.thedwspot.com/myPath/campaignsv1.1.php?start_date='+startDate+'&end_date='+endDate;

}
</script>

<?

session_start();

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

		<div id="loading" style="margin: auto;"></div>
    
    <div class="navBar ui-state-error" style="width: 100%;">
    <div style="float: left;width: 80%;">
    <form action='<?echo $_SERVER['PHP_SELF']?>' method="POST" onsubmit='pageonce_stats(); return false;'>
    <input type="checkbox"  name="autoRefreshCheckboxes"></>
    <input type='text' id='start_date' class="dateP"	name="start_date"  value="<?echo $_SESSION['start_date'];?>"/>
    <input type='text' id='end_date' class="dateP"	name="start_date"  value="<?echo $_SESSION['end_date'];?>"/>
    <input type='submit' value='filter' class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" /><br />
    

    </form>
    </div>
    <div style="float: right;" >theDWspot Reporting Center<a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" href='index.php?action=logout' style="padding: 4px;">Log Out</a></div>
    </div>

<div id="menu" class="ui-state-error" style="float: right;">


 <span class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" style="width: 100%;">Add Campaign</span>
 <span class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" style="width: 100%;">Add Advertiser</span>
 <span class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" style="width: 100%;">Add Sales Person</span>

</div></div><div id="content1" >



<div id="tabs" style="height: auto;"  >

  <ul>
    <li style="font-size: small;"><a href="campaign/global_campaigns.php">Campaigns</a></li>
    <li style="font-size: small;"><a href="campaign/global_affiliates.php">Traffic</a></li>
    <li style="font-size: small;"><a href="campaign/budgets.php">Campaign Settings</a></li>
    <li style="font-size: small;"><a href="campaign/global_salesperson.php">Sales Report</a></li>
    <li style="font-size: small;"><a href="campaign/global_advertisers.php">Advertisers</a></li>
  <?

if ($_SESSION['admin'] == 'true') {

?>
    
    

    
  
  	<!--	<div style="float: right;"><form action="/stats/js/excel_export.php" method="post" target="_blank"
onsubmit='$("#datatodisplay").val( $("&lt;div&gt;").append( $("#campaigns").eq(0).clone() ).html() )'>
<input  type="image" src="/stats/js/export-icon.gif">
<input type="hidden" id="datatodisplay" name="datatodisplay" />
<input type="hidden" id="filename" name="filename" value="global_campaigns"/>
</form> </div>-->
<?

}

?>	

  </ul>
	
</div>

