<script src="/myPath/js/jquery-1.9.1.js"></script>
<script src="/myPath/js/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<link href='http://code.jquery.com/ui/1.10.3/themes/excite-bike/jquery-ui.css' type='text/css' rel='stylesheet' />

<script type='text/javascript' src='/myPath/js/jquery.tablesorter.js'></script>
<script src="/myPath/js/jwizard/jquery.jWizard.js"></script>
<link href="/myPath/js/jwizard/jquery.jWizard.css" rel="stylesheet">
<script src="/myPath/js/jwizard/jquery-ui-timepicker-addon.js" ></script>
<script src="/myPath/js/jquery.maskedinput.js" ></script>
<style>
  .sortable1 {list-style-type: none; margin-right: 10px; padding: 0; width: 100%; }
  .sortable1 li { margin: 0 3px 3px 3px; padding: 0.4em; width: auto; padding-left: 1.5em; font-size: 1em; height: auto; }
  .sortable1 li span { position: absolute; margin-left: -1.3em; }
</style>

<script>
$(document).ready(function () {
	$('.datefield').datepicker({
		dateFormat: 'yy-mm-dd'
	});
    
    $(".phone").mask("(999) 999-9999");
    
    $('.timefield').timepicker({
    	hourGrid: 6,
    	minuteGrid: 10,
    	timeFormat: 'hh:mm tt'
    });        

    $('#wizard').jWizard();
    
    
    $( "#advertiser" ).autocomplete({
      source: "search.php?type=advertiser",
      minLength: 1
    });
    
    $( "#salesperson" ).autocomplete({
      source: "search.php?type=salesperson",
      minLength: 1
    });
    
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable",
      dropOnEmpty: true
    }).disableSelection();
        
    $( "#sortable3, #sortable4" ).sortable({
      connectWith: ".connectedSortable2"
    }).disableSelection();
    
    $('#sortOrder').val($("#sortable1").sortable('toArray'));
    $('#validOrder').val($("#sortable3").sortable('toArray'));
    
	$("#sortable1").sortable({
		stop: function (event, ui) {
			$('#sortable1').sortable("refresh");
			$('#sortOrder').val($("#sortable1").sortable('toArray'));
		}
	}); 
    
    $("#sortable1").sortable({
		 receive : function (event, ui) {
			$('#sortable1').sortable("refresh");
			$('#sortOrder').val($("#sortable1").sortable('toArray'));
		  
		}
	});
    
    $("#sortable3").sortable({
		 receive : function (event, ui) {
			$('#sortable3').sortable("refresh");
			$('#validOrder').val($("#sortable3").sortable('toArray'));
		  
		}
	});               
    
    $("#sortable4").sortable({
		 receive : function (event, ui) {
			$('#sortable3').sortable("refresh");
			$('#validOrder').val($("#sortable3").sortable('toArray'));
		  
		}
	});    
});
</script>

<form id="wizard" action="writeDB.php" method="POST">

<fieldset><h3 style="margin: 0px 0px 0px 0px"><ins>General</ins></h3>
<legend>General</legend>
<table>
<tr>
	<td><input id="campaign_name" name="campaign_name" placeholder="Campaign Name" size="75" /></td>
</tr>
<tr>
	<td><input id="campaign_desc" name="campaign_desc" placeholder="Campaign Description (Purpose)" size="75" /></td>
</tr>
<tr>
	<td><input id="advertiser" name="advertiser" placeholder="Advertiser Name" size="75" /></td>
</tr>
<tr>
	<td><input id="salesperson" name="salesperson" placeholder="Sales Person Name" size="75" /></td>
</tr>
<tr>

	<td><br /><h3 style="margin: 0px 0px 0px 0px"><ins>Start-up Dates</ins></h3>
    <input id="start_date" class="datefield" name="start_date" placeholder="Anticipated Start date" size="35" /><input id="end_date" name="end_date" class="datefield" placeholder="Anticipated End date" size="35" /></td>
</tr>
</table>

</fieldset>

<fieldset>
<h3 style="margin: 0px 0px 0px 0px"><ins>Technical</ins></h3>
<legend>Contact Info</legend>
<table>
<tr>
	<td><input id="technical_contact" name="technical_contact" placeholder="Technical Contact Name" size="75" /></td>
</tr>
<tr>
	<td><input id="technical_phone" name="technical_phone" class="phone" placeholder="Technical Contact Phone" size="75" /></td>
</tr>
<tr>
	<td><input id="technical_email" name="technical_email" placeholder="Technical Email Address" size="75" /></td>
</tr>
<tr>
	<td><h3 style="margin: 0px 0px 0px 0px"><ins>Billing</ins></h3><input id="billing_contact" name="billing_contact" placeholder="Billing Contact Name" size="75" /></td>
</tr>
<tr>
	<td><input id="billing_phone" name="billing_phone" class="phone" placeholder="Billing Contact Phone" size="75" /></td>
