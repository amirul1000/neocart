    <?php
	     if($_POST)
		 {
		    $user_name = $_POST['user_login'];
			$password = $_POST['user_pass'];
			$user_email = $_POST['user_email'];
			
			$user_id = username_exists( $user_name );
			if ( !$user_id ) 
			{
				$user_id = wp_create_user( $user_name, $password, $user_email );
				echo 'Registration has been completed successfully';
			} else 
			{
				echo 'User already exists.  Password inherited.';
			}
		 }
	   ?>
       <?php 
		 $page =get_page_by_title( 'register' );
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
             <td>Email</td>
             <td><input type="text" name="user_email" value="" required></td>
           </tr>
           <tr>
             <td colspan="2">
                <input type="submit" name="btn_submit" value="submit">
             </td>
           </tr>
        </table>
       </form>
       <?php 
		 $page =get_page_by_title( 'login' );
		 $guid = $page->guid; 
	   ?>
       <a href="<?=$guid?>">Login</a>    