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

namespace Netcrash\Groupon;

use Netcrash\Groupon\DataObject\WebClient;

use Netcrash\Groupon\ApiQuery\Divisions;

use Netcrash\Groupon\DataObject\GDriver;
use Netcrash\Groupon\DataObject as DBO;
use Netcrash\Groupon\ApiQuery as APQ;

/**
 * apiClient basic call and set statements are done here 
 * 
 * @author andref
 *
 */
class apiClient
{
	private $token;

	public function setToken($token)
	{
		$this->token = $token;
	}
	
	public function getToken()
	{
		if (empty($this->token)) {
			throw new \Exception("No token specified.");
		}
		
		return $this->token;
	}
	
	private $version;
	
	public function setVersion($version)
	{
		$this->version = $version;
		
		return $this;
	}
	
	public function getVersion()
	{
		return $this->version;
	}
	
	private $webclient;
	/**
	 * Sets the webclient object
	 * 
	 * @param WebClient $wc
	 * 
	 * @return apiClient
	 */
	public function setWebClient(DBO\WebClient $wc)
	{
		$this->webclient = $wc;
		
		return $this;
	}
	
	/**
	 * Get the web client settings
	 * 
	 * @return WebClient
	 */
	public function getWebClient()
	{
		return $this->webclient;
	}
	
	private $division;
	
	public function setDivision(DBO\Division $div)
	{
		$this->division = $div;
		
		return $this;
	}
	
	public function getDivision()
	{
		return $this->division;
	}
	
	/**
	 * Get deals available
	 * 
	 */
	public function getDeals()
	{
		$deals = new APQ\Deals($this);
		return $this->query($deals->getDeals());
	}
	
	/**
	 * Get the deal by id
	 * 
	 * @param string $id
	 * @return \Netcrash\Groupon\DataObject\Deal
	 */
	public function getDealById($id)
	{
		$deals = new APQ\Deals($this);
		$r = $this->query($deals->getDeal($id));
		return $r[0];
	}
	
	/**
	 * Get deals available by Division
	 *
	 */
	public function getDealsByDivision()
	{
		if (!($this->getDivision() instanceof DBO\Divison )) {
			throw new \Exception("apiClient->division Not an instance of Division.");
		}
		return $this->query(new APQ\Deals($this));
	}
	/**
	 * Get Divisions
	 * 
	 */
	public function getDivisions()
	{
		return $this->query( new \Netcrash\Groupon\ApiQuery\Divisions($this));
	}
		
	public function __construct($options = null)
	{
		if (is_array($options)){
			if (array_key_exists('token', $options)) {
				$this->setToken($options['token']);
			}
			
			if (array_key_exists('driver', $options)) {
				$this->setDriver($options['driver']);
			}
			
			if (array_key_exists('contentType', $options)) {
				$this->Gdriver->setContentType($options['contentType']);
			}
		}
	}
	
	/**
	 * Driver used to connect to the api
	 * 
	 * @var GDriver
	 */
	private $Gdriver;
	
	public function setDriver($drv)
	{
		if (!($drv instanceof APQ\Driver\GDriver)) {
			throw new \Exception("No driver recognized please specify a valid driver");
		}
		
		$this->Gdriver = $drv;
		
		return $this;
	}
	
	/**
	 * Get driver used to obtain data from api
	 * 
	 *  @return \Netcrash\Groupon\ApiQuery\Driver\GDriver
	 */
	public function getDriver()
	{
		return $this->Gdriver;
	}
	
	/**
	 * Queryes the groupon API for results
	 * 
	 * @param Deal|Divison|WebClient $type
	 * 
	 */
	public function query($type)
	{
		if (!($this->Gdriver instanceof APQ\Driver\GDriver)) {
			throw new \Exception("Driver object for API connection not recognized.");
		}
		
		if ($this->getWebClient() !== null && $this->getWebClient()->getIP() !== null ) {
			$this->Gdriver->addHeader("X-Forwarded-For", $this->getWebClient()->getIP());
		}
		
		$this->Gdriver->setUrl($type->getUrl());
		$this->Gdriver->connect();
		return $this->Gdriver->get();
	}
	
}