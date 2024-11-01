===  WordPress Facebook Bar for 123 Web Messenger ===

Contributors: Daniel Jiang
Donate link: http://www.123flashchat.com
Tags: WordPress chat, Free WordPress Chat, WordPress Chat Plugins,  WordPress facebook bar, web messenger, Free facebook bar, Java Chat Server
Requires at least: 2.8
Tested up to: 2.8.6
Stable tag:2.8

== Description ==

123 Web Messenger WordPress Plugin can be used to create your own facebook bar in WordPress. It allows you to insert chat room to your facebook bar. 

After activate the plug-in, you can set flash chat configuration in admin panel: Setting: 123 Web Messenger. You may easily get a free facebook bar hosted by 123flashchat.com and naming your own domain name simply in admin panel.


== Installation ==

Step 1, Install Plugin files to your wordpress:


        File Copy 
            copy folder wp_wm_chat/login_chat.php           to                  <wordpress installed directory>/login_chat.php
            copy folder wp_wm_chat/                         to                  <wordpress installed directory>/wp-content/plugins/wp_wm_chat/





Step 2, Install the plugin in the wordpress admin panel.

         Login: wordpress Admin Panel -> "Plugins" ->Find: "123 web messenger" -> "Activate"




Step 3, Login: wordpress Admin Panel -> "Setting" ->Click: "123 web messenger",
        Configure chat's parameters in in the wordpress admin panel.

        1) Please fill with your Domain.

        

         


Step 4, How to use the plugin.



       Put <?php  wp_show_facebookbar();  ?> in your template to show facebook bar.
       e.g:
       Open /wp-content/themes/default/footer.php
   



== Frequently Asked Questions ==

= Do you have questions or issues with WordPree IM facebook bar Plugin? Use these support channels appropriately. =

1. [FAQ](http://www.123flashchat.com/faq.html)
1. [Support Forum](http://www.123flashchat.com/community/index.php)

[Online Chat with Operator](http://www.123flashchat.com/123livehelpdemo/client.html?init_color=blue&init_host=host.123livehelp.com&init_port=28969&init_group=default)

== Screenshots ==

1. screenshot-1.png


== Changelog ==

= 2.8.6 =
* The required WordPress version has been changed and now requires WordPress 2.8 or higher. If you use WordPress 2.7 or lower, you will need to upgrade WordPress.
* Easily get a free chat room hosted by 123flashchat.com
* Define the width and height for the WordPress facebook bar. 