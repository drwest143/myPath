<html>
<?
$variation=rand(0,1);
if($variation==1){?>
<style>
.button {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    padding: 12px 24px;
    border: 1px solid #a12727;
    border-radius: 8px;
    background: #992828;
    background: -webkit-gradient(linear, left top, left bottom, from(#ff4a4a), to(#992727));
    background: -moz-linear-gradient(top, #ff4a4a, #992727);
    background: linear-gradient(to bottom, #ff4a4a, #992727);
    -webkit-box-shadow: #ff5959 0px 0px 40px 0px;
    -moz-box-shadow: #ff5959 0px 0px 40px 0px;
    box-shadow: #ff5959 0px 0px 40px 0px;
    text-shadow: #591717 1px 1px 1px;
    font: normal normal bold 24px verdana;
    color: #ffffff;
    text-decoration: none;
}
.button:hover,
.button:focus {
    background: #992828;
    background: -webkit-gradient(linear, left top, left bottom, from(#ff5959), to(#b62f2f));
    background: -moz-linear-gradient(top, #ff5959, #b62f2f);
    background: linear-gradient(to bottom, #ff5959, #b62f2f);
    color: #ffffff;
    text-decoration: none;
}
.button:active {
    background: #982727;
    background: -webkit-gradient(linear, left top, left bottom, from(#982727), to(#982727));
    background: -moz-linear-gradient(top, #982727, #982727);
    background: linear-gradient(to bottom, #982727, #982727);
}
.button:after{
    content:  "\0000a0";
    display: inline-block;
    height: 24px;
    width: 24px;
    line-height: 24px;
    margin: 0 -4px -6px 4px;
    position: relative;
    top: 0px;
    left: 0px;
    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABRUlEQVRIieXVPS8EURQG4Mdmi41StlCpFKJSyVaylRaJoFaoVP6C36BWiyjUtCKiUCiQSERYKp1GREYxd+zs7szszsZH4U1O5s2dM/eeez7e4ZdQyeHfekBiBuRFgX3xkYyXf46pHF6ISsYz7/ovmA9rDymel9KOxUEswjs2MYu7wPP8eyLshyhlO5jEWeC1vI96Tiy4ctRlR5jAXuBjSqSohia2cYjLjAMi3GA6+F2Ji1+YonpwbuVsmGVJ8de0i5+ZokU8l9g4bW/igjeE4ndHvoUDjPsBbAwZdWGKEqmYwal2mz3hGBd4xCuq4trsZgR3iwWsYgVLuE5eVnGCD3GnNPUftKw23Q+83uVvWdx+c32TGCNr0M4VDNo6RvUOVNGgJVLRwL22VEj5daCMFqXFrqVT7HK1qAyGluv/80cbCj+Wok/s6G7X+dXq4AAAAABJRU5ErkJggg==") no-repeat left center transparent;
    background-size: 100% 100%;
}

</style>
<?}else{?>
<style>
.button {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    padding: 12px 24px;
    border: 1px solid #241010;
    border-radius: 8px;
    background: #992828;
    background: -webkit-gradient(linear, left top, left bottom, from(#ff892e), to(#ffc663));
    background: -moz-linear-gradient(top, #ff892e, #ffc663);
    background: linear-gradient(to bottom, #ff892e, #ffc663);
    -webkit-box-shadow: #ff5959 0px 0px 40px 0px;
    -moz-box-shadow: #ff5959 0px 0px 40px 0px;
    box-shadow: #ff5959 0px 0px 40px 0px;
    text-shadow: #591717 1px 1px 1px;
    font: normal normal bold 24px verdana;
    color: #ffffff;
    text-decoration: none;
}
.button:hover,
.button:focus {
    border: 1px solid #b45050;
    background: #992828;
    background: -webkit-gradient(linear, left top, left bottom, from(#ffa437), to(#ffee77));
    background: -moz-linear-gradient(top, #ffa437, #ffee77);
    background: linear-gradient(to bottom, #ffa437, #ffee77);
    color: #ffffff;
    text-decoration: none;
}
.button:active {
    background: #982727;
    background: -webkit-gradient(linear, left top, left bottom, from(#99521c), to(#ffc663));
    background: -moz-linear-gradient(top, #99521c, #ffc663);
    background: linear-gradient(to bottom, #99521c, #ffc663);
}
.button:after{
    content:  "\0000a0";
    display: inline-block;
    height: 24px;
    width: 24px;
    line-height: 24px;
    margin: 0 -4px -6px 4px;
    position: relative;
    top: 0px;
    left: 0px;
    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAD5UlEQVRIiZ1VzW4aVxg93J9hYJjLmBCbGW4RqRPDMOBgCsbIlldRVXXXN4jabFt1kWWVfdVFVVV9hXbRB6i6zAMUyXEULxw5rWzcyK1pwdTBMIUumLExxcbt7Ea65+i75zvnXMD7THOB5XIZ5v2SpaW7ipQWAQDOOVlezivRqCAAIIQgxWJBYYyRETZxJZYAgJSWmkq9Fd7d3RsEAgHiOHaYc8YajUNwzkmpdF80m020Wu2BEDorFGyxt/ez67ruYISVE1jOGo1fQSklMM0FVq2WBeecACCOY4t83jYAEM45qVbL8WTSUkeT62xjY21eCMEAIJm01Gq1HL/AZi9hK5WSglwuw/wD+bxtOM5UcnJBrjMAZJJ8CtZIJq2RbN7VhOPYIhAInJNL6U8u2Pr6xeRSXpDPwsKTJeJd7RGAxwsL85/dvh1/DECdmHyKLFdLqmkawdLSXcVxsmHvwCfpdOoLReFPAGwJob83W5asmC6pYLXaqspOT0/dRuPQ5ZyjVLr/baNx2On1+l1KSVPTtA+ePXtx2G6fPAoGg1DVoF6vb530+30YRpS1253g/v7BXwAQj98KvXr1y+Do6LevhNDdQsEW29sv/oTv80m3rKwslwHsACgSQoac8yGAIYAhpXRIKT3/55wPCSFDAGdC6PExpxGMbfz8ap4sCoCtRGKhFAqF9m9APlQUvrOxsZbwJTXNBMHycl6R0lL8yUduGS00GAx+bpqJJ4zRr2eRAxjG47e+97FSWkqlUlLhxZ9MC5HjZN8H8BTAg1nknoSfjpkh5plhPKH/cosKYH9x8U5WUZQ/ZpAPAWxOOo0KIUihkNO3t3da7faJK6UVlNKK1OtbTdd1/9Y07Z3BYNDrdDpHlFJd07TjXq/3ejAYHHHOfw+F1ONu9+w1gAMprW+ktKiHhW1nCIrFgiKETqb53HFskU6nHgL47upeujKAEdvOKPAq97puMQA0yuUV+R97SfhtPa1bDMfJnneLrutPo1Hx4MJp1fkxt0zBjnqJUkoCpplgqZQM1+tbnX6/D8exI4EAyPPnO20v3bGXL/c+PD5ufgTgYG7OULrdbu/Nm+6AEIJYbI61Wq1ev++e5nKZjwkhHR9bLBbYTet6E8AwGhU/MsbWAKyZZmLz3r3FdwGsAdhljJ0tLt5JX1PXWeOqyo1EIm/reuQnAA+nyRKLzX3JOf8BQHhWXV/zik1fqOPYxg3q2g5POfB/XrFL2FptVYWUFhmTxbj8ilVjY6+Y4sffc0tkQtIxrM7W16uGly+AUkIqlZLiL0XTNFKrrap+AE0zQSqVkupPbtsZZtsZBQChlF6HxT+bAWR8HaaQDAAAAABJRU5ErkJggg==") no-repeat left center transparent;
    background-size: 100% 100%;
}

</style>
<?}?>


<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>theDWspot</title>
<meta name="keywords" content="your keywords">
<meta name="description" content="your description">
</head>

<body>

<div align="center">
	<table border="1" id="table1" bordercolor="#5A8AC8" style="border-collapse: collapse" cellspacing="5" cellpadding="3">
		<tr>
			<td>
	<table border="0" width="900" id="table6">
		<tr>
			<td>
			<table border="0" width="100%" id="table7" bgcolor="#5A8AC8">
				<tr>
					<td>
					<p align="center"><b>
					<font face="Verdana" style="font-size: 32pt" color="#FFFFFF">LOSE 10 lbs. OR MORE IN JUST 1 MONTH!</font></b></td>
				</tr>
			</table>
			<table border="0" width="100%" id="table8">
				<tr>
					<td valign="top" width="325">
					<p align="center">
					<a href="http://zacjohnson.com/wp-content/plugins/wp-affiliate-pro.php?id=138">
					<img src="http://www.zacjohnson.com/blog-images/weightlossgirl.jpg" border="0"></a></td>
					<td valign="top">
					<table border="0" width="100%" id="table9">
						<tr>
							<td>
							<p align="center"><b>
							<font face="Verdana" color="#FF0000" style="font-size: 22pt">
							Amazing Garcinia Cambogia Formula<br>
							Works <i><u>Fast</u></i>!</font></b></p>
							<ul>
								<li><b>
								<font face="Verdana" style="font-size: 17pt">
								<font color="#0099FF">Eliminates</font> Any change in diet</font></b></li>
								<li><b>
								<font face="Verdana" style="font-size: 18pt">
								<font color="#0099FF">Boosts</font> Daily Energy Levels</font></b></li>
								
								<li><b><font face="Verdana" size="5">
								<font color="#0099FF">Cleanses</font> You Body of Toxins</font></b></li>
	                           <li><b><font face="Verdana" size="5">
								<font color="#0099FF">Helps</font> burn the fat from your thighs</font></b></li>						
                            </ul>
							<p align="center"><b>
							<font face="Verdana" size="5" color="#FF0000">Buy 2 bottles get 1 bottle free</font></b></p>
							<br /><p align="center">
							<a class="button" href="http://www.thedwspot.com/myPath/myPath.php?cid=100001&aid=<?=$_REQUEST['referrer']?>&cid_a=C">Get your free bottle today</a></p>
							<br /><blockquote>
								<blockquote>
									<p align="left"><strong>
									<font size="4" face="Arial">
									<input type="checkbox" CHECKED value="checkbox" name="checkbox">
									<font color="#E88B00">Yes!</font></font></strong><font size="4" face="Arial"> 
									Please ship me my free bottle<br>
&nbsp;of Cambogia so I can try it out and<br>
&nbsp;see the amazing weight loss benefits. </font></p>
								</blockquote>
							</blockquote>
							</td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
			<table border="0" width="100%" id="table11">
				<tr>
					<td>
			<p align="center">
			<img src="http://www.zacjohnson.com/blog-images/seenon.gif"></p>
			<div align="center">
				<table border="0" width="95%" id="table12">
					<tr>
						<td valign="top"><font face="Arial">“I can now honestly 
						admit I was 30-35lbs overweight when discovering Cambogia on the internet. 
						At first I was very skeptical because there are so many 
						weight-loss scams online, who can you really trust? Well 
						as you can see by viewing my before and after pictures I 
						ended up trying the product for a 3 month period and
						<strong>lost 42.7lbs and decreased my body fat by 7.4%.</strong><br>
						<br>
						Plus I have a huge secret to tell you and it maybe hard 
						to believe this but<strong> I NEVER CHANGED MY DIET</strong> 
						and by no means do I eat healthy. After using this 
						product and seeing a dramatic change, it gave me the 
						motivation to get back into the gym and live a healthier 
						life style. I’m a firm believer in what Cambogia 
						offers and will be a dedicated customer for life!&quot;<br>
						<br>
						<strong>Rick &amp; Joanny</strong></font><p align="center">
						<font face="Arial" style="font-size: 16pt" color="#FF0000">
						<strong>“Who Else Is Ready To Lose Up To 10 Pounds<br>
						Of Pure Body Fat In The Next 30 Days<br>
						With Your FREE Supply Of Our<br>
						Revolutionary New Weight Loss Supplement?”</strong></font></td>
						<td>
						<img src="http://www.zacjohnson.com/blog-images/rickandjoanny.jpg" border="0"></a></td>
					</tr>
				</table>
				<p><b><font size="5" face="Arial"><font color="#92C100">Losing 
				Weight Has Never Been So Simple!</font> - Try It <a href="http://www.thedwspot.com/myPath/myPath.php?cid=100001&aid=<?=$_REQUEST['referrer']?>&cid_a=C">Now</a></font></b></div>
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<p align="center"><font face="Arial" size="1">

	<font class="ws8">
	<font class="ws8">
	<a href="http://www.theDWspot.com/myPath/privacy.php">Privacy</a></font><font class="ws8" color="#000000"> 
	</font></font><br>
	<font face="Arial" size="1">
	</div>

</body>

</html>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43829983-1', 'thedwspot.com');
  ga('send', 'pageview');

</script>