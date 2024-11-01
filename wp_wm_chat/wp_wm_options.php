<?php
$plugin_location = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'wp_wm_chat.php';
$plugin_data = get_plugin_data($plugin_location);
$location = get_option('siteurl') . '/wp-admin/admin.php?page=wp_wm_chat/wp_wm_options.php'; 

/*Lets add some default options if they don't exist*/


add_option('wm_domain', $_SERVER['HTTP_HOST']);


/*check form submission and update options*/
if ('process' == $_POST['stage'])
{

	update_option('wm_domain', $_POST['wm_domain']);

}

/*Get options for form fields*/

$wm_domain = stripslashes(get_option('wm_domain'));


?>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

<div class="wrap">
  <h2><?php _e('123 web messenger options', 'wm_chat') ?></h2>
  <form name="form1" method="post" action="<?php echo $location ?>&amp;updated=true">
	<input type="hidden" name="stage" value="process" />
    <table width="100%" cellspacing="2" cellpadding="5" class="editform">
      
      
      <tr valign="top">
        <th scope="row"><?php _e('Domain:') ?></th>
        <td><input name="wm_domain" type="text" id="wm_domain" value="<?php echo $wm_domain; ?>" 
size="50" /> </td>
      </tr>
      
      
      
      <tr valign="top">
        <th scope="row"><?php _e('Plugin usage:') ?></th>
        <td><?php _e('To add 123 web messenger into your wordpress templete,just add the following code into your current WordPress theme on a place, where you want to appear.<br /><br />Put <b>' . htmlspecialchars
('<?php wp_show_facebookbar(); ?>').'</b><br/>e.g: <br/>Open  /wp-content/themes/default/footer.php', 'wpcf') ?></td>
      </tr>
    </table>
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Update Options', 'wm_chat') ?> &raquo;" />
    </p>
  </form>
</div>