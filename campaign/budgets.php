<script>

$('.campaign_id').chosen();
function loadDisplayBox(){
    var cid = document.getElementById('campaign_id').value;
    //alert(cid);
           
            $.ajax({
            type: "POST",
            cache: false,
            url: "/myPath/campaign/camp_edit.php",
            data:{"campaign_id": cid},
            success: function (data) {
            $('#displayBox').html(data);
            
            }
        });
    
}

</script>


<?
$cid=$_REQUEST['cid'];
$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");
$sql = "Select * from tbl_campaigns order by campaign_name;";
$res = $M->query($sql);
?>

<select class="campaign_id" id="campaign_id" name="campaign_id">
<option value="ALL" selected='selected' >Type to Find</option>
<? while ($r=$res->fetch_assoc()){ ?>
	<option value="<?=$r['campaign_id']?>"><?=$r['campaign_name']?></option>
<?}?>
</select>
<input type="button" value="GO" onclick="loadDisplayBox()" />




<div id="displayBox" style="width: 100%;height: 100%;">
</div>
