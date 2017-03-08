<?php

class RssNews
{
	 public $NewsID = 0;
	 public $FeedXML = "";
	 public $TimeCreated = 0;

	/**
	 * Constructor for Answer class.
	 *
	 * @param integer $NewsID ID number of news feed
	 * @param integer $TimeCreated The current time Created of the answer
	 * @param string $Description Additional description info
	 * @return void
	 * @todo none
	 */
    function __construct($NewsId,$FeedXml,$Time)
	{#constructor sets stage by adding data to an instance of the object
		$this->NewsID = (int)$NewsId;
		$this->FeedXML = $FeedXml;
		$this->TimeCreated = $Time;
	}#end RssNews() constructor
}#end RssNews class
