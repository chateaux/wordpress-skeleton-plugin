wordpress-skeleton-plugin
=========================

To help with your new Wordpress plugin

==HOW THIS PLUGIN WORKS==

The following is a general flow of how this app works.

==The main file is: your_app.php==
Apart from the applicaiton information appearing here (the stuff you read on the wordpress plugin page), it is also used
to seperate our concerns between public code and admin code. Public code is the code that must be loaded when your users are using your site. Admin code is the code you load for use in the administration.

This ensures the app at all times works at optimum speed.

=== your_app.php === 
This file loads either the pre.admin.php file or the pre.public.php file depending on what page you are on.

=== pre.admin and pre.public ===
Both these files load the apps config files where we setup:

- paths
- urls
- db tables
- nonce
- autoloader

After the above settings have been initialised, we pull in the functions from the functions directory:

- MainFunctions which is used to display content in the plugin admin
- Help content which is the content found at the top of each admin page
- And general functions (app registration and menu administration)

Once everything is setup, we register the app by calling the static function:: classes\Register::app(__FILE__);

===Shortcodes===
Included in the skeleton is an example of how to use shortcodes. I have opted for a simple search scenario however this can be used for just about anything keeping the same format that has been used.

===functions/shortcodes.php===
- Simple Search Logic
- Simple Seach Results Logic
- Simple result overview page

===classes/TopstoneShortCodes.php===
- This is where we initialize our short codes.

===templates/SearchTemplate.html===
- To make life easy we store basic template for the search function to abstract the design from the code. Any requirements we include via a macro and string replace with the data we need.

===post form watcher===
You will find two post form watcher files. One public and one admin. This was originally designed to run on each post and to look for patterns, once found the information is sanitised and stored in a postForm watcher object for use in the app. 

So to give you an idea of how this is used with the shortcodes.

1. The simple search logic when initialized posts to its self.
2. The post form watcher, picks up the post request and matches it to the simple search variable and stores the query in the object.
3. The job of the search results shortcode, is to check for any changes in the postForm object. When found, it initializes a search based on the sanitised query string stored in the object. Results are returned to the same page and displayed via the search results logic.
4. I have added an extra step where we can display details about each search item on an overview page.

This little search operation can run on the same page or it can run on multiple pages. If it where to run on seperate pages you would add a re-direct to the post form watcher (make sure it does not re-direct within a frame though)...

If you like the skeleton-wordpress-plugin concept and wish to contribute... let me know!




