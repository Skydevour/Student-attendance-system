#!/bin/bash
#delete the foler test
ssh pengqiyang@10.150.177.170 "cd /home/pengqiyang/caffe/examples/attendance;bash del.sh"
#upload files
scp -r $2 10.150.177.170:/home/pengqiyang/caffe/examples/attendance/test
#download
scp -p 10.150.177.170:/home/pengqiyang/caffe/examples/attendance/prediction/prediction.txt $1

