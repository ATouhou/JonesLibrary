<?php
require_once("dbconnect.php");

	if(isset($_POST) && !empty($_POST) ){
	//an email must be sent
	
	$name=$_POST['name'];
        $sender=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
	
        $email="Name: " . $name . "\n". "\n" . "Email: " . $sender . "\n". "\n" . "Subject: " . $subject . "\n". "\n" . "Message: " . $message;
        mail("cjones.wingsofgold@gmail.com", $subject, $email);
}
?>
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
        <SCRIPT src="script/jquery.js"></SCRIPT>
        <SCRIPT src="script/jquery-ui.js"></SCRIPT>
        <SCRIPT src="script/bootstrap.js"></SCRIPT>
        <SCRIPT src="script/modal.js"></SCRIPT>
        
        <!--FAVICON-->
        <LINK rel="icon" type="image/png" href="images/favicon.png">
            
        <!--TITLE-->
        <TITLE>Jones Library</TITLE>
        
    </HEAD>
    
    <BODY>
	
	<script>
	    $(document).ready(function(){
		$('.contact-modal').hide();
		
	       $('.toggle-contact-modal').click(function() {  
		   $('.contact-modal').toggle();
	       });
	    });
	</script>
	
        <!--CONTACT MODAL-->
            <DIV class="modal contact-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
              <DIV class="modal-dialog">
                <DIV class="modal-content">
                  <DIV class="modal-header">
                    <P style='padding-top: 24px; margin-top: 0px;' class="modal-title jl-large" id="newModalLabel">Contact</P>
                  </DIV>
		  <FORM method=POST action='index.php'> <!--change based on what page this is nested -->
		    
		    <DIV class="modal-body">
			<TABLE class='modal-contact-table' style='width: 90%; margin: 0 5% 0 5%;'>
			   
			    <TR>
				<!--SENDER'S NAME-->
				<TD style='width: 75%;' class='jl-left'><INPUT type="text" name="name" id="name" placeholder="Your Name:" style='width: 100%; height: 25px; font-size: medium;'></TD>
			    </TR>
			    <TR>
				<!--SENDER'S EMAIL-->
				<TD class='jl-left'><INPUT name="email" id="email" placeholder="Email:" style='width: 100%; height: 25px; font-size: medium;'></TD>
			    </TR>
			    <TR>
				<!--SUBJECT-->
				<TD class='jl-left'><INPUT type="text" name="subject" id="subject" placeholder="Subject:" style='width: 100%; height: 25px; font-size: medium;'></TD>
			    </TR>
			    <TR>
				<!--MESSAGE-->
				<TD class='jl-left'><textarea name="message" id="message" placeholder="Message:" style='width: 100%; height: 150px; font-size: medium;'></textarea></TD>
			    </TR>
			    
			</TABLE>
		    </DIV>
		    <DIV class="modal-footer">
		      <BUTTON type="button" class="btn btn-default toggle-contact-modal" style='padding: 3px;'>Cancel</BUTTON>
		      <BUTTON type="submit" class="sendMessage btn btn-primary" style='padding: 3px;'>Send</BUTTON>
		      
		    </DIV>
		    </FORM>
                </DIV>
              </DIV>
            </DIV>
	    
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
                        <A class='toggle-contact-modal' href='#'>CONTACT</A>
                    </LI>
                    <LI class='nav-li'>
                        <A class='toggle-login' href='#'>LOGIN</A>
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
