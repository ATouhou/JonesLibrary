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

function displaybooks($letter, $browseby){
    if(empty($letter)) $letter = "All";
    if(empty($browseby)) $browseby = "Title";
    if($browseby == 'Author'){
	$authorstr = 'selected';
    }else{
	$authorstr = '';
    }
     if($browseby == 'Title'){
	$titlestr = 'selected';
    }else{
	$titlestr = '';
    }
?>
<!doctype html>

<HTML lang="en">
    
    <HEAD>
	    <script type='text/javascript'>
	         function changebrowse(x){
		         var browse = x.value;
	    	     location.href='wishlist.php?letter=<?php echo $letter ?>&browseby='+browse;
	         }
		
	    </script>

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
        
        <!--LOGO-->
        <IMG id='logo-img' src='images/logo.png'>
        
        <!--THIS CONTAINS NAV, PHOTO, & TEXT-->
        <DIV class='browse-container'>
            
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
                        <A href='#'>LOGIN</A>
                    </LI>
                </UL>
            </DIV>
           
            <script>
                $(document).ready(function(){
                    $('.add-modal').hide();
                    $('.contact-modal').hide();
		    
                    $('.toggle-add-modal').click(function() {
                        $('.add-modal').toggle();
                    });
             
		    $('.wish-list-row').click(function() {
			var url = $(this).closest('tr').data('url');
			window.open(url);
		    });
		    
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
		  <FORM method=POST action='wishlist.php'>
		    
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
	    
            <!--MODAL-NEW BOOK-->
            <DIV class="modal add-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
              <DIV class="modal-dialog">
                <DIV class="modal-content">
                  <DIV class="modal-header">
                    <BUTTON type="button" class="close toggle-add-modal" aria-label="Close"><SPAN aria-hidden="true" class='jl-large'>&times;</SPAN></BUTTON>
                    <H4 class="modal-title jl-large" id="newModalLabel">Add A Book To The Wish List</H4>
                  </DIV>
		  <FORM method=POST action='wishlist.php'>
		    <INPUT type=hidden name=task value=addbook>
		    <DIV class="modal-body">
			
			<TABLE class='modal-add-table'>
			    
			    <TR>
				<TD class='jl-right' nowrap>Cover (URL):</TD>
				<TD class='jl-left'><INPUT name=coverurl style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD style='width:30%;' class='jl-right' nowrap>Title:</TD>
				<TD class='jl-left'><INPUT name=title style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Author(s):</TD>
				<TD class='jl-left'><INPUT name=author style='width: 100%;'></TD>
			    </TR>
			     <TR>
				<TD class='jl-right' nowrap>Amazon Link:</TD>
				<TD class='jl-left'><INPUT name=amazon style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Book is for:</TD>
				<TD class='jl-left'><INPUT name=bookfor style='width: 100%;'></TD>
			    </TR>
			    
			</TABLE>
			
		    </DIV>
		    <DIV class="modal-footer">
		      <BUTTON type="button" class="btn btn-default toggle-add-modal" style='padding: 3px;'>Cancel</BUTTON>
		      <BUTTON type="submit" class="btn btn-primary" style='padding: 3px;'>Save</BUTTON>
		    </DIV>
		    </FORM>
                </DIV>
              </DIV>
            </DIV>
            <TABLE style='width: 67%; text-align: center; margin: auto; border: 0px;' class='jl-bg-gray'>
                <TR>
                    <TD style='float: left; padding: 5px; margin-top: 10px; height: 50px; display: inline;' align=left nowrap>
                        <P style='margin-left: 5px; display: inline'>Browse by:</P>
                        <SELECT name=browseby onChange='changebrowse(this)' value="<?php echo $browseby ?>" style='width: 125px; margin-top: 10px; display: inline;'>
                            <OPTION <?php echo $authorstr ?> value="Author">Author</OPTION>
                            <OPTION <?php echo $titlestr ?> value="Title">Title</OPTION>
                        </SELECT>
                    </TD>
                    <TD style='height: 50px;'class='jl-right'>
                        <button type="button" class="btn btn-primary toggle-add-modal" style='margin-right: 5px;'>Add New Book</button>
                    </TD>
                </TR>
            </TABLE>
           <?php
	   
		$url = "wishlist.php?browseby=$browseby";
		
function displayAlphabetBar($letter, $id, $target){
        $alpha = array(All,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z);
        if($id) $idStr = "id='$id' name='$id'";
        else $idStr='';
    

        print("<INPUT $idStr type=hidden value='$letter'>");
        print("<TABLE style='width: 67%; margin: auto' class='jl-bg-gray'>");
        print("<TR style='border-bottom:1px solid white;'>");

        for($i=0; $i <= 27; $i++){
            if($target) $onClick = "href=$target&$id=$alpha[$i]";
            else $onClick = '';
           
            if($alpha[$i] == 'All') $width = 'width:11%;';
            else $width = 'width:3.5%';

            print("<TD style='$width' id='{$alpha[$i]}' >");
            print("<A $onClick>$alpha[$i]</A>");
            print("</TD>");
        }

        print("<TD style='width:11%;'></TD>");
        print("</TR>");
        print("</TABLE>");
}
displayAlphabetBar($letter, 'letter', $url);

		?>
       
            <!--BOOK INFO-->
            <?php
            $sql = "SELECT * from WishList ";
	    if($letter != 'All'){
		$sql .= "WHERE SUBSTRING($browseby, 1, 1) = '$letter' ";
	    }
	    $sql .= "ORDER BY $browseby ";
	    
            //echo("SQL: $sql");
            $rs = mysql_query($sql);
	    $rsc = 0;
            if($rs) $rsc = mysql_num_rows($rs);
	    print("<TABLE class='browse-table'>");
            
            print("<TR style='height: 2px; background-color: #fff; width: 100%;'>");
            print("</TR>");
            

            for($i=0; $i < $rsc; $i++){
                $title = mysql_result($rs, $i, "Title");
                $author = mysql_result($rs, $i, "Author");
		$wishid = mysql_result($rs, $i, "WishID");
		$bookfor = mysql_result($rs, $i, "BookFor");
		$amazon = mysql_result($rs, $i, "Amazon");
		$coverurl = mysql_result($rs, $i, "CoverURL");
		
		print("<INPUT type=hidden value=\"$title\" name='title_$wishid'>");
		print("<INPUT type=hidden value=\"$author\" name='author_$wishid'>");
		print("<INPUT type=hidden value=\"$bookid\" name='bookid_$wishid'>");
		print("<INPUT type=hidden value=\"$bookid\" name='bookfor_$wishid'>");
		
		if($i%2 ==0){
                    $bgcolor = "#f1f1f1";
		}else{
		    $bgcolor = "#fff";
		}
	    
		print("<TR data-url=$amazon style='background-color: $bgcolor;' class='wish-list-row browse-row toggle-info-modal wishlists'>");
		
		print("<TD class='wishlist-item jl-left' valign=top><img class='wish-cover' src='$coverurl'></TD>");
		print("<TD class='wishlist-item jl-left' valign=top style=' padding-left: 10px;'>");
		print("<P><B>$title</B></P>");
		print("<P><I>$author</I></P>");
		print("</TD>");
		print("<TD style='padding-bottom: 10px; padding-right: 10px;' class='wishlist-item jl-left' valign=bottom>Added by: $bookfor</TD>");

		print("</TR>");
           
            }
	     print("</TABLE>");
        ?>
                       
            <!--FOOTER-->
            <DIV class='footer'>
                <P>Web design and development by <a href='http://mandrakedesign.com'>Mandrake Design</a>.</P>
            </DIV>
        </DIV>
        <?php
	}
	///////////////////////////////////////////////////////////////////
	//////////////////// TASK FUNCTIONS ////////////////
	/////////////////////////////////////////////////////////////////
	
	$task = $_POST['task'];
	if($task == ''){
	    $letter = $_GET['letter'];
	    $browseby = $_GET['browseby'];
	    displaybooks($letter, $browseby);
	    
	}
	
	if($task == 'addbook'){
	    $title = $_POST['title'];
	    $author = $_POST['author'];
	    $bookfor = $_POST['bookfor'];
	    $coverurl = $_POST['coverurl'];
	    $amazon = $_POST['amazon'];
	    
	    $sql ="INSERT into WishList ";
	    $sql .= "(Title, Author, BookFor, CoverURL, Amazon ";
	    $sql .= " )VALUES(";
	    $sql .= " \"$title\", \"$author\", \"$bookfor\", \"$coverurl\", \"$amazon\" )";
	    
	    mysql_query($sql);
	    ?> <script type='text/javascript'>
	    location.href='wishlist.php';
	</script>
	<?php
	}
	?>
    </BODY>
    
</HTML>
