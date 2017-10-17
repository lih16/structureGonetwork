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
  <script type="text/javascript" src="jquery/jquery.form.js"></script>
  <script src="jquery-ui-1.10.4/js/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
  <script src="jquery-plugins/jquery.jsPlumb-1.6.2-min.js" type="text/javascript"></script>
  <script src="jquery/d3.js" charset="utf-8"></script>
  <script src="jquery/venn.js"></script>
  <script type="text/javascript" src="js/vis_new.js"></script>
  
</head>
<?php
 $genelist=file_get_contents("gogene.txt");  
 $genesplit=str_replace("\n", ":", $genelist);
?>
<script type="text/javascript">
  
  // var nodesDataset;
  // var edgesDataset;
  var nodes17 
  var edges17 
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

      // mark all nodes as hard to read.
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
    // if something is selected:
		var id=$("#search").val();
		//alert(geneidhash[id]);
		var nodeId=geneidhash[id];
		var options = {

        // position: {x:positionx,y:positiony}, // this is not relevant when focusing on nodes
        scale: 2,
        offset: {x:1,y:1},
        animation: {
          duration: 1000,
          easingFunction: "easeInQuad"
        }
      };
     
      network1.focus(nodeId, options);
		//network1.focus(nodeid,{scale:2,offset: {x:0, y:0},locked: true,animation:{duration:10,easingFunction:}});
		//{
		//	scale: Number,
		//	offset: {x:Number, y:Number}
		//	locked: boolean
		//	animation: { // -------------------> can be a boolean too!
		//		duration: Number
		//		easingFunction: String
		//	}
		//}
		/*if(input=="2"){
			for (var nodeId in allNodes) {
			
			allNodes[nodeId].color = allNodes[nodeId].hiddenColor;
        if (allNodes[nodeId].hiddenLabel !== undefined) {
			allNodes[nodeId].label = allNodes[nodeId].hiddenLabel;
          allNodes[nodeId].hiddenLabel = undefined;
        }
      }
       highlightActive = false
		
	}
    
    else if (highlightActive === true) {
      // reset all nodes
      for (var nodeId in allNodes) {
        allNodes[nodeId].color = allNodes[connectedNodes[i]].hiddenColor;
        if (allNodes[nodeId].hiddenLabel !== undefined) {
          allNodes[nodeId].label = allNodes[nodeId].hiddenLabel;
          allNodes[nodeId].hiddenLabel = undefined;
        }
      }
      highlightActive = false
    }

    // transform the object into an array
   */
	
  }
    function showsingle(){
		 var i=0;
	  for (var nodeId in allNodes) {
		 // alert(nodeId);
		 // i=i+1;
		 // alert(i);
		 
			if (allNodes[nodeId].singleLabel !== undefined) {
				allNodes[nodeId].label=allNodes[nodeId].singleLabel;
			}
			if (allNodes[nodeId].singlecolor !== undefined) {
				allNodes[nodeId].color=allNodes[nodeId].singlecolor;
			}
			
			
		
		 
		// alert(allNodes[nodeId].label) ;
	  }
	  var updateArray = [];
    for (nodeId in allNodes) {
      if (allNodes.hasOwnProperty(nodeId)) {
        updateArray.push(allNodes[nodeId]);
      }
    }
    nodesDataset.update(updateArray);
		
	}
    function hidesingle() {
    // if something is selected:
	  var i=0;
	  for (var nodeId in allNodes) {
		 // alert(nodeId);
		 // i=i+1;
		 // alert(i);
		 var connectedNodes = network1.getConnectedNodes(nodeId);
		 if(connectedNodes.length==0){
			// alert("ccc");
			if (allNodes[nodeId].singleLabel === undefined) {
				allNodes[nodeId].singleLabel=allNodes[nodeId].label;
			}
			if (allNodes[nodeId].singlecolor === undefined) {
				allNodes[nodeId].singlecolor=allNodes[nodeId].color;
			}
			allNodes[nodeId].color = 'rgba(0,0,0,0)';
			allNodes[nodeId].label="";
			
		 }
		 
		// alert(allNodes[nodeId].label) ;
	  }
	  var updateArray = [];
    for (nodeId in allNodes) {
      if (allNodes.hasOwnProperty(nodeId)) {
        updateArray.push(allNodes[nodeId]);
      }
    }
    nodesDataset.update(updateArray);
	}
    function neighbourhoodHighlight(params) {
    // if something is selected:
	
    if (params.nodes.length > 0) {
      highlightActive = true;
      var i,j;
      var selectedNode = params.nodes[0];
      var degrees = 2;

      // mark all nodes as hard to read.
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

      // get the second degree nodes
      for (i = 1; i < degrees; i++) {
        for (j = 0; j < connectedNodes.length; j++) {
          allConnectedNodes = allConnectedNodes.concat(network1.getConnectedNodes(connectedNodes[j]));
        }
      }

      // all second degree nodes get a different color and their label back
      for (i = 0; i < allConnectedNodes.length; i++) {
        allNodes[allConnectedNodes[i]].color = 'rgba(150,150,150,0.75)';
        if (allNodes[allConnectedNodes[i]].hiddenLabel !== undefined) {
          allNodes[allConnectedNodes[i]].label = allNodes[allConnectedNodes[i]].hiddenLabel;
          allNodes[allConnectedNodes[i]].hiddenLabel = undefined;
        }
      }

      // all first degree nodes get their own color and their label back
      for (i = 0; i < connectedNodes.length; i++) {
        allNodes[connectedNodes[i]].color = allNodes[connectedNodes[i]].hiddenColor;
        if (allNodes[connectedNodes[i]].hiddenLabel !== undefined) {
          allNodes[connectedNodes[i]].label = allNodes[connectedNodes[i]].hiddenLabel;
          allNodes[connectedNodes[i]].hiddenLabel = undefined;
        }
      }

      // the main node gets its own color and its label back.
      allNodes[selectedNode].color = allNodes[selectedNode].hiddenColor;
      if (allNodes[selectedNode].hiddenLabel !== undefined) {
        allNodes[selectedNode].label = allNodes[selectedNode].hiddenLabel;
        allNodes[selectedNode].hiddenLabel = undefined;
      }
    }
    else if (highlightActive === true) {
      // reset all nodes
      for (var nodeId in allNodes) {
        allNodes[nodeId].color = allNodes[connectedNodes[i]].hiddenColor;
        if (allNodes[nodeId].hiddenLabel !== undefined) {
          allNodes[nodeId].label = allNodes[nodeId].hiddenLabel;
          allNodes[nodeId].hiddenLabel = undefined;
        }
      }
      highlightActive = false
    }

    // transform the object into an array
    var updateArray = [];
    for (nodeId in allNodes) {
      if (allNodes.hasOwnProperty(nodeId)) {
        updateArray.push(allNodes[nodeId]);
      }
    }
    nodesDataset.update(updateArray);
	
  }
   function selectg(id){
	   
	   //alert(id);
	   var nodeId=geneidhash[id];
		var options = {
        // position: {x:positionx,y:positiony}, // this is not relevant when focusing on nodes
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
	  // alert(content);
		//alert(obj.closest('tr').after(content));
	 /* $("#original_path").val(genelist);
	  $("#genelist").html(htmlgene);
	   $( "#genelist" ).dialog({ 
				autoOpen: true, 
				width: 860, 
				height:300,
				
			 
				modal: true,
				//position: ['center','center'],
				resizable: true,
              
		}); 
	 */
	   
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
	   
	   //return result;
	   
   }
   function insert(result){
	   
	   $( "#addrow" ).dialog("close");
		//$('#myTable tr:last').after('<tr>...</tr><tr>...</tr>');
		//$( "<p>Test</p>" ).insertBefore( ".inner" );
		var pathName=$("#pname").val();
		var colorvalue=$("#color").val();
		var genelist=$("#userlist").val().replace(/\r\n|\r|\n/g, ":");//;
		//alert(genelist);
		genelist=genelist.replace(/\s+/g,"");
		//alert("aaa"+genelist);
		
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
		//alert("<td><input name='color' class=\"color\" value=\""+colorvalue+"\" id=\""+colorid+"\" >");
		$( newrow ).insertAfter( "#lastrow" );
		obj=$("#"+colorid);
		//obj=$("#lastrow");
		//alert(obj.attr("id"));
		//if (!obj.hasPicker) {
        //var picker = new jscolor.color(obj, {});  //
		//new jscolor.color(obj, {});
		new jscolor.init();
        //obj.hasPicker = true;
        //picker.showPicker();
   // }
		//jscolor.init();
   }
   function addnew(){
	    var genelist=$("#userlist").val().replace(/\r\n|\r|\n/g, ":");//;
		//alert(genelist);
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
				//position: ['center','center'],
				resizable: true,
                dialogClass: 'no-close success-dialog'
		}); 
		//$("#addrow").siblings('div.ui-dialog-titlebar').remove();
		$("#addrow").show();
	   //$('#myTable tr:last').after('<tr>...</tr><tr>...</tr>');
	   
   }
   function assignname(data){
	      //alert(data.AKT_COMPONENTS);
	   	  $("#AKT_COMPONENTS").html(data.AKT_COMPONENTS);
		  $.each( data, function( key, value ) {
			//alert( key + ": " + value );
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
				//position: ['center','center'],
				resizable: true,
                dialogClass: 'no-close success-dialog'
		}); 
	   
   }
   $(document).ready(function(){
	  //alert("vvv");
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
					// $("#pathd tr:has(td)").each(function () {
					// alert(rgb2hex(color));
					//  });
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				//$('#waiting').hide(500);
				alert("error");
				
			}
		});
      $(document).dblclick(function(){
		//$('#popup').hide();
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
	/*$.each(edges, function(i, el){
		if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
	});*/
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
		/*var container = document.getElementById('mynetwork');
		var data = {
			nodes: nodes1,
			edges: edges1
		};
		var options = {interaction:{hover:true}};
		var network = new vis.Network(container, data, options);
		alert(network);*/
		/*network.on("click", function (params) {
			params.event = "[original event]";
			//showpopup(params.nodes);
		    document.getElementById('eventSpan').innerHTML = '<h2>Click event:</h2>' + JSON.stringify(params, null, 4);
		});
		network.on("doubleClick", function (params) {
			params.event = "[original event]";
			document.getElementById('eventSpan').innerHTML = '<h2>doubleClick event:</h2>' + JSON.stringify(params, null, 4);
		});
		
		
		network.on("oncontext", function (params) {
			params.event = "[original event]";
			document.getElementById('eventSpan').innerHTML = '<h2>oncontext (right click) event:</h2>' + JSON.stringify(params, null, 4);
		});
		network.on("dragStart", function (params) {
			params.event = "[original event]";
			document.getElementById('eventSpan').innerHTML = '<h2>dragStart event:</h2>' + JSON.stringify(params, null, 4);
		});
		network.on("dragging", function (params) {
			params.event = "[original event]";
			document.getElementById('eventSpan').innerHTML = '<h2>dragging event:</h2>' + JSON.stringify(params, null, 4);
		});
		network.on("dragEnd", function (params) {
			params.event = "[original event]";
			document.getElementById('eventSpan').innerHTML = '<h2>dragEnd event:</h2>' + JSON.stringify(params, null, 4);
		});
		network.on("zoom", function (params) {
			document.getElementById('eventSpan').innerHTML = '<h2>zoom event:</h2>' + JSON.stringify(params, null, 4);
		});
		network.on("showPopup", function (params) {
			document.getElementById('eventSpan').innerHTML = '<h2>showPopup event: </h2>' + JSON.stringify(params, null, 4);
		});
		network.on("hidePopup", function () {
			console.log('hidePopup Event');
		});
		network.on("select", function (params) {
			console.log('select Event:', params);
		});
		network.on("selectNode", function (params) {
			console.log('selectNode Event:', params);
		});
		network.on("selectEdge", function (params) {
			console.log('selectEdge Event:', params);
		});
		network.on("deselectNode", function (params) {
			console.log('deselectNode Event:', params);
		});
		network.on("deselectEdge", function (params) {
			console.log('deselectEdge Event:', params);
		});
		network.on("hoverNode", function (params) {
			console.log('hoverNode Event:', params);
		});
		network.on("hoverEdge", function (params) {
			console.log('hoverEdge Event:', params);
		});
		network.on("blurNode", function (params) {
			console.log('blurNode Event:', params);
		});
		network.on("blurEdge", function (params) {
			console.log('blurEdge Event:', params);
		});*/
	}
	function unique(list) {
		var result = [];
		$.each(list, function(i, e) {
			if ($.inArray(e, result) == -1) 
			{
				if(e!=""){
					result.push(e);
				}
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
				//alert(pathhash[parray[index]]);
			}
		}
	}
	function getpathgenelist(checkname){
		index=0;
		var resultg=genelist;
		//input:checkbox:checked
		$("input:checkbox[name='"+checkname+"']:checked").each(function(){
			//alert($(this).val());
			var pathwayname=$(this).val();
			//var req1 = createXMLHttpRequest();
			//req1.open("GET","https://lih16.u.hpc.mssm.edu/pipeline/js/exportpathways.php?name="+pathwayname,false);
			//req1.send(null);
			//var plist=req1.responseText.replace(/<.*?>/g,"");
			var plist=$("#"+pathwayname+"_path").val();
			plist=plist.replace(/\s+/g,"");
			addpath(plist,pathwayname);
			//alert(resultg);
			resultg=resultg+":"+plist;
		
		});
		
		return resultg;
		
	}
	function output(){
		
		var i=0;
		var output="genename	pathway	genename	pathway\n";
		for(i=0;i<edges1.length;i++){
			//alert(allNodes[edges1[i].from].label+":"+allNodes[edges1[i].to].label);
			var from=allNodes[edges1[i].from].label;
			var to=allNodes[edges1[i].to].label;
			var line=allNodes[edges1[i].from].label+"	"+pathhash[from]+"	"+allNodes[edges1[i].to].label+"	"+pathhash[to]+"\n";
			output=output+line;
		}
		//alert(output);
		$.ajax({
			type : 'POST',
			url : 'ajaxdownload.php',
			dataType : 'json',
			data: {
				content:output
				
			},
			success : function(data1){
				//alert(data1.error);
				window.location.href="export2network.php";
		
	       },
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				$('#waiting').hide(500);
				alert("error");
				
			}
		});
	}
	function constructedget(list){
		//alert("lsit"+list);
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
			//alert("from "+fromto[0]+" to "+fromto[1]);
			edges1.push({from: from, to: to, length: EDGE_LENGTH_MAIN});
		}
		//edges1=unique(tempedges);
	}
	function constructnetwork(glist){
		
		var i=0;
		var j=0;
		var source;
		var target;
		//alert(glist.length);
		for(i=0;i<107;i++){
			if(i==101) continue;
			var colorid=pathhash[glist[i]]+"_C";
			//alert(colorid);
			var colorvalue=$("#"+colorid).val();
			colorvalue=colorvalue.toUpperCase();
			//alert(colorvalue);
			if(colorvalue.charAt(0)!='#')
				colorvalue="#"+colorvalue;
			//if(pathhash[glist[i]]=="original"){
				//nodes1.push({id: i, font:{size:30},label: "id"+i, color:'orange'});       
				
			//}
			/*else{
				var patharray=pathhashmutilple[glist[i]].split(":");
				//myarr.indexOf("turtles") > -1
				//inArray
				//alert(patharray);
				if(patharray.length>1){
					nodes1.push({id: i, font:{size:30},label: glist[i], shape: 'star', color: colorvalue,shapeProperties:{borderDashes:[15,15]}});
					
				}
				else
			  
			      nodes1.push({id: i, label: glist[i], color: colorvalue});
			  
			}*/
			
		   geneidhash[glist[i]]=i;
		   nodes1.push({id: i, label: 'Node 1'+i, color:'orange'});
			
		}
		//nodes1.push({id: 1,  label: 'Node 1', color:'orange'});
		
	/*	 nodes1 = [
    {id: 1,  label: 'Node 1', color:'orange'},
    {id: 2,  label: 'Node 2', color:'DarkViolet', font:{color:'white'}},
    {id: 3,  label: 'Node 3', color:'orange'},
    {id: 4,  label: 'Node 4', color:'DarkViolet', font:{color:'white'}},
    {id: 5,  label: 'Node 5', color:'orange'},
    {id: 6,  label: 'cid = 1', cid:1, color:'orange'},
    {id: 7,  label: 'cid = 1', cid:1, color:'DarkViolet', font:{color:'white'}},
    {id: 8,  label: 'cid = 1', cid:1, color:'lime'},
    {id: 9,  label: 'cid = 1', cid:1, color:'orange'},
    {id: 10, label: 'cid = 1', cid:1, color:'lime'}
  ];*/
  
 /* nodes1.push({id: 1,  label: 'Node 1', color:'orange'});
  nodes1.push({id: 2,  label: 'Node 2', color:'DarkViolet', font:{color:'white'}});
  nodes1.push({id: 3,  label: 'Node 3', color:'orange'});
  nodes1.push({id: 4,  label: 'Node 4', color:'DarkViolet', font:{color:'white'}});
  nodes1.push({id: 5,  label: 'Node 5', color:'orange'}) ; 
  nodes1.push({id: 6,  label: 'cid = 1', cid:1, color:'orange'});
  nodes1.push({id: 7,  label: 'cid = 1', cid:1, color:'DarkViolet', font:{color:'white'}});
  nodes1.push({id: 8,  label: 'cid = 1', cid:1, color:'lime'});
  nodes1.push({id: 9,  label: 'cid = 1', cid:1, color:'orange'});
  nodes1.push({id: 10, label: 'cid = 1', cid:1, color:'lime'});*/
		var resul=glist.join(":");
		
		$.ajax({
			type : 'POST',
			url : 'getgenenetwork_1.php',
			dataType : 'text',
			data: {
				glist:resul
				
			},
			success : function(data1){
				
				//constructedget(data1);
				

  // create an array with edges
  /* edges1 = [
   
    {from: 2, to: 5},
    {from: 6, to: 2},
    {from: 7, to: 5},
    {from: 8, to: 6},
    {from: 9, to: 7},
    {from: 10, to: 9}
  ];*/
  
  edges1.push({from: 2, to: 5});
  edges1.push({from: 6, to: 2});
   edges1.push({from: 7, to: 5});
    edges1.push( {from: 8, to: 6});
	 edges1.push(  {from: 9, to: 7});
	 edges1.push({from: 10, to: 9});
				
				$('#waiting').hide(1500);
				nodesDataset=new vis.DataSet(nodes1);
				edgesDataset=new vis.DataSet(edges1);
				var container = document.getElementById('mynetwork');
				var data = {
					nodes: nodes1,
					edges: edges1
				};
				 var options1 = {
    //   physics:{
     //      stabilization: true,
    //   },
	edges:{
	 physics:true
	},
    nodes: {
    //  borderWidth: 4,
     // size: 10,
      //fixed:true,
      physics:false//,
    //  color: {
    //    border: '#222222',
     //   background: '#666666'
    // },
     // font:{
     //   color:'#000000'
     // }
    },layout:{randomSeed:8}};
				network1 = new vis.Network(container, data, options1);
				network1.on("initRedraw", function () {
					//alert("aa");
				});
				allNodes = nodesDataset.get({returnType:"Object"});
				network1.on("click",neighbourhoodHighlight);
				network1.on("beforeDrawing", function (ctx) {
					//var nodeId = 1;
					//var nodePosition = network.getPositions([nodeId]);
					//ctx.strokeStyle = '#A6D5F7';
					//ctx.fillStyle = '#294475';
					//ctx.circle(nodePosition[nodeId].x, nodePosition[nodeId].y,50);
					//ctx.fill();
					//ctx.stroke();
					//alert("bb");
				});
				network1.on("afterDrawing", function (ctx) {
 					//alert("cc");
					//$('#waiting').hide(1500);
					//hidesingle();
				});
			    network1.on("stabilizationProgress", function(params) {
					//alert(params.iterations);
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
					//alert("cc");
					document.getElementById('text').innerHTML = '100%';
					document.getElementById('bar').style.width = '496px';
					document.getElementById('loadingBar').style.opacity = 0;
               		setTimeout(function () {document.getElementById('loadingBar').style.display = 'none';}, 500);
				});
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				//$('#waiting').hide(500);
				alert("error");
				
			}
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
		//$("#waiting").hide();
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
