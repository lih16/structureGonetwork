#!/usr/bin/perl
use DBI;
use strict;
use warnings;
use File::Basename qw( fileparse );
use File::Path qw( make_path );
use File::Spec;



my $usage="[use for ] usage: perl hg19anotation.pl <in.MAF> ";
die("$usage\n") if ( @ARGV !=2 );
my $genelist=shift;
my $uid=shift;
my $opt_host="db";
my $opt_user="lih16_a";
my $opt_passwd="Gkhbwef45YU";
my $opt_database="lih16_a";
my $tempfolder="../golinktemp/";

my $directories=$tempfolder.$uid;

if ( !-d $directories ) {
    make_path $directories or die "Failed to create path: $directories";
}


#####################


#####################

my @parray;
my @farray;
my @carray;
my $found=0;
my $db;
my $keyword;
my @row;
my @header; #stores the MAF column header
#filename manipulation and output file manipulation.
my @inputarray;
my %hashgntable= ();
my %hashgnlisttable= ();
my %hashgene=();
my $wd=`pwd`;
chomp($wd);

my $i;
print STDERR "start hg18 annotation for MAF file.\n";
my $eachrow="";
my $tmp = $directories."/genegosortKEY";
my $outputhtml=$directories."/htmloutputsortKEY";
##################
my $geneout=$directories."/geneoutput";
my $goout=$directories."/gooutput";
my $not_in_gooutput=$directories."/not_ingo_output";
my @geneset;
my @goset;
my @not_in_goset;
###########
open(GENEOUTPUT, ">$geneout") or die("Cannot open $geneout for writing. Quitting.\n");
open(GOOUTPUT, ">$goout") or die("Cannot open $goout for writing. Quitting.\n");
open(NOTIN, ">$not_in_gooutput") or die("Cannot open $not_in_gooutput for writing. Quitting.\n");

open(TMPOUT, ">$tmp") or die("Cannot open $tmp for writing. Quitting.\n");
open(HTMLOUTPUT, ">$outputhtml") or die("Cannot open $outputhtml for writing. Quitting.\n");

print STDERR "[MAF)HG18] Processing MAF file...\n";
$db = DBI->connect("DBI:mysql:database=$opt_database;host=$opt_host", $opt_user, $opt_passwd, {'RaiseError' => 1});

@inputarray = split(/:/, $genelist);
my $delsql="delete from tabletemp";
my $sthdel = $db->prepare($delsql);
$sthdel->execute() or die $DBI::errstr;
$sthdel->finish();

for($i=0;$i<scalar(@inputarray);$i++)
{
    my $line=$inputarray[$i];
	chomp($line);
	$line =~ s/\t$//;
	my @arrline = split(/\|/, $line);
	my @genea=split(/_/, $arrline[0]);
	my $gene=$genea[0];
	
	my $sql = qq{select a.gene,a.GO,a.CLASS,b.name from GO_Annot as a left join GO as b on a.GO=b.GOID where gene=UPPER('$gene')  };
	
	
	my $sth = $db->prepare($sql);
	$sth->execute() or die $DBI::errstr;
	$eachrow="";
	$found=0;
	while ( @row = $sth->fetchrow_array()) {
		$found=1;
		print "found\n";
		
		$eachrow=$row[1]."\t".$row[3]."\t".$row[2];
		
		if (exists $hashgntable{$eachrow}){
		 
		my @array1=split(/:/, $hashgnlisttable{$eachrow});
		my $k=0;
		my %hashgene1=();
		for($k=0;$k<scalar(@array1);$k++){
		    $hashgene1{$array1[$k]}=1;
		}
		
		 if(!(exists($hashgene1{$row[0]}))){
		 
		    
			$hashgntable{$eachrow}=$hashgntable{$eachrow}+1;#gn count
			$hashgnlisttable{$eachrow}=$hashgnlisttable{$eachrow}.":".$row[0];#gn count
			
			}
		}
		else{
			$hashgntable{$eachrow}=1; #gn count
			$hashgnlisttable{$eachrow}=$row[0];
			
		}
		
	
				
	    print TMPOUT $row[0]."\t".$row[1]."\n";
		#print  $line."\t".$eachrow."\n";
	}
	$sth->finish();
	
	
	push @geneset,$gene;
	if($found==1){
		push @goset,$gene;
	}
	else{
		push @not_in_goset,$gene;
	}
    
    
	
	
}

close(TMPOUT);

my @arraylist = sort { $hashgntable{$b} <=> $hashgntable{$a} } keys %hashgnlisttable; 
print STDERR "Complete geneout\n";
my$rowhead="";

