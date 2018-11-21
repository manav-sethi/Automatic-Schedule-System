<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png">
    <link rel="manifest" href="/manifest.json">
<meta name="mobile-web-app-capable" content="yes">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
    
    body {
        background-image: url("bg.jpg"), linear-gradient(to bottom, rgba(0,0,0,0.65) 0%,rgba(0,0,0,0.65) 18%,rgba(0,0,0,0) 100%);
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
    }
    
    table {
        
         border: 1px solid gray;
    }
    
    a{
        color: white;
    }
    a: hover{
        color: white;
    }
    
    #show {
        
        background-color: white;
        border-radius: 5px;
    }
    
	select,input {
		color:black;
	}
    
    
    
    </style>
</style>

</head>
<body>
    
   <div class="alert alert-info">
       For easiest accessibility, tap 
  <strong>Menu > Add to Homescreen</strong>
</div>

<!--<div class="alert alert-success alert-dismissible" style="margin:0 auto;align:center; width: 75vw; height: 25vh;">-->
<!--    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
<!--    <strong>Menu > Add 2 Homescreen</strong>-->
<!--    <br/>4 fastest accessibility-->
<!--  </div>-->


<?php
$flag=0;

$date = date_default_timezone_set('Asia/Kolkata');
$day = date('l');

echo "<b>Automated Schedule System: B.Tech IT 7th Sem: </b><br/>";


$tom='';

switch($day){
case 'Monday' : { $day='mon'; $tom='tue'; break;}
case 'Tuesday' : { $day='tue'; $tom='wed'; break;}
case 'Wednesday' : { $day='wed'; $tom='thu';break;}
case 'Thursday' : { $day='thu'; $tom='fri';break;}
case 'Friday' : { $day='fri'; $tom='sat';break;}
case 'Saturday' : { $day='sat'; $tom='sun';break;}
case 'Sunday' : { $day='sun'; $tom='mon';break;}
default : {
	$day=null; echo "Err!!! Error in getting today's day. Pls refresh";} }


$con=mysqli_connect("localhost",/*"id6911228_*/"root","",/*id6911228_*/"time_table");
// Check connection
if (mysqli_connect_errno())
{
echo "Urghhh!! Some error ocurred in fetching your schedule. Pls refresh B.Tech 7th Sem IT YMCAian" . mysqli_connect_error();
}

start: 

$l1_s="09:15";
$l1_e=$l2_s="10:10";
$l2_e=$l3_s="11:05";
$l3_e=$l4_s="12:00";
$l4_e=$lunch_s="12:55";
$lunch_e=$l5_s="13:50";
$l5_e=$l6_s="14:45";
$l6_e=$l7_s="15:40";
$l7_e=$l8_s="16:35";
$eight="08:00";
$end_time="17:30";

$current_time=date("H:i");

$current_time_ml= DateTime::createFromFormat('h:i a', $current_time);

$l1= DateTime::createFromFormat('h:i a', $l1_s);
$l2= DateTime::createFromFormat('h:i a', $l2_s);
$l3= DateTime::createFromFormat('h:i a', $l3_s);
$l4= DateTime::createFromFormat('h:i a', $l4_s);
$l5= DateTime::createFromFormat('h:i a', $l5_s);
$l6= DateTime::createFromFormat('h:i a', $l6_s);
$l7= DateTime::createFromFormat('h:i a', $l7_s);
$l8= DateTime::createFromFormat('h:i a', $l8_s);
$num_lecture=-2;
$next_lecture=0;

//8am to 9:15am
if($current_time>$eight && $current_time<$l1_s) {
	$num_lecture=-1; 
	$next_lecture=0;
}

//condition for 1st lecture

if($current_time>=$l1_s && $current_time<$l2_s) {
	$num_lecture=0; 
	$next_lecture=1;
}

//2nd lecture
if($current_time>=$l2_s && $current_time<$l3_s) {
	$next_lecture=1;$num_lecture=2; 
}
//3rd lecture
if($current_time>=$l3_s && $current_time<$l4_s) {
	$num_lecture=2; $next_lecture=3;
}
//4th lecture
if($current_time>=$l4_s && $current_time<$l4_e) {
	$num_lecture=3; $next_lecture=4;
}

