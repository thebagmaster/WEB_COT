<?php
set_time_limit(0);
date_default_timezone_set('America/Chicago');

$Year = Date ('y') ;
$Correct_month = Date ('m') ; //leading zeros
$Correct_dayofmonth = Date ('d') ; //leading zeros

$Symbol_array = array(
'DX','B6','D6','J6','S6','E6','A6','M6','N6' //0-8
);

intval ($Correct_month);
intval ($Correct_dayofmonth);

echo "<b><center>Day of Month: {$Correct_dayofmonth} - Month of Year: {$Correct_month} - Year: {$Year}</b></center>";


For ( $i = 0; $i <= 8; $i++ ){
		
	If ( $Correct_month >= 01 && $Correct_dayofmonth >= 01 ){$Month_letter = 'H';}
	If ( $Correct_month >= 03 && $Correct_dayofmonth >= 17 ){$Month_letter = 'M';}
	If ( $Correct_month >= 06 && $Correct_dayofmonth >= 17 ){$Month_letter = 'U';}
	If ( $Correct_month >= 09 && $Correct_dayofmonth >= 17 ){$Month_letter = 'Z';}
		
$url = "<iframe src='
http://barchart.com/chart.php?sym={$Symbol_array[$i]}{$Month_letter}{$Year}&style=technical&template=&p=WC&d=M&sd=&ed=&size=L&log=0&t=BAR&v=0&g=1&evnt=1&late=1&o1=&o2=&o3=&sh=100&indicators=COTLC%2813369344%2C26112%2C153%29&chartindicator_1_code=COTLC&chartindicator_1_param_0=13369344&chartindicator_1_param_1=26112&chartindicator_1_param_2=153&addindicator=&submitted=1&fpage=&txtDate=#jump
' width='1500' height='750'>
</iframe>";

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
