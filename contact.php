	<?php require_once("top2.php"); ?> 




<center>
  <div class="body_resize">
    <div class="body">
      <div class="Welcome col-lg-12 col-md-12 col-sm-12">
        
        <form action="contact.php" method="post" id="contactform">
          <table>
            <tr>
              <td><label>اسم:</label></td>
              <td> <input id="name" name="name" class="text" /></td>
            </tr>
			<br>
            <tr>
              <td> <label>ایمیل آدرس: </label></td>
              <td> <input id="email" name="email" class="text" /></td>
            </tr>
            <br>
            <tr>
              <td><label>موضوع:</label></td>
              <td><input id="subject" name="subject" class="text" /></td>
            </tr>
            <tr>
              <td><label> پیام:</label></td>
              <td><textarea id="message" name="message" rows="9" cols="23"></textarea></td>
            </tr>
            <tr >
		      <td></td>
              <td><input type="submit" name="submit" value="ارسال" /></td>
            </tr>
          </table>
        </form>
     
	<?php require_once("footer.php"); ?> 