</tr>
<tr>
	<td><input id="billing_email" name="billing_email" placeholder="Billing Email Address" size="75" /></td>
</tr>

</table>
</fieldset>

<fieldset>
<h3 style="margin: 0px 0px 0px 0px"><ins>Campaign Budgeting</ins></h3>
<legend>Budgeting</legend>
<table>
<tr>
	<td><input id="monthly_budget" name="monthly_budgets" placeholder="Monthly Campaign Cap" size="75" /></td>
</tr>
<tr>
	<td><input id="daily_budget" name="daily_budget" placeholder="Daily Campaign Cap" size="75" /></td>
</tr>
<tr>
	<td><input id="max_scrub" name="max_scrub" placeholder="Max Daily Scrub Rate" size="75" /></td>
</tr>
<tr>
	<td><br /><h3 style="margin: 0px 0px 0px 0px"><ins>Day Parting</ins></h3><input id="start_time" name="start_time" class="timefield" placeholder="Start Time" size="35" /><input id="end_time" name="end_time" class="timefield" placeholder="End Time" size="35" /></td></td>
</tr>
</table>

</fieldset>


<fieldset>
<h3 style="margin: 0px 0px 0px 0px"><ins>Billing Information</ins></h3>
<legend>Billing Info</legend>
<table>
<tr>
	<td><input id="price_point" name="price_point" placeholder="What's the price point?" size="75" /></td>
</tr>
<tr>
	<td><input id="payable_action" name="payable_action" placeholder="What's the payable Action?" size="75" /></td>
</tr>
<tr>
	<td><input id="pay_terms" name="pay_terms" placeholder="What are the payment terms?" size="75" /></td>
</tr>
</table>


</fieldset>


<fieldset>

<legend>Required Fields</legend>

<table style="width: 100%;">
<tr style="vertical-align: top;">
	<td>
    <h3 style="margin: 0px 0px 0px 0px"><ins>Required</ins></h3>
        <ul id="sortable1" class="connectedSortable sortable1">
          <li id="name" class="ui-state-default">Name</li>
          <li id="email" class="ui-state-default">Email</li>
        </ul>
    </td>
	<td>
    <h3 style="margin: 0px 0px 0px 0px"><ins>Not Required</ins></h3>
        <ul id="sortable2" class="connectedSortable sortable1">
          <li id="address" class="ui-state-highlight">Address</li>
          <li id="city" class="ui-state-highlight">City</li>
          <li id="state" class="ui-state-highlight">State</li>
          <li id="zip" class="ui-state-highlight">Zip</li>
          <li id="phone" class="ui-state-highlight">Home Phone</li>
          <li id="gender" class="ui-state-highlight">Gender</li>
          <li id="DOB" class="ui-state-highlight">DOB</li>
        </ul>
    </td>
</tr>
</table>
 <input value="" type="hidden" name="required_fields" id="sortOrder" />
</fieldset>

<fieldset>
<legend>Validation Tools</legend>

<table style="width: 100%;">
<tr style="vertical-align: top;">
	<td>
    <h3 style="margin: 0px 0px 0px 0px"><ins>Validated</ins></h3>
        <ul id="sortable3" class="connectedSortable2 sortable1">
         <li id="off" class="ui-state-default">Email Validation (Off)</li>
        </ul>
    </td>
	<td>
    <h3 style="margin: 0px 0px 0px 0px"><ins>Not Validated</ins></h3>
        <ul id="sortable4" class="connectedSortable2 sortable1">
          <li id="ehigh" class="ui-state-highlight">Email Validation (High)</li>
          <li id="elow" class="ui-state-highlight">Email Validation (Low)</li>
          <li id="npanxx" class="ui-state-highlight">NPANXX Check (Phone Validation)</li>
          <li id="stateappend" class="ui-state-highlight">City/State Append</li>
        </ul>
    </td>
</tr>
</table>
 <input value="" type="hidden" name="validation" id="validOrder" />
</fieldset>


<fieldset>
<legend>No Call Settings</legend>

<table style="width: 100%;">
<tr style="vertical-align: top;">
	<td>
    <ins>No Call States</ins>
	<input id="no_state" name="no_states" placeholder="No Call States" size="75" />
    
    </td>
	<td>
    <input id="no_state" name="no_area" placeholder="No Call Area Codes" size="75" />

    </td>
</tr>
</table>
 </fieldset>
<fieldset>
<legend>Additional Notes</legend>

<table style="width: 100%;">
<tr style="vertical-align: top;">
	<td>
    <h3 style="margin: 0px 0px 0px 0px"><ins>Additional Notes</ins></h3>
    <textarea name="notes" cols="100" rows="10" wrap="physical" maxlength="1000" placeholder="Enter in any relevant details that we didn't cover previously."></textarea>
    </td>
</tr>
</table>
 </fieldset>


</form>
