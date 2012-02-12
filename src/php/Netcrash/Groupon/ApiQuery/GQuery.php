<?php


/**
 * Copyright (c) 2011 Fernando Ribeiro
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of the
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package     Netcrash
 * @subpackage  Groupon
 * @author      Fernando Andre <netriver+GrouponApi at gmail dit com>
 * @copyright   2011 Fernando Ribeiro http://netcrash.wordpress.com
 * @license     http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link
 * @version     @@PACKAGE_VERSION@@
 */


/**
 * Works the Api info to create the URL to be used in the request
 * 
 * @author andref
 *
 */

namespace Netcrash\Groupon\ApiQuery;

class GQuery
{
	protected $api;
	
	/**
	 * pass the api object
	 * 
	 * @param apiClient $api
	 */
	protected function setApi(\Netcrash\Groupon\apiClient $api)
	{
		$this->api = $api;
		return $this;
	}
	
	protected function getApi()
	{
		return $this->api;
	}
	
	/**
	 * Query with a specific latitude
	 * 
	 * @var double
	 */
	protected $lat;
	
	/**
	 * Set the latitude to use in the query
	 * 
	 * @param double $lat
	 * @return GQuery
	 */
	public function setLat($lat)
	{
		$this->lat = $lat;
		return $this;
	}
	
	/**
	 * Get the latitude set
	 * 
	 * @return double
	 */
	public function getLat()
	{
		return $this->lat;
	}
	
	/**
	 * Query with a specific longitude
	 * 
	 * @var double
	 */
	protected $long;
	
	/**
	 * set the longitude to query
	 * 
	 * @param double $long
	 * 
	 * @return GQuery
	 */
	public function setLong($long)
	{
		$this->long = $long;
		return $this;
	}
	
	/**
	 * get the longitude
	 * 
	 * @return number
	 */
	public function getLong()
	{
		return $this->long;
	}
	
	/**
	 * This will be joined to the string url if not empty
	 * 
	 * @var string
	 */
	protected $urlparams = "";
	
	/**
	 * Url of query address
	 * 
	 * @var string
	 */
	protected $url = "http://api.groupon.com/v<VERSION>";
	
	/**
	 * Get the url string unmodified
	 * 
	 * @return string
	 */
	public function getUrlUnmod() { return $this->url; }
	
	/**
	 * Get the url to do the request
	 * 
	 * @return string 
	 */
	public function getUrl()
	{
		$this->resetParamsUrl();
		$url = $this->url;
		if (!empty($this->urlparams)) {
			$url .= $this->urlparams;
		}
		return $url;
	}
	
	protected function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}
	
	/**
	 * Sort the query results by lat+long
	 * Lat and Long must be set
	 * 
	 * @var boolean
	 */
	protected $sort;
	
	/**
	 * Set if sorting should be true
	 * 
	 * @param boolean $flag
	 * @throws \Exception
	 * @return \Groupon\ApiQuery\GQuery
	 */
	public function setSort($flag)
	{
		if ($this->getLat() === null ) {
			throw new \Exception("Latitude value required for sorting.");
		}
		
		if ($this->getLong() === null ) {
			throw new \Exception("Longitude value required for sorting.");
		}
		
		$this->sort = $flag;
		
		return $this;
	}
	
	/**
	 * Should be sorted or not?
	 * 
	 * @return boolean
	 */
	public function shouldSort()
	{
		return ($this->sort === true) ? true: false;
	}
	
	/**
	 * 
	 * @param string $type (deals, divisions)
	 * @param \Groupon\apiClient $api
	 * 
	 */
	public function __construct( $type, \Netcrash\Groupon\apiClient $api)
	{
		$this->url = str_replace("<VERSION>", $api->getVersion(), $this->url);
		$this->url .= "/" . $type;
	
		if ( $api->getVersion() == "1" && $api->getDivision()) {
			$this->url = str_replace("/" . $type , $api->getDivision() , $this->url);
		}
	
		$this->url .= "." . $api->getDriver()->getContentType();
		
		$this->setApi($api);

	}
	
	protected $params = array();
	
	/**
	 * set params for the url
	 * 
	 * @param array $p
	 * @return GQuery
	 */
	public function setParams(array $p)
	{
		$this->params = $p;
		return $this;
	}
	
	/**
	 * get params of url
	 * 
	 * @return Array
	 */
	public function getParams()
	{
		return $this->params;
	}
		
	/**
	 * Validate if params were set in the url
	 * 
	 * @return boolean
	 */
	public function hasParams()
	{
		return (($this->params)>0) ? true: false;
	}
	
	/**
	 * rebuild url string params
	 * 
	 *  @return GQuery
	 */
	public function resetParamsUrl()
	{
		$params = array();
		$api	= $this->api;
		
		if ($api->getToken()) {
			$this->params["client_id"] = $api->getToken();
		}
		
		if ($api->getDriver()->getForceHttpSucess() === true ) {
			$this->params["force_http_success"] = true;
		}
		
		if ($lat = $api->getWebClient()->getLat()) {
			$this->setLat($lat);
			// place it in params
			$this->params["lat"] = $this->getLat();
		}
		
		if ($long = $api->getWebClient()->getLong()) {
			$this->setLong($long);
			// place it in params
			$this->params["lng"] = $this->getLong();
		}
		
		if ($this->shouldSort() === true ) {
			$this->params["sort"] = null;
		}
		
		if (count($this->params) > 0 ) {
			
			$this->urlparams = "?";
			$tmp		= "";
			foreach ($this->params as $key => $parm ) {
				$tmp = $key; 
				if ($parm !== null ) 
					$tmp .= "=" . $parm;
				
				$this->urlparams .= $tmp . "&";
				$tmp = "";
			}
		
			$this->urlparams = substr($this->urlparams, 0, -1);
		}
	}
	
	/**
	 * Parameter for the url
	 * 
	 * @param string $key
	 * @param string $value
	 * 
	 * @return \Netcrash\Groupon\ApiQuery\GQuery
	 */
	public function addParam($key, $value)
	{
		$this->params[$key] = $value;
		return $this;
	}
	
	/**
	 * return a specific parameter
	 * 
	 * @param string $key
	 * @return NULL|string
	 */
	public function getParam($key)
	{
		if (!array_key_exists($key, $this->params)) {
			return null;
		}
		
		return $this->params[$key];
	}
}