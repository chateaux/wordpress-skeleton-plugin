<?php

/**
 *  All posts are routed via this class so that we can sanitise the information
 */
namespace classes;

/**
 * This class monitors admin related posts. All posts will by pass this class, even the official wordpress
 * posts. However we only interact with the ones we are interested in...
 *
 * Class PostFormWatcher
 * @package classes
 */
class PostFormWatcher
{
    /**
     * We store sanitised posts in this variable
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
     *  Clears the variables on construct
     */
    function __construct()
    {
        $this->clear();
    }

    /**
     * Clear action
     */
    function clear()
    {
        $this->postInfo 	= array();
        $this->errorArray 	= array();
        $this->errorMessage = "";
        $this->searchResults = array();
    }

    /**
     * Search for relevant posts
     */
    function pluginPostWatcher() {
        $this->clear();

        if (isset($_POST['myappname_post_name'])) {
            if ( isset($_POST['myappname_nonce']) || wp_verify_nonce($_POST['myappname_nonce'],'myappname_nonce_action') ) {
                // Sanitise cleans the data and stores it in the post object
                $this->sanitise('all');
                //$this->errorArray = $someObject->updateSomefunction($this->postInfo);
                //Make the message neat...
                $this->prepare_message();
            }
        }

    }

    /**
     * Put the error messages into a readable format
     */
    function prepare_message() {
        if (is_array($this->errorArray)) {
            foreach ($this->errorArray AS $row) {
                $this->errorMessage .= $row."<br/>";
            }
        }
    }

    /**
     * @TODO Re-write this thing...
     *
     * Remove injection and other hack attempts
     * @param string $level
     */
    function sanitise($level='slashes') {
        $this->postInfo = $_POST;

        //keeps html but adds slashes
        if ($level == 'slashes') {
            foreach ($this->postInfo AS $key => $info) {
                if (!is_array($info)) {
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
     * Regex stuff - need to add regular expressions to the  config file if this is to be used
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