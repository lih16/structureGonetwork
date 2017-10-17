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

if (!empty($_POST['goid'])) {
	
    $goid=$_POST['goid'];
	$uid=$_POST["uid"];
	$tempfolder="../golinktemp/";
	$directories=$tempfolder.$uid."/";
	$childrenoutput=$directories."parent.txt";
	
	////////////////////
	$cmdpipeline='/hpc/packages/minerva-common/java/1.7.0_60/jdk1.7.0_60/bin/java -jar ./Getparent.jar ../data/go.obo.txt '.$childrenoutput.' '.$goid;
	
	
	cmd_exec($cmdpipeline,$returnvalue,$error7);
	
	
	
	$children = file_get_contents($childrenoutput, FILE_USE_INCLUDE_PATH);
    echo $children;
	
}




?>