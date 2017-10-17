<?php
	/*
	 * Script:    DataTables server-side script for PHP and MySQL
	 * Copyright: 2010 - Allan Jardine
	 * License:   GPL v2 or BSD (3-point)
	 */
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	//,'uniprot','AAchange','varianttype','dbsnp','disease','diseasecancer','pubchemid' 
	$aColumns = array( 'genesymbol' );
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "genesymbol";
	
	/* DB table to use */
	$uid=$_GET['uid'];
	//$sTable = "tabletemp";
	$sTable="tabletemp_".$uid;
	$file = fopen("test17","w");
    fwrite($file,$sTable);
	fclose($file);
    
	
	/* Database connection information */
	$gaSql['user']       = "lih16_a";
	$gaSql['password']   = "Gkhbwef45YU";
	$gaSql['db']         = "lih16_a";
	$gaSql['server']     = "db";
	$unipr="";
	$myfile = fopen("testjson.txt", "w") or die("Unable to open file!");
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 */
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
	
	
	/* 
	 * Paging
	 */
	function everything_in_tags($string, $tagname)
	{
		$pattern = "#<\s*?$tagname\b[^>]*>(.*?)</$tagname\b[^>]*>#s";
		preg_match($pattern, $string, $matches);
		return $matches[1];
	}
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		$i=0;
		fwrite($myfile,  "sortcol".$_GET['iSortCol_'.$i]);
		fwrite($myfile,  "sortingcols".$_GET['iSortingCols']);
		
		fwrite($myfile,  "sortdir".$_GET['sSortDir_'.$i]);
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			fwrite($myfile,  "aaaatrue  ");
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				fwrite($myfile,  "vvvasdfdtrue  ");
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
			}
		}
        fwrite($myfile,  "sortdir  ".$sOrder);
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere group by genesymbol $sOrder $sLimit";
		
	
fclose($myfile);

