# Mini server sql

Mini project in ordrer to learn PHP & SQL.
Work with a local server (here I used WampServer).

## What is this server ?
This server is a space where you can create an account with a password. The password is encrypted in the database.
When you are connected, you can access your personnal space where you can increment your score by clicking on a button.
You can also disconnect your account, then you will be redirected to the home page (index.php).
In this home page, you can see all the scores by the others accounts.

This system is protected against SQL innjection (but be careful, the security have not benn tested).

## What is in this server ?
It contains several web pages (they are very simple => no decoration with CSS, technical purpose only) : 
* index.php
* login.php
* logout.php
* personal_space.php
* sign_in.php

header.php is implemented in the others web pages above.

check_data.php is a script
increment.php  is a script

If you enter a page where you are not supposed to be, you will be redirected to the home page.

Made by Arthur Delannoy, 2021
