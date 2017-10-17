<!doctype html>
<html>
<head>
  <title>Gene Disease Network</title>
  <style type="text/css">
 <!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
.mytables
{
 width: 200px;
 height: 40px;
 overflow: auto;
}
button {
  color: #8;
  background: #D8D8D8 ;
  font-weight: bold;
  border: 1px solid #888888;
}
button:hover {
  color: #FFF;
  background: #900;
}
 #loadingBar {
    position:absolute;
    top:0px;
    left:0px;
    width: 902px;
    height: 902px;
    background-color:rgba(200,200,200,0.8);
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
    opacity:1;
}
#wrapper {
    position:relative;
    width:900px;
    height:900px;
			
}
#text {
    position:absolute;
    top:8px;
    left:530px;
    width:30px;
    height:50px;
    margin:auto auto auto auto;
    font-size:22px;
    color: #000000;
}
div.outerBorder {
    position:relative;
    top:400px;
    width:600px;
    height:44px;
    margin:auto auto auto auto;
    border:8px solid rgba(0,0,0,0.1);
    background: rgb(252,252,252); /* Old browsers */
    background: -moz-linear-gradient(top,  rgba(252,252,252,1) 0%, rgba(237,237,237,1) 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(252,252,252,1)), color-stop(100%,rgba(237,237,237,1))); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  rgba(252,252,252,1) 0%,rgba(237,237,237,1) 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  rgba(252,252,252,1) 0%,rgba(237,237,237,1) 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,  rgba(252,252,252,1) 0%,rgba(237,237,237,1) 100%); /* IE10+ */
            background: linear-gradient(to bottom,  rgba(252,252,252,1) 0%,rgba(237,237,237,1) 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfcfc', endColorstr='#ededed',GradientType=0 ); /* IE6-9 */
            border-radius:72px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
}
#border {
            position:absolute;
            top:10px;
            left:10px;
            width:500px;
            height:23px;
            margin:auto auto auto auto;
            box-shadow: 0px 0px 4px rgba(0,0,0,0.2);
            border-radius:10px;
        }
#bar {
            position:absolute;
            top:0px;
            left:0px;
            width:20px;
            height:20px;
            margin:auto auto auto auto;
            border-radius:11px;
            border:2px solid rgba(30,30,30,0.05);
            background: rgb(0, 173, 246); /* Old browsers */
            box-shadow: 2px 0px 4px rgba(0,0,0,0.4);
        }
.cpicker{
	
	cursor: pointer; 
	cursor: hand;
}
.ui-widget {
    font-family: Verdana,Arial,sans-serif;
    font-size: .8em;
}

.ui-widget-content {
    background: #F9F9F9;
    border: 10px solid #90d93f;
    color: #222222;
}

.ui-dialog {
    left: 0;
    outline: 0 none;
    padding: 0 !important;
    position: absolute;
    top: 0;
}
#addrow{
    width: 300px;
	height:100px;
    padding: 0px;
    border: 0px solid navy;
    margin: 25px;

}
#success {
    padding: 0;
    margin: 0; 
}

.ui-dialog .ui-dialog-content {
    background: none repeat scroll 0 0 transparent;
    border: 0 none;
    overflow: auto;
    position: relative;
    padding: 0 !important;
}

.ui-widget-header {
    background: #b0de78;
    border: 0;
    color: #fff;
    font-weight: normal;
}

.ui-dialog .ui-dialog-titlebar {
    padding: 0.1em .5em;
    position: relative;
        font-size: 1em;
}

td input[type="checkbox"] {
    float: none;
	text-align: center;
    margin: 0 auto;
    width: 100%;
}
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
.no-close .ui-dialog-titlebar-close {
  display: none;
}
 input[type=checkbox]
{
 /* Double-sized Checkboxes */
 -ms-transform: scale(2); /* IE */
 -moz-transform: scale(2); /* FF */
 -webkit-transform: scale(2); /* Safari and Chrome */
 -o-transform: scale(2); /* Opera */
 padding: 10px;
}
#waiting { 
    display:none; /* Hide the DIV */
    position:fixed;  
    _position:absolute; /* hack for internet explorer 6 */  
    height:100px;  
    width:450px;  
    background:#FFFFFF;  
    left: 500px;
    top: 150px;
    z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
    margin-left: 15px;  
    
    /* additional features, can be omitted */
    border:2px solid #eee;      
    padding:15px;  
    font-size:15px;  
    -moz-box-shadow: 0 0 5px #6cf;
    -webkit-box-shadow: 0 0 5px #6cf;
    box-shadow: 0 0 5px #6cf;
    
}
#waitingforinteraction { 
    display:none; /* Hide the DIV */
    position:fixed;  
    _position:absolute; /* hack for internet explorer 6 */  
    height:100px;  
    width:450px;  
    background:#FFFFFF;  
    left: 500px;
    top: 50px;
    z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
    margin-left: 15px;  
    
    /* additional features, can be omitted */
    border:2px solid #eee;      
    padding:15px;  
    font-size:15px;  
    -moz-box-shadow: 0 0 5px #6cf;
    -webkit-box-shadow: 0 0 5px #6cf;
    box-shadow: 0 0 5px #6cf;
    
}  
 body {
    background:#eee;
    margin:0;
    padding:0;
}
 

   #genelist{
		height:500px;
              	width:55px; 
		border:0px solid green,
		font-size:12px;
	}
	 #mynetwork {
		width:1000px;
		height: 600px;
		border: 0px solid lightgray;
    		padding:10px;
	}

.tables {
	margin:0px;padding:0px;
	width:100%;
	height:50px;
	 height: 400px;
 overflow: auto;
	border:1px solid #000000;
	padding:15px;
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.tables{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}
.tables tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.tables tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.tables tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.tables tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}
.tables tr:hover td{
	background-color:#ffffff;
		

}
.tables td{
	vertical-align:top;
	
	background-color:#f9f7f7;

	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:center;
	padding:12px;
	font-size:10px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}

