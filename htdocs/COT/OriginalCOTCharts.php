<?php

$Year = Date ('y') ;
$Correct_month = Date ('m') ; //leading zeros
$Correct_dayofmonth = Date ('d') ; //leading zeros

$Symbol_array = array(
//Currencies
'DX','B6','D6','J6','S6','E6','A6','N6', //0-7
//Energies
'CL','HO','RB','NG', //8-11
//Financials 
'ZB','ZN','ZF','ZT', //12-15
//Grains
'ZW','ZC','ZS','ZM','ZL','ZO','ZR', //16-22
//Inidices
'ES','NQ','YM','RJ','EW','SP','ND','DJ', //23-30
//Meats
'LE','GF','HE','DL', //31-34
//Metals
'GC','SI','HG','PL','PA', //35-39
//Softs
'CT','OJ','KC','SB','CC','LS', //40-45
);

intval ($Correct_month);
intval ($Correct_dayofmonth);

For ( $i = 0; $i <= 7; $i++ ){

If ($i <= 7 || $i > 11 && $i <= 15 || $i > 23 && $i <= 30 || $i == 39 ) {
		If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'H';}
	//	If ( $Correct_month >= 03 & $Correct_dayofmonth >= 17 ){$Month_letter = 'M';}
	//	If ( $Correct_month >= 06 & $Correct_dayofmonth >= 17 ){$Month_letter = 'U';}
	//	If ( $Correct_month >= 09 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Z';}
	//	If ( $Correct_month >= 12 & $Correct_dayofmonth >= 17 ){$Month_letter = 'H';}
}

If ( $i == 8 ){
		If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'H';}
		}
		
If ( $i > 8 & $i <= 11 || $i == 34 ){
		If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'G';}
	//	If ( $Correct_month >= 02 & $Correct_dayofmonth >= 17 ){$Month_letter = 'H';}
	//	If ( $Correct_month >= 03 & $Correct_dayofmonth >= 17 ){$Month_letter = 'J';}
	//	If ( $Correct_month >= 04 & $Correct_dayofmonth >= 17 ){$Month_letter = 'K';}
	//	If ( $Correct_month >= 05 & $Correct_dayofmonth >= 17 ){$Month_letter = 'M';}
	//	If ( $Correct_month >= 06 & $Correct_dayofmonth >= 17 ){$Month_letter = 'N';}
	//	If ( $Correct_month >= 07 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Q';}
	//	If ( $Correct_month >= 08 & $Correct_dayofmonth >= 17 ){$Month_letter = 'U';}
	//	If ( $Correct_month >= 09 & $Correct_dayofmonth >= 17 ){$Month_letter = 'V';}
	//	If ( $Correct_month >= 10 & $Correct_dayofmonth >= 17 ){$Month_letter = 'X';}
	//	If ( $Correct_month >= 11 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Z';}
	//	If ( $Correct_month >= 12 & $Correct_dayofmonth >= 17 ){$Month_letter = 'F';}
}
		
If ( $i > 16 & $i <= 22 | $i == 36 | $i == 37 ){
	//	If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'H';}
	//	If ( $Correct_month >= 03 & $Correct_dayofmonth >= 17 ){$Month_letter = 'K';}
	//	If ( $Correct_month >= 05 & $Correct_dayofmonth >= 17 ){$Month_letter = 'N';}
	//	If ( $Correct_month >= 07 & $Correct_dayofmonth >= 17 ){$Month_letter = 'U';}
	//	If ( $Correct_month >= 09 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Z';}
	//	If ( $Correct_month >= 12 & $Correct_dayofmonth >= 17 ){$Month_letter = 'F';}
}

If ( $i == 31 ){//LE
	//	If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'G';}
	//	If ( $Correct_month >= 03 & $Correct_dayofmonth >= 17 ){$Month_letter = 'J';}
	//	If ( $Correct_month >= 06 & $Correct_dayofmonth >= 17 ){$Month_letter = 'M';}
	//	If ( $Correct_month >= 09 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Q';}
	//	If ( $Correct_month >= 12 & $Correct_dayofmonth >= 17 ){$Month_letter = 'V';}
	//	If ( $Correct_month >= 03 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Z';}
	//	If ( $Correct_month >= 12 & $Correct_dayofmonth >= 17 ){$Month_letter = 'G';}
}
	
