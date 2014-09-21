<?php
include 'mysql_connect.php';

$qt=mysql_query("SELECT * FROM dx ORDER BY date ASC");
header ("Content-type: image/jpg");

$_POST["width"]=3100;
$_POST["xgap"]=2;
$_POST["height"]=150;
$_POST["yoffset"]=50;
$_POST["zoom"]=6;

$width = $_POST["width"];
$x_gap = $_POST["xgap"];
$height = $_POST["height"];
$yoff = $_POST["yoffset"];
$zoom = $_POST["zoom"];

//$x_gap=2; // The gap between each point in y axis 
$x_max=$x_gap*$width; // Maximum width of the graph or horizontal axis
$y_max=($height-$yoff)*$zoom; // Maximum hight of the graph or vertical axis
// Above two variables will be used to create a canvas of the image//


$im = @ImageCreate ($x_max, $y_max)
or die ("Cannot Initialize new GD image stream");
$background_color = ImageColorAllocate ($im, 255, 255, 255);
$text_color = ImageColorAllocate ($im, 233, 14, 91);
$graph_color = ImageColorAllocate ($im,25,25,25);
$grid_color = ImageColorAllocate ($im,221,221,221);
$green_color = ImageColorAllocate ($im,8,120,88);
$lightg_color = ImageColorAllocate ($im,8,200,8);
$red_color = ImageColorAllocate ($im,200,8,8);


$x1=0;
$y1=0;
$first_one="yes";
$cnt=0;
//draw grid
for($i = 1; $i < $y_max; $i+=10){
	imageline($im,1, $i,$x_max,$i,$grid_color);
	ImageString($im,2,1,$i-16,intval((($y_max-$i)/$zoom)+$yoff),$graph_color);
}
while($nt=mysql_fetch_array($qt))
{
	//echo "$nt[date], $nt[close]<br>";
	$x2=$x1+$x_gap; // Shifting in X axis
	$y2=$y_max-(($nt['close']-$yoff)*$zoom); // Coordinate of Y axis
	//ImageString($im,2,$x2,$y2,$nt['date'],$graph_color); 
	if($first_one=="no")
		imageline ($im,$x1, $y1,$x2,$y2,$text_color); // Drawing the line between two points
	$x1=$x2; // Storing the value for next draw
	$y1=$y2;
	$first_one="no"; // Now flag is set to allow the drawing
	if($cnt%40===0){
		imageline($im,$x2, 1,$x2,$y_max,$grid_color);
		ImageString($im,2,$x2-30,$y_max-16,$nt['date'],$graph_color);
	}
	$array[$cnt] = $nt['close'];
	$array[$cnt."D"] = $nt['date'];
	$cnt+=1;
}
$total = $cnt-1;
$cnt = 0;
$gain = 0;
$loss = 0;
do{
	$avg = 0;
	$sum = 0;
	$num = 0;
	$dev = 0;
	$pre = 0;
	$trend = 0;
	for($i = 0; $i < 5; $i+=1){
		$sum+=$array[$cnt];
		$num+=1;
		$avg=$sum/$num;
		$dev=abs($array[$cnt]-$avg);
		$cnt+=1;
	}
	do{
		$sum+=$array[$cnt];
		$num+=1;
		$avg=$sum/$num;
		$dev=abs($array[$cnt]-$avg);
		if(($dev/$avg)>.01)
			$trend += 1;
		else
			$trend = 0;
		$cnt+=1;
	}while($trend<5 and $cnt<($total));
	
	$x1=$x_gap*($cnt-5);
	$y1=$y_max-($array[$cnt-5]+10-50)*$zoom;
	$x2=$x_gap*($cnt);
	$y2=$y_max-($array[$cnt]+10-50)*$zoom;
	imageline ($im,$x1,$y1,$x2,$y2,$green_color);
	$m=($y2-$y1)/$x_gap;
	$b=$y1-$m*$x1;
	$x3=$x1-20;
	$y3=$x3*$m+$b;
	$x4=$x2+20;
	$y4=$x4*$m+$b;
	if($m<0)
		imageline ($im,$x1,$y1,$x2,$y2,$lightg_color);
	else
		imageline ($im,$x1,$y1,$x2,$y2,$red_color);
		// imageline ($im,$x3,$y3,$x4,$y4,$lightg_color);
	$lead = 3;
	
	if($cnt+$lead<$total){
		$sum = 0;
		$num = 0;
		for($i = 0; $i <= $lead; $i+=1){			//take avg for the next week ($lead)
			$sum += $array[$cnt+$i];
			$num += 1;
		}
		$avg = $sum/$num;
		$profit = $avg-$array[$cnt];
		$profit = number_format($profit, 2);
		if(($m<0 and $profit>=0)or($m>=0 and $profit<0)){
			ImageString($im,2,$x2,$y2+120,$profit,$lightg_color);
			$gain+=1;
		}else{
			ImageString($im,2,$x2,$y2+120,$profit,$red_color);
			$loss+=1;
		}
	}
}while($cnt<$total-5);

if($loss<>0)
	$percent = $gain . " gains, " . $loss . " losses.";
else
	$percent = "All Gains";
ImageString($im,2,50,$y_max-50,$percent,$red_color);

ImageJPEG ($im);
mysql_close($con);
?>