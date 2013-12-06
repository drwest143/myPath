<?


$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");


switch ($_REQUEST['type']){ 
	case 'advertiser':
            $sql = "Select advertiser_id,advertiser_name from tbl_advertisers where advertiser_name like '".$_REQUEST['term']."%'";
            $res = $M->query($sql);
            while ($r= $res->fetch_assoc()){
                $returnArray[] = $r['advertiser_name'];}
            $search = json_encode($returnArray);
            echo $search;
            exit;
            
	break;

	case 'salesperson':
            $sql = "Select name from tbl_salesperson where name like '".$_REQUEST['term']."%'";
            $res = $M->query($sql);
            while ($r= $res->fetch_assoc()){
                $returnArray[] = $r['name'];}
            $search = json_encode($returnArray);
            echo $search;
            exit;
            
	break;

	case 'campaign':
            $sql = "Select campaign_name,campaign_id from tbl_campaigns where campaign_name like '%".$_REQUEST['term']."%' or campaign_id like '%".$_REQUEST['term']."%'";
            
            $res = $M->query($sql);
            while ($r= $res->fetch_assoc()){
                $returnArray[] = $r['campaign_id']."-".$r['campaign_name'];}
            $search = json_encode($returnArray);
            echo $search;
            exit;
            
	break;

	case 'referrer':
            $sql = "SELECT tbl_affiliates.referrer,tbl_affiliates.referrer_name FROM tbl_affiliates where referrer_name like '%".$_REQUEST['term']."%' or referrer like '%".$_REQUEST['term']."%'";
            
            $res = $M->query($sql);
            while ($r= $res->fetch_assoc()){
                $returnArray[] = $r['referrer']."-".$r['referrer_name'];}
            $search = json_encode($returnArray);
            echo $search;
            exit;
            
	break;

	default :
        continue;
}




















$M->close();

 
?>