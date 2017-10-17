#!/bin/bash

cat $1 |tr ":" "\n" |sort|uniq >$3/file1

cat $2 |sort|uniq > $3/file2

comm -12 $3/file1 $3/file2 > $3/intersection
N=22000
f1=$3/file1
f2=$3/file2
M=$(cat $f2 |wc -l)
n=$(cat $f1 |wc -l)
k=$(cat $3/intersection |wc -l)

n=$(echo "$(($n-$k))")
NM=$(echo "$(($N-$M-$n))")
pvalue=$(/hpc/users/lih16/www/pipeline/js/script/pvalue $k $M $n $NM 0)
out1=$(echo $pvalue|awk '{print $2}')
out2=$(cat $3/intersection|tr '\n' ':')
echo $out1!$out2 