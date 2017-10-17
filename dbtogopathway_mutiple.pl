
use DBI;
use strict;
use warnings;
use Data::Dumper;

use lib "/hpc/users/lih16/perl5/lib/perl5";
use JSON qw( decode_json );
my $uid=shift;
my $opt_host="db";
my $opt_user="lih16_a";
my $opt_passwd="Gkhbwef45YU";
my $opt_database="lih16_a";
my @genenamearray;
#Here compute two sets and pvalue
my $num;
my @row;
my $found=0;
my $count=0;
my $dbh;
my $keyword;
my $i;
my $result;
my $M;
my $n;
my$k;
my $NM;
###############
my $filters=shift;#"REACTOME|Pathway Interaction Database";
my @filterarray = split /:/, $filters;
my $condition=" and (";
for(my $i=0;$i<scalar(@filterarray);$i++){
	$condition=$condition."source_database='".$filterarray[$i]."' or "
}
$condition =~ s/or\s+$/)/;

#my $genefile=shift;
#my $jsonoutfile=shift;
my $tempfolder="golinktemp/";

my $directories=$tempfolder.$uid."/";

my $genefile=$directories."gogene.txt";
my $jsonoutfile=$directories."gopathway.txt";
###############333
my $progressfile=$directories."pathprogress";
my$writeProgress=sub{
    my ($a,$b,$c) =@_ ;
	open(PROGRESS, '>', $progressfile) or die "Can't Oen Progress File!";
	print PROGRESS $a.":".$b.":".$c."\n";
	print $a.":".$b.":".$c."\n";
	
    #return $a ;
} ;
$writeProgress->(1,100,1);

###################
open(INPUT, "$genefile") or die("Cannot open $genefile for reading. Quitting.\n");

while(my $line=<INPUT>) {
	chomp($line);
	$line=uc($line);
	@genenamearray=split(/:/, $line);
	
}

$num = scalar(@genenamearray);
my$inputgenecount=$num;
$dbh = DBI->connect("DBI:mysql:database=$opt_database;host=$opt_host", $opt_user, $opt_passwd, {'RaiseError' => 1});
my %geneid;
my %pathwayname;
my %accessnumber;
####Here we nee
# name            | varchar(1028) | YES  |     | NULL    |       |
#| source_database | varchar(128)  | YES  |     | NULL    |       |
#| db_accession    | varchar(128)  | YES  |     | NULL    |      
for($i=0;$i<$num;++$i){ 
	
	my $sth = $dbh->prepare('SELECT name, source_database,db_accession FROM gn2pathway where UPPER(symbol)=? and name is not null'.$condition);
    my $gene=uc($genenamearray[$i]);
	#print "SELECT name, source_database,db_accession FROM gn2pathway where UPPER(symbol)='$gene' and name is not null limit 1";
	$result=$sth->execute($gene);
#	if(!$result){
		#mysql_free_result($rs); 
	#	next;
#	}
	#@row = $sth->fetchrow_array();
	
	while(@row = $sth->fetchrow_array()) {
     #print "lll:".$row[0]."\n".$row[1]."\n".$row[2];
	 $pathwayname{$row[0]}=$row[1];
	$accessnumber{$row[0]}=$row[2];
	# print "fffff";
	
	
 }
#$sth->finish();
if($i%10==0){
 $writeProgress->($i+1,$num,1);
}
	
     
} 
############
my@transarray=keys(%pathwayname);
my$totalSize=$#transarray;
my$progresscount=0;
#################
my $genecount=0;

my $jsonfile = open(OUTPUT, ">$jsonoutfile") or die("Cannot open $jsonoutfile for writing. Quitting.\n");
# Here we should 
my $json="\"paths\":[";
while ((my$pathway, my$pathsource) = each(%pathwayname)){
    
 
	my @genenameofpath;
	
	my $sth = $dbh->prepare('SELECT   symbol,name, source_database,db_accession FROM gn2pathway where name=?  ');
    $result=$sth->execute($pathway);
	
	while ( @row = $sth->fetchrow_array()) {
	  push(@genenameofpath,uc($row[0]));
	  $geneid{uc($row[0])}=$row[1];
	
	}
	#print join(", ", @genenameofpath);
	#print "hhaer.\n";
	#print join("|", @genenamearray);
	
	#my @intersection = intersect(@genenamearray, @genenameofpath);#obtaininersection(@genearray,@genenameofpath)
my %a=map{$_=>1} @genenamearray;
my %b=map{$_=>1} @genenameofpath;


my @temparray=grep($a{$_},@genenameofpath);
my %seen;
my @intersection; 
foreach my $value (@temparray) {
  if (! $seen{$value}) {
    push @intersection, $value;
    $seen{$value} = 1;
  }
}
#print "gggg";
#print join("####", @intersection);
    my $N=22000;
	$M=scalar(@genenameofpath);
	$n=scalar(@genenamearray);
	$k= scalar(@intersection);
	$k=$k;
	$n=$n-$k;
	$M=$M-$k;
	$NM=$N-$M-$n-$k;
	#319 320 -317 21997
	my $mycmd="/hpc/users/lih16/www/pipeline/js/script/pvalue ".$k." ".$M." ".$n." ".$NM." 0";
	print $mycmd."\n";
	
	my @output = readpipe( $mycmd );
    #print "pp\n".@output."ttt\n";
chomp($output[1]);
	
	my $pvalue=$output[1];;
	print $pvalue;
	;
	my $geneintersect=join(@intersection);
	my $wholeset=join(":",@genenameofpath);
	my $acess=$accessnumber{$pathway};
	#my $pathjson="{\"pathid\":\"".$acssess."\",\"pathname\":\"".$pathway;
	#my $pathgenesetjson="."\",\"wholeset\":\"".$wholeset."\",\"sourcename\":\"".$sourcename."\",";
	#$pathjson=$pathjson.$pathgenesetjson;
	#my $genejson="\"genes\":[";
	#$json=$json."{\"pathid\":\"".$accessnumber."\",\"pathname\":\"".$uniquepath[$i]."\",\"wholeset\":\"".$wholeset."\",\"sourcename\":\"".$sourcename."\",\"genes\":[";
    $json=$json."{\"pathid\":\"".$acess."\",\"pathname\":\"".$pathway."\",\"wholeset\":\"".$wholeset."\",\"sourcename\":\"".$pathsource."\",\"genes\":[";
	#$pathjson=$pathjson.$genejson;
	#$json=$json.$pathjson;
	for($i=0;$i<@intersection;++$i){ 

	   
			#$seq=$seq+1; 
			my $id=$geneid{$intersection[$i]};
			$json=$json."{\"name\":\"".$intersection[$i]."\",\"id\":\"".$id."\"},";
        
	   
	}
	$json=substr($json,0,-1);
	$json=$json."],\"pvalue\":\"".$pvalue."\",\"k\":\"".$k."\",\"n\":\"".$n."\",\"M\":\"".$M."\"},";	
	
	#############
	$writeProgress->($progresscount,$totalSize,2);
	$progresscount=$progresscount+1;
	
	
}

	$json=substr($json,0,-1);
	$json=$json."]";
	$json="{".$json."}";
	chomp($json);
	$json =~ s/[\r\n]+$//;
	print OUTPUT $json;
	unlink $progressfile;

