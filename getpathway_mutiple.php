<?php

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

    fclose($pipes[0]);    //Don't really want to give any input

    $exit = proc_close($proc);
    $stdout = file($outfile);
    $stderr = file($errfile);

    unlink($outfile);
    unlink($errfile);
    return $exit;
}

if (!empty($_POST['genedata'])) {
	
    $gl=$_POST['genedata'];
	$uid=$_POST["uid"];
	$filters=$_POST["filters"];
	$tempfolder="golinktemp/";
	$directories=$tempfolder.$uid."/";
	
	
	$cmdpipeline='perl ./script/dbtogopathway_mutiple.pl '.$uid.' '.$filters;
	$file = fopen("test1","w");
   fwrite($file,$cmdpipeline);
	fclose($file);
	cmd_exec($cmdpipeline,$returnvalue,$error7);
	$return['error'] = true;
	$return['msg'] = "Please check the file";
	
	echo json_encode($return);
}
?>