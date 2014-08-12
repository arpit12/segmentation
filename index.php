<!DOCTYPE HTML>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Dynamically add input fields</title>

<script type="text/javascript" src="jquery-1.10.2.min.js">

function altRows(id){
        if(document.getElementsByTagName){  
                
                var table = document.getElementById(id);  
                var rows = table.getElementsByTagName("tr"); 
                 
                for(i = 0; i < rows.length; i++){          
                        if(i % 2 == 0){
                                rows[i].className = "evenrowcolor";
                        }else{
                                rows[i].className = "oddrowcolor";
                        }      
                }
        }
}
window.onload=function(){
        altRows('alternatecolor');
}


</script>


<style>

body{ font-family:Tahoma, Geneva, sans-serif; color:#000; font-size:11px; margin:0; padding:0; background-color:#06F}

#info{ position:fixed; width:100%; height:20px;-webkit-box-shadow: 0 1px 2px #666;box-shadow: 0 1px 2px #666; top:0; padding:10px; background-color:#F60; color:#FFF; font-size:14px;}

.lessoncup{ margin-top:100px; }


.name{width:400px; height:30px; padding:2px; border-radius:2px; border:solid #0CF 1px; margin-bottom:15px; font-size:19px; outline:none;}


.name2{width:150px; height:30px; padding:2px; border-radius:2px; border:solid #0CF 1px; margin-bottom:15px; font-size:19px; }

</style>

<style type="text/css">
table.altrowstable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #a9c6c9;
        border-collapse: collapse;
}
table.altrowstable th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #a9c6c9;
}
table.altrowstable td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #a9c6c9;
}
.oddrowcolor{
        background-color:#d4e3e5;
}
.evenrowcolor{
        background-color:#c3dde0;
}
</style>

</head>

<body>

<div id="info">Segmentation Assignment </div>


<div class="lessoncup">


<div id="box">
<div align="center">

<?php
$dbhost = 'localhost';
$dbname = 'DemoAccount';

// Connect to test database
$m = new Mongo("ec2-54-84-245-194.compute-1.amazonaws.com");
$db = $m->$dbname;
$data = array();
$res = array();
// select the collection
$collection = $db->DataPoints;
//echo 'Connected successfully';

$action = $_POST["act"];

if (!empty($_POST["filter"])) {

	$filter = $_POST["filter"];

	$string1 = $_POST["string1"];
	
	if($compare == contains ){
	$string1 = ".*$string1./i" ;
	}

	else if($compare == startswith){
	$string1 = "/^$string1/";
	}	

	else
	$string1 = "$string1" ;
	

$data=$collection->find(array('$and' => array(array("act" => $action),array ($filter => $string1) )));

}

	
if (!empty($_POST["input"])) {

        $value = $_POST["input"];

        $range = $_POST["range"];

        if($range == '<' ){
	$range = $range ;
        }

        else if($range == '>'){
        $range = $range ;
        }

        else
        $range = $range ;
// results add operation has having some problem while joining operation..
//$data=$collection->find(array('$and' => array(array("act" => $action),array ($filter => $string1), array('$and'  => array(array( '$gt' => $value )  ) )));

}

//$education = explode(" ", $education);

//$regex = new MongoRegex("/^$education[0]/i");
$res = $data;
//$res=$collection->find(array('$or' => array(array("act" => $action),array ($filter => $string1) ))) ;
//$res=$collection->distinct( "uid", array('$or' => array(array('act' => $action),array ($filter => $string1) ))) ;

#$ages = $db->command(array("distinct" => "DataPoints", "key" => "uid"));

if (!isset($_POST['submit'])) { // if page is not submitted to itself echo the form
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ;?>">

<select id="Actions" name="execution"  placeholder="Input 1" class="name">
<option value="-1">execution </option>

<option value="has executed ">has executed </option>
<option value="has not executed ">has not executed </option></select>
 
<select id="Actions" align = "right" name="act"  placeholder="Input 1" class="name">
<option value="-1">User Action </option>

<option value="clicked on category">clicked on category</option>
<option value="viewed search page Online">viewed search page Online</option>
<option value="online offers loaded">online offers loaded</option>
<option value= "viewed online merchant ">  viewed online merchant </option>                       
<option value= "viewed main_tab_Offers ">viewed main_tab_Offers</option>
<option value= "location obtained ">ocation obtained</option>
<option value= "viewed main_tab_O nline">viewed main_tab_O nline</option>
<option value= "viewed main_tab_Nearby ">viewed main_tab_Nearby </option>
<option value= "clicked deal in home page">clicked deal in home page</option>
<option value= "viewed online deal">viewed online deal</option>
<option value= "like deal">like deal</option>
<option value= "redirected online deal">redirected online deal</option>
<option value= "searched">searched</option>
<option value= "online offer clicked">online offer clicked</option>
<option value= "viewed search page in Store">viewed search page in Store</option>
<option value= "clicked on on online merchant">clicked on on online merchant</option>
<option value= "set location manually">set location manually</option>
<option value= "viewed local merchnan">viewed local merchnan</option>
<option value= "local offer clicked">local offer clicked</option>
<option value= "viewd local deal">viewd local deal</option>
<option value= "redirected local deal clicked on local merchant">redirected local deal clicked on local merchant</option>
<option value= "favorited ">favorited</option></select>

</div>
<div align="center">
<select id="Actions" align = "right" name="filter"  placeholder="Input 1" class="name">
<option value="-1">Filter by Attribute </option>

<option value="query">query</option>
<option value="category">category</option></select>


<select id="Actions" align = "right" name="compare"  placeholder="Input 1" class="name">

<option value="is">is</option>
<option value="contains">contains</option>
<option value="startswith">starts with</option></select>

<input name="string1" type="text" id="name" class="name" placeholder="Input 1">

</br>
</div>


</div>
<div align="center">
<select id="Actions" align = "right" name="results"  placeholder="Input 1" class="name">
<option value="-1">Results</option>

</select>


<select id="Actions" align = "right" name="range"  placeholder="Input 1" class="name">

<option value="<">is less than </option>
<option value=">">is greater than </option>
<option value="1">equal </option></select>


<input name="input" type="text" id="name" class="name" placeholder="Input 1">

</br>
</div>


</br></br>
<div align="center">
<input type="submit" value="Apply" class="name2" name="submit" >
</form>


<?php

} else {
echo "You clicked on....  ".$education."!<br />";
echo '<table class="altrowstable" id="alternatecolor">
<tr>
        <th>Inc. id.. </th><th>Unique IDs</th>
</tr>';

//$retval = $c->distinct($data);
$max_loop=100;

//print_r($data);
//print_r(array_unique($data));
/*
$res=  array();
foreach ($data as $document) {
 	//print_r($document);	
	$res=array_unique($document);
	}

print_r($res);
*/

foreach ($res as $document)
{
	
	if($i==$max_loop)
	break;

  	echo "<tr>";
  	echo "<td>" . ++$i . "</td>";
  	echo "<td>" . $document['uid'] . "</td>";
  	echo "</tr>";

}

echo "</table>";

}
?>

                                                                                                                                                      152,0-1       Bot

