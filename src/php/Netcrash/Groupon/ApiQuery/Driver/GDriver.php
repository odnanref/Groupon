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
 * Abstract class with basic methods and properties to 
 * be used has a base for a driver be it with curl or 
 * any other connection method
 * 
 * @author andref
 *
 */

namespace Netcrash\Groupon\ApiQuery\Driver;

use \Netcrash\Groupon\DataObject;

abstract class GDriver
{
	protected $url;
	
	public function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}
	
	public function getUrl()
	{
		return $this->url;
	}
	
	private $knownContentTypes = array('json', 'xml');
		
	protected $contentType = 'json';
	
	public function setContentType($ct)
	{
		if (!in_array($ct, $this->knownContentTypes)) {
			throw new Exception("Unknown content type for response. [$ct] ");
		}
		
		$this->contentType = $ct;
	
		return $this;
	}
	
	public function getContentType()
	{
		return $this->contentType;
	}
	
	/**
	 * If your environment doesn't allow non-200 HTTP responses to
	 * reach your code, you can force all responses to be 200 Success
	 * and encode the real HTTP code in the error response by passing
	 * force_http_success=true as a URL parameter.
	 *
	 * @var boolean
	 */
	protected $force_http_success = false;
	
	public function setForceSucess($flag)
	{
		$this->force_http_success = (boolean) $flag;
	
		return $this;
	}
	
	public function getForceHttpSucess()
	{
		return $this->force_http_success;
	}
	
	protected $Headers;
	
	public function addHeader($key, $value)
	{
		$this->Headers[$key] = $value;
		return $this;
	}
	
	public function getHeaders()
	{
		return $this->Headers;
	}
	
	public function __construct($options = null)
	{
		if (is_array($options)) {
			if (array_key_exists('url', $options)) {
				$this->setUrl($options['url']);
			}
	
			if (array_key_exists('contentType', $options)) {
				$this->setContentType($options['contentType']);
			}
		}
	
		if (is_string($options)) {
			$this->url = $options;
		}
	}
	
	public function connect()
	{
		
	}
	
	public function get()
	{
		
	}

	public function toType($type, array $arr)
	{
		if ($type == 'divisions') {
			$obj = new \Netcrash\Groupon\DataObject\Division();
		} elseif ($type == 'deals' || $type == 'deal') {
			$obj = new \Netcrash\Groupon\DataObject\Deal();
		}
		else {
			throw new \Exception("Unable to find type.");
		}
		
		foreach ($arr as $key => $value ) {
			$tmp = "set" . ucfirst($key);
			$obj->$tmp($value);
		}
		return $obj;
	}
	
	public function toArrayObject(array $Data, $Type)
	{
		$Arr = new \ArrayObject();
		foreach ($Data as $tt ) {
			$obj = $this->toType($Type, $tt);
			$Arr->append($obj);
		}
		return $Arr;
	}
	/**
	 * treats the response from the http query
	 * 
	 * @param mixed $data
	 * @throws \InvalidArgumentException if data not found in format
	 * @throws \Exception unrecognized return type recognized is (deals, divisions, deal)
	 * 
	 * @return \ArrayObject
	 */
	public function getResponse($data)
	{
		$Arr = new \ArrayObject();
		if ($this->getContentType() == 'json') {
			$tmp = json_decode($data, true);
	
			if (!is_array($tmp)) {
				throw new \InvalidArgumentException(
						"Invalid return from json_decode: " .
						$data . $this->getUrl()
				);
			}
	
			if (is_array($tmp) && array_key_exists("error", $tmp)) {
				throw new \Exception(
						"ERROR: ".$tmp['error']['message']
						, $tmp['error']['httpCode']
				);
			}
	
			// Jumps to the objects since we treat errors responses before
			if (array_key_exists("divisions", $tmp)) {
				return $this->toArrayObject($tmp['divisions'], "divisions");
			} elseif (array_key_exists("deals", $tmp)) {
				return $this->toArrayObject($tmp['deals'], "deals");
			} elseif (array_key_exists("deal", $tmp)) {
				return $this->toArrayObject($tmp, "deal");
			} else {
				throw new \Exception("UNRECOGNIZED RETURN...");
			}
	
		} elseif ($this->getContentType() == 'xml') {
			$tmp = 'XML'; //TODO when xml get's popular and smaller
		}
	
		return $Arr;
	}
}