.tables tr:first-child td{
	background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);

	background-color:#cccccc;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:10px;
	font-family:Arial;
	font-weight:bold;
	color:#000000;
}
.tables tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);

	background-color:#cccccc;
}
.tables tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.tables tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}

  </style>
 <script src="jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
 <script src="jquery/layout.js" type="text/javascript"></script>
 <script type="text/javascript" src="js/vis_nothreshold.js"></script>
 <script src="jquery/jscolor.js" charset="utf-8"></script>
 <script src="jquery/source.js" charset="utf-8"></script>
  
</head>
<?php
 $genelist=file_get_contents("gogene.txt");  
 $genesplit=str_replace("\n", ":", $genelist);
?>
<script type="text/javascript">
  /////////////////////
var circleX=-1000000;
var circleY=-1000000;
var circleR=10;
var drawcluster=-1;
var initialRandomSeed = Math.round(Math.random() * 1000000);
var options={};
var randomSeed = initialRandomSeed;
var thetaInversed=1;
options.centralGravity=0.3;
options.springLength=95;
options.springConstant=0.7;
overlapAvoidanceFactor=0.5;
gravitationalConstant=-50;
springConstant=0.7;
var nodes=[];

var L_matrix = [];
var K_matrix = [];
var edges=[];
var edgesArray=[];
var nodesArray=[];
var D_matrix = [];
var springLength=95;
var physicsBody = {physicsNodeIndices:[], physicsEdgeIndices:[], forces: {}, velocities: {}};
var edgesArray=[];

function layout(number,Nodesupdate){
	nodes=[];
	 L_matrix = [];
 K_matrix = [];
 edges=[];
 edgesArray=[];
 nodesArray=[];
 D_matrix = [];
 
 physicsBody = {physicsNodeIndices:[], physicsEdgeIndices:[], forces: {}, velocities: {}};
 edgesArray=[];
	
	
	
	initlayout(number);
	solveKK();
	var offset = 70;
	for (var i = 0; i < nodesArray.length; i++) {
		nodes[nodesArray[i]].x += (0.5 - seededRandom())*offset;
		nodes[nodesArray[i]].y += (0.5 - seededRandom())*offset;
	
	}
	for(var i=0;i<nodesArray.length;i++) {
		physicsBody.physicsNodeIndices.push(nodesArray[i]);
		physicsBody.forces[nodesArray[i]] = { x: 0, y: 0 };
		physicsBody.velocities[nodesArray[i]] = { x: 0, y: 0 };
          
	}
	solveofgravity();
	solve();
	springsolve();
	for(var i=0;i<nodesArray.length;i++) {
	   nodes[[nodesArray[i]]].x=nodes[[nodesArray[i]]].x-physicsBody.forces[nodesArray[i]].x;
	   nodes[[nodesArray[i]]].y=nodes[[nodesArray[i]]].y-physicsBody.forces[nodesArray[i]].y;
	   Nodesupdate[i]={x:nodes[[nodesArray[i]]].x, y:nodes[[nodesArray[i]]].y};
	//alert("nodes[[nodesArray[i]].x"+nodes[[nodesArray[i]]].x+"nodes[[nodesArray[i]].y"+nodes[[nodesArray[i]]].y);
   
    }

}

