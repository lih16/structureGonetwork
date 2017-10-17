<!DOCTYPE HTML> 
<html>
  <head>
    <meta charset="utf-8">
    <title>DashBoard</title>
	<style>
		.ui-widget-header{background-image:none;background-color:#A157A4;}
		.ui-widget-content { background: #FFCCCC; }
		.slide .ui-slider-range {
			background: #887e6d;
		}
		.ui-slider-handle { border-color: #887e6d; }
		.tooltip {
			display:none;
			position:absolute;
			border:1px solid #333;
			background-color:#FFFFFF;
			border-radius:5px;
			padding:10px;
			color:#000;
			font-size:12px Arial;
		}
</style>
	<link rel="stylesheet" type="text/css" href="css/filter.css" />
    <link rel="stylesheet" href="css/screen.css" media="screen" />
    <link rel="stylesheet" href="css/jquery.treetable.css" />
    <link rel="stylesheet" href="css/jquery.treetable.theme.default.css" />
	<link rel="stylesheet" href="css/screen.css" media="screen" />
    <link rel="stylesheet" href="css/jquery.treetable.css" />
    <link rel="stylesheet" href="css/jquery.treetable.theme.default.css" />
	<link href="css/simple-slider.css" rel="stylesheet" type="text/css" />
	<link href="css/simple-slider-volume.css" rel="stylesheet" type="text/css" /> 
	<link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
	<link rel="stylesheet"  type="text/css" href="jquery-ui.css" />
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="js/jquery.js"></script>
	<script src="jquery-ui-1.10.4/js/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
	<script src="js/jquery.ui.core.js"></script>
    <script src="js/jquery.ui.widget.js"></script>
    <script src="js/jquery.ui.mouse.js"></script>
    <script src="js/jquery.ui.draggable.js"></script>
    <script src="js/jquery.ui.droppable.js"></script>
    <script src="js/jquery.treetable.js"></script>
	<script src="jquery/d3.js"></script>
	<script type="text/javascript" src="jquery/jquery.form.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    
   
    <link rel="stylesheet" href="/resources/demos/style.css">
	
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	
<!--
	<link rel="stylesheet" type="text/css" href="css/filter.css" />
	<link rel="stylesheet"  type="text/css" href="css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="./resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="./resources/demo.css">
	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="resources/demo.js"></script>
	<script type="text/javascript" src="jquery/jquery.form.js"></script>
	
	<script src="jquery-plugins/jquery.jsPlumb-1.6.2-min.js" type="text/javascript"></script>
	<script src="js/jquery.js"></script>
    <script src="js/jquery.ui.core.js"></script>
    <script src="js/jquery.ui.widget.js"></script>
    <script src="js/jquery.ui.mouse.js"></script>
    <script src="js/jquery.ui.draggable.js"></script>
    <script src="js/jquery.ui.droppable.js"></script>
    <script src="js/jquery.treetable.js"></script>
	<script src="jquery/d3.js" charset="utf-8"></script>
	-->
	<link rel="stylesheet"  type="text/css" href="jquery-ui.css" />
<script>
   var bar ;//= $('.bar');
   var percent ;//= $('.percent');
	//var showimg;// = $('#showimg');
   var progress;// = $(".progress");
   var files;// = $(".files");
   var btn;// = $(".btn span");
   function showtable(datatype){
	/*  if($.fn.dataTable.isDataTable('#example')){
		$('#example').DataTable().ajax.reload();;
	  }
	  else{ 
		table= $('#example').dataTable({
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "server_processing.php",
					"fnDrawCallback": function( oSettings ) {
						      
					}
			});
	  }*/
   }
   function readyforfilter(id){
	/* var uploadid=id+"_upload";
	 var uploadstatus=  $("#"+id+"type");//id+"type";
	 $("#"+id).wrap("<form id='"+uploadid+"' action='vcf_upload.php' method='post' enctype='multipart/form-data'></form>");
	 $("#"+id).change(function(){
		$("#"+uploadid).ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
				
        		progress.show();
        		var percentVal = '0%';
        		bar.width(percentVal);
        		percent.html(percentVal);
				uploadstatus.html("uploading...");
				
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		var percentVal = percentComplete + '%';
        		bar.width(percentVal);
        		percent.html(percentVal);
    		},
			success: function(data) {
				uploadstatus.html("uploaded");
			}
		  
		  });
    });
	*/
   }
   function readyforped(){
	 $("#pedupload").wrap("<form id='mypedupload' action='wes_upload.php' method='post' enctype='multipart/form-data'></form>");
     $("#pedupload").change(function(){
		$("#mypedupload").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
				progress.show();
        		var percentVal = '0%';
        		bar.width(percentVal);
        		percent.html(percentVal);
				btn.html("uploading...");
				
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		var percentVal = percentComplete + '%';
        		bar.width(percentVal);
        		percent.html(percentVal);
    		},
			success: function(data) {
				
				
				afterupload(data);
				var fdata=parseped(data.content);
				alert(fdata);
				inittree(fdata);
			},
			error:function(xhr){
				btn.html("fail to upload");
				bar.width('0')
				files.html(xhr.responseText);
			}
		});
	});
	
   }
	
   function parseped(data){
	 var peddata=data.split("\n");
	  var f1=peddata[0].split("\t");
	  var f2=peddata[1].split("\t");
	  var f3=peddata[2].split("\t");
	  var fdata={};
	  fdata.id=f1[1];
	  fdata.affected=f1[5];
	  fdata.geneder=f1[4];
	  if(fdata.geneder==2){
		if(fdata.affected==2){
		  fdata.icon="images/female_affected.png";
	    }
			    else
					fdata.icon="images/female.png";
					
			}
			else {
				if(fdata.affected==2){
					fdata.icon="images/male_affected.png";
				}
				else
					fdata.icon="images/male.png";
			}
			
			fdata.parents=[];
			fdata.parents[0]={};
			fdata.parents[0].id=f2[1];
			fdata.parents[0].parents=[];
			fdata.parents[0].affected=f2[5];
			fdata.parents[0].geneder=f2[4];
			if(fdata.parents[0].geneder==2){
				fdata.parents[0].icon="images/AR_male.png";
			}
			else {
				fdata.parents[0].icon="images/AR_female.png";
			}
			fdata.parents[1]={};
			fdata.parents[1].parents=[];
			fdata.parents[1].id=f3[1];
			fdata.parents[1].affected=f3[5];
			fdata.parents[1].geneder=f3[4];
			if(fdata.parents[1].geneder==2){
				fdata.parents[1].icon="images/AR_male.png";
			}
			else {
				fdata.parents[1].icon="images/AR_female.png";
			}
		return fdata;
	}
	
	function afterupload(data){
		
		btn.html("uploaded");
		files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.pic+"'>Delete</span>");
		$(".delimg").on('click',function(){
			var pic = $(this).attr("rel");
			$.post("wes_upload.php?act=delimg",{imagename:pic},function(msg){
				if(msg==1){
					btn.html("upload");
					files.html("Delete");
					progress.hide();
				}else{
					alert(msg);
				}
			});
		});
		//$('#waiting').hide(500);
        //$('#cssmenu').show(500);
        //$('#loadLog').hide(500);
	    $('#showped').show(500);
		$('#workflow').fadeOut(1000, function( ) {
				$('#workflow').fadeIn(500);
				$('#workflow').attr("src","wesIMG/"+imagesArray[2]);
		});
		
	}
    function inittree(fdata){
		var margin = {top: 100, right: 50, bottom: 100, left: 50},
		width = 500 - margin.left - margin.right,
		height = 400 - margin.top - margin.bottom;
		var tree = d3.layout.tree()
			.separation(function(a, b) { return a.parent === b.parent ? 1 : 1.2; })
			.children(function(d) { return d.parents; })
			.size([width, height]);
		var svg = d3.select("#pedtree")
			.style("background-color", "#FFFFFF")
			.append("svg")
			.attr("width", width + margin.left + margin.right)
			.attr("height", height + margin.top + margin.bottom)
			.append("g")
			.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
		var nodes = tree.nodes(fdata);
  		var node = svg.selectAll(".node")
			.data(nodes)
			.enter()
			.append("g");
        var myimage=node.append("image")
			.attr("name", function(d) { return d.id; })
			.attr("xlink:href", function(d) { return d.icon; })
			.attr("x", function(d) { return d.x - 35; })
			.attr("y", function(d) { return height - d.y - 20; })
			.attr("width", "70px")
			.style("cursor","hand")
			.attr("height", "48px");
			myimage.on("click", function(d){
				currentd3v=d3.select(this);
				var position = d3.mouse(this);					
				$( "#pedsex" ).dialog({ 
						autoOpen: true, 
						width: 500, 
						height:200,
						modal: true,
						position: [position[0],position[1]],
				}); 

		
			});
		var myname=node.append("text")
		.attr("font-size", "16px")
		.attr("fill", "black")
		.attr("x", function(d) { return d.x; })
		.style("cursor","hand")
		.attr("y", function(d) { return height - d.y-30 ; })
		.style("text-anchor", "middle")
		.text(function(d) { return d.id; });
		myname.on("click", function(d){
			currentd3v=d3.select(this);
			var position = d3.mouse(this);					
			$( "#pedid" ).dialog({ 
				autoOpen: true, 
				width: 500, 
				height:200,
				show: "blind", 
				hide: "explode", 
				modal: true,
				position: [position[0],position[1]],
			}); 					
		});

		var link = svg.selectAll(".link")
			.data(tree.links(nodes))
			.enter()
			.insert("path", "g")
			.attr("fill", '#FFFFFF')
			.attr("stroke", "#F00")
			.attr("stroke", "#F00")
			.attr("shape-rendering", "optimizeSpeed")
			.attr("d", connect);
  		function connect(d, i) {
			return     "M" + d.source.x + "," + (height - d.source.y)
             + "V" + (height - (3*d.source.y + 4*d.target.y)/7)
             + "H" + d.target.x
             + "V" + (height - d.target.y);
		};
		
	}
	
