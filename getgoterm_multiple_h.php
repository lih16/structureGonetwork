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
	$uid=$_POST['userid'];
	$tempdir="../golinktemp/".$uid."/";
	
	$cmdpipeline='perl ./sortkey_multipleuser_h.pl '.$gl.' '.$uid;
	cmd_exec($cmdpipeline,$returnvalue,$error7);
	$htmloutput = file_get_contents($tempdir.'htmloutputsortKEY');
    echo $htmloutput;
	
}
