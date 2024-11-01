<?php
/*
Plugin Name: 123 Web Messenger
Plugin URI: http:///www.123flashchat.com/wordpress-chat.html
Description: 123 Web Messenger Plugin can be used to put your facebook bar (<a href="http://www.123flashchat.com" target="_blank">demo page</a>) in WordPress. And you may easily get a free host service by simply selecting a domain name. If you are 123FlashChat.com's license buyer or host service buyer, you may get more professional technique support.
Author: 123flashchat.com
Author URI: http://www.123flashchat.com
*/

$hookname = 'settings_page_wp_wm_chat/wp_wm_options';
$upload_hookname = 'admin_page_wp_wm_chat/wp_wm_options';

$_registered_pages[$hookname] = 1;
$_registered_pages[$upload_hookname] = 1;


/* Action calls for all functions */
add_action('admin_head', 'wm_add_options_page');
/*
add_action('init', 'flash_chat_init');
add_action('marker_css', 'flash_chat_marker_css');

/* Functions definition  for admin panel*/


function wm_add_options_page() {
	add_options_page('IM Options', '123 Web Messenger', 'manage_options', 'wp_wm_chat/wp_wm_options.php');
}

function wp_show_facebookbar() {
	
	$wm_domain_name = stripslashes(get_option('wm_domain_name'));

		$wm_domain = stripslashes(get_option('wm_domain'));
		$host_url = wm_checkSlash($wm_domain);
		$keyArray = array_keys($_COOKIE);
		$userKey = "";
		if($keyArray) {
			foreach($keyArray as $key => $val) {
				if(substr_count($val,"wordpress_logged_in")) {
					$userKey = $val;
					break;
				}
			}
		}
	
		$get_userinfo = explode('|',$_COOKIE[$userKey]);
		$username = '';
		$password = '';
	  
		if ( !empty($get_userinfo[0]))
		{
		
			 include ( str_replace('wp-content\plugins\wp_wm_chat\\','wp-config.php', dirname(__FILE__) . DIRECTORY_SEPARATOR ) );
			
			$db_server = DB_HOST; 
			$db_name = DB_NAME;
			$db_table = wp_users;
			$db_user = DB_USER;
			$db_pass = DB_PASSWORD;
			$db_username = "user_login";
			$db_password = "user_pass";
			
			$link = mysql_pconnect($db_server,$db_user,$db_pass);
			mysql_select_db($db_name,$link);
			$sql = "SELECT * FROM ".$db_table." WHERE $db_username='".$get_userinfo[0]."'";
			$fetch = mysql_query($sql,$link);
			$row = mysql_fetch_array($fetch);
			$username = $row[$db_username];
		    $password = $row[$db_password];
		}	

    $host_url = wm_checkSlash($host_url);
	$config = @file_get_contents($host_url.'js/config.js');
	$config = preg_replace( '|.*123WebMessenger script begin|','//power by 123flashchat.com'.$host_url.'"',$config);
	if( !empty($host_url) )
		$config = preg_replace( '|var webpath = \".*\"|','var webpath = "'.$host_url.'"',$config);
		
	echo '<script language="javascript">';
	echo $config;

	echo'   var username_123webmessenger = "'.$username.'";
			var password_123webmessenger = "'.$password.'";
			var enable_app=false;
			var app_name="Chat Room";
			var app_url="http://www.123flashchat.com/123flashchat.html?init_port=51128";
			var app_width=779;
			var app_height=505;
			var app_logo="";
			var app_default_show=false;
			var app_tool_tip="Click to chat";
			</script>';
   
    echo '<script language="javascript" src="http://free.123flashchat.com/wmjs.php?domain='. "$wm_domain".'&f=1"></script>';
}



function wm_checkSlash($path)
{
	$path = trim($path);
	if(substr($path,-1,1) != "/" && !empty($path)){
		$path = $path."/";
	}
	return $path;
}


function widget_wm_chat() {
	
	// Check for the required API functions
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return;
	function widget_wm_chat1() {
?>
   <div id="123webmessenger">123 Web Messenger <?php wp_show_facebookbar(); ?></div> 
<?php
}		

if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('123 Web Messenger'), 'widget_wm_chat1');	
}
add_action('widgets_init', 'widget_wm_chat');

?>