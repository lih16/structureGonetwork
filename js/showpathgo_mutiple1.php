<!DOCTYPE HTML> 
<?php

function arrayToXml($array, $rootElement = null, $xml = null) {
	$_xml = $xml;
	if ($_xml === null) {
		$_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root><root/>');
	}
	foreach ($array as $k => $v) {
		if (is_array($v)) { //nested array
			arrayToXml($v, $k, $_xml->addChild($k));
		} 
		else {
        		$_xml->addChild($k, $v);
			}
		}
		return $_xml->asXML();
}

function json_validate($string) {
        if (is_string($string)) {
            @json_decode($string);
            return (json_last_error() === JSON_ERROR_NONE);
        }
        return false;
 }
 
function cmd_exec($cmd, &$stdout, &$stderr)
{
    $outfile = tempnam(".", "cmd");
    $errfile = tempnam(".", "cmd");
    $descriptorspec = array(
        0 => array("pipe", "r"),
        1 => array("file", $outfile, "w"),
        2 => array("file", $errfile, "w")
    );
    $proc = proc_open($cmd, $descriptorspec, $pipes);
    if (!is_resource($proc)) return 255;
    fclose($pipes[0]);   
    $exit = proc_close($proc);
    $stdout = file($outfile);
    $stderr = file($errfile);
    unlink($outfile);
    unlink($errfile);
    return $exit;
}
?>

  <html>
  <head>
    <meta charset="utf-8">
    <title>Gene Pathway</title>
	<link href="css/simple-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/screen.css" media="screen" />
    <link rel="stylesheet" href="css/jquery.treetable.css" />
    <link rel="stylesheet" href="css/jquery.treetable.theme.default.css" />
	<script type="text/javascript" src="js/jquery/jquery-1.3.2.js"></script>
<style>
[class^=slider] { display: inline-block; margin-bottom: 30px; }
.output { color: #888; font-size: 14px; padding-top: 1px; margin-left: 5px; vertical-align: top;}
h1 { font-size: 20px; }
h2 { clear: both; margin: 0; margin-bottom: 5px; font-size: 16px; } p { font-size: 15px; margin-bottom: 30px; }
h2:first-of-type { margin-top: 0; }
span.output {font-size:120%;color:gray;}


body {
    background:#eee;
    margin:0;
    padding:0;
}
.table,th,td{
border: 1px solid green;
}
.th{
/*background:darkgreen;*/
color:white;
}
.td{
height:50px;
text-align:center;
}
.container{
width: 95%;
min-height:100%;
position:relative;
height: auto;
padding: 1px;
margin: 20px;

}

.resultsTable {
	margin:0px;padding:0px;
	width:90%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #3f7f00;
	
	-moz-border-radius-bottomleft:1px;
	-webkit-border-bottom-left-radius:1px;
	border-bottom-left-radius:1px;
	
	-moz-border-radius-bottomright:1px;
	-webkit-border-bottom-right-radius:1px;
	border-bottom-right-radius:1px;
	
	-moz-border-radius-topright:1px;
	-webkit-border-top-right-radius:1px;
	border-top-right-radius:1px;
	
	-moz-border-radius-topleft:1px;
	-webkit-border-top-left-radius:1px;
	border-top-left-radius:1px;
}.resultsTable table{
    border-collapse: collapse;
        border-spacing: 0;
	width:1000px;
	height:100%;
	margin:0px;padding:0px;
}.resultsTable tr:last-child td:last-child {
	-moz-border-radius-bottomright:1px;
	-webkit-border-bottom-right-radius:1px;
	border-bottom-right-radius:1px;
}
.resultsTable table tr:first-child td:first-child {
	-moz-border-radius-topleft:1px;
	-webkit-border-top-left-radius:1px;
	border-top-left-radius:1px;
}
.resultsTable table tr:first-child td:last-child {
	-moz-border-radius-topright:1px;
	-webkit-border-top-right-radius:1px;
	border-top-right-radius:1px;
}.resultsTable tr:last-child td:first-child{
	-moz-border-radius-bottomleft:1px;
	-webkit-border-bottom-left-radius:1px;
	border-bottom-left-radius:1px;
}.resultsTable tr:hover td{
	
}
.resultsTable tr:nth-child(odd){ background-color:#d4ffaa; }
.resultsTable tr:nth-child(even)    { background-color:#ffffff; }.resultsTable td{
	vertical-align:middle;
	
	
	border:1px solid #3f7f00;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:10px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.resultsTable tr:last-child td{
	border-width:0px 1px 0px 0px;
}.resultsTable tr td:last-child{
	border-width:0px 0px 1px 0px;
}.resultsTable tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.resultsTable tr:first-child td{
		background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );
	background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);

	background-color:#5fbf00;
	border:0px solid #3f7f00;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:10px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.resultsTable tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );
	background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);

	background-color:#5fbf00;
}
.resultsTable tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.resultsTable tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>  
</head>
<body>  

<?php
ini_set('max_execution_time', 10000);
	$outputvalue="";
	$data_string="";
	$json="";

?>
<div class="container">
<!--h3><font face="Sans-serif" size="6px">Gene List  Mapping to Pathway</font></h3-->
<input type="text" data-slider-range="0,0.9" data-slider="true" value="0.9" data-slider-highlight="true">
<div style="font-size:14px;border:0px solid red; text-align:left">

<form name="geneform" id="geneform" method="post" action="showpathwes.php"><center>

<div name="export" id="export" style="font-size:14px;border:0px solid green; text-align:left">

</div>
<div style="width:95%;padding-left:20px;height:auto;text-align:center;margin:10px;border:0px solid blue">       
  <div id="flot-placeholder" style="border:0px solid red; text-align:left;width:700px;font-size:8px;height:200px;"></div>  </div>
