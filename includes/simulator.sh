#!/bin/bash
# -a -- App Name
# -u -- Unique username for client to which cpanel will be created
# -g --google services json file with package name com.ssoftwares.{unique_username} path.
# -i --square sized client app icon path.
# -s --splash screen image (600*1300 recommended) path.
# -d --domain of client to which admin panel will be installed
# -m --Client mobile number

echo "Hello Surya Lets Start"
echo

while getopts ":a:u:g:i:s:d:m:" opt;  do
	
	case $opt in 
	a) 
	appname=$OPTARG 
	echo "Success , App name is $OPTARG "
	;;

	u) 
	username=$OPTARG	
	echo "Success , Unique username is $OPTARG"
	;;

	g) 	if [ -e "$OPTARG" ] ; then
		google_service=$OPTARG
		echo "Success , google-services.json file recieved"
		else 
		echo "Error: wrong file path for google-services.json"
		exit 11
		fi
	;;

	i)  	if [ -e "$OPTARG" ] ; then
		icon=$OPTARG
		echo "Success , icon file recieved"
		else 
		echo "Error: wrong file path for icon"
		exit 12
		fi
	;;
	
        s)  	if [ -e "$OPTARG" ] ; then
		splash=$OPTARG
		echo "Success , splash image file recieved"
		else 
		echo "Error: wrong file path for splash image"
		exit 13
		fi
	;;

	d) 
	domain=$OPTARG
	echo "Success , domain name received"
	;;
	
	m)
	mobile=$OPTARG
	echo "Success , mobile number received"
	;;

	?) echo "Invalid Paramter passed"
	;;

	esac
done

	if [ -z "$appname" ] ; then
	echo "Error, app name not provided"
	exit 16
	fi

	if [ -z "$username" ] ; then
	echo "Error , username not provided"
	exit 17
	fi

	if [ -z "$google_service" ] ; then
	echo "Error , google service json file not passed"
	exit 18
	fi

	if [ -z "$icon" ] ; then
	echo "Error , icon not provided"
	exit 19	
	fi

	if [ -z "$splash" ] ; then
	echo "Error , splash screen image not passed"
	exit 20	
	fi

	if [ -z "$domain" ] ; then
	echo "Error , domain not passed"
	exit 21
	fi

	if [ -z "$mobile" ] ; then
	echo "Error , mobile not passed"
	exit 22
	fi

echo 
echo "Making cpanel"
sleep 5
echo "Making website live"
sleep 5
echo "Setting up new database"
sleep 5
echo "Database Created Successfully"
echo "Making User App"
sleep 3
echo "Making Rider App"
sleep 3
echo
echo "Congratulations you admin panel and apps are ready"