If ( $i == 32 ){//GF
	//	If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'F';}
	//	If ( $Correct_month >= 01 & $Correct_dayofmonth >= 17 ){$Month_letter = 'H';}
	//	If ( $Correct_month >= 03 & $Correct_dayofmonth >= 17 ){$Month_letter = 'J';}
	//	If ( $Correct_month >= 04 & $Correct_dayofmonth >= 17 ){$Month_letter = 'K';}
	//	If ( $Correct_month >= 05 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Q';}
	//	If ( $Correct_month >= 08 & $Correct_dayofmonth >= 17 ){$Month_letter = 'U';}
	//	If ( $Correct_month >= 09 & $Correct_dayofmonth >= 17 ){$Month_letter = 'V';}
	//	If ( $Correct_month >= 10 & $Correct_dayofmonth >= 17 ){$Month_letter = 'X';}
	//	If ( $Correct_month >= 11 & $Correct_dayofmonth >= 17 ){$Month_letter = 'F';}
}
	
If ( $i == 33 ){//HE
	//	If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'G';}
	//	If ( $Correct_month >= 02 & $Correct_dayofmonth >= 17 ){$Month_letter = 'J';}
	//	If ( $Correct_month >= 04 & $Correct_dayofmonth >= 17 ){$Month_letter = 'K';}
	//	If ( $Correct_month >= 05 & $Correct_dayofmonth >= 17 ){$Month_letter = 'M';}
	//	If ( $Correct_month >= 06 & $Correct_dayofmonth >= 17 ){$Month_letter = 'N';}
	//	If ( $Correct_month >= 07 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Q';}
	//	If ( $Correct_month >= 08 & $Correct_dayofmonth >= 17 ){$Month_letter = 'V';}
	//	If ( $Correct_month >= 10 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Z';}
	//	If ( $Correct_month >= 12 & $Correct_dayofmonth >= 17 ){$Month_letter = 'G';}
}
	
If ( $i == 35 ){//GC
	//	If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'G';}
	//	If ( $Correct_month >= 02 & $Correct_dayofmonth >= 17 ){$Month_letter = 'H';}
	//	If ( $Correct_month >= 03 & $Correct_dayofmonth >= 17 ){$Month_letter = 'J';}
	//	If ( $Correct_month >= 04 & $Correct_dayofmonth >= 17 ){$Month_letter = 'M';}
	//	If ( $Correct_month >= 06 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Q';}
	//	If ( $Correct_month >= 08 & $Correct_dayofmonth >= 17 ){$Month_letter = 'V';}
	//	If ( $Correct_month >= 10 & $Correct_dayofmonth >= 17 ){$Month_letter = 'Z';}
	//	If ( $Correct_month >= 12 & $Correct_dayofmonth >= 17 ){$Month_letter = 'F';}
}
	
If ( $i == 38 ){//PL
	//	If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'J';}
}
		

	
If ( $i >= 40 | $i <= 45 ){
	//	If ( $Correct_month >= 01 & $Correct_dayofmonth >= 01 ){$Month_letter = 'H';}
	//	If ( $Correct_month >= 03 & $Correct_dayofmonth >= 17 ){$Month_letter = 'K';}
	//	If ( $Correct_month >= 05 & $Correct_dayofmonth >= 17 ){$Month_letter = 'N';}
	//	If ( $Correct_month >= 07 & $Correct_dayofmonth >= 17 ){$Month_letter = 'U';}
	//	If ( $Correct_month >= 09 & $Correct_dayofmonth >= 17 ){$Month_letter = 'X';}
	//	If ( $Correct_month >= 11 & $Correct_dayofmonth >= 01 ){$Month_letter = 'F';}
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