<div id="aftergraph" style="border:1px solid grey">
<div ><table   align="center" id="example-advanced" width="100%" style="border-collapse:collapse;width:1000px;">
        <caption><font size="4px" color="green">
 
   <a href="#" onclick="jQuery('#example-advanced').treetable('expandAll'); return false;">Expand all</a>
          <a href="#" onclick="jQuery('#example-advanced').treetable('collapseAll'); return false;">Collapse all</a>
	</font>	  
        </caption>
        <thead>
          <tr>
            <td><a id="plist" href="#" onclick="sort(1);return false;">Pathway List<img src="images/d.png" width="16px;" height="16px;"></a></td>
            <td><a id="pdatabase" href="#" onclick="sort(2);return false;">Pathway Databases<img src="images/d.png" width="16px;" height="16px;"></a></td>
            <td><a id="pvalueindex" href="#" onclick="sort(3);return false;">P-value/Number of Genes<img src="images/d.png" width="16px;" height="16px;"></a></td>
          </tr>
        </thead>
        <tbody>
		
<?php
 $genename="";
 $mysort=3;
 $mythreashold=!empty($_GET['tpvalue'] )? $_GET['tpvalue']  : 1;
 $uid=$_GET['uid'];
 
 
 $tempfolder="golinktemp/";
 $directories=$tempfolder.$uid."/";

 //if((isset($_POST["myjson"])&& !empty($_POST["myjson"])))
 {
        $jsonsortarray=array();
        $jsonarray=array();
        $mysortarray=array();
        
		$djson= file_get_contents($directories.'gopathway.txt');//stripslashes($_POST["myjson"]);
		$json=$djson;
		$djson = preg_replace('~[\r\n]+~', '', $djson);
		$vdjson  =$djson;//json_encode($djson);
		$jsonfile = fopen("jsonformat.txt", "w");
		fwrite($jsonfile, $vdjson);
		fclose($jsonfile);
		
		
		$J=json_decode($vdjson,true);
		$xml = arrayToXml($J, '<pathwayanalysis></pathwayanalysis>');
		foreach ($J as $j) {
			foreach($j as $jj)
			{
			 if( $jj["pvalue"]<=$mythreashold)
			 {
			     switch($mysort) {
					case 1:
						array_push($mysortarray,$jj["pathname"]);
						
						break;
					case 2:
						array_push($mysortarray,$jj["sourcename"]);
					    break;
					case 3:
						array_push($mysortarray,$jj["pvalue"]);
					    break;
				}
				array_push($jsonarray,$jj);
			}
			}
	    }
		////here need sort jsonarray.
		switch($mysort) {
			case 1:
				sort($mysortarray,SORT_STRING);
				break;
			case 2:
				sort($mysortarray,SORT_STRING);
				break;
			case 3:
				sort($mysortarray,SORT_NUMERIC);
				break;
		}
		$num=count($mysortarray);
		$checkexist=array();
		
		////////////
		for($i=0;$i<$num;++$i)
		{
		   $found=0;
		   for($j=0;$j<count($jsonarray);++$j)
		   {
		      if (in_array($j, $checkexist)) {
                continue;
              }
			  switch($mysort) {
				 case 1:
				    if($mysortarray[$i]==$jsonarray[$j]["pathname"])
					{
					   $found=1;
					   array_push($jsonsortarray,$jsonarray[$j]);
					   array_push($checkexist,$j);
					   //unset($jsonarray[$j]);
					}
					break;
				 case 2:
					if($mysortarray[$i]==$jsonarray[$j]["sourcename"])
					{
					   $found=1;
					   array_push($jsonsortarray,$jsonarray[$j]);
					   array_push($checkexist,$j);
					   //unset($jsonarray[$j]);
					}
					break;
				 case 3:
					if($mysortarray[$i]==$jsonarray[$j]["pvalue"])
					{
					   $found=1;
					   array_push($jsonsortarray,$jsonarray[$j]);
					   array_push($checkexist,$j);
					   //unset($jsonarray[$j]);
					}
					break;
		      }
			  if($found==1)
			  {
			     break;
			  }
			  
			}
        }
		
		$downloadfile = fopen("Pathwaygenefile.txt", "w");
		for($i=0;$i<count($jsonsortarray);$i++)
		{
		    
			 $geneset=$jsonsortarray[$i]["genes"];
			 $numofgene=count($geneset);
			 $sourcename=$jsonsortarray[$i]["sourcename"];
			 $pathwayname=$jsonsortarray[$i]["pathname"];
			 $pathid=$jsonsortarray[$i]["pathid"];
			
			 $pvalue=$jsonsortarray[$i]["pvalue"];
			 $wholeset=$jsonsortarray[$i]["wholeset"];
			 $link="";
			 $genecount=$jsonsortarray[$i]["M"]; 
			 switch($sourcename) {
				case "BIOCYC":
					$link="<a href=http://www.ncbi.nlm.nih.gov/biosystems/?term=$pathid target='_blank'>$sourcename</a>";
					
					break;
				case "KEGG":
					$link= "<a href=http://www.kegg.jp/kegg-bin/show_pathway?$pathid  target='_blank'>$sourcename</a>";
					
					break;
				case "Pathway Interaction Database":
					
					$link= "<a href=http://pid.nci.nih.gov/search/intermediate_landing.shtml?molecule=$genename&Submit=Go target='_blank'>$sourcename</a>";
					break;
				case "REACTOME":
					$link= "<a href=http://www.reactome.org/cgi-bin/search2?OPERATOR=ALL&QUERY=$pathid  target='_blank'>$sourcename</a>";
					break;
				case "WikiPathways":
					$link= "<a href=http://wikipathways.org//index.php?query=$genename&species=Homo+sapiens&title=Special%3ASearchPathways&doSearch=1&ids=&codes=&type=query target='_blank'>$sourcename</a>";
					break;
					default:
		              $link=$sourcename;
			   }
               $pvaluelink="<a href=http://iudd.org/pathway/show.php?gene=$wholeset!$genecount target='_blank'>$pvalue</a>";
					echo	"<tr data-tt-id=".$i."><td><span class='folder'>".$pathwayname ."</span></td><td>".$link."</td><td>".$pvaluelink."</td></tr>";
			        ///
					fwrite($downloadfile, "pathway name\t".$pathwayname."\tpvalue:".$pvalue."\n");
                    ///					
					for($j=0;$j<$numofgene;$j++)
		            {
		               $geneidlink="<a href=http://www.genecards.org/index.php?path=/Search/Symbol/".$geneset[$j]['name']." target='_blank'>".$geneset[$j]['id']."</a>";
			           echo  "<tr data-tt-id=".$i."-".$j." data-tt-parent-id=".$i."><td><span class='file'>".$geneset[$j]["name"]."</span></td><td>".$geneidlink."</td><td>".$j."</td></tr>";
			           //////
					     fwrite($downloadfile, "\tgene name:\t".$geneset[$j]["name"]."\n");
                       //////					   
		            }
			
		}
		fclose($downloadfile);
		echo "<a href=\"Pathwaygenefile.txt\">Download</a>";
 }
 
	
