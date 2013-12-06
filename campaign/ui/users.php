<?include_once ('/var/www/html/thedwspot.com/myPath/c_header.php');


$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");
$sql ='Select * from tbl_salesperson';

$res=$M->query($sql);


?>
<script>
$(document).ready(function(){
  $.fn.editable.defaults.mode = 'inline';
   $('.drw').editable({
    
});
    
});


</script>

<table class="table table-hover table-bordered" id="users">
<tr>
	<td>UserName</td>
	<td>Name</td>
	<td>Password</td>
	<td></td>
</tr>
<?while ($r=$res->fetch_assoc()){?>
<tr>
	<td><?=$r['email']?></td>
	<td><a href="#" id="<?=$r['name']?>" class="drw"  data-type="text" data-pk="1" data-url="/myPath/campaign/ui/edit.php" data-title="Enter username"><?=$r['name']?></a></td>
	<td><strong><?=$r['password']?></strong></td>
	<td></td>
</tr>

<?}?>
</table>
