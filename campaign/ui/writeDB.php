<pre><?

$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");

switch ($_POST['action']){ 
	case 'adduser':
        $sql="Insert Into tbl_salesperson set email='".$_POST['email']."', password=password('".$_POST['password']."'),name='".$_POST['name']."';";
        //echo $sql; exit;
        $res=$M->query($sql);
        $M->close();
        header('Location: http://www.thedwspot.com/myPath');
	break;
	case 'addtraffic':
        $sql="Insert Into tbl_affiliates set referrer='".$_POST['id']."', referrer_name='".$_POST['name']."';";
        //echo $sql; exit;
        $res=$M->query($sql);
        $M->close();
        header('Location: http://www.thedwspot.com/myPath/campaign/main.php');
	break;

	default :
}


?></pre>