<?php

require_once("dbconnect.php");

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
?>
<!doctype html>

<HTML lang="en">
    
    <HEAD>
	<script type='text/javascript'>
	    function changebrowse(x){
		var browse = x.value;
		location.href='browse.php?letter=<?php echo $letter ?>&browseby='+browse;

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
                        <A href='#'>CONTACT</A>
                    </LI>
                    <LI class='nav-li'>
                        <A href='#'>LOGIN</A>
                    </LI>
                </UL>
            </DIV>
           
            <script>
		$(document).ready(function(){
		    
                    $('.add-modal').hide();
                    $('.info-modal').hide();
		    $('.book-checkout-form').hide();             

		    $('.toggle-add-modal').click(function() {
			$('.add-modal').toggle();
		    });
		    
		    $('.close-info-modal').click(function() {
			$('.book-checkout-form, .info-modal').hide();
		    });
		    
		    $('.request').click(function(){
			$('.book-checkout-form').slideToggle();
			$('.book-request-btn').toggle();
		    });
		    
		    $('.cancel-request').click(function(){
			$('.book-checkout-form').toggle();
			$('.book-request-btn').toggle();
		    });
		    
                    $('.toggle-info-modal').click(function() {
			var bookid = $(this).closest('tr').data('id');
			var title = $("input[name='title_"+bookid+"']").val();
			var author = $("input[name='author_"+bookid+"']").val();
			var cover = $("input[name='cover_"+bookid+"']").val();
			var publisher = $("input[name='publisher_"+bookid+"']").val();
			var publishyear = $("input[name='publishyear_"+bookid+"']").val();
			var genre = $("input[name='genre_"+bookid+"']").val();
			var status = $("input[name='status_"+bookid+"']").val();
			var borrower = $("input[name='borrower_"+bookid+"']").val();
			
			var publishstr = '<B>Publisher:</B> '+publisher+' ('+publishyear+').';
			
			var checkedoutstr = "<B>Status:</B> Checked out by "+borrower;
			var availablestr = "<B>Status:</B> Available";
			
			if (status == 2) {
			    $('#infostatus').html(checkedoutstr);
			} else if (status == 1) {
			    $('#infostatus').html(availablestr);
			} else {
			     $('#infostatus').html("Status: Missing");
			}
			
			$('#infogenre').html('<B>Category:</B> '+genre);
			$('#infopublisher').html(publishstr);
			$('#infocover').attr('src',cover);
			$('#infotitle').html('<B>Title:</B> '+title);
			$('#infoModalLabel').html('<B>'+title+'</B>');
			$('#infoauthor').html('<B>Author(s):</B> '+author);
			$('.info-modal').toggle();
		    });
		});
	    </script>
            <!--MODAL-NEW BOOK-->
            <DIV class="modal add-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
              <DIV class="modal-dialog">
                <DIV class="modal-content">
                  <DIV class="modal-header">
                    <BUTTON type="button" class="close toggle-add-modal" aria-label="Close"><SPAN aria-hidden="true" class='jl-large'>&times;</SPAN></BUTTON>
                    <P style='padding-top: 24px; margin-top: 0px;' class="modal-title jl-large" id="newModalLabel">New Book</P>
                  </DIV>
		  <FORM method=POST action='browse.php'>
		    <INPUT type=hidden name=task value=addbook>
		    <DIV class="modal-body">
			<TABLE class='modal-add-table'>
			    <TR>
				<TD style='width:30%;' class='jl-right' nowrap>Title:</TD>
				<TD class='jl-left'><INPUT name=title style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Author(s):</TD>
				<TD class='jl-left'><INPUT name=author style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Genre:</TD>
				<TD class='jl-left'><INPUT name=genre style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Publisher:</TD>
				<TD class='jl-left'><INPUT name=publisher style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Year Published:</TD>
				<TD class='jl-left'><INPUT name=publishyear style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Cover Image:</TD>
				<TD class='jl-left'><INPUT name=cover style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Notes:</TD>
				<TD class='jl-left'><TEXTAREA name=notes style='width: 100%;'></TEXTAREA></TD>
			    </TR>
			</TABLE>
		    </DIV>
		    <DIV class="modal-footer">
		      <BUTTON type="button" class="btn btn-default toggle-add-modal" style='padding: 3px;'>Close</BUTTON>
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
	   
		print("<DIV class='modal info-modal' id='myModal' tabindex='-1' role='dialog' aria-labelledby='infoModalLabel' aria-hidden='true'>");
		print("<DIV class='modal-dialog'>");
		print("<DIV class='modal-content'>");
		print("<DIV class='modal-header'>");
		//print("<BUTTON type='button' class='close toggle-info-modal' aria-label='Close'><SPAN aria-hidden='true' class='jl-large'>&times;</SPAN></BUTTON>");
		print("<p style='padding-top: 24px; margin-top: 0px;' class='modal-title jl-large' id='infoModalLabel'></p>");
		print("</DIV>");  //end of modal header
		print("<DIV class='modal-body'>");
		print("<div class='book-info-container' style='height: 100%; padding-left: 30px; padding-right: 30px;'>");
					
		print("<TABLE>");
		print("<TR>");
		print("<TD valign=top>");
		print("<img id=infocover class='book-cover jl-left' style='padding-left: 0px; float: right;width: 150px; vertical-align: top background-color: #f1f1f1; display: inline;'>");
		print("</TD>");
		print("<TD class='jl-top'>");
		print("<p class='jl-left jl-top' style='margin-left: 20px; margin-top: 0px;' id=infotitle></p>");
		print("<p class='jl-left jl-top' style='margin-left: 20px;' id=infoauthor></p>");
		print("<p class='jl-left jl-top' style='margin-left: 20px;' id=infopublisher></p>");
		print("<p class='jl-left jl-top' style='margin-left: 20px;' id=infogenre></p>");
		print("<p class='jl-left jl-top' style='margin-left: 20px;' id=infostatus></p>");
		print("<p class='jl-left jl-top' style='margin-left: 20px;' id=infoborrower></p>");
		print("</TD>");
		print("</TR>");
		print("</TABLE>");
		
		print("<DIV class='book-request-btn' style='margin-top: 30px;'>");
		print("<BUTTON type='button' class='btn btn-default toggle-info-modal toggle-both' style='padding: 3px;'>Close</BUTTON>");
		print("<BUTTON type='submit' class='btn btn-primary request' style='padding: 3px;'>Request Book</BUTTON>");
		print("</DIV>");
		
		print("</div>"); //end of book info container
		print("</DIV>");  //end of modal-body
		
		
		print("<DIV class='modal-footer' >");
		
		print("</DIV>"); // end of modal-footer
		    
		    
		print("<DIV class='book-checkout-form'");
		print("<FORM method=POST action='browse.php'>");
		    print("<INPUT type=hidden name=task value=addborrower>");
		    print("<DIV>");
	    ?>
			<TABLE class='modal-add-table'>
			    <TR>
				<TD style='width:30%;' class='jl-right' nowrap>Name:</TD>
				<TD class='jl-left'><INPUT name=name style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Phone:</TD>
				<TD class='jl-left'><INPUT name=phone style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Email:</TD>
				<TD class='jl-left'><INPUT name=email style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Street Address:</TD>
				<TD class='jl-left'><INPUT name=street1 style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>Apt:</TD>
				<TD class='jl-left'><INPUT name=street2 style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>City:</TD>
				<TD class='jl-left'><INPUT name=city style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>State:</TD>
				<TD class='jl-left'><INPUT name=state style='width: 100%;'></TD>
			    </TR>
			    <TR>
				<TD class='jl-right' nowrap>ZIP:</TD>
				<TD class='jl-left'><INPUT name=zip style='width: 100%;'></TD>
			    </TR>
			</TABLE>
		
		    </DIV>
		    <DIV class='modal-footer>
		      <BUTTON type='button' class='btn btn-default toggle-info-modal' style='padding: 3px;'></BUTTON>
		      <BUTTON type='button' class='btn btn-default cancel-request' style='padding: 3px;'>Cancel</BUTTON>
		      <BUTTON type='submit' class='btn btn-primary' style='padding: 3px;'>Submit</BUTTON>
		    </DIV>
		</FORM>
		</DIV>
				
				
		</DIV>
		</DIV>
                </DIV>
	   <?php
		$url = "browse.php?browseby=$browseby";
		
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
            $sql = "SELECT * from BookInfo ";
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
            
            print("<TR class='jl-bg-gray'> ");
            print("<TD style='text-align: left; width: 35%;' class='booktitle jl-bg-dgray'><B>Title</B></TD>");
            print("<TD style='text-align: left; width: 37%;' class='author jl-bg-dgray'><B>Author</B></TD>");
            print("<TD style='text-align: left; width: 13%;' class='status jl-bg-dgray'><B>Status</B></TD>");
            print("<TD style='text-align: left; width: 15%;' class='checkedOutBy jl-bg-dgray'><B>Borrower</B></TD>");
            print("</TR>");
                         
           
            for($i=0; $i < $rsc; $i++){
                $title = mysql_result($rs, $i, "Title");
                $author = mysql_result($rs, $i, "Author");
                $publisher = mysql_result($rs, $i, "Publisher");
                $publishyear = mysql_result($rs, $i, "Year");
                $genre = mysql_result($rs, $i, "Genre");
                $borrower = mysql_result($rs, $i, "Borrower");
                $cover = mysql_result($rs, $i, "Cover");
                $status = mysql_result($rs, $i, "Status");
		$bookid = mysql_result($rs, $i, "bookID");
		
		print("<INPUT type=hidden value=\"$title\" name='title_$bookid'>");
		print("<INPUT type=hidden value=\"$author\" name='author_$bookid'>");
		print("<INPUT type=hidden value=\"$publisher\" name='publisher_$bookid' >");
		print("<INPUT type=hidden value=\"$publishyear\" name='publishyear_$bookid'>");
		print("<INPUT type=hidden value=\"$genre\" name='genre_$bookid'>");
		print("<INPUT type=hidden value=\"$borrower\" name='borrower_$bookid' >");
		print("<INPUT type=hidden value=\"$cover\" name='cover_$bookid'>");
		print("<INPUT type=hidden value=\"$status\" name='status_$bookid'>");
		print("<INPUT type=hidden value=\"$bookid\" name='bookid_$bookid'>");
		
		if($i%2 ==0){
                    $bgcolor = "#f1f1f1";
		}else{
		    $bgcolor = "#fff";
		}
		if($status == 2){
		    $status = "Checked out";
		}else{
		    $status = "Available";
		}
		print("<TR data-id=$bookid style='background-color: $bgcolor;' class='browse-row toggle-info-modal'>");
		print("<TD class='jl-left' valign=top>$title</TD>");
		print("<TD class='jl-left' valign=top>$author</TD>");
		print("<TD class='jl-left' valign=top>$status</TD>");
		print("<TD class='jl-left' valign=top>$borrower</TD>");
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
	    $publisher = $_POST['publisher'];
	    $publishyear = $_POST['publishyear'];
	    $cover = $_POST['cover'];
	    $genre = $_POST['genre'];
	    $notes = $_POST['notes'];
	    
	    $sql ="INSERT into BookInfo ";
	    $sql .= "(Title, Author, Publisher, Year, Cover, Genre, Notes ";
	    $sql .= " )VALUES(";
	    $sql .= " \"$title\", \"$author\", \"$publisher\", '$publishyear', '$cover', '$genre', \"$notes\")";
	    
	    mysql_query($sql);
	    
	    
	    ?> <script type='text/javascript'>
	    location.href='browse.php';
	</script>
	<?php
	}
	
	if($task == 'addborrower'){
	    $bor_name = $_POST['name'];
	    $bor_phone = $_POST['phone'];
	    $bor_email = $_POST['email'];
	    $bor_add1 = $_POST['address1'];
	    $bor_add2 = $_POST['address2'];
	    $bor_city = $_POST['city'];
	    $bor_city = $_POST['state'];
	    $bor_zip = $_POST['zip'];
	    $bor_status == 1;
	    $bor_book = 'title_$bookid';
	    $bor_author = 'author_$bookid';
	    error_log($bor_book);
	    
	    $sql ="INSERT into Borrowers ";
	    $sql .= "(Name, Phone, Email, Street1, Street2, City, ZIP, Status "; // ASK HOW TO INSERT TIME, BOOK, AUTHOR, //////////////////
	    $sql .= " )VALUES(";
	    $sql .= " \"$bor_name\", \"$bor_phone\", \"$bor_email\", '$bor_add1', '$bor_add2', '$bor_city', \"$bor_state\" ";
	    $sql .= " \"$bor_zip\", \"$bor_status\" )";
	    
	    mysql_query($sql);
	?>
	 <script type='text/javascript'>
	    location.href='browse.php';
	</script>
	<?php
	}
	?>
    </BODY>
    
</HTML>