$(document).ready(function(){
	bar = $('.bar');
	percent = $('.percent');
	progress = $(".progress");
	files = $(".files");
	btn = $(".btn span");
	$("#example-basic").treetable({ expandable: true });
	$("#example-basic-static").treetable();
	$("#example-basic-expandable").treetable({ expandable: true });
    $("#example-advanced").treetable({ expandable: true });
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
	readyforped();
	//////////////
	
	/////////////////////  

});
    /*  $("form#reveal").submit(function() {
        var nodeId = $("#revealNodeId").val()

        try {
          $("#example-advanced").treetable("reveal", nodeId);
        }
        catch(error) {
          alert(error.message);
        }

        return false;
      });*/
    </script>
  </head>
 <style>
	.ui-widget-header{background-image:none;background-color:#A157A4;}
	.ui-widget-content { background: #FFCCCC; }
	.slide .ui-slider-range {
		background: #887e6d;
	}
	.ui-slider-handle { border-color: #887e6d; }
	.tooltip {
		display:none;
		position:absolute;
		border:1px solid #333;
		background-color:#FFFFFF;
		border-radius:5px;
		padding:10px;
		color:#000;
		font-size:12px Arial;
	}
</style>
  <body>
<?php
    $dir = "/hpc/users/lih16/www/V1"; 
	function tree($directory,$index,$root)
    {
		$mydir = dir($directory);
   		$count=0;
		while($file = $mydir->read())
		{
   		    if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!=".."))
			{
          		if($root==0)
				{
					echo " <tr data-tt-id=".$count." ><td><input type='radio' name=project onchange='handleChange1(this);' value=$file ><span class='folder'>$file</span></td><td>Folder</td><td>--</td></tr>";
					tree("$directory/$file",$count,1);
  				    $count=$count+1;
				}
				else
				{
					echo " <tr data-tt-id=$index-$count data-tt-parent-id=$index><td><span class='folder'>$file</span></td><td>Folder</td><td>--</td></tr>";
					tree("$directory/$file",$index."-".$count,1);
					$count=$count+1;
				}
			}
			if(!(is_dir("$directory/$file")) AND ($file!=".") AND ($file!=".."))
			{
				$size=filesize ("$directory/$file");
				if($root==0)
					echo "<tr data-tt-id=$count><td><span class='file'>$file</span></td><td>$file</td><td>$size</td></tr>";
				else
					echo "<tr data-tt-id=$index-$count data-tt-parent-id=$index><td><span class='file'>$file</span></td><td>$file</td><td>$size</td></tr>";
				$count=$count+1;
			}

		}
		$mydir->close();
	}   
?>

<table align="center" >
	<tr><td align="center" width="1190px">
		<img id="workflow" src="./wesIMG/workflow1.png" height="30px" width="1190px" >
	</td></tr>
</table>
<table width="1180px" align="center" CELLPADDING="0" CELLSPACING="0" BORDERCOLOR="grey" border="1px"  >
	<tr>
		<td>
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F"> Upload pedigree file &nbsp: </span>
		</td>
		<td>
			<div class="btn" id="ped">
				<span>PED</span>
				<input id="pedupload" type="file" name="mypic">
			</div>
		</td>
		<td> 
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F" >Read about <a href='./mafformat.txt'>format</a> </span><br>
		</td>
		<td > 
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F" > <a href='./mafformat.txt'>Download Sample Data</a> </span><br>
		</td>
	</tr>
	<tr>
		<td>
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F"> Upload VCF data &nbsp: </span>
		</td>
		<td>
			<div class="btn" id="data1type">
            <span>datatype one</span>
			<input id="data1" type="file" name="data1" />
			</div>
		</td>
		<td rowspan="3">
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F" >Read about <a href='./mafformat.txt' target="_blank">format</a></span>
		</td>
		<td> 
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F" > <a href='./mafformat.txt'>Download Sample Data</a> </span><br>
		</td>
	</tr>
	<tr>
		<td>
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F"> Upload VCF data &nbsp: </span>
		</td>
		<td>
			<div class="btn" id="data2type">
            <span>data2</span>
			<input id="data2" type="file" name="CNV" />
			</div>
		</td>
		<td> 
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F" > <a href='./mafformat.txt'>Download Sample Data</a> </span><br>
		</td>
  </tr>
  <tr>
		<td>
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F"> Upload VCF data &nbsp: </span>
		</td>
		<td>
			<div class="btn" id="data3type">
            <span>data type three</span>
			<input id="data3" type="file" name="CNV" />
			</div>
		</td>
		<td> 
			<span style="color:#282828;font-family:verdana; font-size:15px;color:#2C4A5F" > <a href='./mafformat.txt'>Download Sample Data</a> </span><br>
		</td>
  </tr>
</table>

<div class="container">
   <table  id="example-advanced">
    <caption>
        <a href="#" onclick="jQuery('#example-advanced').treetable('expandAll'); return false;">Expand all</a>
        <a href="#" onclick="jQuery('#example-advanced').treetable('collapseAll'); return false;">Collapse all</a>
    </caption>
    <thead>
        <tr>
           <th>Name</th>
           <th>Kind</th>
           <th>Size</th>
        </tr>
    </thead>
    <tbody>
	<?php
		tree($dir,0,0);
	?>
    </tbody>
   </table>
</div>


   <div id="showped"  style="border: 0px solid rgb(201, 0, 1); overflow: hidden; margin: 0px  auto; display:none; max-width: 900;">
	  <table align="center" style="border-spacing: 15px">
		<tr>
			<td style="background-clip: padding-box;background-color:#F2F2F2;border: 5px solid grey;border-radius: 30px; box-shadow: rgba(0,0,0,0.8) 0 0 10px;padding:10px">
			<div id='pedtree'></div>
			</td>
			
		</tr>
	 </table>
  </div>
  
  <div id="waiting" style="display: none;">
  	<p><center><img src="images/8.gif"></center><br></p>
  </div>
  
  <table width="1180px" align="center" CELLPADDING="0" CELLSPACING="0"   >
      <tr><td align="center">
        <div class="progress">
    		<span class="bar"></span><span class="percent">0%</span >
		</div>
	    <div id="pedstatus" class="files" STYLE="font-family: Arial Black; font-size: 15px; color: black">Ped upload status </div>
		<div id="datafilestatus" class="files" STYLE="font-family: Arial Black; font-size: 15px; color: black">Ped upload status </div>
	  </td></tr>
   </table>
<div id="pedsex" style="display:none;">
	<input type="radio" name="sex"  value="af" checked>affected<br>
    <input type="radio" name="sex" value="uaf">unaffected<br><br><br>
	<button id='pedsexbutton1' onclick="conpedaffect()" type='button'>confirm</button>
	<button id='pedsexbutton2' onclick="cancelpedaffect()"  type='button'>cancel</button>
</div>

<div id="pedid"  style="display:none;">
	Sample ID: <input type="text" id="sampleid" name="sampleid">
	<button id='pedid1' onclick="conpedid()" type='button'>confirm</button>
	<button id='pedid2' onclick="cancelpedid()" type='button'>cancel</button>
</div>

</body>
</html>
