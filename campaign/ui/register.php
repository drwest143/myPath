<?include ('/var/www/html/thedwspot.com/myPath/c_header.php');?>

<div class="container">

<div class="row">
<div class="span7">
<form class="form-horizontal form panel panel-default" action='writeDB.php' method="POST">
<div class="panel-heading">Register</div>
  <fieldset>
    <div id="legend">
      <legend class="panel-heading"> </legend>
    </div>
    <div class="control-group">
      <!-- Name -->
      <label class="control-label" for="email">Name</label>
      <div class="controls">
        <input type="text" id="name" name="name" required placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your Name</p>
      </div>
    </div>
    
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge" required>
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 <input type="hidden" name="action" value="adduser" />
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button type="submit"  style="width: 100px;"class="btn btn-primary">Register</button>
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
<li><strong>Name: </strong><br /><small>Enter your name as you would like for it to appear in reporting</small></li>
<li><strong>Username: </strong><br /><small>Enter your email address as your username.</small></li>
<li><strong>Password: </strong><br /><small>Enter your password. Please keep your password secret.</small></li>
<li><strong>Password-confirmation: </strong><br /><small>Confirm your password, password must match before you can proceed</small></li>
</ul>

</div>
</div>
</div>

</div>



</div>
<div class="panel-footer"><a href="privacy">Privacy Policy</a></div>