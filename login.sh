#!/bin/bash
rm -rf *.txt
#echo -n "ID : "
#read id
#echo -n "PWD : "
#read pass

# echo $id
# echo $pass
id=phpid
pass=phppass

grep -e ^${id}: /etc/passwd > result.txt
result=result.txt
if [ -s $result ]
then

grep -e ^${id}: /etc/shadow | awk -F$ '{print $3}' > salt.txt
openssl passwd -6 -salt $(cat salt.txt) ${pass} > pass.txt
grep -e ^${id}: /etc/shadow | awk -F$ '{print $4}' | awk -F: '{print $1}' > orgpwd.txt
cat pass.txt | awk -F$ '{print $4}' > inputpwd.txt


	if [[ $(cat inputpwd.txt) == $(cat orgpwd.txt) ]]
	then
		echo 0 > return  #로그인 성공
		rm -rf *.txt
	else
		echo 1 > return #로그인 실패
		rm -rf *.txt
		exit;
	fi	
else
	echo 2 > return # 존재하지 않는 사용자
	rm -rf *.txt
	exit;
fi

rm -rf *.txt