//5th lecture

if($current_time>=$l5_s && $current_time<$l6_s) {
	$num_lecture=5; $next_lecture=6;
}
//6th lecture
if($current_time>=$l6_s && $current_time<$l7_s) {
	$num_lecture=6; $next_lecture=7;
}
//7th lecture
if($current_time>=$l7_s && $current_time<$l8_s) {
	$num_lecture=7; $next_lecture=8;
}
//8th lecture
if($current_time>=$l8_s && $current_time<$end_time) {
	$num_lecture=8; $next_lecture=9;
}

//end
if($current_time>=$end_time && $current_time<"23:59"){
	$num_lecture=10;$next_lecture=10;
	}
	
	

$six_pm="17:45";



echo "<br/>It's ".date("h:i A")."!<br/>";
//condition for lunch
if($current_time>=$lunch_s && $current_time<$lunch_e){
	
echo "LUNCH BREAK ";	
$next_lecture=5;
$num_lecture=4;
goto def;
	
}
else{
echo "Current lecture: "; }

	if($num_lecture==-1 || -2){
	echo " ";
	goto def;
}

if($num_lecture==10){
	echo " ";
	goto def;
}



$result_lecture= mysqli_query($con, "SELECT $day FROM time_table LIMIT $num_lecture ,1");
while($row_l = mysqli_fetch_array($result_lecture)) {
	echo $row_l["$day"];
	}
	
	


	
def:
echo "<br/>Next lecture: ";

	if($next_lecture==9){
	echo "छुटटी  ! ! :D  <i class='em em-grin'></i>! ";
	goto abc;
}

if($next_lecture==10 && $current_time>="12:00"){
	
	$next_lecture=0;
	
}

$result_lecture_next= mysqli_query($con, "SELECT $day FROM time_table LIMIT $next_lecture ,1");
while($row_n = mysqli_fetch_array($result_lecture_next)) {
	echo $row_n["$day"];
	}

if($next_lecture==0){
	echo " (Starts at 09:15)";
}

abc:
  
