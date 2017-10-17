#!/usr/bin/perl
use DBI;
use strict;
use warnings;
my $usage="[use for ] usage: perl hg19anotation.pl <in.MAF> ";
die("$usage\n") if ( @ARGV != 2 );
my $genelist=shift;
my $uid=shift;
my $opt_host="db";
my $opt_user="lih16_a";
my $opt_passwd="Gkhbwef45YU";
my $opt_database="lih16_a";
my @parray;
my @farray;
my @carray;
my $found=0;
my $db;
my $keyword;
my @row;
my @header; 

my @inputarray;
my %hashgntable= ();
my $wd=`pwd`;
chomp($wd);

my $i;

my $eachrow="";

$db = DBI->connect("DBI:mysql:database=$opt_database;host=$opt_host", $opt_user, $opt_passwd, {'RaiseError' => 1});

my $tabletemp="gtabletemp";#.$uid;

my $sql ="delete from `$tabletemp` where uid='$uid'";
print $sql;


my $sth=$db->prepare($sql);
$sth->execute();

print $genelist." llll\n";
@inputarray = split(/:/, $genelist);
for($i=0;$i<scalar(@inputarray);$i++)
{
    my $line=$inputarray[$i];
	chomp($line);
	print $line."\n";
	$line =~ s/\t$//;
	my $sql = qq{select genesymbol,uniprot,FTId,AAchange,varianttype,dbsnp,disease,diseasecancer,pubchemid from cancertarget where genesymbol='$line'  };
	print $sql."\n";
	
	my $sth = $db->prepare($sql);
	$sth->execute() or die $DBI::errstr;
	$eachrow="";
	$found=0;
	while ( @row = $sth->fetchrow_array()) {
		$found=1;
		print "found\n";
		
		$eachrow=$row[1]."\t".$row[3]."\t".$row[2];
		if (!defined $row[6]) {
			$row[6]="NULL";
      } 
	
		
		$sql = qq{insert into  $tabletemp(genesymbol,uniprot,FTId,AAchange,varianttype,dbsnp,disease,diseasecancer,pubchemid,uid) values(?, ?, ?, ?, ?, ?, ?,?,?,?)};
		my $sthinsert = $db->prepare($sql);
		$sthinsert->execute($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$uid) or die $DBI::errstr;
		$sthinsert->finish();
		
		print $sql."\n";
	    print  $row[3]."\t".$row[4]."\n";
		
		
	}
	if ($found==0){
	    $sql = qq{insert into  $tabletemp(genesymbol,uniprot,FTId,AAchange,varianttype,dbsnp,disease,diseasecancer,pubchemid,uid) values('$line','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','$uid') };
		my $sthinsert1 = $db->prepare($sql);
		$sthinsert1->execute() or die $DBI::errstr;
		$sthinsert1->finish();
		
		print $sql."  nnn\n";
	
	}
	$sth->finish();
}

