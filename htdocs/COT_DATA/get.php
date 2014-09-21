<?php
include_once('simple_html_dom.php');
//$yearStarts = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10");
//$yearEnds = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11");
if(!$_POST['start']){
	$yearStarts = array("00");
	$yearEnds = array("01");
}else{
	$yearStarts = array($_POST['start']);
	$yearEnds = array($_POST['end']);
}
foreach($yearStarts as $yearS){foreach($yearEnds as $yearE)
	{
	$contracts = array("H", "M", "U", "Z");
	foreach($contracts as $affix)
	{
		$count = 0;
		include 'mysql_connect.php';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://barchart.com/chart.php?sym=DX'.$affix.'12&style=technical&template=&p=DC&d=M&sd=01%2F01%2F20'.$yearS.'&ed=01%2F01%2F20'.$yearE.'&size=S&log=0&t=BAR&v=1&g=1&evnt=1&late=1&o1=&o2=&o3=&sh=100&indicators=COTLC%2813369344%2C26112%2C153%29&chartindicator_2_code=COTLC&chartindicator_2_param_0=13369344&chartindicator_2_param_1=26112&chartindicator_2_param_2=153&addindicator=&submitted=1&fpage=&txtDate=01%2F01%2F2012#jump');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';
		curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

		$content = curl_exec($ch);
		curl_close($ch);
		$i = 0;
		$html = str_get_html($content);
		foreach($html->find('area') as $element)
		{
			$temp = $element->onmousemove;
			$temp = str_replace("showOHLCTooltip(event, 'B', ","",$temp);
			$temp = str_replace(")","",$temp);
			$temp = str_replace("'","",$temp);
			
			$pos = strpos($temp, "showStudyTooltip");
			if($pos === false) {
				list($date, $date2, $symbol, $open, $high, $low, $close) = explode(",", $temp);
				$date = $date.$date2;
				$date = substr(substr($date,4),0,-1);
				$date = date("Y-m-d",strtotime($date));
				$result = mysql_query("INSERT INTO dx (date, symbol, open, high, low, close) 
				VALUES ('$date', '$symbol', '$open', '$high', '$low', '$close')");
				if (!$result)
					$result = mysql_query("UPDATE dx SET date='$date', symbol='$symbol', open='$open', high='$high', low='$low', close='$close' 
					WHERE date='$date'");
			}else{
				$temp = str_replace("showStudyTooltip(event, B, ","",$temp);
				list($date, $date2,$volOrInt,$value) = explode(",", $temp);
				$date = $date.$date2;
				$date = substr(substr($date,4),0,-1);
				$date = date("Y-m-d",strtotime($date));
				if(strcmp($volOrInt," Volume")===0){
					if($value<>0)
					{
						$result = mysql_query("SELECT * FROM dx WHERE date='$date'");
						$row = mysql_fetch_array($result);
						if($value > $row['volume'])
							$result = mysql_query("UPDATE dx SET volume='$value' WHERE date='$date'");
					}
				}else if(strcmp($volOrInt," Interest")===0){
					if($value<>0)
					{
						$result = mysql_query("SELECT * FROM dx WHERE date='$date'");
						$row = mysql_fetch_array($result);
						if($value > $row['interest'])
							$result = mysql_query("UPDATE dx SET interest='$value' WHERE date='$date'");
					}
				}else if(strcmp($volOrInt," COTLC (L")===0){
					if($value<>0)
						$result = mysql_query("UPDATE dx SET cotlc_L='$value' WHERE date='$date'");
				}else if(strcmp($volOrInt," COTLC (S")===0){
					if($value<>0)
						$result = mysql_query("UPDATE dx SET cotlc_S='$value' WHERE date='$date'");
				}else{
					if($value<>0)
						$result = mysql_query("UPDATE dx SET cotlc_C='$value' WHERE date='$date'");
				}
			}
			if (!$result) die('Invalid query: ' . mysql_error());
			$count+=mysql_affected_rows();
		}
		mysql_close($con);
		echo "MYSQL Query executed, Effected Rows: ".$count." Symbol: DX" . $affix . "<br>";
	}
	}}
?>