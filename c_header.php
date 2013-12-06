<!DOCTYPE html>
<title>theDWSpot</title>
<link href='http://www.thedwspot.com/myPath/css/custom-theme/jquery-ui-1.8.18.custom.css' type='text/css' rel='stylesheet' />
<link href='http://www.thedwspot.com/myPath/css/tablesorter.css' type='text/css' rel='stylesheet' />

<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" /> -->
<link  href="http://code.jquery.com/jquery-1.9.1.js" />
<link  href="http://code.jquery.com/ui/1.10.2/jquery-ui.js" />
<!--
  <script src="http://www.thedwspot.com/myPath/js/jquery-1.9.1.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />-->
<link href='http://code.jquery.com/ui/1.10.3/themes/excite-bike/jquery-ui.css' type='text/css' rel='stylesheet' />
<script type='text/javascript' src='http://www.thedwspot.com/myPath/js/jquery-1.7.2.min.js'></script>
<script type='text/javascript' src='http://www.thedwspot.com/myPath/js/jquery-ui-1.8.18.custom.min.js'></script>
<script type='text/javascript' src='http://www.thedwspot.com/myPath/js/jquery.tablesorter.js'></script>
<link href="http://www.thedwspot.com/myPath/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<script src="http://www.thedwspot.com/myPath/bootstrap/js/bootstrap.js"></script>
<link href="http://www.thedwspot.com/myPath/bootstrap/css/tablecloth.css" rel="stylesheet" media="screen">
<link href="http://www.thedwspot.com/myPath/bootstrap/css/prettify.css" rel="stylesheet" media="screen">
<script src="http://www.thedwspot.com/myPath/bootstrap/js/jquery.tablecloth.js"></script>
<script src="http://www.thedwspot.com/myPath/bootstrap/js/jquery.metadata.js"></script>

<link href="http://www.thedwspot.com/myPath/bootstrap/css/bootstrap-editable.css" rel="stylesheet" media="screen">
<script src="http://www.thedwspot.com/myPath/bootstrap/js/bootstrap-editable.js"></script>

<script type='text/javascript'>
function openWin(href, name) { 
	window.open(
		href, 
		name, 
		"left=300, "
		+"top=200, "
		+"height=600, "
		+"width=800, "
		+"status=1, "
		+"toolbar=1, "
		+"menubar=0, "
		+"directories=0, "
		+"resizable=1, "
		+"scrollbars=1"
	);
}




</script>
<?session_start();
?>
<div class="navbar navbar-inverse nav">
    <div class="navbar-inner">
        
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/">theDWspot</a>
    		
          	<div class="nav-collapse collapse">
              <ul class="nav">
                 
                  <li class="divider-vertical"></li>  
                    <div class="btn-group">  
                          <a class="btn btn-success" style="width: 160px;" href="#"><i class="icon-road icon-white"></i> Manage Traffic Sources</a>  
                          <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>  
                          <ul class="dropdown-menu">
                            <li><a href="/myPath/campaign/ui/trafficSource.php"><i class="icon-plus"></i> Add</a></li>  
                            <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>  
                            <li><a href="#"><i class="icon-trash"></i> Delete</a></li>  
                            <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>  
                          </ul>  
                    </div>    
                  <li class="divider-vertical"></li>
                  <div class="btn-group">  
                          <a class="btn btn-warning" style="width: 160px;" href="#"><i class="icon-user icon-signal icon-white"></i> Manage Campaigns</a>  
                          <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>  
                          <ul class="dropdown-menu">
                            <li><a href="/myPath/campaign/report/campaigns.php"><i class="icon-plus"></i> Add Campaign</a></li>
                            <li><a href="/myPath/campaign/ui/add_trafficSource.php"><i class="icon-road"></i> Add traffic source</a></li>    
                          </ul>  
                    </div>

                  <li class="divider-vertical"></li>
                  <div class="btn-group">  
                          <a class="btn btn-info" style="width: 160px;" href="#"><i class="icon-user icon-signal icon-white"></i> Reports</a>  
                          <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>  
                          <ul class="dropdown-menu">
                            <li><a href="/myPath/campaign/report/campaigns.php"><i class="icon-info-sign"></i> Campaigns</a></li>    
                          </ul>  
                    </div>

              </ul>
              <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION['name']?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/myPath/campaign/ui/register.php"><i class="icon-plus"></i> Add User</a></li>  
                            <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="http://www.thedwspot.com/myPath/index.php?action=logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
            </div>
      </div> 
      </div>