//create table
//$dropsql="drop TEMPORARY table IF EXISTS $sTable ";
//$dResult = mysql_query( $dropsql, $gaSql['link'] ) or die(mysql_error());
$createsql="create TEMPORARY table $sTable select * from gtabletemp where uid='".$uid."'";
$cResult = mysql_query( $createsql, $gaSql['link'] ) or die(mysql_error());	
	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if($aColumns[$i] == "genesymbol")
			{
				$row[] = $aRow[ $aColumns[$i] ];
				$genesymbol=$aRow[ $aColumns[$i] ];
				//$sQuery = "SELECT COUNT(uniprot) FROM   $sTable where genesymbol='$genesymbol' ";
				$sQuery = "SELECT count(d1) FROM (select uniprot as d1 from $sTable a where a.genesymbol='$genesymbol' and a.uniprot<>'-' and a.uniprot<>'' and a.uniprot<>'NULL' group by uniprot ) as dis";
				$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
				$aResultTotal = mysql_fetch_array($rResultTotal);
				$iTotal = $aResultTotal[0];
				if($iTotal>0)
					$row[]="<a href=\"#\" onclick=\"display(this,'$genesymbol','uniprot','$i');return false;\"> $iTotal</a>";
                else
					$row[]="NULL";
				//$sQuery = "SELECT COUNT(AAchange) FROM   $sTable where genesymbol='$genesymbol' ";
				$sQuery = "SELECT count(d1) FROM (select AAchange as d1 from $sTable a where a.genesymbol='$genesymbol' and a.AAchange<>'-' and a.AAchange<>'' and a.AAchange<>'NULL' group by AAchange ) as dis";
				$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
				$aResultTotal = mysql_fetch_array($rResultTotal);
				$iTotal = $aResultTotal[0];
				if($iTotal>0)
					$row[]="<a href=\"#\" onclick=\"display(this,'$genesymbol','AAchange','$i');return false;\">  $iTotal</a>";
				else
					$row[]="NULL";
				$sQuery = "SELECT count(d1) FROM (select dbsnp as d1 from $sTable a where a.genesymbol='$genesymbol' and a.dbsnp<>'-' and a.dbsnp<>'' and a.dbsnp<>'NULL' group by dbsnp ) as dis";
				$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
				$aResultTotal = mysql_fetch_array($rResultTotal);
				$iTotal = $aResultTotal[0];
				if($iTotal>0)
				  $row[]="<a href=\"#\" onclick=\"display(this,'$genesymbol','dbsnp','$i');return false;\">  $iTotal</a>";
				else
				  $row[]="NULL";
			    
				//$sQuery = "SELECT COUNT(disease) FROM   $sTable where genesymbol='$genesymbol'";
				//echo $sQuery."<br>";
				$sQuery = "SELECT count(d1) FROM (select disease as d1 from $sTable a where a.genesymbol='$genesymbol' and a.disease<>'-' and a.disease<>'' and a.disease<>'NULL' group by disease ) as dis";
				$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
				$aResultTotal = mysql_fetch_array($rResultTotal);
				$iTotal = $aResultTotal[0];
				if($iTotal>0)
				  $row[]="<a href=\"#\" onclick=\"display(this,'$genesymbol','disease','$i');return false;\">  $iTotal</a>";
				else
				  $row[]="NULL";
				//$sQuery = "SELECT COUNT(diseasecancer) FROM   $sTable where genesymbol='$genesymbol'";
				$sQuery = "SELECT count(d1) FROM (select diseasecancer as d1 from $sTable a where a.genesymbol='$genesymbol' and a.diseasecancer<>'-' and a.diseasecancer<>'' and a.diseasecancer<>'NULL' group by diseasecancer ) as dis";
				//echo $sQuery."<br>";
				$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
				$aResultTotal = mysql_fetch_array($rResultTotal);
				$iTotal = $aResultTotal[0];
				if($iTotal>0)
				  $row[]="<a href=\"#\" onclick=\"display(this,'$genesymbol','diseasecancer','$i');return false;\"> $iTotal</a>";
				else
				  $row[]="NULL";
				//$sQuery = "SELECT COUNT(pubchemid) FROM   $sTable where genesymbol='$genesymbol' and pubchemid<>\"\"";
				$sQuery = "SELECT count(d1) FROM (select pubchemid as d1 from $sTable a where a.genesymbol='$genesymbol' and a.pubchemid<>'-' and a.pubchemid<>'' and a.pubchemid<>'NULL' group by pubchemid ) as dis";
				//echo $sQuery."<br>";
				$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
				$aResultTotal = mysql_fetch_array($rResultTotal);
				$iTotal = $aResultTotal[0];
				if($iTotal>0)
				  $row[]="<a href=\"#\" onclick=\"display(this,'$genesymbol','pubchemid','$i');return false;\">  $iTotal</a>";
				else
				  $row[]="NULL";
				//'uniprot','AAchange','varianttype','dbsnp','disease','diseasecancer','pubchemid'
			}
		    else if ( $aColumns[$i] == "uniprot" )
			{
				/* Special output formatting for 'version' column */
				$unipr=$aRow[ $aColumns[$i] ];
				$row[] = "<a href=http://www.uniprot.org/uniprot/".$aRow[ $aColumns[$i] ]."  target='_blank'>".$aRow[ $aColumns[$i] ]."</a>";
			}
			else if($aColumns[$i] == "AAchange"){
				
				$row[] = "<a href=jmol/jmol3d.php?pdbid=".$unipr."  target='_blank'>".$aRow[ $aColumns[$i] ]."</a>";
				
			}
			else if($aColumns[$i] == "pubchemid")
			{
				//if (($aRow[ $aColumns[$i] != '')||($aRow[ $aColumns[$i] != 'NULL'))
				//{
				
				$row[] = "<a href=jmol/molecular.php?pubid=".$aRow[ $aColumns[$i] ]."  target='_blank'> ".$aRow[ $aColumns[$i] ]."</a>";
				
				//}
				
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			}
			
			
		}
		$output['aaData'][] = $row;
	}
	//$dropsql="drop TEMPORARY table IF EXISTS $sTable ";
    //$dResult = mysql_query( $dropsql, $gaSql['link'] ) or die(mysql_error());
	echo json_encode( $output );
	
?>