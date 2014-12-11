<?php
/**
 * The admin overview page
 */
function myappname_overview() {


    //Remember this is declared in the pre.php file
    global $pluginPostWatcher;

    $page = "";

    if ( isset( $_GET['page'] ) ) {
        $page = $_GET['page'];
    } ?>

    <!-- MYAPPNAME MENU ITEM -->

    <?php require_once APP_INCLUDES_PATH.'MainMenu.php'; ?>


    <!-- OUTPUT OUR ERROR MESSAGES HERE FROM THE POST FORM WATCHER-->

    <div id="myappname-api-page" class="wrap">
        <?php if ( isset( $pluginPostWatcher->errorMessage ) AND $pluginPostWatcher->errorMessage != '' ) { ?>
            <div id='message' class='updated fade'><p><strong style="color:#ff0000;"><?php echo $pluginPostWatcher->errorMessage; ?></strong></p></div>
        <?php } ?>
    </div>


    <?php
    if ($page == "myappname_api") { ?>

    <div id="myappname-api-page" class="wrap">
        <p>
            This plugin does the following stuff...
        </p>

        <div class="postbox" id="boxid">
            <div title="Click to toggle" class="handlediv"><br></div>
            <h3 class="hndle"><span>&nbsp;&nbsp;Currently we register three shortcodes:</span></h3>
            <div class="inside">
               <ol>
                   <li>[myappname-simple-search]</li>
                   <li>[myappname-simple-search-results]</li>
                   <li>[myappname-simple-stone-overview]</li>
               </ol>
            </div>
        </div>

        <div class="postbox" id="boxid">
            <div title="Click to toggle" class="handlediv"><br></div>
            <h3 class="hndle"><span>&nbsp;&nbsp;How it works:</span></h3>
            <div class="inside">
                <b>The search shortcode</b> displays the search file <i>myappname-plugin/templates/SearchTemplate.html</i>. When the search form is invoked, the plugins post watcher
                checks for the post variable: "myappname_simple_search", if found the data is sanitised and added to the plugins postForm object.<br/><br/>

                <b>The search results shortcode</b> monitors the postForm object, if it finds search data, it will call the ABC Api
                search module with the requested search information and populate the template: <i>myappname-api/templates/SearchResultTemplate.html</i> with the results.<br/><br/>

                <b>Each search result has a "more options"</b> link appended to it, when clicked this will invoke the post watchers
                GET Variable checker and the relevant data will be populated into the MyAppName Overview Template.

            </div>
        </div>

        Current App Version: <?php echo APP_VERSION;?>


    </div>


    <?php } else { ?>

        <div id="myappname-api-page" class="wrap">
           MyAppName management application version: <?php echo APP_VERSION;?>
        </div>

    <?php } ?>

<?php
}

