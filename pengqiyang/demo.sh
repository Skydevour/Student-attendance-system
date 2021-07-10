#!/bin/bash
#echo $1
#echo $2
rm -rf $3
cd /home/pengqiyang/PyramidBox
cp -v $1 /home/pengqiyang/PyramidBox/demo/images
#conda activate pyramid
#python /home/pengqiyang/PyramidBox/demo.py
/home/pengqiyang/miniconda3/envs/pyramid/bin/python /home/pengqiyang/PyramidBox/demo.py 

cp -v /home/pengqiyang/PyramidBox/demo/images/2.jpg $2

cp -r /home/pengqiyang/PyramidBox/demo/tests $2

cd $2

mv tests detect
