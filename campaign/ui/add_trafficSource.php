<?include ('/var/www/html/thedwspot.com/myPath/c_header.php');?>
<script>
$(document).ready(function () {

    $( "#campaign_id" ).autocomplete({
      source: "search.php?type=campaign",
      minLength: 1
    });
    
    $( "#id" ).autocomplete({
      source: "search.php?type=referrer",
      minLength: 1
    });
    
});
</script>
<div class="container">

<div class="row">
<div class="span7">
<form class="form-horizontal form panel panel-default" action='writeDB.php' method="POST">
<div class="panel-heading">Add New Traffice Source</div>
  <fieldset>
    <div id="legend">
      <legend class="panel-heading"> </legend>
    </div>
    <div class="control-group">
      <!-- Name -->
      <label class="control-label" for="name">Campaign name</label>
      <div class="controls">
        <input type="text" id="campaign_id" name="campaign_id" required placeholder="" class="input-xlarge">
        <p class="help-block">Please provide name of Campaign</p>
      </div>
    </div>
    
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="id">Traffic Source</label>
      <div class="controls">
        <input type="text" id="id" name="id" placeholder="" class="input-xlarge" required>
        <p class="help-block">Please provide Traffic source code</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Name -->
      <label class="control-label" for="name">Daily Budget</label>
      <div class="controls">
        <input type="text" id="budget" name="budget" required placeholder="" class="input-xlarge">
        <p class="help-block">Please provide the daily budget</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Name -->
      <label class="control-label" for="name">Price</label>
      <div class="controls">
        <input type="text" id="price" name="price" required placeholder="" class="input-xlarge">
        <p class="help-block">Please provide the price we pay for this campaign</p>
      </div>
    </div>


 <input type="hidden" name="action" value="addtocampaign" />
    <div class="control-group"> 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button type="submit"  style="width: 100px;"class="btn btn-primary">add source</button>
        <a href="http://www.thedwspot.com/myPath/campaign/main.php" class="btn btn">Cancel</a>
      </div>
    </div>
  </fieldset>
</form>
</div>
<div class="span5">

<div class="panel panel-default">

<div class="panel-heading"><i class="icon-question-sign icon"></i> Help</div>
<div class="panel-body">
<ul>
<li><strong>Campaign Name: </strong><br /><small>Select the campaign you would like to add traffic to.</small></li>
<li><strong>Traffic code: </strong><br /><small>Enter a 6 digit tracking code, you may also type the name of the traffic source.<p class="alert-danger"><i class="icon-exclamation-sign"></i> Example: 111222</p></small></li>
</ul>

</div>
</div>
</div>

</div>



</div>
<div class="panel-footer"><a href="privacy">Privacy Policy</a></div>