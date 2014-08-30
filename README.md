
*********************************************
	Achievements v2.8 Alpha Release
*********************************************
testing git lols 2222


Table of contents:
1. Introduction
2. Requirements
3. Installation Instructions
	3.1 Website Application
	3.2 Server Plugins
  


---------------------
1. INTRODUCTION
---------------------
First, let me personally thank you for purchasing this product. Since you're reading
this file, that's what you most likely did. On the other hand, if you didn't, please
consider paying for the system in order to get full support and additional features. I have
spent so much time on this and I think it's worth the few bucks it costs.

If you have any further questions about the installation steps and need extra help, drop me a message
at idiotstrike@gmail.com or PM Backstabnoob on Alliedmods.


---------------------
2. REQUIREMENTS
---------------------
Although not many, there are some requirements if you want the system to run correctly. The general rule 
is if you use AMXBans, this system will work as well for 99% users.

You need a MySQL server that's accessible both by your webhosting and the game servers. Failure in having one
will obviously prevent the system from working what so ever.

You also need a webhosting with PHP 5.2.0 or better, but that goes without saying.

And last but not least, CS 1.6 servers.


--------------------
3. INSTALLATION INSTRUCTIONS
--------------------
The installation is divided into two basic steps. Website Application and Server Plugins.

///
3.1 Website Application
///

Copy the contents of web_app to your webhosting. Open user/config.php and modify the following values:
$sql_xxx values. These are your database settings.
$friendly_urls - whether or not you want to use the .htaccess file to generate SEO Friendly URLs. Might not work for everyone.
$format - if you want to use a different time format, modify this.
$website_url - the URL the system is installed on. EXCLUDE THE SLASH AT THE END OF THE URL.
$severs - List of your servers. The format is always "shortname" => "Long Name", (the comma is necessary unless it's the last server).
	Do not add any spaces or special characters to the shortname, it won't work if you do. Long Name shouldn't be too long,
	it couldn't fit on the page. It's up to you what you put here, that's only the shown text.
LANGUAGE_PACKAGE - the language you want to use. By default, only english is installed - you will find a few extra ones in the web_extensions folder.

Save the file and close it. Open your browser and locate the page where your Achievements are. Add /tools/create_tables.php at the end of the URL to create
the necessary tables. For example: http://website.com/Achievements/tools/create_tables.php. If you're shown an error, you most likely didn't configure $servers 
array in the config properly.

If everything went well, you're done.

///
3.2 Server Plugins
///

Copy the contents of game_plugin/addons/amxmodx/scripting to your scripting directory of your compiler. Open include/achievements/config.inc and modify 
the SQL values, as well as the other values according to the comments in the file.

Compile achievements.sma, achievements_list.sma and achievements_classic.sma.

Upload achievements.amxx, achievements_list.amxx (if you want the in-game /ac command with MOTD) and 
achievements_classic.amxx (if you want the default classic achievements) to your server and enable them in plugins.ini. Use the same plugin order.

Upload game_plugin/sound/achievement_unlocked.wav to the sound directory on your server.

Upload game_plugin/addons/amxmodx/data/lang/achievements_core.txt (and achievements_list.txt if you use achievements_list.amxx) 
to the lang directory on the server.

Add the following cvars to either server.cfg (recommended) or amxx.cfg:
ac_server_table "xxx", where xxx is the shortname of the server you put into the $servers array on your website config.
ac_authtype 0/1/2, what should the players be saved by; 0 - steamID, 1 - ip, 2 - name (default 0)
ac_win_announcement 0/1/2, who should see a message when a player wins an achievement;0 - nobody, 1 - only the player, 2 - everybody (default 2)

if you use achievements_list.amxx:
ac_website_url "http://website.com/achievements" - the URL where your achievements are - without slash at the end

Do this for all the servers you want achievements on.

Restart your servers, the achievements should be created on the website application.


Your achievements are now installed.


Please let me know if you have any additional questions.