<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>GO Networks -  a tool for Gene Ontologies, Gene Networks and Gene Pathways Analysis</title>
<style>
 html, body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: top;
}
 [class^=slider] { display: inline-block; margin-bottom: 30px; }
  .output { color: #888; font-size: 14px; padding-top: 1px; margin-left: 5px; vertical-align: top;}
  h1 { font-size: 20px; }
  h2 { clear: both; margin: 0; margin-bottom: 5px; font-size: 16px; }
  p { font-size: 15px; margin-bottom: 30px; }
  h2:first-of-type { margin-top: 0; }
  .AcceptedBar > .ui-progressbar-value {
   background:green;
}
   span.output {font-size:120%;color:gray;}
a.one:link {color:#ff0000;}
a.one:visited {color:#0000ff;}
a.one:hover {color:#ffcc00;}

a.two:link {color:#ff0000;}
a.two:visited {color:#0000ff;}
a.two:hover {font-size:150%;}

a.three:link {color:#ff0000;}
a.three:visited {color:#ff0000;}
a.three:hover {background:#66ff66;}

a.four:link {color:#ff0000;}
a.four:visited {color:#0000ff;}
a.four:hover {font-family:monospace;}

a.five:link {color:#ff0000;text-decoration:none;}
a.five:visited {color:#0000ff;text-decoration:none;}
a.five:hover {text-decoration:underline;}
.transcript {
	margin:auto;padding:5px;
	width:100%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #827e7e;
	border-collapse:collapse;
		
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
}.transcript table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.transcript tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.transcript table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.transcript table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.transcript tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.transcript tr:hover td{
	background-color:#ffffff;
		

}
.transcript td{
	vertical-align:top;
	
	background-color:#f7f4f4;

	border:1px solid #827e7e;
	border-width:0px 1px 1px 0px;
	text-align:center;
	padding:1px;
	font-size:9px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.transcript tr:last-child td{
	border-width:0px 1px 0px 0px;
}.transcript tr td:last-child{
	border-width:0px 0px 1px 0px;
}.transcript tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.transcript tr:first-child td{
		background:-o-linear-gradient(bottom, #f4efef 5%, #f4efef 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f4efef), color-stop(1, #f4efef) );
	background:-moz-linear-gradient( center top, #f4efef 5%, #f4efef 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#f4efef", endColorstr="#f4efef");	background: -o-linear-gradient(top,#f4efef,f4efef);

	background-color:#f4efef;
	border:0px solid #827e7e;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:9px;
	font-family:Arial;
	font-weight:bold;
	color:#000000;
}
.transcript tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #f4efef 5%, #f4efef 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f4efef), color-stop(1, #f4efef) );
	background:-moz-linear-gradient( center top, #f4efef 5%, #f4efef 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#f4efef", endColorstr="#f4efef");	background: -o-linear-gradient(top,#f4efef,f4efef);

	background-color:#f4efef;
}
.transcript tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.transcript tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
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

.ui-widget-header{background-image:none;background-color:#A157A4;}
.ui-widget-content { background: #FFCCCC; }


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
.tdclass{
	width:400px;
	height:300px;
	
	
}
.head2{
	text-align:left;
	background-color: #ADD8E6;
}
.head1{
	text-align:left;
	background-color: #D9DDE6;
}
.head3{
	text-align:left;
	background-color: #98AFC7;
}
.divprocess{
	height:300px;
	overflow:auto;
	
	
	
}
.bprocess{
	width:400px;
	height:30px;
	font-size: 21px;
    font-weight: bold;
    padding-left: 5px;
    padding-bottom: 3px;
	background-color: #E9E9D7;
	
	
	
}
.mfunction{
	
	width:400px;
	height:30px;
	font-size: 21px;
    font-weight: bold;
    padding-left: 5px;
    padding-bottom: 3px;
	background-color: #EBE2E2;
	
	
}
#progressbar.ui-dialog-titlebar {
    display: none;
}
.cell{
	
	width:400px;
	height:30px;
	font-size: 21px;
    font-weight: bold;
    padding-left: 5px;
    padding-bottom: 3px;
	background-color: #E8F8F9;
	
	
}
#header-wrap {
    height: 50px;
    width: 100%;
    z-index: 100;
    background-color:lightgrey;
    color:white;
    text-align:left;
    padding-top:15px;
	}
#footer {
    border-top: solid 1px grey;
    background: white;
    color: black;
    font-size: 12px;
    padding: 10px;
    width: 1210px;
    top: 800px;
    height: 50px;
    position: absolute;
}
select {
  font-size: 17px;
  font-family: 'Averia Libre', cursive;
}
.service-small option {
    font-size: 30px;
    padding: 5px;
    background: #5c5c5c;
}

.container{
	width: 100%;
	height:100%;
	margin: 0 auto;
}
ul.tabs{
			margin: 0px;
			padding: 0px;
			list-style: none;
		}
		ul.tabs li{
			background: #FBF5F5;
			color: #222;
			display: inline-block;
			padding: 10px 15px;
			cursor: pointer;
			font-size:15px;
		}
		ul.tabs li.current{
			background: #ededed;
			color: #222;
		}
		.tab-content{
			display: none;
			background: #ededed;
			padding: 15px;
			height:100%;
		}
		.tab-content.current{
			display: inherit;
		}
		
.flash {
  color: #8;
  background: #D8D8D8 ;
 
  
  
  background-color: #D8D8D8;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #000000;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 12px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

.mybutton{
  /*-webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
  color: #FFFFFF;*/
  
  background-color: #A9A9A9;
   // border: none;
    color: white;
   // padding: 15px 32px;
   // text-align: center;
   // text-decoration: none;
   // display: inline-block;
   // font-size: 16px;
   // margin: 4px 2px;
    cursor: pointer;
}
.flash:hover {
  color: #FFF;
  background: #900;
}
.progress-label {
    float: left;
    margin-left: 50%;
    margin-top: 5px;
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
}
</style>
<link href="../css/simple-slider.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../media/css/jquery.dataTables.css">
<style type="text/css" class="init">
</style>
<link href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script src="../jquery-ui-1.10.4/js/jquery-ui-1.10.4.js" type="text/javascript"></script>
<script src="../js/jquery.ui.core.js"></script>
<script src="../js/jquery.ui.widget.js"></script>
<script src="../js/jquery.ui.widget.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="../resources/syntax/shCore.js"></script>
<script src="../js/simple-slider_test.js"></script>
<script type="text/javascript" src="../zeroclip/ZeroClipboard.js"></script>
<script type="text/javascript" src="../build/jquery.dialogextend.js"></script>
<script src="../js/simple-slider_test.js"></script>

<script>
var table;
var outputchecked;
var uid = "";
var hitgenes = "";
var pathway_session_gene = "unknow";
var network_session_gene = "unknow";

function createXMLHttpRequest() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
/*
data
*/
function uniqId() {
    return Math.round(new Date().getTime() + (Math.random() * 100));
}

function addsample() {
    $("#genelist").val("FLT3\nSMO\nGLA\nSGCB\nOAT\nCAPN3\nASS1\nAGXT\nAKT1\nPTPN1\nPIAS1\nCDKN1B\nTHEM4\nCCNE1\nMAP2K4");
}

function equalArray(arr1, arr2) {

    return $(arr1).not(arr2).length === 0 && $(arr2).not(arr1).length === 0;
}
Array.prototype.compare = function(testArr) {
    if (this.length != testArr.length) return false;
    for (var i = 0; i < testArr.length; i++) {
        if (this[i].compare) { //To test values in nested arrays
            if (!this[i].compare(testArr[i])) return false;
        } else if (this[i] !== testArr[i]) return false;
    }
    return true;
}

function getAllfilters(checkname) {
    array = [];

    $("input:checkbox[name='pathwayfilter[]']:checked").each(function() {
        array.push($(this).val());


    });
    return array;
}
var filtersession = [];

function showProgress() {

    $("#progressbar").dialog({
        autoOpen: true,
        open: function(event, ui) {

            $(this).parent().children('.ui-dialog-titlebar').hide();
        },
        width: 800,
        height: 100,
        dialogClass: "no-titlebar",
        create: function(event, ui) {
            $(this).find('.ui-widget-header').css({
                'background-color': 'blue'
            })
        },



        modal: true,
        closeOnEscape: false

    });
    progressbar.progressbar("value", 2);
    progress();


}

function dialog_confirm_callback(value) {
    if (value) {
        var array = getAllfilters('pathwayfilter[]');
        var filters = array.join(":");
        if (!filters) {
            alert("you need select filters first by database source");
            return false;
        }

        var arr1 = pathway_session_gene.split(":");
        var arr2 = hitgenes.split(":");
        pathway_session_gene = hitgenes;
        if ((!equalArray(arr1, arr2)) || (!equalArray(filtersession, array))) {
            if (!equalArray(filtersession, array)) {
                filtersession = array;

            }
            $("#waiting").show(500);
            showProgress();
            $.ajax({
                type: 'POST',
                url: 'getpathway_mutiple.php',
                dataType: 'text',
                data: {
                    genedata: hitgenes,
                    filters: filters,
                    uid: uid

                },
                success: function(data1) {

                    $("#progressbar").dialog('close');
                    $("#waiting").hide(500);
                    var iframe = $('#pathway');
                    iframe.attr('src', "showpathgo_mutiple.php?uid=" + uid);


                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#waiting').hide(500);
                    alert(textStatus);

                }
            });

        } else {
            //var iframe = $('#pathway');
            //iframe.attr('src', "showpathgo_mutiple.php?uid="+uid);
        }
    } else {
        //alert("Rejected");
    }
}
var last;
var pathwayTimer;
var progressbar;
var progressLabel;

function progress() {

    var val = progressbar.progressbar("value") || 0;
    var url = "golinktemp/" + uid + "/pathprogress";

    var progressdata;
    var found = 0;
    var stage = 1;
    $.ajax({
        url: url,
        async: false,
        cache: false, // with this, you can force the browser to not make cache of the retrieved data
        dataType: "text",
        success: function(data) {
            if (!data) {
                progressdata = "0:1:1";
                found = 0;
            } else {
                progressdata = data;
                found = 1;
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            progressdata = "0:1:1";

        }
    });

    if (found == 1) {
        var array = progressdata.split(":");
        var p = (parseFloat(array[0]) / parseFloat(array[1])) * 100;

        val = Math.ceil(p);
        stage = array[2];
        if ((val >= 99) && (stage == 1)) {

            val = 0;

        }
        progressbar.progressbar("value", val);
    } else {
        val = progressbar.progressbar("value") || 0;

        if ((val >= 99) && (stage == 1)) val = 0;
        progressbar.progressbar("value", val);
    }

    if ((val < 99)) {
        setTimeout(progress, 10);
    }
    //alert(val);

}


$(document).ready(function() {

    /////////////
    progressbar = $("#progressbar");
    progressLabel = $(".progress-label");

    progressbar.progressbar({
        value: false,
        change: function() {
            progressLabel.text(progressbar.progressbar("value") + "%");
        },
        complete: function() {
            progressLabel.text("Complete!");
        }
    });




    ////////
    uid = uniqId();
    $('#mybutton').hide(500);
    $('#exportcsv').hide(500);




    $('ul.tabs li').click(function() {
        var tab_id = $(this).attr('data-tab');
        if (tab_id == "tab-2") {

            var iframe = $('#resultframe');
            iframe.attr('src', "venn_mutiple.php?uid=" + uid);

        }

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
        if (tab_id == "tab-6") {

            $("#pathfilter").dialog({
                autoOpen: true,
                width: 600,
                height: 500,
                modal: true,
                position: ['center', 'center'],
                buttons: {
                    "Compute": function() {
                        $(this).dialog("close");

                        dialog_confirm_callback(true);
                    },
                    Cancel: function() {
                        $(this).dialog("close");
                        dialog_confirm_callback(false);

                    }
                }
            });



        }
        if (tab_id == "tab-5") {

            var arr1 = network_session_gene.split(":");
            var arr2 = hitgenes.split(":");
            network_session_gene = hitgenes;
            if (!equalArray(arr1, arr2)) {
                var iframe = $('#network');
                iframe.attr('src', "gene_network_menu_all_test_t.php?uid=" + uid);
            }
            var wWidth = $(window).width();
            var dWidth = wWidth;
            var wHeight = $(window).height();
            var dHeight = wHeight;
            var dialogOptions = {
                // "title" : "dialog@" + new Date().getTime(),
                "width": dWidth,
                "height": dHeight,
                "modal": false,
                "resizable": true,
                "draggable": true,
                "close": function() {
                    if (last[0] != this) {
                        $(this).remove();
                    }
                }
            };
            var dialogExtendOptions = {
                "closable": true,
                "maximizable": true,
                "minimizable": true,
                "minimizeLocation": 'left',
                //  "collapsable" : true,
                // "dblclick" : 'collapse',
                "titlebar": false
            };
            if (last) {
                last.dialog(dialogOptions).dialogExtend(dialogExtendOptions);
            } else
                last = $("#tab-5").dialog(dialogOptions).dialogExtend(dialogExtendOptions);

        }
        if (tab_id == "tab-4") {

            download();
        }
        if (tab_id == "tab-1") {

            download1();
        }
    })

    $("#genelist").bind('paste', function(e) {

    });

    $("#genelist").focus(function() {

    });
    ZeroClipboard.config({
        moviePath: 'zeroclip/ZeroClipboard.swf'
    }); //);//.setMoviePath('http://davidwalsh.name/demo/ZeroClipboard.swf'));
    var client = new ZeroClipboard($("#mydownload"));
    client.on("copy", function(event) {
        var clipboard = event.clipboardData;
        var copytext = $('#downlist').html();
        clipboard.setData("text/plain", copytext);
    });
});

function showchildren(term) {
    var hurl = "gene_hierachy_mutiple.php?uid=" + uid + "&goid=" + term;
    var win = window.open(hurl, '_blank');
    win.focus();

}

function showparent(term) {
    var hurl = "gene_hierachy_mutiple_father.php?uid=" + uid + "&goid=" + term;
    var win = window.open(hurl, '_blank');
    win.focus();

}

function cleararea() {
    $('#genelist').val('');

}

function collectAllcells() {

    var exporttext = "";
    $(".divprocess").each(function(index, value) {

        var classGO = "";
        if (index == 0) {
            classGO = "process";
        }
        if (index == 1) {
            classGO = "function";
        }
        if (index == 2) {
            classGO = "component";
        }

        $(this).find('li').each(function() {
            exporttext = exporttext + classGO + ",";

            var geneset = $(this).find('a').attr('onclick').replace("mouseover(\"", "").replace("\")", "");

            var myarray = $(this).text().split("|");
            exporttext = exporttext + myarray[0].trim() + "," + myarray[1].trim() + "," + geneset + "!";

        });

    });
    exporttext = exporttext.trim();
    exporttext = exporttext.trim("!").slice(0, -1);

    $.ajax({
        type: 'POST',
        url: 'script/exportGO.php',
        dataType: 'text',
        data: {
            outdata: exporttext

        },
        success: function(data1) {



            window.location.href = "script/file.csv";


        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {

            alert(textStatus);

        }
    });

}

function retrieve() {

    var content = $('#genelist').val();
    var con1 = $("#genelist").val();

    con1 = con1.replace(/\t/g, ' ');
    con1 = con1.replace(/\s\s+/g, ' ');
    con1 = con1.replace(/ /g, "\n");
    con1 = con1.replace(/\"/g, "");
    content = con1;
    if (content == "") {
        alert("please paste some genes");
        return false;
    }

    var contentarr = content.split("\n");
    for (var i = 0; i < contentarr.length; i++) {
        contentarr[i] = contentarr[i].split("|")[0];
        contentarr[i] = contentarr[i].split("_")[0];

    }
    gl = contentarr.join(":");
    $('#waiting').show(500);
    //$("#mybutton").prev().remove();
    $("#showgene").hide(500);
    $("#showsub").hide(500);

    $.ajax({
        type: 'POST',
        url: 'script/getgoterm_multiple_h.php',

        dataType: 'text',
        data: {
            userid: uid,
            genedata: gl

        },
        success: function(data1) {

            $('#waiting').hide(500);
            $('#temptable').remove();
            $('#mytemphr').remove();

            var temp1 = "	<input  id='pkeyword' type='text' placeholder='input keyword for Process' name='pname'>";
            temp1 = temp1 + "<button onclick='listprocess(\"PROCESS\")'>Search</button>";
            temp1 = temp1 + "<button onclick=\"showall('PROCESS')\">unchcheck all</button>";
            temp1 = temp1 + "<button onclick=\"selectall('PROCESS')\">check all</button>";
            temp1 = "<th class=\"head1\">" + temp1 + "</th>";
            var temp2 = "<input id=\"fkeyword\" type=\"text\" placeholder='input keyword for Process' name=\"fname\" >";
            temp2 = temp2 + "<button  onclick=\"listprocess('Function')\">Search</button>";
            temp2 = temp2 + "<button onclick=\"showall('Function')\">uncheck all</button>";
            temp2 = temp2 + "<button onclick=\"selectall('Function')\">check all</button>";
            temp2 = "<th class=head2>" + temp2 + "</th>";
            var temp3 = "<input id=\"ckeyword\" type=\"text\" placeholder='input keyword for Cell' name=\"cname\" >";
            temp3 = temp3 + "<button  onclick=\"listprocess('CELL')\">Search</button>";
            temp3 = temp3 + "<button onclick=\"showall('CELL')\">uncheck all</button>";
            temp3 = temp3 + "<button onclick=\"selectall('CELL')\">check all</button>";
            temp3 = "<th class=head3>" + temp3 + "</th>";
            var temp = "<tr>" + temp1 + temp2 + temp3 + "</tr>";
            data1 = "<table id=\"temptable\" border=1 style=\"border:0px solid #E8E8E8 ;border-spacing:1px; padding-top:10px\"=1>" + temp + data1 + "</table><hr id=\"mytemphr\" />";

            $(data1).insertAfter("#showgene");
            $('#pkeyword').keydown(function(e) {
                if (e.keyCode === 13) {
                    listprocess("PROCESS");
                }
            });
            $('#fkeyword').keydown(function(e) {
                if (e.keyCode === 13) {
                    listprocess("Function");
                }
            });
            $('#ckeyword').keydown(function(e) {
                if (e.keyCode === 13) {
                    listprocess("CELL");
                }
            });

            $("#showgene").show(500);
            $('#mybutton').show(500);
            $('#exportcsv').show(500);




        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            $('#waiting').hide(500);
        }
    });

}

function mouseover(obj) {
    alert(obj);
}

function showall(checkname) {

    $("input:checkbox[name='" + checkname + "']").each(function() {
        $(this).parent().show();
        $(this).prop('checked', false);

    });
}

function selectall(checkname) {

    $("input:checkbox[name='" + checkname + "']").each(function() {
        $(this).parent().show();
        $(this).prop('checked', true);

    });
}

function listprocess(checkname) {
    var string1;
    if (checkname == "Function") {
        if (($("#fkeyword").val() == "") || ($("#pkeyword").val() == " ")) {
            alert("please input your keyword");
            return;
        }
        string1 = $("#fkeyword").val();
    }
    if (checkname == "CELL") {
        if (($("#ckeyword").val() == "") || ($("#pkeyword").val() == " ")) {
            alert("please input your keyword");
            return;
        }
        string1 = $("#ckeyword").val();
    }

    if (checkname == "PROCESS") {
        if (($("#pkeyword").val() == "") || ($("#pkeyword").val() == " ")) {
            alert("please input your keyword");
            return;
        }
        string1 = $("#pkeyword").val();
    }
    $("input:checkbox[name='" + checkname + "']").each(function() {
        var str = $(this).parent().text();
        var res = str.split("|");
        var matchstring = res[1];
        var result = matchstring.match(new RegExp(string1, "i"));
        if (result) {
            $(this).prop('checked', true);
        } else {
            $(this).parent().hide();

        }
    });
}
$.intersection1 = function(a, b) {
    return $.grep(a, function(i) {
        return $.inArray(i, b) > -1;
    });
};

function copyToClipboard(txt) {
    if (window.clipboardData) {
        window.clipboardData.clearData();
        window.clipboardData.setData("Text", txt);
        alert("已经成功复制到剪帖板上！");
    } else if (navigator.userAgent.indexOf("Opera") != -1) {
        window.location = txt;
    } else if (window.netscape) {
        try {
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
        } catch (e) {
            alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");
        }
        var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
        if (!clip) return;
        var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
        if (!trans) return;
        trans.addDataFlavor('text/unicode');
        var str = new Object();
        var len = new Object();
        var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
        var copytext = txt;
        str.data = copytext;
        trans.setTransferData("text/unicode", str, copytext.length * 2);
        var clipid = Components.interfaces.nsIClipboard;
        if (!clip) return false;
        clip.setData(trans, null, clipid.kGlobalClipboard);
        alert("已经成功复制到剪帖板上！");
    }
}


function setCopyLink() {
    $("#txt_CopyLink").val(document.URL)
        .focus(function() {
            $(this).css({
                "background-color": "#ddd"
            }).select();
            copyToClipboard($("#txt_CopyLink").val());
        }).blur(function() {
            $(this).css({
                "background-color": "#fff"
            });
        });
}

function unique(list) {
    var result = [];
    $.each(list, function(i, e) {
        if ($.inArray(e, result) == -1) result.push(e);
    });
    return result;
}

function getallcheckname(checkname) {
    var result = "";
    var funarray = {};
    var proarray = {};
    var cellarray = {};
    var arrayresult;
    var tmp;
    outputchecked = "";
    var condition = $("#condition").val();
    $("input:checkbox[name=" + checkname + "]:checked").each(function() {
        var tmp = $(this).parent().find('a').attr('title').split(":");
        outputchecked = outputchecked + $(this).val() + "!";
        funarray = $.merge(tmp, funarray);
    });
    funarray = unique(funarray);
    $("input:checkbox[name='CELL']:checked").each(function() {
        result = result + $(this).val() + "!";
        // alert( $(this).parent().text());
        outputchecked = outputchecked + $(this).val() + "!"; //outputchecked+$(this).parent().text().replace("  ","")+"!";
        var tmp = $(this).parent().find('a').attr('title').split(":");
        proarray = $.merge(tmp, proarray);
    });
    //alert(outputchecked);
    proarray = unique(proarray);
    $("input:checkbox[name='PROCESS']:checked").each(function() {
        result = result + $(this).val() + "!";
        outputchecked = outputchecked + $(this).val() + "!";
        var tmp = $(this).parent().find('a').attr('title').split(":");
        cellarray = $.merge(tmp, cellarray);
    });
    cellarray = unique(cellarray);
    if (condition == 1) {

        arrayresult = $.merge(funarray, cellarray);
        arrayresult = $.merge(arrayresult, proarray);
    }

    if (condition == 2) {

        arrayresult = $.intersection1(funarray, cellarray);
        arrayresult = $.intersection1(arrayresult, proarray);

    }
    if (condition == 5) {
        arrayresult = $.merge(funarray, proarray);
        arrayresult = $.intersection1(arrayresult, cellarray);
    }
    if (condition == 3) {
        arrayresult = $.merge(funarray, cellarray);
        arrayresult = $.intersection1(arrayresult, proarray);
    }
    if (condition == 4) {
        arrayresult = $.intersection1(funarray, proarray);
        arrayresult = $.intersection1(arrayresult, cellarray);
    }
    var fr = unique(arrayresult);


    result = fr.join(":");
    return result;
}

function download() {

    window.location.href = "export2csv_mutiple.php?uid=" + uid;

}

function download1() {

    window.location.href = "export2genelist_mutiple.php?uid=" + uid;

}

function showanotation() {
    $('#downlist').hide();
    $('#nogeneset').hide();
    $('#datatablediv').show();
}

function showglist() {
    $('#downlist').show();
    $('#datatablediv').hide();
}

function display(id, gene, item, rownumber) {
    //alert($(id).closest('tr').after("<div>asdfasdfasdf<div>"));
    //alert(item);
    //

    //alert(gene);
    var tid = "r_temp_" + rownumber + "_" + item;
    if ($("#" + tid).length > 0) {
        $("#" + tid).remove();
        $(id).removeClass('three');
        return;
    }
    $(id).addClass('three');
    var XMLHttpReq7 = createXMLHttpRequest(); //for browse jump
    XMLHttpReq7.open("GET", "exportbygene_mutiple.php?gene=" + gene + "&item=" + item + "&uid=" + uid, false);


    XMLHttpReq7.send(null);
    var text = XMLHttpReq7.responseText.replace(/<.*?>/g, ""); //.split("\n");

    var trs = text.split("\n");
    var content = "<tr id=" + tid + "><td colspan=7><table class=\"transcript\" >";
    for (var i = 0; i < trs.length - 1; i++) {
        var unipro = "";
        if ((content != "") && (content != " ")) {
            content = content + "<tr>";

            if (item == "uniprot") {
                content = content + "<td>";
                content = content + "<a href=http://www.uniprot.org/uniprot/" + trs[i] + "  target='_blank'>" + trs[i] + "</a>";
                content = content + "</td>";
                content = content + "<td>";
                content = content + "<a href=../jmol/jmol3d.php?pdbid=" + trs[i] + "  target='_blank'>3D Molecular View</a>";
                content = content + "</td>";

            } else if (item == "dbsnp") {
                content = content + "<td>";
                var rs = trs[i].replace("rs", "");
                content = content + "<a href=http://www.ncbi.nlm.nih.gov/SNP/snp_ref.cgi?type=rs&rs=" + rs + "  target='_blank'>" + trs[i] + "</a>";
                content = content + "</td>";

            } else if (item == "pubchemid") {
                content = content + "<td>";
                var rs = trs[i].replace("rs", "");
                content = content + "<a href=../jmol/molecular.php?pubid=" + trs[i] + "  target='_blank'> " + trs[i] + "</a>";
                content = content + "</td>";

            } else if ((item == "AAchange") || (item == "disease") || (item == "diseasecancer")) {
                content = content + "<td>";
                content = content + trs[i]; //content+trs[i];
                content = content + "</td>";
            }
            //content=content+trs[i];

            content = content + "</tr>";
        }
    }
    content = content + "</table></td></tr>";
    //alert(content);
    //$("#temptable").remove();
    $(id).closest('tr').after(content);
}

function showfront(op) {
    if (op == 1) {
        $("#hidefront").html("<a id=\"click\" style=\"text-decoration:none;font-size: 20px;\" title=\"Click to show submit\" href=\"#\" onclick=\"showfront(0);return false;\"><img src=\"../images/DownArrow.gif\" width=\"28px\" height=\"17px\">&nbsp;&nbsp; Show result</a>");
        $("#showsub").hide(500);
        $("#showgene").show(500);
        $("#submitpard").show(500);
        $('#temptable').show(500);
        $('#mytemphr').show(500);
        $('#mybutton').show(500);
        $('#exportcsv').show(500);



    } else {
        $("#hidefront").html("<a id=\"click\" style=\"text-decoration:none;font-size: 20px;\" title=\"Click to show submit\" href=\"#\" onclick=\"showfront(1);return false;\"><img src=\"../images/DownArrow.gif\"  width=\"28px\" height=\"17px\" >&nbsp;&nbsp;Submit gene or GO selection</a>");
        $("#showsub").show(500);
        $("#showgene").hide(500);
        $("#submitpard").hide(500);
        $('#temptable').hide(500);
        $('#mytemphr').hide(500);
        $('#mybutton').hide(500);
        $('#exportcsv').hide(500);

    }

}

function showaftertable() {


}

function subset() {

    var result1 = getallcheckname("Function");

    if (result1 == "") {
        alert("There is no hit genes! Please select go terms again. ");
        return false;


    }
    hitgenes = result1;
    $('#waiting').show(500);
    var textareac = "<textarea rows='5' id='downlist' cols='7' name='downlist'>" + result1.replace(/:/g, "\n") + "</textarea><br>";
    $('#downlist').html(result1.replace(/:/g, "<br>"));
    var req3 = createXMLHttpRequest(); //for addPvar
    req3.open("GET", "script/getfileoutput_mutiple.php?file=not_ingo_output&uid=" + uid, false);
    req3.send(null);
    var vNodes = req3.responseText.replace(/<.*?>/g, ""); //.split("\n");
    if (!vNodes.trim()) {
        $('#nogeneset').html("All genes hit! ");
    } else
        $('#nogeneset').html(vNodes.replace(/\n/g, "<br>"));


    $.ajax({
        type: 'POST',
        url: 'script/senddata_mutiple.php',
        dataType: 'text',
        data: {
            genedata: result1,
            goterm: outputchecked,
            uid: uid

        },
        success: function(data1) {
            if ($.fn.dataTable.isDataTable('#example')) {
                $('#example').DataTable().ajax.reload();;
            } else {
                table = $('#example').dataTable({
                    "bProcessing": true,
                    "bServerSide": true,
                    "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [1, 2, 3, 4, 5, 6]
                    }],
                    "sAjaxSource": "script/server_processing_mutiple.php?uid=" + uid,
                    "fnDrawCallback": function(oSettings) {
                        $('#waiting').hide(500);
                        $("#showsub").show(500);
                        $("#showgene").hide(500);
                        $("#submitpard").hide(500);
                        $("#hidefront").html("<a id=\"click\" style=\"text-decoration:none;font-size: 20px;\" title=\"Click to show submit\" href=\"#\" onclick=\"showfront(1);return false;\"><img src=\"../images/DownArrow.gif\"  width=\"28px\" height=\"17px\" >&nbsp;&nbsp;Submit gene or GO selection</a>");
                        $("#hidefront").show(500);
                        $('#temptable').hide(500);
                        $('#mytemphr').hide(500);




                    }
                });
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            $('#waiting').hide(500);
            alert("error");

        }
    });
}

function gohome() {
    window.location.href = "gonetwork.php";
}
</script>
</head>
<body>
<div id="progressbar" class="AcceptedBar" style="display:none;"> 
    <div class="progress-label">Loading...</div>
</div>
<div id="pathfilter" style="display:none;"> 

 <fieldset>
           <legend>Select Pathway Database</legend>
                <input type="checkbox" name="pathwayfilter[]" value="KEGG" checked />KEGG <br />
                <input type="checkbox" name="pathwayfilter[]" value="REACTOME" checked />REACTOME<br />
				<input type="checkbox" name="pathwayfilter[]" value="WikiPathways" checked />WikiPathways <br />
               	<input type="checkbox" name="pathwayfilter[]" value="BIOCYC" checked />BIOCYC<br />
                <input type="checkbox" name="pathwayfilter[]" value="MyCancerlGenomics" checked />MyCancer Genomics<br />
                
 </fieldset>
 
 </div>
	<!--<header id="header-wrap" style="height:50px; padding:5px; color:black;font-size:16px;">
		<div id="banner-text"><h2>Gene Ontology Analysis</h2></div>
	</header>-->
	
	<div id="bottom_link" class="logo" style="padding-bottom:10px;font-family:Arial; border-bottom:solid 2px grey;">
<table style="width:100%" ><tr><td valign="bottom" width="3%"  ><br><a href="#" onclick="gohome();" ><img src="../images/GOnet.png" width="100px" height="84px" style="PADDING-RIGHT: 40px" ></a></td><td valign="bottom" style="width:80%; align=left;font-size:27px;font-family:Arial;color:black; font-weight:bold"><br>GO Networks 
  – <span style="color:#282828;font-family:verdana; font-size:14px;color:#2C4A5F" > <br>   a tool for Gene Ontologies, Gene Networks and Gene Pathways Analysis</td>
    <td valign="bottom" align="right"><br><img src="../images/MSSMLogo.png" height=65px width=325px></tr>
</table>

</div>
	<div id="hidefront" style="display: none;"></div>
	<div id="submitpard" style="padding-left:0px;"> <h3> Please paste gene names here:  <a href="#" onclick="addsample();">Add Example</a>&nbsp;&nbsp;&nbsp;<a href="./Tutorial.pdf"  target="_blank">Tutorial</a></h3>
		<textarea rows="7" id="genelist" cols="90" name="genelist">
		</textarea>
		<br><button class="flash" onclick="retrieve();">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="flash" onclick="cleararea();">Clear</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="mybutton flash" id="mybutton" onclick="subset()">GO Pathway and Network Analysis</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="mybutton flash" id="exportcsv" onclick="collectAllcells()">Download</button>
		<br>
		<br>
		
    </div>
	<div id="waiting" style="display: none;">
		<p><center><img src="../images/8.gif"></center><br></p>
	</div>
	
	<div id="showgene" name="showgene" style="display:none;">
		<select  id="condition">
			<option  value="1" selected>(Biology Process) &cup; (Molecular Function) &cup; (Cellular Component) </option>
			<option  value="2">(Biology Process) &cap; (Molecular Function) &cap; (Cellular Component)</option>
			<option  value="3">(Biology Process) &cup; (Molecular Function) &cap; (Cellular Component)</option>
			<option  value="4">(Biology Process) &cap; (Molecular Function) &cup; (Cellular Component)</option>
			<option  value="5">(Biology Process) &cup; (Cellular Component) &cap; (Molecular Function)</option>
		</select> <br>
	</div>
	<div id="showsub" style="display:none; padding:0px">
	    <!--<a href="gopage.php">Home</a>-->
		<div class="container">
			<ul class="tabs">
				<li class="tab-link  current" data-tab="tab-3">Genes List</li>
				<li class="tab-link" data-tab="tab-5">Protein Protein network</li>
				<li class="tab-link" data-tab="tab-6">Pathway Analysis</li>
				<li class="tab-link " data-tab="datatablediv">Annotation</li>
				
				
				
				<li class="tab-link" data-tab="tab-1">Download the gene list</li>
				<li class="tab-link" data-tab="tab-4">Download the gene annotation table</li>
			</ul>
		<div id="tab-3" class="tab-content current">
			<table  class="transcript">
			<tr><th class="head1">Gene List in GO Database </th>
			<th class="head1">Gene List not in GO Database</th></tr>
				<tr >
					<td class="head3" valign="top"><div align="left" style="overflow: auto; min-height: 1px; max-height: 500px;font-size: 12px; color:#0000FF" id="downlist"></div></td>
					<td class="head3" valign="top"><div align="left" style="overflow: auto; min-height: 1px; max-height: 500px;font-size: 12px;color:#0000FF" id="nogeneset"></div></td>
				</tr>
			</table>
		
		</div>
	<div id="datatablediv" class="tab-content ">
		<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th align="left">gene symbol</th>
						<th align="left">uniprot</th>
						<th align="left">AA change</th>
						<th align="left">dbsnp</th>
						<th align="left">disease</th>
						<th align="left">cancer</th>
						<th align="left">pub chem</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th align="left">gene symbol</th>
						<th align="left">uniprot</th>
						<th align="left">AA change</th>
						<th align="left">dbsnp</th>
						<th align="left">disease</th>
						<th align="left">cancer</th>
						<th align="left">pub chem</th>
					</tr>
				</tfoot>
			</table>
			</div>
	</div>
	<div id="tab-5" class="tab-content ">
	    <iframe id="network" style=" margin-left: 0px; height: 100%; margin-top: 0px; width: 100%; ">
		</iframe>
	</div>
	<div id="tab-6" class="tab-content ">
	

	   <iframe id="pathway" style=" margin-left: 0px; height: 600px; margin-top: 0px; width: 100%; ">
		</iframe>
	</div>
	<div id="tab-4" class="tab-content ">
	   You are downloading the gene annoation table to your local driver
	</div>
	<div id="tab-1" class="tab-content ">
	   You are downloading the gene list to your local driver
	</div>
	<div id="tab-2" class="tab-content ">
		 <iframe id="resultframe" style=" margin-left: 0px; height: 600px; margin-top: 0px; width:100%; ">
		 </iframe>
	</div>
</div>
</div>
<script>
	
</script>

</body>
</html>
