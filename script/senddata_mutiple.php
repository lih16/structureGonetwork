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
	$tempfolder="../golinktemp/";
	$directories=$tempfolder.$uid."/";
	
	file_put_contents ($directories."gogene.txt",$gl); 
	////////////////
	$goterm=$_POST['goterm'];
	file_put_contents ($directories."goterm.txt",$goterm);
	////////////////////
	$cmdpipeline='perl ./getanotation_mutiple.pl '.$gl.' '.$uid;
	
	
	cmd_exec($cmdpipeline,$returnvalue,$error7);
	$return['error'] = true;
	$return['msg'] = "Please check the file";
	
	echo json_encode($return);
}
?>