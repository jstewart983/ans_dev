<?php
$admins = array('cwhite','bflippo','jstewart','rpinson','gsummey','aholst');
$user_group = array('charlow');
/**
 * A simple, clean and secure PHP Login Script / MINIMAL VERSION
 * For more versions (one-file, advanced, framework-like) visit http://www.php-login.net
 *
 * Uses PHP SESSIONS, modern password-hashing and salting and gives the basic functions a proper login system needs.
 *
 * @author Panique
 * @link https://github.com/panique/php-login-minimal/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("../../login/config/db.php");

// load the login class
require_once("../../login/classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago

    $login->doLogout();

    include("../../login/views/home_header.php");
    include("../../login/views/not_logged_in.php");
  }else if (in_array($_SESSION['user_name'], $user_group) || in_array($_SESSION['user_name'], $admins)) {

          $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
          // the user is logged in. redirect to the intended view
          // for demonstration purposes, we simply show the "you are logged in" view.
          include("../../views/finance/index.php");
            }
      else{
        include("../../views/admin/access.php");
        $_SESSION['LAST_ACTIVITY'] = time();
        }


    }
     else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.

    include("../../login/views/home_header.php");
    include("../../login/views/not_logged_in.php");
}


?>