if($current_time>=$six_pm && $current_time<"12:00")
{ echo "<br/><br/>Hope today went good :D";
    if($tom!='sat' && $tom!='sun'){
        echo "<br/><br/>Schecdule for tomorrow ($tom) <br/>";
    $resulttomtt= mysqli_query($con, "SELECT $tom FROM time_table");
    
    echo "<table border='1' >
<tr>
<th>$l1_s-$l2_s</th>
<th>$l2_s-$l3_s</th>
<th>$l3_s-$l4_s</th>
<th>$l4_s-$l4_e</th>

<th style=''>Lunch break</th>

<th>$l5_s-$l6_s</th>
<th>$l6_s-$l7_s</th>
<th>$l7_s-$l8_s</th>
<th>$l8_s-$end_time</th>
</tr>";
    
    while($rowtt = mysqli_fetch_array($resulttomtt)) {
        
        echo "<td style='padding:5px; text-align:center;'>" ; echo "<b>".$rowtt["$tom"]."</b>"; 

switch($rowtt["$tom"]) {
	
	case 'ST' : echo "<br/>Ms. Jyotsana <br/>LT-04"; break;
	case 'SPM' : echo "<br/>Dr. Rashmi Popli<br/>LT-04"; break;
	case 'DOS' : echo "<br/>Dr. Deepika Punj<br/>LT-04";break;
	case 'OOSD' : echo "<br/>Ms. Aayushi<br/>LT-04";break;
	case 'ON' : echo "<br/>Ms. Shilpi<br/>LT-04"; break;
	case 'ACST' :echo "<br/>Ms. Raveena<br/>LT-04"; break;
	
	case 'SEMINAR' : echo "<br/>G1: Dr. Shilpa<br/>G2: Dr. Parul Gupta<br/>CE Labs"; break;
	case 'LAB G1 AJP, G2 PROJECT' : echo "<br/>G1: Ms. Raveena<br/>G2: Dr. Atul<br/>CE Labs"; break;
	case 'LAB G1 PROJECT, G2 PROJECT' : echo "<br/>G1: Dr. Manjeet<br/>G2: Dr. Deepika Punj<br/>Ms. Aayushi<br/>CE Labs"; break;
	case 'LAB G1 PROJECT, G2 AJP' : echo "<br/>G1: Dr. Parul Tomar<br/>G2: <br/>CE Labs"; break;
	

	
	
}




		echo "</td>";
	
	} 
        
    }
	else { echo "<br/><br/>Yay! holiday tomorrow!!<br/>";}
    
}    
    
    
    
    
 else /*if($current_time<$six_pm)*/ {   
    
$result = mysqli_query($con,"SELECT $day FROM time_table");

if ($day=='sat' || $day=='sun' || $day==null) {goto skip;}

else {echo"<br/><br/>Schedule for today ($day)"; }


echo "<table border='1' >
<tr>
<th>$l1_s-$l2_s</th>
<th>$l2_s-$l3_s</th>
<th>$l3_s-$l4_s</th>
<th>$l4_s-$l4_e</th>

<th style=''>Lunch break</th>

<th>$l5_s-$l6_s</th>
<th>$l6_s-$l7_s</th>
<th>$l7_s-$l8_s</th>
<th>$l8_s-$end_time</th>
</tr>";
while($row = mysqli_fetch_array($result))
{

echo "<td style='padding:5px; text-align:center;'>" ; echo "<b>".$row["$day"]."</b>" ;

switch($row["$day"]) {
case 'ST' : echo "<br/>Ms. Jyotsana <br/>LT-04"; break;
	case 'SPM' : echo "<br/>Dr. Rashmi Popli<br/>LT-04"; break;
	case 'DOS' : echo "<br/>Dr. Deepika Punj<br/>LT-04";break;
	case 'OOSD' : echo "<br/>Ms. Aayushi<br/>LT-04";break;
	case 'ON' : echo "<br/>Ms. Shilpi<br/>LT-04"; break;
	case 'ACST' :echo "<br/>Ms. Raveena<br/>LT-04"; break;
	
	case 'SEMINAR' : echo "<br/>G1: Dr. Shilpa<br/>G2: Dr. Parul Gupta<br/>CE Labs"; break;
	case 'LAB G1 AJP, G2 PROJECT' : echo "<br/>G1: Ms. Raveena<br/>G2: Dr. Atul<br/>CE Labs"; break;
	case 'LAB G1 PROJECT, G2 PROJECT' : echo "<br/>G1: Dr. Manjeet<br/>G2: Dr. Deepika Punj<br/>Ms. Aayushi<br/>CE Labs"; break;
	case 'LAB G1 PROJECT, G2 AJP' : echo "<br/>G1: Dr. Parul Tomar<br/>G2: <br/>CE Labs"; break;
	
	
}



 echo  "</td>";

}

echo "</table>"; 
     
 }

//if(isset($_POST['day_list'])){
//goto skip2;	
//	}

//if($flag){
  //  goto skip2;
    
//}

skip: 
    
    switch($day){

case 'Saturday' : { echo "<br/>Chill, no class! Enjoy.<br/>"; break;}
case 'Sunday' : { echo "<br/>Chill!  see u 2morrow<br/>"; break;}
default : {echo "";} }
    

echo "<br/><br/><a href='https://play.google.com/store/apps/details?id=com.tencent.ig&hl=en_IN' target='_blank'>chuck schedule let's play pubg</a>";

echo "<br/><br/><br/> Show me schedule of: ";?>

<form method="post" action=""> <?php echo "

<select name = 'day_list' size = '1' id='day_list'>
<option value = 'tom'>Tomorrow ($tom)</option>
<option value = 'mon'>Monday</option>
<option value = 'tue'>Tuesday</option>
<option value = 'wed'>Wednesday</option>
<option value = 'thu'>Thursday</option>
<option value = 'fri'>Friday</option>
<option value = 'sat'>Saturday, holiday!forgot?</option>
<option value = 'sun'>Sunday, seriously?</option>
</select>

