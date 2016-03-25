   <?php
	       if($_POST)
		    {
				$user_login = $_POST['user_login'];
				$password = $_POST['user_pass'];
				$user_pass = md5($password); 
                //$user = get_userdatabylogin($user_login);
               // $user_id = $user->ID;
			   //login, set cookies, and set current user
			     wp_login($user_login, $user_pass, true);
			     wp_setcookie($user_login, $user_pass, true);
			   //wp_set_current_user($user->ID, $user_login);
			   $current_user = wp_get_current_user(); 
			   if ( $current_user->ID>0 )
			   {
			      echo "<font color=\"red\">You Login successfully</font>";
			   }
			   else
			   {
			      $_SESSION['users_id'] = $current_user->ID;
			      echo "<font color=\"red\">Login fail,Please check your userid and password</font>";
			   }
			}
			
		if ( !is_user_logged_in())
		 {			
	   ?>
		<?php 
         $page =get_page_by_title( 'login' );
         $guid = $page->guid; 
        ?>   
       <form action="<?=$guid?>" method="post">
        <table>
           <tr>
             <td>User Name</td>
             <td>
               <input type="text" name="user_login" value="" required>
             </td>
           </tr>
           <tr>
             <td>Password</td>
             <td><input type="password" name="user_pass" value="" required></td>
           </tr>
           <tr>
             <td colspan="2">
               <input type="submit" name="btn_submit" value="Login">
             </td>
           </tr>
        </table>
       </form>
         <?php
		 }
		 else
		 {
		 ?>
         <br><a href="<?php echo wp_logout_url(); ?>" title="Logout"><b>Logout</b></a><br><br><br>
         <?php
		 }
		 ?>
         <?php 
		 $page =get_page_by_title( 'register' );
		 $guid = $page->guid; 
		 ?>   
       <a href="<?=$guid?>">Register</a>