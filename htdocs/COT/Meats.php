<?php

set_time_limit(0);
date_default_timezone_set('America/Chicago');
$Year = Date ('y') ;
$Correct_month = Date ('m') ; //leading zeros
$Correct_dayofmonth = Date ('d') ; //leading zeros
$Symbol_array = array('LE','GF','HE','DL');

intval ($Correct_month);
intval ($Correct_dayofmonth);

echo "<b><center>Day of Month: {$Correct_dayofmonth} - Month of Year: {$Correct_month} - Year: {$Year}</b></center>";


For ( $i = 0; $i <= 3; $i++ ){

	If ( $i == 0 || $i >= 2 ){
		If ( $Correct_month >= 01 && $Correct_dayofmonth >= 01 ){$Month_letter = 'G';}
	}
	If ( $i == 1){
		If ( $Correct_month >= 01 && $Correct_dayofmonth >= 01 ){$Month_letter = 'H';}
	}		
		
$url = "<iframe src='http://barchart.com/chart.php?sym={$Symbol_array[$i]}{$Month_letter}{$Year}&style=technical&p=WC&d=X&x=20&y=1&sd=&ed=&size=M&log=0&t=BAR&v=1&g=1&evnt=1&late=1&o1=&o2=&o3=&sh=100&indicators=COTLC%2813369344%2C26112%2C153%29%3BCOTDLC%2813369344%2C26112%2C153%2C16750848%29&chartindicator_3_code=COTLC&chartindicator_3_param_0=13369344&chartindicator_3_param_1=26112&chartindicator_3_param_2=153&chartindicator_4_code=COTDLC&chartindicator_4_param_0=13369344&chartindicator_4_param_1=26112&chartindicator_4_param_2=153&chartindicator_4_param_3=16750848&addindicator=&submitted=1&fpage=&txtDate=#jump' width='1500' height='750'></iframe>";

echo "<table style='width:100px;'>";
echo "<tr>";
echo "<td align='center' width='100%'>";
echo $url;
echo "</iframe>";
echo "</td>";
echo "</tr>";
echo "</table>";

}
 
?>