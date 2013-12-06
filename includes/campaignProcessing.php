<?php

/**
 * @author Donnie West
 * @copyright 2013
 */

class campaignProcessing
{

    function getCampaignSettings($campaign)
    {

        $M = new mysqli('174.143.22.102', 'DRWest', 'Mexico143', 'glb_process');
        $sql = "SELECT C.campaign_id,
                            C.campaign_name,
                            C.start_date,
                            C.end_date,
                            C.disallowed_states,
                            C.validation,
                            C.post_url,
                            C.post_data,
                            C.post_type,
                            C.daily_budget as `campaign_daily`,
                            C.total_budget as `campaign_total`,
                            C.sales_person,
                            C.commission,
                            C.sell_price,
                            C.db_name,
                            C.process_script,
                            C.feedTable,
                            C.mailVerifyUN,
                            C.mailVerifyPW,
                            C.campaignController,
                            C.advertiser,
                            C.status
                    FROM
                    tbl_campaigns AS C
                    
                    WHERE
                    C.campaignController ='" . $campaign . "'";
      //   echo $sql; exit;
        $res =$M->query($sql);
        
        if($res->num_rows==0){
            $returnValue['Service Not Allowed']= true;
            return $returnValue;
        }
        
        while ($row = $res->fetch_assoc()) {
            $returnValue[$row['campaignController']] = $row;
        }
        $M->close();
        return $returnValue;

    }

    function getReferrerSettings($campaign,$referrer)
    {

        $M = new mysqli('174.143.22.102', 'DRWest', 'Mexico143', 'glb_process');
        $sql = "SELECT *
                    FROM
                    tbl_referrers AS R
                    
                    WHERE
                    R.campaign_id ='" . $campaign . "' and referrer='".$referrer."' and active='1'";
      //   echo $sql; exit;
        $res =$M->query($sql);
        
        if($res->num_rows==0){
            $returnValue['Referrer Not Allowed']= true;
            return $returnValue;
        }
        
        while ($row = $res->fetch_assoc()) {
            $returnValue[$row['referrer']] = $row;
        }
        $M->close();
        return $returnValue;

    }




    function checkReferrerBudget($campaign,$referrer,$feedtable='tbl_inlog')
    {

        $M = new mysqli('174.143.22.102', 'DRWest', 'Mexico143', $campaign);
        $sql = "SELECT
                	count(*) AS `month_total`,
	                count(case when date(C.post_date)= curdate() then login end) as `daily_total`
                    
                    FROM
                    `".$campaign."`.`".$feedtable."` AS C
                    
                    WHERE
                    C.post_response ='Accepted' AND month(C.post_date)= month(CURDATE()) and C.referrer='" . $referrer . "'";
       //  echo $sql;
        $res = $M->query($sql);

        while ($row = $res->fetch_assoc()) {
            $returnValue['month'] = $row['month_total'];
            $returnValue['daily'] = $row['daily_total'];
        }
        $M->close();
        //print_r($returnValue);
        return $returnValue;

    }

    function checkDailyOfferAllocation($campaign,$feedtable='tbl_inlog')
    {

        $M = new mysqli('174.143.22.102', 'DRWest', 'Mexico143', $campaign);
        $sql = "SELECT
                	count(*) AS `month_total`,
	                count(case when date(C.post_date)= curdate() then login end) as `daily_total`
                    
                    FROM
                    `".$campaign."`.`".$feedtable."` AS C
                    
                    WHERE
                    C.post_response ='Accepted' AND month(C.post_date)= month(CURDATE())";
       //  echo $sql;
        $res = $M->query($sql);

        while ($row = $res->fetch_assoc()) {
            $returnValue['month'] = $row['month_total'];
            $returnValue['daily'] = $row['daily_total'];
        }
        $M->close();
        //print_r($returnValue);
        return $returnValue;
    }

    
    function writeToInlog($requestData,$campaign,$feedtable='tbl_inlog')
    {
	
    if (!isset($requestData['app_id'])) {$requestData['app_id'] = '0';}
	connectM();
	if(!isset($requestData['referrer'])){ $requestData['referrer'] = 'None'; }
	$storeInLog = 
		"INSERT INTO "
			."`".$feedTable."`.`tbl_inlog` "
			."( "
				." `post_arr` "
				.", `post_response` "
				.", `post_date` "
				.", `referrer` "
				.", `subid` "
				.", `app_id` "				
			.") "
			."VALUES "
			."( "
				." '".$serialized_requestData."' "
				.", '".$valid['error']."' "
				.", '".$tranDate."' "
				.", '".$requestData['referrer']."' "
				.", '".$requestData['subid']."' "
				.", '".$requestData['app_id']."' "

			.") "
		.";";
	$dostoreInLog = mysql_query_ims($storeInLog, $master, false, false, 'Inserting to inlog, invalid post');
	disconnectM();

    }




}

?>