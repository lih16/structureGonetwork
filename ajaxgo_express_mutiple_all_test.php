<?php

$dicfile="/hpc/users/lih16/www/pipeline/js/data/goterm_id_gene";


if (isset($_POST["userid"]) && !empty($_POST["userid"])) {
    $uid=$_POST['userid'];   
}else{  
    $uid="1475869888635";
}
if (isset($_POST["gene"]) && !empty($_POST["gene"])) {
    $genename=$_POST['gene'];   
}else{  
    $genename="AASS:ABCG5:ACHE:ADAM7:ADD2:ADNP2:AKIRIN1:AMHR2:ANKHD1:ANKHD1-EIF4EBP3:ANKRD1:ANKRD29:AOX1:APOBR:ARCN1:ARHGAP35:ARID5B:ARMC3:ARNTL2:ASB1:ATG12:ATG2B:ATR:B4GALNT1:B4GALNT2:BAX:BCAR1:BLACE:BMP5:BRD1:BRINP3:C10orf88:C4orf21:C6orf132:C9orf96:CAAP1:CAD:CCDC146:CCDC3:CCDC54:CD1D:CD3D:CDX2:CEP41:CHRNA4:CIDEA:CLMN:CNTNAP4:COG7:COL4A5:CORO2A:CPNE3:CPT1C:CPVL:CREBBP:CRISP1:CYP4F11:CYP4F12:DAB2IP:DDX42:DDX6:DGKI:DNAH6:DRD2:DSCAML1:DUOX2:EDEM3:EFCC1:ELFN1:ELL2:EMC3:EPM2AIP1:EPPK1:ERBB4:ESF1:EXD2:FAM172A:FAM189A2:FANCD2OS:FGF13:FLNC:FMNL3:FOCAD:FUT8:GGTLC1:GLB1:GNAI3:GPS1:GRN:H3F3A:HERC6:HK1:HMCN1:HRH3:HSPA5:IFFO2:IFI44L:IGFBP2:IGFN1:IL7R:IMPDH1:INTS10:IQUB:IRAK2:IRX4:IRX5:ITK:ITPKB:ITSN2:KATNAL1:KATNB1:KCNB2:KCNQ3:KDM6A:KIAA1191:KIAA1244:KIAA1328:KIAA1598:KLHL1:KMT2C:L1CAM:LIPE:LONRF1:LOXHD1:LRRC71:MAP3K15:MAST4:MCC:MEN1:METAP1D:MICAL1:MLH3:MLLT4:MMP24:MNT:MRPS7:MRVI1:MT3:MYH15:MYOCD:MYOM2:NCAM2:NDNL2:NEK5:NLGN2:NLRP5:NOBOX:NPL:NPTN:NRXN1:NSMCE1:NTF4:OGN:OOSP2:OR5L1:OTOF:P2RY4:PARP4:PATE1:PAX6:PCDHA9:PCDHGC5:PCGF5:PCLO:PCNT:PCNXL3:PCNXL4:PDE4A:PER2:PGGT1B:PIK3R4:PITPNM2:PITPNM3:PIWIL2:PLA1A:PLCE1:PLEKHG2:PLXNA4:PNPLA3:PODXL:POLD1:PRRC2C:PSTPIP2:PXDNL:PZP:RAB3GAP2:RGS4:RPS6KB1:SEC16A:SEC31B:SERPINA4:SESN1:SH3RF3:SLC27A4:SLC2A4RG:SLC39A12:SLC6A16:SLC6A7:SLC7A13:SLK:SMARCC1:SNX18:SP140:SPDL1:SRMS:ST6GALNAC6:STAG2:STARD13:SUFU:SYNGR2:TBC1D9B:TDO2:TDRD9:TENM1:TFB1M:TG:THPO:TLE3:TMC3:TMCO1:TMEM245:TMEM43:TMTC1:TPH1:TPM1:TRAM1L1:TRAPPC6A:TRERF1:TRIO:TSPAN2:TTC32:UHRF1BP1L:USH2A:VASH2:VCP:VIM:VPS13C:WDFY4:WDR48:YY1:ZCCHC6:ZFP69B:ZIC4:ZNF200:ZNF469:ZNF560:ZNF567:ZNRF3:ZSCAN21:ZSCAN22";
}
$tempdir="golinktemp/".$uid."/";


$gotermsfile = $tempdir.'goterm.txt';
$outputfile  = $tempdir.'myoutput';
$genefile=$tempdir.'tgogene';
file_put_contents($genefile,$genename);
$cmdpipeline='/hpc/packages/minerva-common/java/1.7.0_60/jdk1.7.0_60/bin/java -jar script/getTerms.jar '.$genefile.'  '.$gotermsfile.' '.$dicfile.' '.$outputfile;
echo $cmdpipeline;

cmd_exec($cmdpipeline,$returnvalue,$error7);
$output=file_get_contents($outputfile);
echo $output;





?>