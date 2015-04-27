<?php
//hello world
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
                    <LI class='nav-li'>
                        <A href='#'>TOOLS</A>
                    </LI>
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
		    
		    $('.toggle-add-modal').click(function() {
			$('.add-modal').toggle();
		    });
                    $('.toggle-info-modal').click(function() {
			$('.info-modal').toggle();
		    });
		});
	    </script>
            <!--MODAL-NEW BOOK-->
            <DIV class="modal add-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <DIV class="modal-dialog">
                <DIV class="modal-content">
                  <DIV class="modal-header">
                    <BUTTON type="button" class="close toggle-add-modal" aria-label="Close"><SPAN aria-hidden="true" class='jl-large'>&times;</SPAN></BUTTON>
                    <H4 class="modal-title jl-large" id="myModalLabel">New Book</H4>
                  </DIV>
                  <DIV class="modal-body">
                    <TABLE class='modal-add-table'>
                        <TR>
                            <TD style='width:30%;' class='jl-right' nowrap>Title:</TD>
                            <TD class='jl-left'><INPUT style='width: 100%;'></TD>
                        </TR>
                        <TR>
                            <TD class='jl-right' nowrap>Author 1:</TD>
                            <TD class='jl-left'><INPUT style='width: 100%;'></TD>
                        </TR>
                        <TR>
                            <TD class='jl-right' nowrap>Author 2:</TD>
                            <TD class='jl-left'><INPUT style='width: 100%;'></TD>
                        </TR>
                        <TR>
                            <TD class='jl-right' nowrap>Author 3:</TD>
                            <TD class='jl-left'><INPUT style='width: 100%;'></TD>
                        </TR>
                        <TR>
                            <TD class='jl-right' nowrap>Genre:</TD>
                            <TD class='jl-left'><INPUT style='width: 100%;'></TD>
                        </TR>
                        <TR>
                            <TD class='jl-right' nowrap>Publisher:</TD>
                            <TD class='jl-left'><INPUT style='width: 100%;'></TD>
                        </TR>
                        <TR>
                            <TD class='jl-right' nowrap>Year Published:</TD>
                            <TD class='jl-left'><INPUT style='width: 100%;'></TD>
                        </TR>
                        <TR>
                            <TD class='jl-right' nowrap>Cover Image:</TD>
                            <TD class='jl-left'><INPUT style='width: 100%;'></TD>
                        </TR>
                        <TR>
                            <TD class='jl-right' nowrap>Notes:</TD>
                            <TD class='jl-left'><TEXTAREA style='width: 100%;'></TEXTAREA></TD>
                        </TR>
                    </TABLE>
                  </DIV>
                  <DIV class="modal-footer">
                    <BUTTON type="button" class="btn btn-default toggle-add-modal" style='padding: 3px;'>Close</BUTTON>
                    <BUTTON type="button" class="btn btn-primary" style='padding: 3px;'>Save</BUTTON>
                  </DIV>
                </DIV>
              </DIV>
            </DIV>
            
            <!--BOOK INFO-->
            <?php
            $sql = "select * from BookInfo";
            //echo("SQL: $sql");
            $rs = mysql_query($sql);
            if($rs) $rsc = mysql_num_rows($rs);
            for($i=0; $i < $rsc; $i++){
                $title = mysql_result($rs, $i, "Title");
                $author = mysql_result($rs, $i, "Author");
                $publisher = mysql_result($rs, $i, "Publisher");
                $publishyear = mysql_result($rs, $i, "Year");
                $genre = mysql_result($rs, $i, "Genre");
                $borrower = mysql_result($rs, $i, "Borrower");
                $cover = mysql_result($rs, $i, "Cover");
                $status = mysql_result($rs, $i, "Status");
                                    
                print("<DIV class='modal info-modal' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>");
                print("<DIV class='modal-dialog'>");
                print("<DIV class='modal-content'>");
                print("<DIV class='modal-header'>");
                print("<BUTTON type='button' class='close toggle-info-modal' aria-label='Close'><SPAN aria-hidden='true' class='jl-large'>&times;</SPAN></BUTTON>");
                print("<H4 class='modal-title jl-large' id='myModalLabel'>$title</H4>");
                print("</DIV>");
                print("<DIV class='modal-body'>");
                print("<div class='book-info-container' style='width: 100%; height: 100%; padding-left: 30px; padding-right: 30px; padding-bottom: 30px;'>");
                        
                print("<TABLE>");
                print("<TR>");
                print("<TD>");
                print("<div class='book-cover jl-left' style='padding-left: 0px; float: right;width: 150px; height: 225px; padding: 10px; background-color: gray; display: inline;'></div>");
                print("</TD>");
                print("<TD class='jl-top'>");
                print("<p class='jl-left jl-top' style='margin-left: 20px; margin-top: 0px;'>$title</p>");
                print("<p class='jl-left jl-top' style='margin-left: 20px;'>$author</p>");
                print("<p class='jl-left jl-top' style='margin-left: 20px;'>$publisher, $publishyear</p>");
                print("<p class='jl-left jl-top' style='margin-left: 20px;'>$genre</p>");
                print("<p class='jl-left jl-top' style='margin-left: 20px;'>$status</p>");
                print("<p class='jl-left jl-top' style='margin-left: 20px;'>$borrower</p>");
                //print("<p class='jl-left jl-top' style='margin-left: 20px;'>reviews</p>");
                print("</TD>");
                print("</TR>");
                print("</TABLE>");
            
                print("</div>");
                print("</DIV>");
                print("</DIV>");
                print("</DIV>");
                print("</DIV>");  
            }
        ?>
            <TABLE style='width: 67%; text-align: center; margin: auto; border: 0px;' class='jl-bg-gray'>
                <TR>
                    <TD style='float: left; padding: 5px; margin-top: 10px; height: 50px; display: inline;' align=left nowrap>
                        <P style='margin-left: 5px; display: inline'>Browse by:</P>
                        <SELECT style='width: 125px; margin-top: 10px; display: inline;'>
                            <OPTION value="author">Author</OPTION>
                            <OPTION value="title">Title</OPTION>
                        </SELECT>
                    </TD>
                    <TD style='height: 50px;'class='jl-right'>
                        <button type="button" class="btn btn-primary toggle-add-modal" style='margin-right: 5px;'>Add New Book</button>
                    </TD>
                </TR>
            </TABLE>
            <TABLE style='width: 67%; text-align: center; margin: auto; border: 0px;'>
                <TR class='alphabetbar'>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>ALL</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'></A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>A</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>B</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>C</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>D</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>E</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>F</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>G</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>H</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>I</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>J</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>K</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>L</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>M</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>N</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>O</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>P</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>Q</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>R</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>S</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>T</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>U</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>V</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>W</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>X</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>Y</A></TD>
                    <TD style='width: 3.5%' class='jl-bg-gray'><A href='#'>Z</A></TD>
                </TR>
            </TABLE>
            <?
            print("<TABLE class='browse-table'>");
            
            print("<TR style='height: 2px; background-color: #fff; width: 100%;'>");
            print("</TR>");
            
            print("<TR class='jl-bg-gray'> ");
            print("<TD style='text-align: left; width: 32%;' class='booktitle jl-bg-dgray'><B>Title</B></TD>");
            print("<TD style='text-align: left; width: 32%;' class='author jl-bg-dgray'><B>Author</B></TD>");
            print("<TD style='text-align: left; width: 17%;' class='status jl-bg-dgray'><B>Status</B></TD>");
            print("<TD style='text-align: left; width: 19%;' class='checkedOutBy jl-bg-dgray'><B>Borrower</B></TD>");
            print("</TR>");
            
            print("<TR class='jl-bg-lgray browse-row toggle-info-modal'>");
            print("<TD class='jl-left' valign=top>$title</TD>");
            print("<TD class='jl-left' valign=top>$author</TD>");
            print("<TD class='jl-left' valign=top>$status</TD>");
            print("<TD class='jl-left' valign=top>$borrower</TD>");
            print("</TR>");
            
            print("<TR class='browse-row toggle-info-modal'>");
            print("<TD class='jl-left' valign=top>$title</TD>");
            print("<TD class='jl-left' valign=top>$author</TD>");
            print("<TD class='jl-left' valign=top>$status</TD>");
            print("<TD class='jl-left' valign=top>$borrower</TD>");
            print("</TR>");
             
            print("</TABLE>");
            
            ?>
            <!--FOOTER-->
            <DIV class='footer'>
                <P>Web design and development by <a href='http://mandrakedesign.com'>Mandrake Design</a>.</P>
            </DIV>
        </DIV>
        
    </BODY>
    
</HTML>
