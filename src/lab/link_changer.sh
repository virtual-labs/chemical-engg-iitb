#!/bin/bash
for i in exp*
do
	cat $i/content.html | sed 's/"userfiles/"..\/images\/userfiles/' | sed 's/"\/userfiles/"..\/images\/userfiles/'  > temp_file_abcd.html
	cp temp_file_abcd.html $i/content.html
done
