<?php
/**
 * All posts relevant to this plugin must go via this class for sanitation and security checks.
 */
namespace classes;

/**
 * Class PostFormWatcherPublic
 * @package classes
 */
class PostFormWatcherPublic
{
    /**
     * We store sanitised posts in this variable which is available on the public pages
     * @var $postInfo
     */
    public $postInfo;

    /**
     * Errors are stored in this array
     * @var $errorArray
     */
    public $errorArray;

    /**
     * Used with out search function
     * @var $searchResults
     */
    public $searchResults;

    /**
     * Errors from the array are stored in a string and returned to the client interface
     * @var
     */
    public $errorMessage;

    /**
     * Clear the variables on construct
     */
    function __construct()
    {
        $this->clear();
    }

    /**
     * Clear the variables
     */
    function clear()
    {
        $this->postInfo 	= array();
        $this->errorArray 	= array();
        $this->errorMessage = "";
        $this->searchResults = array();
    }

    /**
     * This is the function that hooks into client side posts and filters out posts relevant to the plugin
     */
    function plublicPostWatcher() {

        $this->clear();

        //Check for a post
        if (isset($_POST['myappname_simple_search'])) {
            if ( isset($_POST['myappname_nonce']) || wp_verify_nonce($_POST['myappname_nonce'],'myappname_nonce_action') ) {
                $this->sanitise('all' , $_POST );

            }
        }

        //Note the order of post check then get check is of immportance since we allow searches from the stone_overview get location

        else

        //Check for  a get
        if (isset($_GET['myappname_overview'])) {
            $this->sanitise('all' , $_GET );

        }


    }

    /**
     * Make the error message readable
     */
    function prepare_message() {
        foreach ($this->errorArray AS $row) {
            $this->errorMessage .= $row."<br/>";
        }
    }

    /**
     * @param string $level
     * @param $post_info
     */
    function sanitise($level='slashes' , $post_info) {

        $this->postInfo = $post_info;

        //keeps html but adds slashes
        if ($level == 'slashes') {
            foreach ($this->postInfo AS $key => $info) {
                if ( !is_array($info) ) {
                    $this->postInfo[$key] = addslashes($info);
                } else {
                    foreach ($info AS $key2 => $info2) {
                        $query2[$key2] = addslashes($info2);
                    }
                    $this->postInfo[$key] = $query2;
                }
            }
            //this removes html and adds slashes
        } else if ($level == 'all') {
            foreach ($this->postInfo AS $key => $info) {
                if (!is_array($info)) {
                    $this->postInfo[$key] = addslashes(strip_tags($info));
                } else {
                    foreach ($info AS $key2 => $info2) {
                        $query2[$key2] = addslashes(strip_tags($info2));
                    }
                    $this->postInfo[$key] = $query2;
                }
            }
        }
    }

    /**
     * We can use this to pull in reg-exs into form fields if required...
     * @param $checkInfo
     * @param array $ignoreFields
     */
    function fieldCheck($checkInfo,$ignoreFields=array()) {
        global $fieldList;
        //myDump($checkInfo);
        foreach ($checkInfo as $field => $fieldInfo) {
            //echo $field.": ".$fieldInfo." -> ";
            if (isset($fieldList[$field]['Pattern']) AND (!in_array($field,$ignoreFields)) ) {
                if ( ! preg_match('/'.$fieldList[$field]['Pattern'].'/', $fieldInfo)) {
                    //echo $fieldList[$field]['Pattern'].">".$fieldInfo."<";
                    //echo "Failed<br/>";
                    $this->errorArray[] = "You must enter a valid ".$fieldList[$field]['FieldName'];
                } //else echo "Passed test<br/>";
            } //else echo " Ignore or not in list<br/>";
        }
    }

}