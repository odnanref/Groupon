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

namespace Netcrash\Groupon\DataObject;

/**
 * The data information of the Division
 *
 * for details about the properties please see the api documentation
 * for divisions.
 *
 * @author andref
 *
 */
class Division extends Basic
{
	private $IsRewardEnabled;

	public function setIsRewardEnabled($val)
	{
		$this->IsRewardEnabled = $val;
	}
	
	public function getIsRewardEnabled()
	{
		return $this->IsRewardEnabled;
	}

	private $Timezone;

	public function setTimezone($val)
	{
		$this->Timezone = $val;
	}
	
	public function getTimezone()
	{
		return $this->Timezone;
	}

	private $IsNowMerchantEnabled;

	public function setIsNowMerchantEnabled($val)
	{
		$this->IsNowMerchantEnabled = $val;
	}
	
	public function getIsNowMerchantEnabled()
	{
		return $this->IsNowMerchantEnabled;
	}

	private $Name;

	public function setName($val)
	{
		$this->Name = $val;
	}
	
	public function getName()
	{
		return $this->Name;
	}

	private $Id;

	public function setId($val)
	{
		$this->Id = $val;
	}
	
	public function getId()
	{
		return $this->Id;
	}

	private $Areas;

	public function setAreas($val)
	{
		$this->Areas = $val;
	}
	public function getAreas()
	{
		return $this->Areas;
	}

	private $IsNowCustomerEnabled;

	public function setIsNowCustomerEnabled($val)
	{
		$this->IsNowCustomerEnabled = $val;
	}
	public function getIsNowCustomerEnabled()
	{
		return $this->IsNowCustomerEnabled;
	}

	private $TimezoneOffsetInSeconds;

	public function setTimezoneOffsetInSeconds($val)
	{
		$this->TimezoneOffsetInSeconds = $val;
	}
	public function getTimezoneOffsetInSeconds(){
		return $this->TimezoneOffsetInSeconds;
	}

	private $Country;

	public function setCountry($val) {
		$this->Country = $val;
	}
	public function getCountry(){
		return $this->Country;
	}

	public function __toString()
	{
		return $this->getId();
	}

}