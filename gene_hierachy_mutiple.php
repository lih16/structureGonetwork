<!doctype html>
<html>
<head>
  <title>Gene Disease Network</title>

<style type="text/css">
 #loadingBar {
    position:absolute;
    top:0px;
    left:0px;
    width: 100%;
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
}
</style>
 <script src="../jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
 <script src="../jquery-ui-1.10.4/js/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
 <script src="../jquery/layout.js" type="text/javascript"></script>
 <script src="../js/vis_nothreshold_4_5.js" type="text/javascript" ></script>
 <script src="../jquery/jscolor.js" charset="utf-8"></script>
 <script src="../jquery/source.js" charset="utf-8"></script>
 <link  href="../js/vis.css" rel="stylesheet" type="text/css" />
  
</head>
<?php
 $uid=$_GET["uid"];  
 $goid=$_GET["goid"];
?>
<script type="text/javascript">
   var uid="<?php echo $uid; ?>";
   var goid="<?php echo $goid; ?>";
   
   var nodes=null;
   var edges=null;
   var network = null;
   var colors=["#E5E4E2","#98AFC7","#488AC7","#56A5EC","#3EA99F","#6AA121","#FFFF00","#E67451"];
   var edgecolors=["#1F45FC","#FF2400","#488AC7","#56A5EC","#3EA99F","#6AA121","#FFFF00","#E67451"];
  function wordwrap(str, int_width, str_break, cut) {
  var m = ((arguments.length >= 2) ? arguments[1] : 75);
  var b = ((arguments.length >= 3) ? arguments[2] : '\n');
  var c = ((arguments.length >= 4) ? arguments[3] : false);

  var i, j, l, s, r;

  str += '';

  if (m < 1) {
    return str;
  }

  for (i = -1, l = (r = str.split(/\r\n|\n|\r/))
    .length; ++i < l; r[i] += s) {
    for (s = r[i], r[i] = ''; s.length > m; r[i] += s.slice(0, j) + ((s = s.slice(j))
        .length ? b : '')) {
      j = c == 2 || (j = s.slice(0, m + 1)
        .match(/\S*(\s)?$/))[1] ? m : j.input.length - j[0].length || c == 1 && m || j.input.length + (j = s.slice(
          m)
        .match(/^\S*/))[0].length;
    }
  }

  return r.join('\n');
}
    function destroy() {
            if (network !== null) {
                network.destroy();
                network = null;
            }
        }

        function draw() {
           destroy();
           var container = document.getElementById('mynetwork');
           var data = {
                nodes: nodes,
                edges: edges
            };

           var options = {
			   nodes: {
        
        scaling: {
          min: 10,
          max: 30
        },
        font: {
          size: 10,
          face: 'Tahoma'
        }
      },
			layout: {
			randomSeed: undefined,
			improvedLayout:true,
			hierarchical: {
   
			levelSeparation: 200,
			nodeSpacing: 100,
			treeSpacing: 100,
 
			direction: 'UD'
	  
    }
			}
              
            
            };
            network = new vis.Network(container, data, options);
			 network.on("stabilizationProgress", function(params) {
			var maxWidth = 496;
			var minWidth = 20;
			var widthFactor = params.iterations/params.total;
			var width = Math.max(minWidth,maxWidth * widthFactor);
			document.getElementById('loadingBar').style.opacity = 1;
            setTimeout(function () {document.getElementById('loadingBar').style.display = 'block';}, 0);
			document.getElementById('bar').style.width = width + 'px';
			document.getElementById('text').innerHTML = Math.round(widthFactor*100) + '%';
          });
          network.once("stabilizationIterationsDone", function() {
			 
			 document.getElementById('text').innerHTML = '100%';
			 document.getElementById('bar').style.width = '496px';
			 document.getElementById('loadingBar').style.opacity = 0;
             setTimeout(function () {document.getElementById('loadingBar').style.display = 'none';}, 500);
			 var options1 = {
				nodes: { physics:false},
				edges: { physics:false, smooth: {
            enabled: false
        }},
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

			},interaction: {
          navigationButtons: true,
          keyboard: true
        },layout:{randomSeed:8}};
			network.setOptions(options1);
			 var options2 = {
        scale: 1,
        offset: {x:1,y:1},
        animation: {
          duration: 1000,
          easingFunction: "easeInQuad"
        }
      };
      network.focus(Rootnode, options2);
		});

        
		   
        }
   function parseGOchirdren(gochildren){
	  nodes=[];
	  edges=[];
	  gochildren=gochildren.replace(/\//g, ' ');
	  var lines=gochildren.split("\n");
	   //alert(lines.length);
	   var i=0;
	   var j=0;
	   var nodeidhash={};
	   var edgeidhash={};
	   var countnodes=0;
	   for(i=0;i<lines.length-1;i++){
		   if(countnodes>20)
			   break;
		   
		   var golevels=lines[i].split("$");
		  
		   var level=i;//7-parseInt(golevels[0]);
		 
		   var goedges=golevels[1].split("|");
		   for(j=0;j<goedges.length;j++){
			
			  
			   var nodearrays=goedges[j].split("!");
			   var nodeids=nodearrays[0];
			   var nodenames=nodearrays[1];
			   var nodeidsarray=nodeids.split("#");
			   var nodenamessarray=nodenames.split("#")
			   var nodeids1="i_"+nodeidsarray[0].replace("GO:","");
			   var nodeids2="i_"+nodeidsarray[1].replace("GO:","");
			   var nodename1=nodenamessarray[0];
			   var nodename2=nodenamessarray[1];;
			 
			   var showname1=nodename1;
			   var showname2=nodename2;
			   showname1=wordwrap(nodename1,7, '\n');
			   showname2=wordwrap(nodename2,7, '\n');
			   var edgetype=nodenamessarray[2];
			   if((i==0)&&(j==0)){
				   Rootnode=nodeids1;
				  
			   }
			
			   var nodeadd=null;
			  if(nodeidhash[nodeids1]===undefined){
				   
				   nodeidhash[nodeids1]=level;
				   nodeadd=	{id: nodeids1, label:showname1, title: nodename1,shape: 'box',color:colors[level]};
				   nodeadd["level"]=level;
				   nodes.push(nodeadd);
				   countnodes++;
			   }
			   
			   if(nodeidhash[nodeids2]===undefined){
				   
				   nodeidhash[nodeids2]=level+1;
				  
				   nodeadd=	{id: nodeids2, label:showname2,title: nodename2,shape: 'box',color:colors[level+1]};
				   nodeadd["level"]=level+1;
				   nodes.push(nodeadd);
				   countnodes++;
			   
			       
			   
			   }
			   if((nodeidhash[nodeids1]<nodeidhash[nodeids2])&&(edgeidhash[nodeids1+"_"+nodeids2]===undefined))
			   {
				  
				   var labelofedge="is_a";
				   edgeidhash[nodeids1+"_"+nodeids2]=1;
				   
				   if(edgetype==0){
					   edgeadd={from: nodeids1,label:labelofedge, to: nodeids2,arrows:'to',color:edgecolors[0]};
					   
				   }
				   else if(edgetype==1){
					   
					   labelofedge="part_of";
					    edgeadd={from: nodeids1,label:labelofedge, to: nodeids2,arrows:'to' , dashes:true,color:edgecolors[1]};
					  
				   }
				   else if(edgetype==2){
					   
					   labelofedge="regulates";
					    edgeadd={from: nodeids1,label:labelofedge, to: nodeids2,arrows:'to' , dashes:true,color:edgecolors[2]};
					  
				   }
				   else if(edgetype==3){
					   
					   labelofedge="positively_regulates";
					    edgeadd={from: nodeids1,label:labelofedge, to: nodeids2,arrows:'to' , dashes:true,color:edgecolors[3]};
					  
				   }
				   else if(edgetype==4){
					   
					   labelofedge="negatively_regulates";
					    edgeadd={from: nodeids1,label:labelofedge, to: nodeids2,arrows:'to' , dashes:true,color:edgecolors[4]};
					  
				   }
				   else{
					   labelofedge="is_a";
					   edgeadd={from: nodeids1,label:labelofedge, to: nodeids2,arrows:'to',color:edgecolors[0]};
				   }
					
					edges.push(edgeadd);
			
			   }
			   
		   }
		  
	   }
	 
	   if(countnodes==0){
		   
		   alert("there is no children terms");
		   window.close();
	   }
	  
	   
   }

   $(document).ready(function(){
	
	$.ajax({
			type : 'POST',
			url : 'script/getchildren_mutiple.php',
			dataType : 'text',
			data: {
				goid:goid,
				uid:uid
				
			},
			success : function(data1){
				
				$('#waiting').hide(500);
				
				parseGOchirdren(data1);
				draw();
				
		
	       },
			error : function(XMLHttpRequest, textStatus, errorThrown) {
			
				alert("error");
				
			}
		});
   });
  
  </script>
<body  >
<div id="loadingBar"  style="display: none">	
	<div class="outerBorder">
        <div id="text">0%</div>
         <div id="border">
            <div id="bar"></div>
        </div>
    </div>
</div>
<div id="waiting"  >
<p><center>The data is loading from the server:</center></p>     		
<p><center><img src="../images/8.gif"></center><br></p>
</div>
<div id="mynetwork" style="height:800px"></div>





</body>
</html>