function initlayout(number){
	var radius = 10 * 0.1 * number + 10;
	for(var i=0;i<number;i++){
	    nodesArray.push(i);
		nodes[i]={};
		nodes[i].options={};
		nodes[i].options.mass=1;
	    var angle = 2 * Math.PI * seededRandom();
        nodes[i].x = radius * Math.cos(angle);
        nodes[i].y = radius * Math.sin(angle);
        nodes[i].width=100;
		nodes[i].height=50;
		nodes[i].shape={};
		nodes[i].shape.radius=80;
		nodes[i].id=i;

	}
	var k=0;
	for(var i=0;i<number;i++){
		for(var j=0;j<number;j++){
			edgesArray.push(k);
			edges[k]={};
			edges[k].connected=true;
			edges[k].toId =j; 
			edges[k].fromId=i;
			k=k+1;
		}
	}
}
  ///////////////////////////
  var globalgenelist=[];
  var myDIR = './networkimg/';
  var initedgehash={};
  var updatenode=[];
  var gohash={};
  var gotermhash={};
  var goidhash={};
  var glength=0;
  var network1;
  var allNodes;
  var highlightActive = false;
  var nodesDataset ;//= new vis.DataSet(nodes); // these come from WorldCup2014.js
  var edgesDataset ;//= new vis.DataSet(edges); // these come from WorldCup2014.js
  var nodes1=[];
  var edges1=[];
  var genelist="<?php echo $genesplit; ?>";
  var genearray=genelist.split(":");
  var nodes = null;
  var edges = null;
  var network = null;
  var DIR = './images/';
  var EDGE_LENGTH_MAIN = 350;
  var EDGE_LENGTH_SUB = 250;
  var i;
  var seq=0;
  var uniqueNodes = [];
  nodes = [];
  edges = [];
  var index=0;
  var pathhash={};
  var pathhashmutilple={};
  var geneidhash={};
  function closedia(){
	     $( "#addrow" ).dialog("close");
  }
  function reset(){
      var  highlightActive = true;
      var i,j;
      var degrees = 2;
      for (var nodeId in allNodes) {
		if (allNodes[nodeId].hiddenColor !== undefined) {
			   allNodes[nodeId].color=allNodes[nodeId].hiddenColor  ;
			   allNodes[nodeId].hiddenColor=undefined;
		}
        if (allNodes[nodeId].hiddenLabel !== undefined) {
          allNodes[nodeId].label=allNodes[nodeId].hiddenLabel  ;
          allNodes[nodeId].hiddenLabel = undefined;
        }
      }
    var updateArray = [];
    for (nodeId in allNodes) {
      if (allNodes.hasOwnProperty(nodeId)) {
        updateArray.push(allNodes[nodeId]);
      }
    }
    nodesDataset.update(updateArray);
   }
   function Highlightgeneid(input) {
 		var id=$("#search").val();
		var nodeId=geneidhash[id];
		var options = {
        scale: 2,
        offset: {x:1,y:1},
        animation: {
          duration: 1000,
          easingFunction: "easeInQuad"
        }
      };
      network1.focus(nodeId, options);
  }
 function showsingle(){
	
		
 }
 function hidesingle() {
 }
 function destroy() {
     if (network1 !== null) {
        network1.destroy();
        network1 = null;
     }
 }
 function neighbourhoodHighlight(params) {
     if (params.nodes.length > 0) {
      highlightActive = true;
      var i,j;
      var selectedNode = params.nodes[0];
      var degrees = 2;
      for (var nodeId in allNodes) {
		if (allNodes[nodeId].hiddenColor === undefined) {
			   allNodes[nodeId].hiddenColor = allNodes[nodeId].color;
		}
        allNodes[nodeId].color = 'rgba(200,200,200,0.5)';
        if (allNodes[nodeId].hiddenLabel === undefined) {
          allNodes[nodeId].hiddenLabel = allNodes[nodeId].label;
          allNodes[nodeId].label = undefined;
        }
      }
      var connectedNodes = network1.getConnectedNodes(selectedNode);
      var allConnectedNodes = [];
      for (i = 1; i < degrees; i++) {
        for (j = 0; j < connectedNodes.length; j++) {
          allConnectedNodes = allConnectedNodes.concat(network1.getConnectedNodes(connectedNodes[j]));
        }
      }
      for (i = 0; i < allConnectedNodes.length; i++) {
        allNodes[allConnectedNodes[i]].color = 'rgba(150,150,150,0.75)';
        if (allNodes[allConnectedNodes[i]].hiddenLabel !== undefined) {
          allNodes[allConnectedNodes[i]].label = allNodes[allConnectedNodes[i]].hiddenLabel;
          allNodes[allConnectedNodes[i]].hiddenLabel = undefined;
        }
      }
      for (i = 0; i < connectedNodes.length; i++) {
        allNodes[connectedNodes[i]].color = allNodes[connectedNodes[i]].hiddenColor;
        if (allNodes[connectedNodes[i]].hiddenLabel !== undefined) {
          allNodes[connectedNodes[i]].label = allNodes[connectedNodes[i]].hiddenLabel;
          allNodes[connectedNodes[i]].hiddenLabel = undefined;
        }
      }
      allNodes[selectedNode].color = allNodes[selectedNode].hiddenColor;
      if (allNodes[selectedNode].hiddenLabel !== undefined) {
        allNodes[selectedNode].label = allNodes[selectedNode].hiddenLabel;
        allNodes[selectedNode].hiddenLabel = undefined;
      }
    }
    else if (highlightActive === true) {
      for (var nodeId in allNodes) {
        allNodes[nodeId].color = allNodes[connectedNodes[i]].hiddenColor;
        if (allNodes[nodeId].hiddenLabel !== undefined) {
          allNodes[nodeId].label = allNodes[nodeId].hiddenLabel;
          allNodes[nodeId].hiddenLabel = undefined;
        }
      }
      highlightActive = false
    }
    var updateArray = [];
    for (nodeId in allNodes) {
      if (allNodes.hasOwnProperty(nodeId)) {
        updateArray.push(allNodes[nodeId]);
      }
    }
    nodesDataset.update(updateArray);
	
  }
   function selectg(id){
	   var nodeId=geneidhash[id];
	   var options = {
       scale: 4,
       offset: {x:1,y:1},
       animation: {
          duration: 1000,
          easingFunction: "easeInQuad"
        }
      };
      network1.focus(nodeId, options);
   }
   function showgenelist(id,self){
	  var tid="r_temp_"+id;
	  if ($("#"+tid).length>0){
		$("#"+tid).remove();
		$(self).html("show gene")
		$(self).css("background-color", "#D8D8D8");
		return;
	  }
	   $(self).html("hide gene");
	   $(self).css("background-color", "yellow");
	   var garray=$("#"+id).val().split(":");
	   var obj=$("#"+id);
	   var content="<tr id=\""+tid+"\" height=10><td  colspan=5>";
	   content=content+"<div style=\"height: 150px; overflow:auto;\"> <table >";
	   for(var i=0;i<garray.length;i++){
		   if(garray[i]!=""){
				content=content+"<tr>";
				content=content+"<td >";
				content=content+"<input type=\"radio\" name=\"rgenes\"  onclick=\"selectg('"+garray[i]+"');\"> ";
				content=content+garray[i];
				content=content+"</td>";
				content=content+"</tr>";
		   }
	   }
	   content=content+"</table>";
	   content=content+"</div></td></tr>";
	  
	   obj.closest('tr').after(content)
   }
   function getinteration(source,target){
	   var result;
	     $.ajax({
			type : 'POST',
			url : 'getinteraction.php',
			dataType : 'json',
			data: {
				glistorg:source,
				glisttarget:target
				
			},
			success : function(data1){
				
				result=data1.interaction;
				insert(result);
				$("#waitingforinteraction").hide();
				
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				//$('#waiting').hide(500);
				alert("error");
				
			}
		});
   }
   function insert(result){
	   $( "#addrow" ).dialog("close");
	   var pathName=$("#pname").val();
	   var colorvalue=$("#color").val();
	   var genelist=$("#userlist").val().replace(/\r\n|\r|\n/g, ":");//;
	   genelist=genelist.replace(/\s+/g,"");
	   var hiddenname=pathName+"_path";
	   var colorid=pathName+"_C";
       var newrow="";
	   newrow="<tr><td style=\"text-align:center;\">";
	   newrow=newrow+"<input type=\"checkbox\" name=\"pathway\" value=\"";
	   newrow=newrow+pathName;
	   newrow=newrow+"\"; >";
	   newrow=newrow+"</td>";
	   newrow=newrow+"<td>";
	   newrow=newrow+pathName;
	   newrow=newrow+"<input type=\"hidden\" id="+hiddenname+" value=\""+genelist+"\">";
		newrow=newrow+"</td>";
		newrow=newrow+"<td id=\""+pathName+"\">";
		newrow=newrow+result;
		newrow=newrow+"</td>";
		newrow=newrow+"<td><input type='text' name='color' class=\"color\" value=\""+colorvalue+"\" id=\""+colorid+"\" >";
		newrow=newrow+"</td>";
		newrow=newrow+"<td><button onclick=showgenelist(\""+ hiddenname +"\")>show gene</td></tr>";
		$( newrow ).insertAfter( "#lastrow" );
		obj=$("#"+colorid);
		new jscolor.init();
     
   }
   function addnew(){
	    var genelist=$("#userlist").val().replace(/\r\n|\r|\n/g, ":");//;
		genelist=genelist.replace(/\s+/g,"");
		$("#waitingforinteraction").show();
	    getinteration($("#original_path").val(),genelist);

   }
   function rgb2hex(orig){
		var rgb = orig.replace(/\s/g,'').match(/^rgba?\((\d+),(\d+),(\d+)/i);
		return (rgb && rgb.length === 4) ? "#" +
		("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
		("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
		("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : orig;
	}
	function rgb2hex(rgb) {
		var hexDigits = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"];
		rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
		function hex(x) {
			return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
		}
		return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
	}
  
   function create(){
	    $( "#addrow" ).dialog({ 
				autoOpen: true, 
				width: 860, 
				height:300,
				modal: true,
				resizable: true,
                dialogClass: 'no-close success-dialog'
		}); 
		$("#addrow").show();
   }
   function assignname(data){
	      $("#AKT_COMPONENTS").html(data.AKT_COMPONENTS);
		  $.each( data, function( key, value ) {
			if (key.indexOf("_path") > 0){
				$("#"+key).val(value);
			}
			else{
				$("#"+key).html(value);
			}
			
		  });
   }
   function changecolr(id){
	    $( "#addrow" ).dialog({ 
				autoOpen: true, 
				width: 860, 
				height:770,
				modal: true,
				resizable: true,
                dialogClass: 'no-close success-dialog'
		}); 
	   
   }
   $(document).ready(function(){
	  htmlgene=genelist.replace(/:/g, '&nbsp;');
	  $("#original_path").val(genelist);
	  $("#genelist").html(htmlgene);
	  $("#waiting").show();
	  draw(genelist);
	  $("#waitingforinteraction").show();
	  $.ajax({
			type : 'POST',
			url : 'exportpathnumber.php',
			dataType : 'json',
			data: {
				glist:genelist
				
			},
			success : function(data1){
				assignname(data1);
				$('#waitingforinteraction').hide(1500);
				var color=$("#Hippo_components_C").css("background-color");
				$('.cpicker').css('cursor', 'pointer');
				$(".cpicker").click(function() {
                    // alert($(this).css("background-color"));
					changecolr(this);
		
                });
	
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert("error");
				
			}
		});
      $(document).dblclick(function(){
	  });
   });
   function createXMLHttpRequest() {
	  var xmlHttp = null;
	  try {
			xmlHttp = new XMLHttpRequest();
		} catch (e) {
			try {
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		return xmlHttp;
	}

	for (i = 0; i < genearray.length; ++i) {
		var gene=genearray[i];
		addnodes(gene,i);
	}
	function addnodes(from,fromid){
		var nid=parseInt(fromid);
		if($.inArray(nid, uniqueNodes) == -1){ 
			nodes.push({id: nid, label: "'"+from+"'", image: DIR + 'disease.png', shape: 'image',size:24});
			uniqueNodes.push(nid);
		}
	}
	function drawnodes(from,fromid,to,toid,edgetype,add){
		var nid=parseInt(toid);
		var fid=parseInt(fromid);
		if(add==1){
			if($.inArray(nid, uniqueNodes) == -1){
				nodes.push({id: nid, label: "'"+from+"'", image: DIR + 'inerGene.png', shape: 'image',size:24});
				uniqueNodes.push(nid);
			}
		}
		else{
			if($.inArray(nid, uniqueNodes) == -1){
				nodes.push({id: nid, label: "'"+to+"'", image: DIR + 'outGene.png', shape: 'image',size:24});
				uniqueNodes.push(nid);
			}
		}
		if(edgetype=="inhibition"){
			edges.push({from: fid, to: nid,arrows:'to', dashes:true,length: EDGE_LENGTH_MAIN});
		}
		else if(edgetype=="activation"){
			
			edges.push({from: fid, to: nid,arrows:'to', length: EDGE_LENGTH_MAIN});
		}
		else{
			edges.push({from: fid, to: nid,arrows:'to', length: EDGE_LENGTH_MAIN});
		}
	}
    var uniqueNames = [];
	function draw(resultlist){
		var i=0;
		nodes1 = [];
		edges1 = [];
		var resultarray=resultlist.split(":");
		for(i=0;i<resultarray.length;i++){
			pathhash[resultarray[i]]="original";
			if(typeof(pathhashmutilple[resultarray[i]]) === "undefined")
			   pathhashmutilple[resultarray[i]]="original";
		    else
			{				
			   var patharray=pathhashmutilple[resultarray[i]].split(":");
		       if($.inArray("orginal", patharray) == -1)
			     pathhashmutilple[resultarray[i]]=pathhashmutilple[resultarray[i]]+":"+"orginal";
			}
		}
		
		var ulist=unique(resultarray);
		constructnetwork(ulist);
	}
	function unique(list) {
		var result = [];
		$.each(list, function(i, e) {
			if ($.inArray(e, result) == -1) {
				if(e!=""){result.push(e);}
			}
		});
		return result;
	}
	function addpath(plist,pathname){
		var parray=plist.split(":");
		var i=0;
		for(i=0;i<parray.length;i++){
			if(parray[i]!=""){
				pathhash[parray[i]]=pathname;
				if(typeof(pathhashmutilple[parray[i]]) === "undefined")
					pathhashmutilple[parray[i]]=pathname;
		        else {
					 var patharray=pathhashmutilple[parray[i]].split(":");
		             if($.inArray(pathname, patharray) == -1)
					   pathhashmutilple[parray[i]]=pathhashmutilple[parray[i]]+":"+pathname;
				}
				}
		}
	}
	function getpathgenelist(checkname){
		index=0;
		var resultg=genelist;
		$("input:checkbox[name='"+checkname+"']:checked").each(function(){
			var pathwayname=$(this).val();
			var plist=$("#"+pathwayname+"_path").val();
			plist=plist.replace(/\s+/g,"");
			addpath(plist,pathwayname);
			resultg=resultg+":"+plist;
		
		});
		
		return resultg;
		
	}
	function output(){
		var i=0;
		var output="genename	pathway	genename	pathway\n";
		for(i=0;i<edges1.length;i++){
			var from=allNodes[edges1[i].from].label;
			var to=allNodes[edges1[i].to].label;
			var line=allNodes[edges1[i].from].label+"	"+pathhash[from]+"	"+allNodes[edges1[i].to].label+"	"+pathhash[to]+"\n";
			output=output+line;
		}
		$.ajax({
			type : 'POST',
			url : 'ajaxdownload.php',
			dataType : 'json',
			data: {
				content:output
				
			},
			success : function(data1){
				window.location.href="export2network.php";
		
	       },
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				$('#waiting').hide(500);
				alert("error");
				
			}
		});
	}
	function constructedget(list){
		var edges=list.split("!");
		var from=0;
		var to=1;
		var i=0;
		var tempedges=[];
		for(i=0;i<edges.length-1;i++){
			var edge=edges[i];
			var fromto=edge.split(":");
			from=geneidhash[fromto[0]];
			to=geneidhash[fromto[1]];
			initedgehash[from]=1;
			initedgehash[to]=1;
			edges1.push({from: from, to: to, length: EDGE_LENGTH_MAIN});
		}
	}
	function constructnoes(nodesarray){
		updatenode=[];
		for(i=0;i<nodesarray.length;i++){
		   if (initedgehash[nodesarray[i].id] !== undefined) {
			  updatenode.push(nodesarray[i]);
			  globalgenelist.push(nodesarray[i].label);
		   }
		}
		
	}
	

function positionInitially(nodesArray) {
      randomSeed = Math.round(Math.random() * 1000000);
      for (i = 0; i < nodesArray.length; i++) {
        var node = nodesArray[i];
        var radius = 10 * 0.1 * nodesArray.length + 10;
        var angle = 2 * Math.PI * seededRandom();
        node.x = radius * Math.cos(angle);
        node.y = radius * Math.sin(angle);
      }
}
function  getcircleCenter(newnodes,clusternode){
	var maxX=-10000000;
	var minX=10000000;
	var maxY=-10000000;
	var minY=10000000;
	for(var i=0;i<newnodes.length;i++){
		if(newnodes[i].x>maxX){
			maxX=newnodes[i].x;
		}
		if(newnodes[i].x<minX){
			minX=newnodes[i].x;
		}
		if(newnodes[i].x>maxY){
			maxY=newnodes[i].y;
		}
		if(newnodes[i].x<minY){
			minY=newnodes[i].y;
		}
	}
	maxX=maxX+clusternode.x;
	maxY=maxY+clusternode.y;
	minX=minX+clusternode.x;
	minY=minY+clusternode.y;
	circleX=(maxX-minX)/2+minX;
	circleY=(maxY-minY)/2+minY;
	circleR=Math.max(Math.abs(maxX - minX), Math.abs(maxY - minY));
    circleR=circleR/2+70;	
    
}   
function releaseFunction (clusterPosition,nodePositions) {
     var newPositions = {};
	 var updatenodes=[];
	 i=0;
     jQuery.each( nodePositions, function( k, val ) {
      	newPositions[k]={x:clusterPosition.x+i*10, y:clusterPosition.y+i*10};
		updatenodes[i]={x:clusterPosition.x+i*10, y:clusterPosition.y+i*10};
		i=i+1;
     });
	 layout(i,updatenodes);
	 getcircleCenter(updatenodes,clusterPosition);
	 i=0;
	 jQuery.each( nodePositions, function( k, val ) {
       	newPositions[k]={x:clusterPosition.x+updatenodes[i].x, y:clusterPosition.y+updatenodes[i].y};
		i=i+1;
     });
     return newPositions;
    
   }
function constructnetwork(glist){
   var i=0;
   var j=0;
   var source;
   var target;
   for(i=0;i<glist.length;i++){
		$.ajax({
				type : 'POST',
				url : 'ajaxgo_e.php',
				dataType : 'json',
				async: false,
				data: {
					gene:glist[i]
				},
				success : function(data1){
					if(data1.id!==undefined){
						gohash[glist[i]]=data1.go;
						var id=data1.id.replace("GO:","");
						var term=data1.goterm;
						id="i"+id;
						gotermhash[glist[i]]=id;
						goidhash[id]=term;
					}
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert("error");
				}
	  });
   };
   for(i=0;i<glist.length;i++){
	  var cid=1;
	  if(gohash[glist[i]]=="membrane"){
		cid=1;
	  }
	  else if(gohash[glist[i]]=="apparatus"){
		cid=2;
	  }
	  else if(gohash[glist[i]]=="mitochondrion"){
		cid=3;
	  }
	  else if(gohash[glist[i]]=="cytoplasm"){
		 cid=4;
	  }
	  else if(gohash[glist[i]]=="ribosome"){
		 cid=5;
	  }
	  else if(gohash[glist[i]]=="rough"){
		  cid=7;
	  }
	  else if(gohash[glist[i]]=="smooth"){
		  cid=8;
	  }
	  else if(gohash[glist[i]]=="centriole"){
		  cid=9;
	  }
	  else if(gohash[glist[i]]=="lysosome"){
		  cid=10;
	  }
	  else if(gohash[glist[i]]=="core"){
	      cid=11;
	  }
	  else{
				cid=1;
	  }
	  var colorid=pathhash[glist[i]]+"_C";
	  var colorvalue=$("#"+colorid).val();
	  colorvalue=colorvalue.toUpperCase();
	  var mid=10;
	  if( gotermhash[glist[i]] !== undefined ) {
                    mid =gotermhash[glist[i]];
      }
	  if(colorvalue.charAt(0)!='#')colorvalue="#"+colorvalue;
	  if(pathhash[glist[i]]=="original"){
		   if(mid!="iunknown")
				 nodes1.push({id: i, font:{size:30},label: glist[i],mid:mid, cid:cid,shape: 'box', color: colorvalue,shapeProperties:{borderDashes:[15,15]}});  
           else
					nodes1.push({id: i, font:{size:30},label: glist[i], cid:cid,shape: 'box', color: colorvalue,shapeProperties:{borderDashes:[15,15]}});
				
			}
			else{
				var patharray=pathhashmutilple[glist[i]].split(":");
				if(patharray.length>1){
					if(mid!="iunknown")
					nodes1.push({id: i, font:{size:30},label: glist[i],cid:cid,mid:mid, shape: 'star', color: colorvalue,shapeProperties:{borderDashes:[15,15]}});
				    else
						nodes1.push({id: i, font:{size:30},label: glist[i],cid:cid, shape: 'star', color: colorvalue,shapeProperties:{borderDashes:[15,15]}});
					
				}
				else
				{
			      if(mid!="iunknown"){
			          nodes1.push({id: i, label: glist[i], cid:cid,mid:mid,color: colorvalue});
				  }
			      else{
					  nodes1.push({id: i,label: glist[i], cid:cid,color: colorvalue}); 
					  
				  }
				  
				}
			  
			}
		   geneidhash[glist[i]]=i;
	}
		
		
		
		var resul=glist.join(":");
		
		$.ajax({
			type : 'POST',
			url : 'getgenenetwork_1.php',
			dataType : 'text',
			data: {
				glist:resul
				
			},
			success : function(data1){
				
				constructedget(data1);
				constructnoes(nodes1);
				$('#waiting').hide(1500);
				nodesDataset=new vis.DataSet(updatenode);
				edgesDataset=new vis.DataSet(edges1);
				var container = document.getElementById('mynetwork');
				var data = {
					nodes: nodesDataset,
					edges: edgesDataset
				};
		var options1 = {layout:{randomSeed:8}};
		network1 = new vis.Network(container, data, options1);
		initeventofNet();
	
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			alert("error");
		 }
		});
		
		
	}
	function initeventofNet(){
		network1.on("initRedraw", function () {});
		allNodes = nodesDataset.get({returnType:"Object"});
		network1.on("click",neighbourhoodHighlight);
		network1.on("selectNode", function(params) {
			if (params.nodes.length == 1) {
				if (network1.isCluster(params.nodes[0]) == true) {
					network1.openCluster(params.nodes[0],{releaseFunction: releaseFunction});
				}
			}
		});
		network1.on("beforeDrawing", function (ctx) {
			/*var nodeId = 1;
			ctx.font = "18pt Arial";
            ctx.fillText("blah", circleX,circleY);
			ctx.strokeStyle = '#A6D5F7';
			ctx.fillStyle = '#294475';
			ctx.circle(circleX, circleY,700);
			ctx.fill();
			ctx.stroke();*/
			
			
			ctx.beginPath();
			ctx.arc(circleX, circleY, circleR, 0, 2 * Math.PI, false);
			ctx.fillStyle = '#294475';
			ctx.fill();
			ctx.lineWidth = 5;
			ctx.strokeStyle = '#A6D5F7';
			ctx.stroke();
		 });
		 network1.on("afterDrawing", function (ctx) {});
		 network1.on("stabilizationProgress", function(params) {
			var maxWidth = 496;
			var minWidth = 20;
			var widthFactor = params.iterations/params.total;
			var width = Math.max(minWidth,maxWidth * widthFactor);
			document.getElementById('loadingBar').style.opacity = 1;
            setTimeout(function () {document.getElementById('loadingBar').style.display = 'block';}, 0);
			document.getElementById('bar').style.width = width + 'px';
			document.getElementById('text').innerHTML = Math.round(widthFactor*100) + '%';
          });
          network1.once("stabilizationIterationsDone", function() {
			 document.getElementById('text').innerHTML = '100%';
			 document.getElementById('bar').style.width = '496px';
			 document.getElementById('loadingBar').style.opacity = 0;
             setTimeout(function () {document.getElementById('loadingBar').style.display = 'none';}, 500);
			 var options1 = {
				nodes: { physics:false},
				physics: {
					forceAtlas2Based: {
						gravitationalConstant: -26,
						centralGravity: 0.005,
						springLength: 230,
						springConstant: 0.18,
						avoidOverlap: 1.5
					},
				maxVelocity: 146,
				solver: 'forceAtlas2Based',
				timestep: 0.05,
				adaptiveTimestep:true,
				stabilization: {
					enabled: true,
					iterations: 10,
					updateInterval: 25
				}

			},layout:{randomSeed:8}};
			network1.setOptions(options1);
		});
	}
	function redraw(genelist){
		nodes1 = [];
		edges1 = [];
		$("#waiting").show();
		var resultlist=getpathgenelist("pathway");
		var resultarray=resultlist.split(":");
		Object.keys(pathhash).forEach(function (key) { 
			var value = pathhash[key];
		})
		var ulist=unique(resultarray);
		constructnetwork(ulist);
	 }
     function clusterByCid() {
	      var clusterOptionsByData = {
          joinCondition:function(childOptions) {
              return childOptions.cid == 1;
          },
          clusterNodeProperties: {id:'membrance',label:'cell membrance', borderWidth:3, image: myDIR + 'cellmembrane.png', shape: 'image'}
		};
		network1.cluster(clusterOptionsByData);
	  
		var clusterOptionsByData1 = {
			joinCondition:function(childOptions) {
              return childOptions.cid == 11;
			},
			clusterNodeProperties: {id:'nuclus', label:'nuclus',borderWidth:3, image: myDIR + 'core1.png', shape: 'image'}
		};
		network1.cluster(clusterOptionsByData1);
	  
		var   clusterOptionsByData2 = {
          joinCondition:function(childOptions) {
              return childOptions.cid == 4;
          },
          clusterNodeProperties: {id:'cytoplasm', label:'cytoplasm',borderWidth:3, image: myDIR + 'cytoplasm.png', shape: 'image'}
		};
		network1.cluster(clusterOptionsByData2);
	  
	    var   clusterOptionsByData3 = {
          joinCondition:function(childOptions) {
              return childOptions.cid == 3;
          },
          clusterNodeProperties: {id:'mitochondrion', label:'mitochondrion',borderWidth:3, image: myDIR + 'mitochondrion.png', shape: 'image'}
        };
        network1.cluster(clusterOptionsByData3);
	    var   clusterOptionsByData4 = {
          joinCondition:function(childOptions) {
              return childOptions.cid == 2;
          },
          clusterNodeProperties: {id:'apparatus', label:'apparatus',borderWidth:3, image: myDIR + 'apparatus.png', shape: 'image'}
      };
      network1.cluster(clusterOptionsByData4);
	  var   clusterOptionsByData5 = {
          joinCondition:function(childOptions) {
              return childOptions.cid == 5;
          },
          clusterNodeProperties: {id:'ribosome', label:'ribosome',borderWidth:3, image: myDIR + 'ribosome.png', shape: 'image'}
      };
      network1.cluster(clusterOptionsByData5);
	   var   clusterOptionsByData6 = {
          joinCondition:function(childOptions) {
              return childOptions.cid == 7;
          },
          clusterNodeProperties: {id:'rough', label:'rough endoplasmic reticulum',borderWidth:3, image: myDIR + 'rough.png', shape: 'image'}
      };
      network1.cluster(clusterOptionsByData6);
	    var   clusterOptionsByData7 = {
          joinCondition:function(childOptions) {
              return childOptions.cid == 8;
          },
          clusterNodeProperties: {id:'smooth', label:'smooth endoplasmic reticulum',borderWidth:3, image: myDIR + 'smooth.png', shape: 'image'}
      };
      network1.cluster(clusterOptionsByData7);
	   var   clusterOptionsByData8 = {
          joinCondition:function(childOptions) {
              return childOptions.cid == 9;
          },
          clusterNodeProperties: {id:'centriole', label:'centriole',borderWidth:3, image: myDIR + 'centriole.png', shape: 'image'}
      };
      network1.cluster(clusterOptionsByData8);
	  
	  var   clusterOptionsByData9 = {
          joinCondition:function(childOptions) {
              return childOptions.cid == 10;
          },
          clusterNodeProperties: {id:'lysosome', label:'lysosome',borderWidth:3, image: myDIR + 'lysosome.png', shape: 'image'}
      };
      network1.cluster(clusterOptionsByData9);
	 
	
	  
  }
   function comparetwoarray(source,target){
	    source=source.replace("i_","");
		target =target.replace("i_","");
		idarray= source.split("_");
		earray= target.split("_");
		t=-1;
		for(i=0;i<idarray.length;i++)
		{
		   st=idarray[i];
   	       for(j=0;j<earray.length;j++){
				dt=earray[j];
				if(st==dt){
					t=i;
				}
			   
		   }
		}
    	return t;
   }
   function matchgoterm(goterm){
	   var res = goterm.match(/apparatus/gi);
	   if(res){
		   return 4;
	   }
	   res = goterm.match(/mitochondrion/gi);
	   if(res){
		   return 3;
	   }
	   
	   res = goterm.match(/cytoplasm/gi);
	   if(res){
		 
		   return 2;
	   }
	   res = goterm.match(/membrane/gi);
	   if(res){
		   return 0;
	   }
	   res = goterm.match(/ribosome/gi);
	   if(res){
		   return 5;
	   }
	    res = goterm.match(/centriole/gi);
	   if(res){
		   return 9;
	   }
	    res = goterm.match(/smooth/gi);
	   if(res){
		   return 6;
	   }
	    res = goterm.match(/rough/gi);
	   if(res){
		   return 7;
	   }
	    res = goterm.match(/nucleus/gi);
	   if(res){
		   return 1;
	   }
	     res = goterm.match(/lysosome/gi);
	   if(res){
		   return 9;
	   }
	     res = goterm.match(/exosome/gi);
	   if(res){
		   return 10;
	   }
	   return 11;
   }
   function clusterByColor(){
	  var colors = [1,11,4,3,2,5,7,8,9,10,14];
	  var images = ['cellmembrane.png','core1.png','cytoplasm.png','mitochondrion.png','apparatus.png','ribosome.png','rough.png','smooth.png','centriole.png','lysosome.png','exon.png','unknown.png'];
	  var labels = ['cell membrane','nuclus','cytoplasm','mitochondrion','apparatus','ribosome','rough','smooth','centriole','lysosome','exosome'];
      var clusterOptionsByData;
	  var mylabel="";
	  var seq=0;
      for (var i = 0; i < globalgenelist.length; i++) {
          var color = globalgenelist[i];
		  var mid=gotermhash[color];
		  mylabel=goidhash[mid];
		  seq=matchgoterm(mylabel);
          clusterOptionsByData = {
              joinCondition: function (childOptions) {
			        return childOptions.mid == mid; // the color is fully defined in the node.
              },
              processProperties: function (clusterOptions, childNodes, childEdges) {
                  var totalMass = 0;
                  for (var i = 0; i < childNodes.length; i++) {
                      totalMass += childNodes[i].mass;
                  }
                  clusterOptions.mass = totalMass;
                  return clusterOptions;
              },
             clusterNodeProperties: {id:'cluster_' + i,label:mylabel,borderWidth:3, image: myDIR +images[seq] , shape: 'image'}
			
          };
          network1.cluster(clusterOptionsByData);
      }
   }
  
  </script>
<body  >
<div id="genelist" style="display:none";>
</div>
<div id="waiting"  >
 <p><center>The data is loading from the server:</center></p>     		
<p><center><img src="images/8.gif"></center><br></p>
</div>
<div id="waitingforinteraction"  >
 <p><center>The data is calculating interactions:</center></p>     		
<p><center><img src="images/8.gif"></center><br></p>
</div>
<div id="loadingBar">	
	<div class="outerBorder">
        <div id="text">0%</div>
         <div id="border">
            <div id="bar"></div>
        </div>
    </div>
</div>
<table border="1">
<tr>
<td>

<button onclick="clusterByColor()">Cell component</button>
<button onclick="hidesingle()">Hide single nodes</button>
<button onclick="showsingle()">show single nodes</button>

<input id="search" type="text"/>
<button onclick="Highlightgeneid('1')">hightlight</button>


</td>
<td>
<label>Gene-Gene Network</label></td></tr>
<tr><td valign="top">
<table id="pathd" border="1">
<tr >
<!--colspan="3"-->

<td >
<button onclick="reset()">unselect</button>
</td>
<td colspan="2">
<button onclick="create()">Define your owngenelist </button>
</td>
<td >
<button onclick="redraw('pathway')">display network</button>
</td>
<td >
<button onclick="output()">output</button>
</td>

</tr>
<tr >
<th>
	Check
</th>
<th>
	pathway
</th>
<th >
	degree
</th>
<th >
	Color
</th>

<th>
show genelist
</th>
</tr>

<tr>
	<td style="text-align:center;">
		<!--<input type="checkbox" name="pathway" value="original">-->
		checked
	</td>
	<td >
		Original Gene set
		<input type="hidden" id="original_path" name="pathways" >
	</td>
	<td id="original">
		self
	</td>
	<td>
	   <input  class="color" id="original_C" value="#00FFFF">
	</td>
	<td>
		<button onclick="showgenelist('original_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="AKT_COMPONENTS">
	</td>
	<td >
		AKT
		<input type="hidden" id="AKT_COMPONENTS_path" name="pathways" >
	</td>
	<td id="AKT_COMPONENTS">
		
	</td>
	
	<td>
		<input class="color" id="AKT_COMPONENTS_C" value="#F0F8FF">
	</td>
	<td>
		<button onclick="showgenelist('AKT_COMPONENTS_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="apoptosis_components" > 
	</td>
	<td >
		apoptosis
		<input type="hidden" id="apoptosis_components_path" name="pathways" >
	</td>
	<td id="apoptosis_components">
		
	</td>
	<td>
		<input class="color" id="apoptosis_components_C" value="#FFE4C4">
	</td>
	<td>
		<button onclick="showgenelist('apoptosis_components_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="CALC_PKC_components">
	</td>
	<td>
		CALC PKC
		<input type="hidden" id="CALC_PKC_components_path" name="pathways" >
	</td>
	<td id="CALC_PKC_components">
		
	</td>
	<td >
		<input class="color" id="CALC_PKC_components_C" value="#7FFF00">
	</td>
	<td>
		<button onclick="showgenelist('CALC_PKC_components_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="cellcycle_components" > 
	</td>
	<td>
		cell cycle
		<input type="hidden" id="cellcycle_components_path" name="pathways" >
	</td>
	<td id="cellcycle_components">
		
	</td>
	<td >
		<input class="color" id="cellcycle_components_C" value="#D2691E">
	</td>
	<td>
		<button onclick="showgenelist('cellcycle_components_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="ERK_components">
	</td>
	<td>
		ERK
		<input type="hidden" id="ERK_components_path" name="pathways" >
	</td>
	<td id="ERK_components">
		
	</td>
	<td >
		<input class="color" id="ERK_components_C" value="#2F4F4F">
	</td>
	<td>
		<button onclick="showgenelist('ERK_components_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="Hippo_components" > 
	</td>
	<td>
		Hippo
		<input type="hidden" id="Hippo_components_path" name="pathways" >
	</td>
	</td>
	<td id="Hippo_components" >
		
	</td>
	<td >
		<input class="color" id="Hippo_components_C" value="#00BFFF">
	</td>
	<td>
		<button onclick="showgenelist('Hippo_components_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="JAKSTAT_components">
	</td>
	<td>
		JAKSTAT
		<input type="hidden" id="JAKSTAT_components_path" name="pathways" >
	</td>
	<td  id="JAKSTAT_components">
		
	</td>
	<td >
		<input class="color" id="JAKSTAT_components_C" value="#228B22">
	</td>
	<td>
		<button onclick="showgenelist('JAKSTAT_components_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="NFKB_components" >
	</td>
	<td >
		NFKB
		<input type="hidden" id="NFKB_components_path" name="pathways" >
	</td>
	<td id="NFKB_components">
		
	</td>
	<td >
		<input class="color" id="NFKB_components_C" value="#FF69B4">
	</td>
	<td>
		<button onclick="showgenelist('NFKB_components_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="NOTCH_components" >
	</td>
	<td >
		NOTCH
		<input type="hidden" id="NOTCH_components_path" name="pathways" >
	</td>
	<td id="NOTCH_components">
		
	</td>
	<td >
		<input class="color" id="NOTCH_components_C" value="#D3D3D3">
	</td>
	<td>
		<button onclick="showgenelist('NOTCH_components_path',this)" >show gene</button>
	</td>
</tr>
<tr>
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="RTK_components" > 
	</td>
	<td>
		RTK
		<input type="hidden" id="RTK_components_path" name="pathways" >
	</td>
	<td id="RTK_components">
		
	</td>
	<td >
		<input class="color" id="RTK_components_C" value="#F0E68C">
	</td>
	 <td>
		<button onclick="showgenelist('RTK_components_path',this)" >show gene</button>
	 </td>
</tr>
<tr>
  <td style="text-align:center;">
    <input type="checkbox" name="pathway" value="TGFb_components">
  </td>
  <td>
     TGFb
	 <input type="hidden" id="TGFb_components_path" name="pathways" >
  </td>
  <td id="TGFb_components">
	
  </td>
  <td >
  	<input class="color" id="TGFb_components_C" value="#F08080">
  </td>
  <td>
		<button onclick="showgenelist('TGFb_components_path',this)" >show gene</button>
  </td>
<tr id="lastrow">
	<td style="text-align:center;">
		<input type="checkbox" name="pathway" value="wnt_components" > 
	</td>
	<td>
		wnt
		<input type="hidden" id="wnt_components_path" name="pathways" >
	</td>
	<td id="wnt_components">
		
	</td>
	<td >
		<input class="color" id="wnt_components_C" value="#778899">
	</td>
	<td>
		<button onclick="showgenelist('wnt_components_path',this)" >show gene</button>
	</td>
</tr>



</table>
</td>
<td valign="top">

<div id="mynetwork"></div>
	
</td>
</tr></table>

<div id="addrow" style="display:none;" >
please Define your pathway name:<br>
<input type="text" name="pname" id="pname" value="newpath"><br>
<hr>
please paste your genelist:
<br>
<textarea id="userlist" rows="4" cols="50">

</textarea>
</br>
Please select your preferred color: <input class="color" id="color" value="#66ff00">
</br>
<hr>
<button onclick="addnew()" >Add new pathway</button>
<button onclick="closedia()" >Cancel</button>
</div>

  
</body>
</html>