foreach my$sampekey (@arraylist) 
{
    print "\n".$sampekey."RRR".$hashgntable{$sampekey}."wwwwwwww".$hashgnlisttable{$sampekey}."hahahahah\n";
	
	my @array=split(/\t/, $sampekey);

	
	
	if($array[2] eq "P"){
	 
	
		push @parray,$array[0]."\t".$array[1]."\t".$hashgntable{$sampekey}."\t".$hashgnlisttable{$sampekey};
	}
	if($array[2] eq "F"){
		push @farray,$array[0]."\t".$array[1]."\t".$hashgntable{$sampekey}."\t".$hashgnlisttable{$sampekey};
	}
	if($array[2] eq "C"){
		push @carray,$array[0]."\t".$array[1]."\t".$hashgntable{$sampekey}."\t".$hashgnlisttable{$sampekey};
	}
}

print HTMLOUTPUT  "<tr><td class='bprocess'>GO Biological Process</td><td class='mfunction'>GO Molecular Function</td><td class='cell' >GO Cellular Component</td></tr>";
print HTMLOUTPUT  "<tr>";
print HTMLOUTPUT "<td class='tdclass'>";
print HTMLOUTPUT "<div class='divprocess'>";
print HTMLOUTPUT "<ul>";
for($i=0;$i<scalar(@parray);$i++){

    my @temparray=split(/\t/, $parray[$i]);
	print HTMLOUTPUT "<li>";
	print HTMLOUTPUT " <input type='checkbox' name='PROCESS' value='".$temparray[0]."'> ".$temparray[0]."|".$temparray[1]."|<a href='#' onclick='mouseover(\"".$temparray[3]."\")' title=\"".$temparray[3]."\" class=\"masterTooltip\" >".$temparray[2]."</a>|<a href='#' onclick='showchildren(\"".$temparray[0]."\")'  class=\"cterms\" >Child terms</a>|<a href='#' onclick='showparent(\"".$temparray[0]."\")'  class=\"pterms\" >Parent terms</a>";
	print HTMLOUTPUT "</li>";
}
print HTMLOUTPUT "</ul>";
print HTMLOUTPUT "</div>";
print HTMLOUTPUT "</td>";

print HTMLOUTPUT "<td class='tdclass'>";
print HTMLOUTPUT "<div class='divprocess'>";
print HTMLOUTPUT "<ul>";
for($i=0;$i<scalar(@farray);$i++){

    my @temparray=split(/\t/, $farray[$i]);
	print HTMLOUTPUT "<li>";
	print HTMLOUTPUT " <input type='checkbox' name='Function' value='".$temparray[0]."'> ".$temparray[0]."|".$temparray[1]."|<a href='#' onclick='mouseover(\"".$temparray[3]."\")' title=\"".$temparray[3]."\" class=\"masterTooltip\" >".$temparray[2]."</a>|<a href='#' onclick='showchildren(\"".$temparray[0]."\")'  class=\"pterms\" >Child terms</a>|<a href='#' onclick='showparent(\"".$temparray[0]."\")'  class=\"pterms\" >Parent terms</a>";
	print HTMLOUTPUT "</li>";
}
print HTMLOUTPUT "</ul>";
print HTMLOUTPUT "</div>";
print HTMLOUTPUT "</td>";

print HTMLOUTPUT "<td class='tdclass'>";
print HTMLOUTPUT "<div class='divprocess'>";
print HTMLOUTPUT "<ul>";
for($i=0;$i<scalar(@carray);$i++){

    my @temparray=split(/\t/, $carray[$i]);
	print HTMLOUTPUT "<li>";
	print HTMLOUTPUT " <input type='checkbox' name='CELL' value='".$temparray[0]."'> ".$temparray[0]."|".$temparray[1]."|<a href='#' onclick='mouseover(\"".$temparray[3]."\")' title=\"".$temparray[3]."\" class=\"masterTooltip\" >".$temparray[2]."</a>|<a href='#' onclick='showchildren(\"".$temparray[0]."\")'  class=\"cterms\" >Child terms</a>|<a href='#' onclick='showparent(\"".$temparray[0]."\")'  class=\"pterms\" >Parent terms</a>";
	print HTMLOUTPUT "</li>";
}
print HTMLOUTPUT "</ul>";
print HTMLOUTPUT "</div>";
print HTMLOUTPUT "</td>";
print HTMLOUTPUT "</tr>";
print HTMLOUTPUT "</table>";
close(HTMLOUTPUT);
for($i=0;$i<scalar(@geneset);$i++){
  print GENEOUTPUT $geneset[$i]."\n";
}
for($i=0;$i<scalar(@goset);$i++){
  print GOOUTPUT $goset[$i]."\n";
}

for($i=0;$i<scalar(@not_in_goset);$i++){
  print NOTIN $not_in_goset[$i]."\n";
}