<input type='submit' value='Show' id='show'> </input>

</form> 

<script>
document.getElementById('day_list').value='"; echo $_POST['day_list'];
echo "';
</script>";

if(isset($_POST['day_list']) && !empty($_POST['day_list'])){ 

$day_s = $_POST['day_list'];
if($day_s=='tom'){
    
    switch($day){
        case 'mon': $day_s='tue'; break;
        case 'tue': $day_s='wed'; break;
        case 'wed': $day_s='thu'; break;
        case 'thu': $day_s='fri'; break;
        case 'fri': $day_s='sat'; break;
        case 'sat': $day_s='sun'; break;
        case 'sun': $day_s='mon'; break;
        default : echo "error in getting date! pls refresh";
        
    }
    
}

switch($day_s){

case 'sat' : { echo "<br/>Saturday? ehh?<br/>"; break;}
case 'sun' : { echo "<br/>Sunday? seriously?<br/>"; break;}
default : {
    echo "<br/><br/>Schedule for $day_s : <br/>";
    
  $resultt = mysqli_query($con,"SELECT $day_s FROM time_table");

echo "<table border='1' >
<tr>
<th>$l1_s-$l2_s</th>
<th>$l2_s-$l3_s</th>
<th>$l3_s-$l4_s</th>
<th>$l4_s-$l4_e</th>

<th style=''>Lunch break</th>

<th>$l5_s-$l6_s</th>
<th>$l6_s-$l7_s</th>
<th>$l7_s-$l8_s</th>
<th>$l8_s-$end_time</th>
</tr>";
while($roww = mysqli_fetch_array($resultt))
{

echo "<td style='padding:5px; text-align:center;'>" ; echo "<b>".$roww["$day_s"]."</b>";  

switch($roww["$day_s"]) {
	case 'ST' : echo "<br/>Ms. Jyotsana <br/>LT-04"; break;
	case 'SPM' : echo "<br/>Dr. Rashmi Popli<br/>LT-04"; break;
	case 'DOS' : echo "<br/>Dr. Deepika Punj<br/>LT-04";break;
	case 'OOSD' : echo "<br/>Ms. Aayushi<br/>LT-04";break;
	case 'ON' : echo "<br/>Ms. Shilpi<br/>LT-04"; break;
	case 'ACST' :echo "<br/>Ms. Raveena<br/>LT-04"; break;
	
	case 'SEMINAR' : echo "<br/>G1: Dr. Shilpa<br/>G2: Dr. Parul Gupta<br/>CE Labs"; break;
	case 'LAB G1 AJP, G2 PROJECT' : echo "<br/>G1: Ms. Raveena<br/>G2: Dr. Atul<br/>CE Labs"; break;
	case 'LAB G1 PROJECT, G2 PROJECT' : echo "<br/>G1: Dr. Manjeet<br/>G2: Dr. Deepika Punj<br/>Ms. Aayushi<br/>CE Labs"; break;
	case 'LAB G1 PROJECT, G2 AJP' : echo "<br/>G1: Dr. Parul Tomar<br/>G2: <br/>CE Labs"; break;
	

	
	
}



echo "</td>";

}

echo "</table><br/><br/>";
  
    
    
    
    
    
    

} }


 }
 
 
 echo "<a href='r_bug.php'>Report problem/bug</a>";
 
 
skip2: 
mysqli_close($con);
?>

<div align=center><img src='https://www.counter12.com/img-CZZb2CCaZ7zAbW7W-79.gif' border='0' alt='Number of website visits' style="visibility:hidden;">
<script type='text/javascript' src='https://www.counter12.com/ad.js?id=CZZb2CCaZ7zAbW7W'></script>
</div>


<script>
addToHomescreen();

  if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register('service-worker.js')
      .then(function(reg){
        console.log("Yes, it did.");
      }).catch(function(err) {
        console.log("No it didn't. This happened: ", err)
      });
  }
  
  
  (function (global) {

	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };
	
	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {
        
		noBackPlease();

		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };
		
    };

})(window);



  
</script>
</body>
</html>