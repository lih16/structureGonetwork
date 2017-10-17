var optionlist="<option value='1' selected>1</option>";
   for(i=2;i<70;i++){
	   var temp="<option value='"+i+"' >"+i+"</option>";
	   optionlist=optionlist+temp;
}
	
var mutationtype="<select  id='mutype'>"+
	"<option value='Missense'>Missense</option>"+
	"<option value='SILENT'>SILENT</option>"+ 
	"<option value='MISSENSE'>MISSENSE</option>"+
    "</select><br><button id='buttonid' type='button'>OK</button>";
	
	
var hothtml="<table border=1>"+
  "<tr>"+
    "<th>mutation type</th>"+
    "<th>threashold</th>"+
   "</tr>"+
  "<tr>"+
    "<td rowspan='3'><select  id='mutype'>"+
	"<option value='Missense' selected>Missense</option>"+
	"<option value='In_Frame_Ins'>In_Frame_Ins</option>"+ 
	"<option value='In_Frame_Del' >In_Frame_Del</option>"+
	"<option value='Frame_Shift_Ins' >Frame_Shift_Ins</option>"+
	"<option value='Frame_Shift_Del' >Frame_Shift_Del</option>"+
	"<option value='Splice_Site'>Splice_Site</option>"+
	"<option value='Nonsense'>Nonsense</option>"+ 
	"<option value='De_novo_Start_InFrame' >De_novo_Start_InFrame</option>"+
	"<option value='De_novo_Start_OutOfFrame' >De_novo_Start_OutOfFrame</option>"+
	"<option value='Frame_Shift'>Frame_Shift</option>"+
	"<option value='InFrameDel'>InFrameDel</option>"+ 
	"<option value='Nonstop_Mutation' >Nonstop_Mutation</option>"+
	"<option value='Splice_Site_Del' >Splice_Site_Del</option>"+
	"<option value='Splice_Site_Ins'>Splice_Site_Ins</option>"+
	"<option value='Start_Codon_Del'>Start_Codon_Del</option>"+ 
	"<option value='Start_Codon_Ins' >Start_Codon_Ins</option>"+
	
"</select></td>"+
    "<td><select  id='times'>"+optionlist+
"</select></td>"+
  "</tr>"+
  "<tr> "+
    "<td><select  id='hotnumber'>"+optionlist+"</select></td>"+
  "</tr> "+
  "<tr> "+
    "<td><select  id='sites'>"+optionlist+"</select></td>"+
  "</tr> "+
  "<tr>"+
     "<td colspan='2'><button id='buttonid' type='button'>OK</button></td></tr>"+
"</table>";
var rightConnector = {
	connector: "Flowchart",
	anchors: ["RightMiddle", "LeftMiddle"],
	paintStyle: { lineWidth: 1, strokeStyle: "#000000" },
	overlays: [["Arrow", { width: 10, length: 10, location: 1 }]],
	endpoint: ["Dot", { radius: 10 }]
	};
var rightStraightConnector = {
	connector: "Straight",
	anchors: ["RightMiddle", "LeftMiddle"],
	paintStyle: { lineWidth: 10, strokeStyle: "#000000" },
	overlays: [["Arrow", { width: 10, length: 10, location: 1 }]],
	endpoint: ["Dot", { radius: 10 }]
};
var upConnector = {
	connector: "Flowchart",
	anchors: ["TopCenter", "BottomCenter"],
	paintStyle: { lineWidth: 10, strokeStyle: "#000000" },
	overlays: [["Arrow", { width: 10, length: 10, location: 1 }]],
	endpoint: ["Dot", { radius: 10 }]
};

var downConnector = {
	connector: "Flowchart",
	anchors: ["BottomCenter", "TopCenter"],
	paintStyle: { lineWidth: 10, strokeStyle: "#000000" },
	//paintStyle: { lineWidth: 2, strokeStyle: "#61b7cf", joinstyle: "round", outlineColor: "white", outlineWidth: 2 },
	overlays: [["Arrow", { width: 10, length: 10, location: 1 }]],
	endpoint: ["Dot", { radius: 10 }]
};
var flowConnector = {
	connector: "Flowchart",
			//anchors: ["BottomCenter", "TopCenter"],
	paintStyle: { lineWidth: 20, strokeStyle: "#61B7CF", fillStyle: "transparent" },
			//paintStyle: { lineWidth: 2, strokeStyle: "#61b7cf", joinstyle: "round", outlineColor: "white", outlineWidth: 2 },
	overlays: [["Arrow", { width: 10, length: 10, location: 1 }]],
	endpoint: ["Dot", { radius: 10 }]
};
var connectorPaintStyle = {
	lineWidth: 2,
	strokeStyle: "#61B7CF",
	joinstyle: "round",
	outlineColor: "white",
	outlineWidth: 2
	};
			
var connectorHoverStyle = {
	lineWidth: 4,
	strokeStyle: "#216477",
	outlineWidth: 2,
	outlineColor: "white"
	};
var endpointHoverStyle = {
	fillStyle: "#216477",
	strokeStyle: "#216477"
	};
var hollowCircle = {
	endpoint: ["Dot", { radius: 10 }], 
	connectorStyle: connectorPaintStyle,
	connectorHoverStyle: connectorHoverStyle,
	paintStyle: {
		strokeStyle: "#B5B9BE",
		fillStyle: "transparent",
		radius: 10,
		lineWidth: 20
	},		
	//anchor: "AutoDefault",
	isSource: true,	
	connector: ["Flowchart", { stub: [40, 60], gap: 10, cornerRadius: 5, alwaysRespectStubs: true }],  
	isTarget: true,	
	maxConnections: -1,	
	connectorOverlays: [["Arrow", { width: 20, length: 20, location: 1 }]]
};
var solidCircle = {
	endpoint: ["Dot", { radius: 10 }], 
	paintStyle: { fillStyle: "rgb(122, 176, 44)" },	
	isSource: true,	
	connector: ["Flowchart", { stub: [40, 60], gap: 10, cornerRadius: 5, alwaysRespectStubs: true }], 
				isTarget: true,		
				//anchor: "AutoDefault",
				maxConnections: 3,	
				connectorOverlays: [["Arrow", { width: 15, length: 15, location: 1 }]]
};
function save() {	
    var connects = [];
	$.each(jsPlumb.getAllConnections(), function (idx, connection) {
	var cont = connection.getLabel();
	connects.push({
	ConnectionId: connection.id,
	PageSourceId: connection.sourceId,
	PageTargetId: connection.targetId,
	SourceText: connection.source.innerText,
	TargetText: connection.target.innerText,
	SourceAnchor: connection.endpoints[0].anchor.type,
	TargetAnchor: connection.endpoints[1].anchor.type,
	ConnectText: $(cont).html()
    });
});
   var blocks = [];
   $("#right .node").each(function (idx, elem) {
   var $elem = $(elem);
   blocks.push({
		BlockId: $elem.attr('id'),
		BlockContent: $elem.text(),
		//BlockContent: $elem.text(),
		BlockX: parseInt($elem.css("left"), 10),
		BlockY: parseInt($elem.css("top"), 10)
	});
   });
   var serliza = JSON.stringify(connects) + "&" + JSON.stringify(blocks);
   //var filename=$("#fname").val();
	$.ajax({
		type: "post",
		url: "ajax.php",
		data: { 
		 id: serliza 
                        //filename: filename
		},
		success: function (filePath) {
				
		}
	});
	//window.close();
	//window.open('', '_self', ''); //close for chrome
    // window.close();
}