?>
        </tbody>
      </table></div>
	  <?php
	  echo "<textarea style='display:none;' name='myjson' id='myjson' rows='10' cols='50'>".$json."</textarea>";
	  
	 
	  
	  ?>
	  <input type="hidden" name="passjson" id="passjson" value="<?php echo $data_string; ?>" >
	  <input type="hidden" name="sort" id="sort">
<script src="js/jquery.js"></script>
    <script src="js/jquery.ui.core.js"></script>
    <script src="js/jquery.ui.widget.js"></script>
    <script src="js/jquery.ui.mouse.js"></script>
    <script src="js/jquery.ui.draggable.js"></script>
    <script src="js/jquery.ui.droppable.js"></script>
    <script src="js/jquery.treetable.js"></script>
	<script language="javascript" type="text/javascript" src="jslib/jquery.flot.js"></script> 
    <script language="javascript" type="text/javascript" src="jslib/jquery.flot.navigate.js"></script> 
	
	
	<script src="js/simple-slider_test.js"></script>
	 
   
    <script>
	var sortindex=[];
	sortindex[0]=true;
	sortindex[1]=true;
	sortindex[2]=true;
	sortindex[3]=true;
	
	var uid="<?php echo $uid;?>";
	//var pvalue;
	var p_value;
	var treetableobj;
	function sortJson(element, prop, propType, asc) {
  switch (propType) {
    case "int":
      element = element.sort(function (a, b) {
        if (asc) {
          return (parseInt(a[prop]) > parseInt(b[prop])) ? 1 : ((parseInt(a[prop]) < parseInt(b[prop])) ? -1 : 0);
        } else {
          return (parseInt(b[prop]) > parseInt(a[prop])) ? 1 : ((parseInt(b[prop]) < parseInt(a[prop])) ? -1 : 0);
        }
      });
      break;
	 case "float":
	  element = element.sort(function (a, b) {
        if (asc) {
          return (parseFloat(a[prop]) > parseFloat(b[prop])) ? 1 : ((parseFloat(a[prop]) < parseFloat(b[prop])) ? -1 : 0);
        } else {
          return (parseFloat(b[prop]) > parseFloat(a[prop])) ? 1 : ((parseFloat(b[prop]) < parseFloat(a[prop])) ? -1 : 0);
        }
      });
      break;
	  
	  
    default:
      element = element.sort(function (a, b) {
        if (asc) {
          return (a[prop].toLowerCase() > b[prop].toLowerCase()) ? 1 : ((a[prop].toLowerCase() < b[prop].toLowerCase()) ? -1 : 0);
        } else {
          return (b[prop].toLowerCase() > a[prop].toLowerCase()) ? 1 : ((b[prop].toLowerCase() < a[prop].toLowerCase()) ? -1 : 0);
        }
      });
  }
}
	function sortJsonObj(obj){
		/*$.each( obj, function( key, value ) {
			//alert(key+":"+value);
			$.each( value,function(key1,value1){
				//alert(key1+":"+value1);
			});
		
		});*/
	}
	function getLink(sourename,pathid){
		 var link;
		  
		 switch(sourename) {
				case "BIOCYC":
					link="<a href=http://www.ncbi.nlm.nih.gov/biosystems/?term="+pathid+" target='_blank'>"+sourename+"</a>";
					
					break;
				case "KEGG":
					link= "<a href=http://www.kegg.jp/kegg-bin/show_pathway?"+pathid+"  target='_blank'>"+sourename+"</a>";
					
					break;
				case "Pathway Interaction Database":
					
					link= "<a href=http://pid.nci.nih.gov/search/intermediate_landing.shtml?molecule=genename&Submit=Go target='_blank'>"+sourename+"</a>";
					break;
				case "REACTOME":
				   
					link= "<a href=http://www.reactome.org/cgi-bin/search2?OPERATOR=ALL&QUERY="+pathid+"  target='_blank'>"+sourename+"</a>";
					break;
				case "WikiPathways":
					link= "<a href=http://wikipathways.org//index.php?query=TP53&species=Homo+sapiens&title=Special%3ASearchPathways&doSearch=1&ids=&codes=&type=query target='_blank'>"+sourename+"</a>";
					break;
				default:
		              link=sourcename;
			   }
			   return link;
			 
	}
	function displayTreetable(obj){
		var html="";
		var i=0;
		$.each( obj, function( key, value ) {
			i=key;
		
			var sourcename=value["sourcename"];
			var pathid=value["pathid"];
			var pathwayname=value["pathname"];
			
			var link=getLink(sourcename,pathid);
			
			var wholeset=value["wholeset"];
			var genecount=value["M"];
			var geneobj=value["genes"];
			var pvalue=value["pvalue"];
			var pvaluelink="<a href=http://iudd.org/pathway/show.php?gene="+wholeset+"!"+genecount+" target='_blank'>"+pvalue+"</a>";
			html=html+"<tr data-tt-id="+i+"><td><span class='folder'>"+pathwayname+"</span></td><td>"+link+"</td><td>"+pvaluelink+"</td></tr>";
			var j=0;
			$.each( geneobj, function( index, geneset ){
		         
					   j=index;
		               var geneidlink="<a href=http://www.genecards.org/index.php?path=/Search/Symbol/"+geneset['name']+" target='_blank'>"+geneset['id']+"</a>";
			           html=html+  "<tr data-tt-id="+i+"-"+j+" data-tt-parent-id="+i+"><td><span class='file'>"+geneset["name"]+"</span></td><td>"+geneidlink+"</td><td>"+j+"</td></tr>";
			          			   
		         });
				 
				 
				// if(i>1)return false;
			
			
			
			
		
		});
		
		//alert(html);
		$('#example-advanced').treetable('destroy');
		$("#example-advanced > tbody").html(html);
		//$("#example-advanced").treetable({ expandable: true });
		$("#example-advanced").treetable({ expandable: true });
	    $("#example-advanced").treetable('expandAll');
	}
	
	$(document).ready(function(){
		$("[data-slider]")
    .each(function () {
      var input = $(this);
      $("<span >")
        .addClass("output")
        .insertAfter($(this));
    })
    .bind("slider:ready slider:changed", function (event, data) {
		
      $(this)
        .nextAll(".output:first")
          .html("&nbsp;&nbsp;&nbsp;&nbsp;p-value <= "+data.value.toFixed(6));
		  p_value=data.value.toFixed(6);
		 
			
	 
          
    });
	
	
	 var treetable='<?php echo $vdjson;?>';
	 var obj = $.parseJSON(treetable);
	 treetableobj=obj["paths"];
	 
	 //displayTreetable(treetableobj);
	
		
	});
	
	function exportxml()
	{
	   var jsondata=$("#myjson").val();
	   var msg = jsondata.replace(/\n/g, "");
	   //alert(msg);
	   var obj = jQuery.parseJSON( msg );
      // alert( obj.paths[0].pathname );
	   xml2 = json2xml(eval(obj));
	   var userInput =xml2; //document.getElementById("userInputId").value;
  	   var fileURL = 'data:application/notepad;charset=utf-8,' + encodeURIComponent(userInput);
       var fileName = "pathway.xml";
	   if (!window.ActiveXObject) {
			var save = document.createElement('a');
			save.href = fileURL;
			save.target = '_blank';
			save.download = fileName || 'unknown';
			var event = document.createEvent('Event');
			event.initEvent('click', true, true);
			save.dispatchEvent(event);
			(window.URL || window.webkitURL).revokeObjectURL(save.href);
		}

// for IE
		else if (!!window.ActiveXObject && document.execCommand) {
			var _window = window.open(fileURL, '_blank');
			_window.document.close();
			_window.document.execCommand('SaveAs', true, fileName || fileURL)
			_window.close();
		}
	  
		return false;
	}
	  
	/////////////////////
	var ticks = [[0, "0%-0.05%"], [1, "0.05%-0.01%"], [2, "0.01%-0.015%"], [3, "0.015%-0.02%"],[4, "0.02%-0.025%"], [5, "0.025%-0.03%"], [6, "0.03%-0.035%"], [7, "0.035%-0.04%"], [8, "0.04%-0.045%"], [9, "0.045%-0.5%"]];
	graphOptions = {
    series: {
        bars: {
		interactive : true,
            align: 'center',
            fill: 0.7,
            show: true,
            barWidth: 0.5
        }
    },
    xaxis: {
	axisLabel: "World Cities",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10,
         ticks: ticks
    },
	legend: {
                noColumns: 0,
                labelBoxBorderColor: "#000000",
                position: "nw"
            },
            grid: {
                hoverable: true,
				clickable : true, 
                borderWidth: 2,
                backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
            }
};  
        var previousPoint = null, previousLabel = null;
        $.fn.UseTooltip = function () {
            $(this).bind("plothover", function (event, pos, item) {
                if (item) {
                    if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                        previousPoint = item.dataIndex;
                        previousLabel = item.series.label;
                        $("#tooltip").remove();
 
                        var x = item.datapoint[0];
                        var y = item.datapoint[1];
                        
                        var color = item.series.color;
						var message="<br>";
						if(x==0)
						 jQuery.each( s1, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
						 if(x==1)
						 jQuery.each( s2, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
						 if(x==2)
						 jQuery.each( s3, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
						 if(x==3)
						 jQuery.each( s4, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
						 if(x==4)
						 jQuery.each( s5, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
						 if(x==5)
						 jQuery.each( s6, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
						 if(x==6)
						 jQuery.each( s7, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
						 if(x==7)
						 jQuery.each( s8, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
						  if(x==8)
						 jQuery.each( s9, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
						 if(x==9)
						 jQuery.each( s10, function( i, val ) {
						 
						   message=message+val.name+"<br>";
						 });
                         
                        //console.log(item.series.xaxis.ticks[x].label);               
 
                        showTooltip(item.pageX,
                        item.pageY,
                        color,
                        "<strong>" + item.series.label + "</strong><br>" + item.series.xaxis.ticks[x].label + " : <strong>" + y + "</strong> pathway"+message);
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        };
 
        function showTooltip(x, y, color, contents) {
            $('<div id="tooltip">' + contents + '</div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 40,
                left: x - 120,
                border: '2px solid ' + color,
                padding: '3px',
                'font-size': '9px',
                'border-radius': '5px',
                'background-color': '#fff',
                'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
                opacity: 0.9
            }).appendTo("body").fadeIn(200);
        }
	
	///////////////////////
	
	var tempstring="[";
	var halfstring="";
	var pathname="";
	var pathnamearray=new Array();
	var pvalue=new Array();
	var pvaluesort=new Array();
	/////////////
	var s1=new Array();
	var s2=new Array();
	var s3=new Array();
	var s4=new Array();
	var s5=new Array();
	var s6=new Array();
	var s7=new Array();
	var s8=new Array();
	var s9=new Array();
	var s10=new Array();
	////////////
	outputxml();
	function pathwaysort(name,pvalue)
	{
		this.name=name;
		this.pvalue=pvalue;

	}
	function sortpvalue()
	{
		 jQuery.each( pathnamearray, function( i, val ) {
		  var pathe=new pathwaysort(val,pvalue[i]);
		  if((pvalue[i]>=0)&&(pvalue[i]<0.0005)){
		  s1.push(pathe);
		  }
		  if((pvalue[i]>=0.0005)&&(pvalue[i]<0.001)){
		  s2.push(pathe);
		  }
		  if((pvalue[i]>=0.001)&&(pvalue[i]<0.0015)){
		  s3.push(pathe);
		  }
		  if((pvalue[i]>=0.0015)&&(pvalue[i]<0.0020)){
		  s4.push(pathe);
		  }
		  if((pvalue[i]>=0.0020)&&(pvalue[i]<0.0025)){
		  s5.push(pathe);
		  }
		  if((pvalue[i]>=0.0025)&&(pvalue[i]<0.003)){
		  s6.push(pathe);
		  }
		  if((pvalue[i]>=0.003)&&(pvalue[i]<0.0035)){
		  s7.push(pathe);
		  }
		  if((pvalue[i]>=0.0035)&&(pvalue[i]<0.004)){
		  s8.push(pathe);
		  }
		  if((pvalue[i]>=0.004)&&(pvalue[i]<0.0045)){
		  s9.push(pathe);
		  }
		  if((pvalue[i]>=0.0045)&&(pvalue[i]<=0.005)){
		  s10.push(pathe);
		  }
		  //pvaluesort.push(pathe);
		});
		//alert(s1.length);
		var data = [[0, s1.length],[1, s2.length],[2, s3.length],[3, s4.length],[4, s5.length],[5, s6.length],[6, s7.length],[7, s8.length],[8, s9.length],[9, s10.length]];
        var dataset = [{ label: "Pathway for genes", data: data, color: "#0000FF" }];
		 $.plot($("#flot-placeholder"), dataset, graphOptions);
			
			$("#flot-placeholder").UseTooltip();
			$("#flot-placeholder").bind('plotclick', function (event, pos, item) { 
		   
				if (item) {
			//alert(item);
			            var x = item.datapoint[0];
                        var y = item.datapoint[1];
				        //alert(x);
				}
			}); 
		/*alert(pvaluesort);
		var sidOrder = pvaluesort.sort(
                function(a, b)
                {
                    if(a.pvalue < b.pvalue) return -1;
                    if(a.pvalue > b.pvalue) return 1;
                    return 0;
                }
            );
		alert(sidOrder.join(", "));*/
	
	}
	function parsexml(o, tab) {
    
     var toXml = function(v, name, ind) {
      var xml = "";
      if (v instanceof Array) {
         for (var i=0, n=v.length; i<n; i++)
            xml += ind + toXml(v[i], name, ind+"\t") + "\n";
			
      }
      else if (typeof(v) == "object") {
         var hasChild = false;
         xml += ind + "<" + name;
         for (var m in v) {
            if (m.charAt(0) == "@")
               xml += " " + m.substr(1) + "=\"" + v[m].toString() + "\"";
            else
               hasChild = true;
         }
         xml += hasChild ? ">" : "/>";
         if (hasChild) {
            for (var m in v) {
               if (m == "#text")
                  xml += v[m]+"\t";
               else if (m == "#cdata")
                  xml += "<![CDATA[" + v[m] + "]]>\t";
               else if (m.charAt(0) != "@")
                  xml += toXml(v[m], m, ind+"\t");
            }
            xml += (xml.charAt(xml.length-1)=="\n"?ind:"") + "</" + name + ">\n";
         }
      }
      else {
	     
	     if(name=="pathname")
		 {
		    halfstring="['"+v.toString()+"',";
			pathname=v.toString();
		 }
		 if(name=="pvalue")
		 {
		    var temp=v.toString();
			temp=temp.replace(/\s+/g, '');
		   if(parseFloat(temp)<=0.05)
		   {
		       pathnamearray.push(pathname);
			   pvalue.push(temp);
		      tempstring=tempstring+halfstring+"'"+temp+"'],";
		    }
		 
		 }
         xml += ind + "<" + name + ">" + v.toString() +  "</" + name + ">\n";
      }
      return xml;
   }, xml="";
   for (var m in o)
      xml += toXml(o[m], m, "");
	  
   return xml;//tab ? xml.replace(/\t/g, tab) : xml.replace(/\t|\n/g, "");
     
}
	function outputxml()
	{
	    var X = $('#example-advanced').offset().top; 
		var Y = $('#example-advanced').offset().left;
        		
	    
		var jsondata=$("#myjson").val();
		if (!jsondata) {
                  
				   return ;
           }
		$("#flot-placeholder").css({"height":"180px"});
        ;
		//alert(X);
		//$("#aftergraph").css({top: X});
		//$("#aftergraph").animate({'top' : "-=10px"});
//X = $('#example-advanced').offset().top;
//alert(X);	
////////////
var newimg=$("#aftergraph");
newimg.css({'position': 'absolute'});
//newimg.css({'height': '70px'});
//newimg.css({'width': '200px'});
newimg.css({'top': X});
//newimg.css({'right': '2px'});

////////////////	
		var msg = jsondata.replace(/\n/g, "");
		
	  	var obj = jQuery.parseJSON( msg );
     	//xml2 = json2xml(eval(obj));
		parsexml(eval(obj));
		tempstring=tempstring.substring(0,tempstring.length-1);
		tempstring=tempstring+"]";
		//alert(tempstring);
		sortpvalue();
		//var array1 =[ ['2.07', ,'Smith'],['1.09', 'Jones']];
		//var arraystring=jQuery.makeArray(array1);
		//var array =[ ['2.07', 'Smith',1],['1.09', 'Jones',2]];
		//var jlist=jQuery.parseJSON(array);
		//alert(jlist);
		/*array1.sort(function(a, b){
			var a1= a[1], b1= b[1];
			if(a1== b1) return 0;
			return a1> b1? 1: -1;
		});
		alert(array1.join(", "));*/
		//return false;
	}
	function genesubmit()
	{
	 
	   $("#myjson").val("");
	    document.geneform.submit();
	}
	function sort(index)
	{
		var imgaepath;
		if(sortindex[index]){
			imgaepath="images/u.png";
			sortindex[index]=false;
		}
		else{
			imgaepath="images/d.png";
			sortindex[index]=true;
		}
			switch (index){
				case 1:
				     sortJson(treetableobj , "pathname", "string", sortindex[index]);
					$("#plist").find("img").attr("src",imgaepath);
				break;
				case 2:
				    sortJson(treetableobj , "sourcename", "string", sortindex[index]);
				    $("#pdatabase").find("img").attr("src",imgaepath);
				break;
				case 3:
				sortJson(treetableobj , "pvalue", "float", sortindex[index]);
				  $("#pvalueindex").find("img").attr("src",imgaepath);
				 break;
			} 
		
	    cleartable();
	    
	}
	function generate()
	{
	 
	  var CSV="<?php echo $outputvalue;?>";
	  CSV=CSV.replace(/!/g,"\r\n");
	 
	  if (navigator.appName != 'Microsoft Internet Explorer')
      {
         window.open('data:text/csv;charset=utf-8,' + escape(CSV));
      }
      else
      {
         var popup = window.open('','csv','');
         popup.document.body.innerHTML = '<pre>' + CSV + '</pre>';
      }          


	 }
      $("#example-basic").treetable({ expandable: true });
      $("#example-basic-static").treetable();
      $("#example-basic-expandable").treetable({ expandable: true });
      $("#example-advanced").treetable({ expandable: true });
	  $("#example-advanced").treetable('expandAll');
      $("#example-advanced tbody").on("mousedown", "tr", function() {
        $(".selected").not(this).removeClass("selected");
        $(this).toggleClass("selected");
      });
      $("#example-advanced .file, #example-advanced .folder").draggable({
        helper: "clone",
        opacity: .75,
        refreshPositions: true, // Performance?
        revert: "invalid",
        revertDuration: 300,
        scroll: true
      });

      $("#example-advanced .folder").each(function() {
        $(this).parents("#example-advanced tr").droppable({
          accept: ".file, .folder",
          drop: function(e, ui) {
            var droppedEl = ui.draggable.parents("tr");
            $("#example-advanced").treetable("move", droppedEl.data("ttId"), $(this).data("ttId"));
          },
          hoverClass: "accept",
          over: function(e, ui) {
            var droppedEl = ui.draggable.parents("tr");
            if(this != droppedEl[0] && !$(this).is(".expanded")) {
              $("#example-advanced").treetable("expandNode", $(this).data("ttId"));
            }
          }
        });
      });

      $("form#reveal").submit(function() {
        var nodeId = $("#revealNodeId").val()

        try {
          $("#example-advanced").treetable("reveal", nodeId);
        }
        catch(error) {
          alert(error.message);
        }

        return false;
      });
	  //////////////////
	  function sortTable(columnIndex, dataName) {
		isAscending[columnIndex] = isAscending[columnIndex] == 'desc' ? 'asc' : 'desc';
		var root = $('#tree>tbody>tr[data-tt-id="0"]')[0];
		sortChildrenOfParent(root, columnIndex, dataName);
}

function sortChildrenOfParent(parentRow, columnIndex, dataName) {
    var parentRowAsJquery = $(parentRow);
    var id = parentRowAsJquery.attr('data-tt-id');
    var children = $('#tree>tbody>tr[data-tt-parent-id="' + id + '"]');
    children.tsort({ data: dataName, order: isAscending[columnIndex] });
    children.detach();
    parentRowAsJquery.after(children);
    for (var i = 0; i < children.length; i++) {
        var item = children[i];
        var itemAsJquery = $(item);
        var itemId = itemAsJquery.attr('data-tt-id');
        var childrenOfItem = $('#tree>tbody>tr[data-tt-parent-id="' + itemId + '"]');
        if (childrenOfItem.length > 0) {
            sortChildrenOfParent(item, columnIndex, dataName);
        }
    }
}
    function json2xml(o, tab) {
   var toXml = function(v, name, ind) {
      var xml = "";
      if (v instanceof Array) {
         for (var i=0, n=v.length; i<n; i++)
            xml += ind + toXml(v[i], name, ind+"\t") + "\n";
      }
      else if (typeof(v) == "object") {
         var hasChild = false;
         xml += ind + "<" + name;
         for (var m in v) {
            if (m.charAt(0) == "@")
               xml += " " + m.substr(1) + "=\"" + v[m].toString() + "\"";
            else
               hasChild = true;
         }
         xml += hasChild ? ">" : "/>";
         if (hasChild) {
            for (var m in v) {
               if (m == "#text")
                  xml += v[m]+"\t";
               else if (m == "#cdata")
                  xml += "<![CDATA[" + v[m] + "]]>\t";
               else if (m.charAt(0) != "@")
                  xml += toXml(v[m], m, ind+"\t");
            }
            xml += (xml.charAt(xml.length-1)=="\n"?ind:"") + "</" + name + ">\n";
         }
      }
      else {
         xml += ind + "<" + name + ">" + v.toString() +  "</" + name + ">\n";
      }
      return xml;
   }, xml="";
   for (var m in o)
      xml += toXml(o[m], m, "");
   return xml;//tab ? xml.replace(/\t/g, tab) : xml.replace(/\t|\n/g, "");
}
	function xml2json(xml, tab) {
   var X = {
      toObj: function(xml) {
         var o = {};
         if (xml.nodeType==1) {   // element node ..
            if (xml.attributes.length)   // element with attributes  ..
               for (var i=0; i<xml.attributes.length; i++)
                  o["@"+xml.attributes[i].nodeName] = (xml.attributes[i].nodeValue||"").toString();
            if (xml.firstChild) { // element has child nodes ..
               var textChild=0, cdataChild=0, hasElementChild=false;
               for (var n=xml.firstChild; n; n=n.nextSibling) {
                  if (n.nodeType==1) hasElementChild = true;
                  else if (n.nodeType==3 && n.nodeValue.match(/[^ \f\n\r\t\v]/)) textChild++; // non-whitespace text
                  else if (n.nodeType==4) cdataChild++; // cdata section node
               }
               if (hasElementChild) {
                  if (textChild < 2 && cdataChild < 2) { // structured element with evtl. a single text or/and cdata node ..
                     X.removeWhite(xml);
                     for (var n=xml.firstChild; n; n=n.nextSibling) {
                        if (n.nodeType == 3)  // text node
                           o["#text"] = X.escape(n.nodeValue);
                        else if (n.nodeType == 4)  // cdata node
                           o["#cdata"] = X.escape(n.nodeValue);
                        else if (o[n.nodeName]) {  // multiple occurence of element ..
                           if (o[n.nodeName] instanceof Array)
                              o[n.nodeName][o[n.nodeName].length] = X.toObj(n);
                           else
                              o[n.nodeName] = [o[n.nodeName], X.toObj(n)];
                        }
                        else  // first occurence of element..
                           o[n.nodeName] = X.toObj(n);
                     }
                  }
                  else { // mixed content
                     if (!xml.attributes.length)
                        o = X.escape(X.innerXml(xml));
                     else
                        o["#text"] = X.escape(X.innerXml(xml));
                  }
               }
               else if (textChild) { // pure text
                  if (!xml.attributes.length)
                     o = X.escape(X.innerXml(xml));
                  else
                     o["#text"] = X.escape(X.innerXml(xml));
               }
               else if (cdataChild) { // cdata
                  if (cdataChild > 1)
                     o = X.escape(X.innerXml(xml));
                  else
                     for (var n=xml.firstChild; n; n=n.nextSibling)
                        o["#cdata"] = X.escape(n.nodeValue);
               }
            }
            if (!xml.attributes.length && !xml.firstChild) o = null;
         }
         else if (xml.nodeType==9) { // document.node
            o = X.toObj(xml.documentElement);
         }
         else
            alert("unhandled node type: " + xml.nodeType);
         return o;
      },
      toJson: function(o, name, ind) {
         var json = name ? ("\""+name+"\"") : "";
         if (o instanceof Array) {
            for (var i=0,n=o.length; i<n; i++)
               o[i] = X.toJson(o[i], "", ind+"\t");
            json += (name?":[":"[") + (o.length > 1 ? ("\n"+ind+"\t"+o.join(",\n"+ind+"\t")+"\n"+ind) : o.join("")) + "]";
         }
         else if (o == null)
            json += (name&&":") + "null";
         else if (typeof(o) == "object") {
            var arr = [];
            for (var m in o)
               arr[arr.length] = X.toJson(o[m], m, ind+"\t");
            json += (name?":{":"{") + (arr.length > 1 ? ("\n"+ind+"\t"+arr.join(",\n"+ind+"\t")+"\n"+ind) : arr.join("")) + "}";
         }
         else if (typeof(o) == "string")
            json += (name&&":") + "\"" + o.toString() + "\"";
         else
            json += (name&&":") + o.toString();
         return json;
      },
      innerXml: function(node) {
         var s = ""
         if ("innerHTML" in node)
            s = node.innerHTML;
         else {
            var asXml = function(n) {
               var s = "";
               if (n.nodeType == 1) {
                  s += "<" + n.nodeName;
                  for (var i=0; i<n.attributes.length;i++)
                     s += " " + n.attributes[i].nodeName + "=\"" + (n.attributes[i].nodeValue||"").toString() + "\"";
                  if (n.firstChild) {
                     s += ">";
                     for (var c=n.firstChild; c; c=c.nextSibling)
                        s += asXml(c);
                     s += "</"+n.nodeName+">";
                  }
                  else
                     s += "/>";
               }
               else if (n.nodeType == 3)
                  s += n.nodeValue;
               else if (n.nodeType == 4)
                  s += "<![CDATA[" + n.nodeValue + "]]>";
               return s;
            };
            for (var c=node.firstChild; c; c=c.nextSibling)
               s += asXml(c);
         }
         return s;
      },
      escape: function(txt) {
         return txt.replace(/[\\]/g, "\\\\")
                   .replace(/[\"]/g, '\\"')
                   .replace(/[\n]/g, '\\n')
                   .replace(/[\r]/g, '\\r');
      },
      removeWhite: function(e) {
         e.normalize();
         for (var n = e.firstChild; n; ) {
            if (n.nodeType == 3) {  // text node
               if (!n.nodeValue.match(/[^ \f\n\r\t\v]/)) { // pure whitespace text node
                  var nxt = n.nextSibling;
                  e.removeChild(n);
                  n = nxt;
               }
               else
                  n = n.nextSibling;
            }
            else if (n.nodeType == 1) {  // element node
               X.removeWhite(n);
               n = n.nextSibling;
            }
            else                      // any other node
               n = n.nextSibling;
         }
         return e;
      }
   };
   if (xml.nodeType == 9) // document node
      xml = xml.documentElement;
   var json = X.toJson(X.toObj(X.removeWhite(xml)), xml.nodeName, "\t");
   return "{\n" + tab + (tab ? json.replace(/\t/g, tab) : json.replace(/\t|\n/g, "")) + "\n}";
}
function StringToXML(oString) {
 //code for IE
 if (window.ActiveXObject) { 
 var oXML = new ActiveXObject("Microsoft.XMLDOM"); oXML.loadXML(oString);
 return oXML;
 }
 // code for Chrome, Safari, Firefox, Opera, etc. 
 else {
 return (new DOMParser()).parseFromString(oString, "text/xml");
 }
}
function XMLToString(oXML)
{
 //code for IE
 if (window.ActiveXObject) {
 var oString = oXML.xml; return oString;
 } 
 // code for Chrome, Safari, Firefox, Opera, etc.
 else {
 return (new XMLSerializer()).serializeToString(oXML);
 }
 }
 ///////////////
 var objToXml = function(o,doc){
var e = {}; // object to be returned

// Iterating through the object
for(var x in o)if(o.hasOwnProperty(x)){

// Child nodes or the nodes themselves
var childs = {}; 

switch(typeof o[x]){

// if the subobject is an object (or array) recurse
case "object":{
childs = objToXml(o[x],doc);
}break;

// if it is scalar, make a text node as the single element of childs
default:{
childs[x] = doc.createTextNode(o[x]);
}break;
}

// assoiciative arrays will create nodes and append the childs in them
// whereas arrays will just accumulate the nodes
if(isNaN(x)){ // object (associative array)
e[x] = doc.createElement(x); // create a node
for(var c in childs)if(childs.hasOwnProperty(c)){
e[x].appendChild(childs[c]); // append the node
}
}else{ // regular (numeric keys) array
for(var c in childs)if(childs.hasOwnProperty(c)){
e[x + "[" + c + "]"] = childs[c]; // just assign the node
}
}
}
return e;
}
//////////////
function bf2xml(json) {
    if (typeof json !== "object") return null;
    var cloneNS = function(ns) {
        var nns = {};
        for (var n in ns) {
            if (ns.hasOwnProperty(n)) {
                nns[n] = ns[n];
            }
        }
        return nns;
    };
    var processLeaf = function(lname, child, ns) {
        var body = "";
        if (child instanceof Array) {
            for (var i = 0; i < child.length; i++) {
                body += processLeaf(lname, child[i], cloneNS(ns));
            }
            return body;
        } else if (typeof child === "object") {
            var el = "<" + lname;
            var attributes = "";
            var text = "";
            if (child["@xmlns"]) {
                var xmlns = child["@xmlns"];
                for (var prefix in xmlns) {
                    if (xmlns.hasOwnProperty(prefix)) {
                        if (prefix === "$") {
                            if (ns[prefix] !== xmlns[prefix]) {
                                attributes += " " + "xmlns=\"" + xmlns[prefix] + "\"";
                                ns[prefix] = xmlns[prefix];
                            }
                        } else if (!ns[prefix] || (ns[prefix] !== xmlns[prefix])) {
                            attributes += " xmlns:" + prefix + "=\"" + xmlns[prefix] + "\"";
                            ns[prefix] = xmlns[prefix];
                        }
                    }
                }
            }
            for (var key in child) {
                if (child.hasOwnProperty(key) && key !== "@xmlns") {
                    var obj = child[key];
                    if (key === "$") {
                        text += obj;
                    } else if (key.indexOf("@") === 0) {
                        attributes += " " + key.substring(1) + "=\"" + obj + "\"";
                    } else {
                        body += processLeaf(key, obj, cloneNS(ns));
                    }
                }
            }
            body = text + body;
            return (body !== "") ? el + attributes + ">" + body + "</" + lname + ">" : el + attributes + "/>"
        }
    };
    for (var lname in json) {
        if (json.hasOwnProperty(lname) && lname.indexOf("@") == -1) {
            return processLeaf(lname, json[lname], {});
        }
    }
    return null;
} 
 ////////////
 function OBJtoXML(obj,d){
d=(d)?d:0;
var rString="\n";
var pad="";
for(var i=0;i<d;i++){
pad+=" ";
}
if(typeof obj==="object"){
if(obj.constructor.toString().indexOf("Array")!== -1){
for(i=0;i<obj.length;i++){
rString+=pad+"<item>"+obj[i]+"</item>\n";
}
rString=rString.substr(0,rString.length-1)
}
else{
for(i in obj){
var val=OBJtoXML(obj[i],d+1);
if(!val)
return false;
rString+=((rString==="\n")?"":"\n")+pad+"<"+i+">"+val+((typeof obj[i]==="object")?"\n"+pad:"")+"</"+i+">";
}
}
}
else if(typeof obj === "string"){
rString=obj;
}
else if(obj.toString){
rString=obj.toString();
}
else{
return false;
}
return rString;
}
function JSONtoXML(json){
return eval("OBJtoXML("+json+");");
}
 
 ///////////
 function cleartable(){
	 
	 $("#example-advanced > tbody").html('');
	 //sortJson(treetableobj , "pvalue", "float", true);
	 displayTreetable(treetableobj);
	 
	 
 }
	
	</script>
 
  </div> 
   </form>
</div>
<button onclick="cleartable();">clear</button>
   </body>
</html>
