<?php
require_once("dbconnect.php");


//if(isset($_POST) && !empty($_POST) ){
//	//an email must be sent
//
//	$name=$_POST['name'];
//        $sender=$_POST['email'];
//        $subject=$_POST['subject'];
//        $message=$_POST['message'];
//
//        $email="Name: " . $name . "\n". "\n" . "Email: " . $sender . "\n". "\n" . "Subject: " . $subject . "\n". "\n" . "Message: " . $message;
//        mail("cjones.wingsofgold@gmail.com", $subject, $email);
//}
//?>
<!doctype html>

<HTML lang="en">
    
    <HEAD>
        <!--META TAGS-->
        <META charset="utf-8">
            
        <!--CSS-->
        <LINK rel="stylesheet" type="text/css" href="styles/main.css"/>
        
        <!--FONTS-->
        <LINK href='http://fonts.googleapis.com/css?family=Carme' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Domine:400,700' rel='stylesheet' type='text/css'>
            
        <!--SCRIPT-->
        
        
        <!--FAVICON-->
        <LINK rel="icon" type="image/png" href="images/favicon.png">
            
        <!--TITLE-->
        <TITLE>Jones Library</TITLE>
        
    </HEAD>
    
    <BODY>
        
        <!--LOGO-->
        <IMG id='logo-img' src='images/logo.png'>
        
        <!--THIS CONTAINS NAV, PHOTO, & TEXT-->
        <DIV class='index-container'>
            
            <!--NAVIGATION--> 
            <DIV class='nav-whole'>  
                <UL class='nav-ul'>
                    <LI>
                        <IMG id='brand-name' src='images/brandName.png'>
                    </LI>
                    <LI class='nav-li'>
                        <A href='index.php'>HOME</A>
                    </LI> 
                    <LI class='nav-li'>
                        <A href='browse.php'>BROWSE</A>
                    </LI>
                    <!--<LI class='nav-li'>
                        <A href='#'>TOOLS</A>
                    </LI>-->
                    <LI class='nav-li'>
                        <A href='wishlist.php'>WISH LIST</A>
                    </LI>
                    <LI class='nav-li'>
                        <A href='#'>CONTACT</A>
                    </LI>
                    <LI class='nav-li'>
                        <A href='#'>LOGIN</A>
                    </LI>
                </UL>
            </DIV>
            
            <!--CONTAINS PHOTO AND INDEX PARAGRAPH-->
	    
            <DIV class='index-content'>
		
                <IMG id='index-img' src='https://github.com/TopherJonesy/JonesLibrary/blob/master/images/woods.jpg?raw=true'>
                            
                <P id='index-p'>"Welcome! This site is the Jones' personal library catalog. This site is a work
		in progress and we're going to be constantly improving it. There are also going
                to be some useful tools engineered to assist in writing projects for anyone to use.
		Feel free to look through our collection too! If you see something you like, send us a
		message! We'd be happy to lend you any book in our collection. If you're in need of a
		birthday/ Christmas gift for us, take a look at our wish list - you might find a few
		ideas!" </P>
                <P>-Topher and Haley Jones</P>
            </DIV>
           
            <!--FOOTER-->
            <DIV class='footer'>
                <P>Photo by <A href='https://www.facebook.com/TR.fotowerks'>Tyler Roberts</A>. Web design and development by <a href='http://mandrakedesign.com'>Mandrake Design</a>.</P>
            </DIV>
            
        </DIV>
        
    </BODY>
    
</HTML>
