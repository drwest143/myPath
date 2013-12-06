<?include ('/var/www/html/thedwspot.com/myPath/c_header.php');?>

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
      <label class="control-label" for="name">traffic source name</label>
      <div class="controls">
        <input type="text" id="name" name="name" required placeholder="" class="input-xlarge">
        <p class="help-block">Please provide name of traffic source</p>
      </div>
    </div>
    
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="id">tracking code</label>
      <div class="controls">
        <input type="text" id="id" name="id" placeholder="" class="input-xlarge" required>
        <p class="help-block">Please provide tracking code</p>
      </div>
    </div>
 <input type="hidden" name="action" value="addtraffic" />
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
<li><strong>Name: </strong><br /><small>Enter the name as you would like for it to appear in reporting</small></li>
<li><strong>Tracking Code: </strong><br /><small>Enter a 6 digit tracking code <p class="alert-danger"><i class="icon-exclamation-sign"></i>Example: 111222</p></small></li>
</ul>

</div>
</div>
</div>

</div>



</div>
<div class="panel-footer"><a href="privacy">Privacy Policy</a></div>