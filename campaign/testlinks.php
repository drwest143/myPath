<?
error_reporting(E_ALL ^ E_NOTICE);
$M = new mysqli("10.0.3.135", "drwest", "Mexico143", "myPath");

if ($_REQUEST['campaign'] != '') {

    $insertRecord = "Insert into tbl_testlinks(campaign,url,prod_url) values('" . $_REQUEST['campaign'] .
        "','" . $_REQUEST['url'] . "','" . $_REQUEST['prod_url'] . "')";
    $t = $M->query($insertRecord);
    $M->close();
    header( 'Location: testlinks.php' ) ;
}


$sql = "Select * from tbl_testlinks order by campaign asc;";
$res = $M->query($sql);
?>
    <link href="/myPath/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="/myPath/bootstrap/js/bootstrap.js"></script>

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
                  <li><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
              </ul>
              <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, New User <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="/auth/logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
            </div>
        </div>
</div>


<div class="row-fluid">

<div class="span2">
<div class="well">
Test

</div>
</div>
<div class="span10">

<form method="get" target="_self" action="testlinks.php" enctype="text/plain">

<table cellspacing="0" style="width: 100%;" class="table table-bordered table-hover table-condensed">
<? while ($r = $res->fetch_assoc()) { ?>
<tr >
	<td ><?= $r['campaign'] ?></td>
	<td ><a href="<?= $r['url'] ?>" title="<?= $r['url'] ?>" target="_blank">Impression</a></td>
	<td ><a href="<?= $r['con_url'] ?>" title="<?= $r['prod_url'] ?>" target="_blank">Conversion</a></td>
    <td ><a href="<?= $r['prod_url'] ?>" title="<?= $r['prod_url'] ?>" target="_blank">Sale</a></td>
</tr>
<? } ?>
<!-- <tr >
	<td style="width: 35%;border: black;border-style: solid;border-width: thin;"><input type="text" id="campaign" name="campaign" /></td>
	<td style="width: 35%;border: black;border-style: solid;border-width: thin;text-align: center;"><input type="text" id="url" name="url" /></td>
	<td style="width: 35%;border: black;border-style: solid;border-width: thin;text-align: center;"><input type="text" id="prod_url" name="prod_url" /></td>
</tr>-->
</table>
<!-- </a><input type="submit" value="Add" />-->




<?
$M->close();
?>

</form>
</div>
</div>
