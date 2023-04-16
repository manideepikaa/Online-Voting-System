# Online-Voting-System
We will be establishing a connection between client and server to facilitate electronic voting process
We will be establishing a connection between the client and server to facilitate the electronic voting process 
Steps to run the application
-Open PHPmyadmin
-Create a database as vote-system
-Import the SQL file in the repo and execute it which creates the DB schema
-install XAMPP
-copy the voting management system folder and place it in the HTDOCS folder(c/xampp/htdocs)
-In order to run the website on the local network, please follow the following steps
1. find out your ipv4 address from the “ipconfig” command in the command prompt
2. In “HTTPD.conf”  add the line Listen your ipv4:8000
3. now you can run applications with your ipv4 address over LAN from different systems
To create an SSL certificate follow the below steps
-In xampp folder go to “makecert.bat” and run that and use ipv4 address as URL
-A folder with your ipv4 address is created which contains the server.crt and server.key
-Run by the double-clicking server.crt
-click on install certificate
- select the local machine
- select place all certificates in the following place and select trusted root certification authorities
-select ok
-Open C:\Windows\System32\drivers\etc\hosts and add
127.0.0.1 yourIPV4_Address
Add the following code in C:\xampp\apache\conf\extra\httpd-xampp.conf
##yourIPV4
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName yourIPV4
    ServerAlias *.yourIPV4
</VirtualHost>
<VirtualHost *:443>
    DocumentRoot "C:/xampp/htdocs"
    ServerName yourIPV4
    ServerAlias *.yourIPV4
    SSLEngine on
    SSLCertificateFile "crt/yourIPV4/server.crt"
    SSLCertificateKeyFile "crt/yourIPV4/server.key"
</VirtualHost>


SSL certificate is now established.
We have used the Bootstrap framework for PHP.
Admin Credentials:- 
	Username:- admin
	Password:- password
https://yourIPV4/Online Voting  System/voting management system/votesystem/votesystem/admin/index.php

Voter credentials 
Username:- you can find that in total voters
Password:- password of the voter
Url:- https://yourIPV4/Online Voting  System/voting management system/votesystem/votesystem/login.php

We have implemented cache by capturing the unique device ID (HTTP_User_Agent, Server_addr, Server_Port, and Remote_addr)
If a voter login the first time, we will capture the ID in the background and consider it as his device.
    When he/she logins from another device, we will pop up an error as “Trying to log in with a different device than the original device”.
    When the user logins, he doesn’t log out and tries to open again from another window. he/she will get an error message: "Already logged in from another device.”
Admin has access to create new voters and manage the existing votes.
	A unique “VoterID” is created for him when a new voter is created. He uses that voterId and password to cast his vote.

