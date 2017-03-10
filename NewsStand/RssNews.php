<?php

class RssNews
{
<<<<<<< Updated upstream:includes/NewsStand/RssNews.php
    const CACHE_TIME = 3 * 60; //3 minutes
=======
    const CACHE_TIME = 20 * 60; //20 minutes
>>>>>>> Stashed changes:NewsStand/RssNews.php
    public $NewsID = 0;
    public $FeedXML = "";
    public $TimeCreated = 0;
    public $Expire = 0;
        

	/**
	 * Constructor for Answer class.
	 *
	 * @param integer $NewsID ID number of news feed
	 * @param integer $TimeCreated The current time Created of the answer
	 * @param string $Description Additional description info
	 * @return void
	 * @todo none
	 */
<<<<<<< Updated upstream:includes/NewsStand/RssNews.php
    function __construct($NewsId,$FeedXml)
	{#constructor sets stage by adding data to an instance of the object
		$this->NewsID = (int)$NewsId;
		$this->FeedXML = $FeedXml;
		$this->TimeCreated = time();
        $this->Expire = time() + CACHE_TIME ;
=======
    function __construct($NewsId, $FeedXml, $Subject)
	{#constructor sets stage by adding data to an instance of the object
		$this->NewsID = (int)$NewsId;
		$this->FeedXML = $FeedXml;
		$this->Subject = $Subject;
		$this->TimeCreated = time();
        $this->Expire = time() + CACHE_TIME;//(3 * 60);
>>>>>>> Stashed changes:NewsStand/RssNews.php
	}#end RssNews() constructor
}#end RssNews class
