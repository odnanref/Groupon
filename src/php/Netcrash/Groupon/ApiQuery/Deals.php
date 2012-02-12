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

namespace Netcrash\Groupon\ApiQuery;

/**
 * Interact with Deals
 */

class Deals extends GQuery {
	
	/**
	 * 
	 * @param \Netcrash\Groupon\apiClient $api
	 * @throws \Exception
	 */
	public function __construct(\Netcrash\Groupon\apiClient $api)
	{
		if ( ! ($api->getDivision() instanceOf \Netcrash\Groupon\DataObject\Division ) ) {
			throw new \Exception("No division found for request...");
		}
		$id = $api->getDivision()->getId();
		if (empty($id)) {
			throw new \Exception("No ID on Divsion");
		} 
		
		if ($api->getVersion() > 1 ) {
			$this->addParam("division_id", $id);
		}
		
		return parent::__construct("deals", $api);
	}
	
	/**
	 * get deals
	 * 
	 * @return \Netcrash\Groupon\ApiQuery\Deals
	 */
	public function getDeals()
	{
		return $this;
	}
	/**
	 * Get a deal by a specific Id
	 * 
	 * @param string $id
	 * @return \Netcrash\Groupon\ApiQuery\Deals
	 */
	public function getDeal($id)
	{
		$url = str_replace("." .
				$this->api->getDriver()->getContentType()
				, ""
				, $this->getUrlUnmod()
				);
		$url .= "/" . $id . "." . $this->api->getDriver()->getContentType();
		$this->setUrl( $url );
 
		return $this;
	}
	/**
	 * the url
	 * 
	 * @return string
	 */
	public function __toString()
	{
		return $this->getUrl();
	}
}