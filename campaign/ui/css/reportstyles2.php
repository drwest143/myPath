<?php header("Content-type: text/css");
$images = array(
	"logo" => array ( "path" => "images/h_logo_1.gif", "alt" => "Interactive Marketing Solutions" )
	, "logo2" => array ( "path" => "images/h_logo_2.gif", "alt" => "Interactive Marketing Solutions" )
);
foreach($images as $image => $details)
{
	$size = getimagesize("../".$details['path']);
	$images[$image]['width'] = $size[0];
	$images[$image]['height'] = $size[1];
}
$w_main = $images['logo2']['width'];
$w_menubox = 200;
$w_menu = $w_menubox - 2;
$m_menu = 5;
$w_contentbox = $w_main; 
$m_content = 0;
$w_content = $w_contentbox - 2 - $m_content;
?>body { background: #E8E8E8; }
.bigger { font-size: 1.2em; }
.standard { font-size: .8em; }
.small { font-size: .7em; }

div.main { width: <?=$w_main?>px; 
	margin: auto;
}
	div#headerbox { }
<?php $img = "logo"; ?>
		div.<?=$img?> { width: <?=$images[$img]['width']?>px; height: <?=$images[$img]['height']?>px; }
<?php $img = "logo2"; ?>
		div.<?=$img?> { width:  <?=$images[$img]['width']?>px; height: <?=$images[$img]['height']?>px; }
	div.menubox { float: left; width: <?=$w_menubox?>px;  }
		div.menu { border: 1px solid #C1C1C2; background: #FFFFFF;
			width: <?=$w_menu?>px;
			margin-top: 10px; 
		}
		div.menuoption { float: left; }
			h1.menu { 
				margin-left: <?=$m_menu?>px;
				line-height: 30px;
			}
			p.menu { 
				margin-left: <?=$m_menu+10?>px;
				line-height: 30px;
			}
	div.contentbox { float: left; width: <?=$w_contentbox?>px;  }
		div.content { border: 1px solid #C1C1C2; background: #FFFFFF;
			width: <?=$w_content?>px;
			margin-top: 10px; margin-left: <?=$m_content?>px; 
		height: 100%; overflow:auto;
		}
		div.content_head { 
			width: <?=$w_content-2?>px;
			border: 1px solid #FFFFFF; 
			background: #CCCCCC;
			
		}
			p.content_head { text-align: center; font-weight: bold; 
				margin: 0px; 
			}
		
div.datecol { float: left; }
	p.datecol { margin: 0px; margin-left: 10px; line-height: 26px; }
	input.datecol { height: 22px; margin-bottom: 2px; }
	input.datecolfield { height: 16px; margin-bottom: 2px;}
	
table.report {
		width: <?=$w_content?>px;
		border: 1px solid #FFFFFF; 
	}
	td.heading, th.heading { background: #FCFFB9; 
		border-top: 1px solid #A8A8A8;
	}
	td.headnofoot { background: #FCFFB9; 
		border-top: 1px solid #A8A8A8;
		border-bottom: 1px solid #A8A8A8;
	}
	td.cell, th.cell { 
		border-bottom: 1px solid #A8A8A8;
		border-left: 1px solid #A8A8A8;
		text-align:center;
	}
	td.cellnofoot {
		border-top: 1px solid #A8A8A8;
		border-left: 1px solid #A8A8A8;
	}
	td.last, th.last { border-right: 1px solid #A8A8A8; }
	td.footing { background: #FCFFB9; 
		border-bottom: 1px solid #A8A8A8;
	}
	
	td.highlight { background: #E2E2E2; }
	td.lowlight { background: #FFFFFF; }
	
	p.right { text-align: right; }
	
	p.cell { margin-top: 2px; margin-bottom: 2px; }
	a.reportlink { color: #666666; }
<?php
$w_opens = 60;
$w_clicks = 60;
$w_rate = 70;
$w_sent = 60;
$w_openrate = 70;
$w_conv = 40;
$w_lcost = 80;
$w_cpa = 70;
$w_subid = $w_content - ($w_cpa + $w_lcost + $w_conv + $w_openrate + $w_sent + $w_opens + $w_clicks + $w_rate);
$margin = 5;
?>
	td.subid { width: <?=$w_subid?>px;}
		p.subid { width: <?=$w_subid-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.sent { width: <?=$w_sent?>px;}
		p.sent { width: <?=$w_sent-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.opens { width: <?=$w_opens?>px;}
		p.opens { width: <?=$w_opens-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.openrate { width: <?=$w_openrate?>px;}
		p.openrate { width: <?=$w_openrate-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.clicks { width: <?=$w_clicks?>px; }
		p.clicks { width: <?=$w_clicks-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.rate { width: <?=$w_rate?>px; }
		p.rate { width: <?=$w_rate-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.conv { width: <?=$w_conv?>px; }
		p.conv { width: <?=$w_conv-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.lcost { width: <?=$w_lcost?>px; }
		p.lcost { width: <?=$w_lcost-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.cpa { width: <?=$w_cpa?>px; }
		p.cpa { width: <?=$w_cpa-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
		

<?php
$w_ip = 100;
$w_stamp = 120;
$w_state = 155;
$w_city = $w_content - ($w_stamp + $w_ip + $w_state);
$margin = 5;
?>
	td.ip { width: <?=$w_ip?>px;}
		p.ip { width: <?=$w_ip-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.stamp { width: <?=$w_stamp?>px;}
		p.stamp { width: <?=$w_stamp-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.city { width: <?=$w_city?>px; }
		p.city { width: <?=$w_city-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.state { width: <?=$w_state?>px; }
		p.state { width: <?=$w_state-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
<?php
$w_toptotal = $w_content / 4;
$w_affcode = 70;
$w_telesub = 200;
$w_stats = ($w_content - ($w_affcode + $w_telesub)) / 5;
?>
	td.toptotal { width: <?=$w_toptotal?>px; }
		p.toptotal { width: <?=$w_toptotal-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.affcode { width: <?=$w_affcode?>px; }
		p.affcode { width: <?=$w_affcode-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	td.telesub { width: <?=$w_telesub?>px; }
		p.telesub { width: <?=$w_telesub-(2*$margin)?>px; 
			margin-left: <?=$margin?>px; 
		}
	td.stats { width: <?=$w_stats?>px; }
		p.stats { width: <?=$w_stats-(2*$margin)?>px;
			margin-left: <?=$margin?>px; 
		}
<?php
$wsendDate = 150;
$wnewsletter = 220;
$wlist = 140;
//Auto Generated
$wcount = ($w_content - ($wsendDate+$wnewsletter+$wlist) ) / 9;
?>
	th.sendDate { width: <?=$wsendDate?>px; }
	th.newsletter { width: <?=$wnewsletter?>px; }
		p.newsletter { width: <?=$wnewsletter-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	th.list { width: <?=$wlist?>px; }
		p.list { width: <?=$wlist-(2*$margin)?>px; 
			margin-left: <?=$margin?>px;
		}
	th.count { width: <?=$wcount?>px; }
		p.count { width: <?=$wcount-(2*$margin)?>px; text-align: right; 
			margin-left: <?=$margin?>px;
		}