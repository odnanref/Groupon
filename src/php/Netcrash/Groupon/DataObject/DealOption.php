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
 * Details about the deal options
 * 
 * @author andref
 *
 */
class DealOption
{
	private $IsLimitedQuantity;
	
	public function setIsLimitedQuantity($val) {
		$this->IsLimitedQuantity = $val;
		return $this;
	}
	public function isLimitedQuantity() {
		return $this->IsLimitedQuantity;
	}
	
	private $MaximumPurchaseQuantity;
	
	public function setMaximumPurchaseQuantity($val) {
		$this->MaximumPurchaseQuantity = $val;
		return $this;
	}
	public function getMaximumPurchaseQuantity() {
		return $this->MaximumPurchaseQuantity;
	}
	
	private $Discount;
	
	public function setDiscount($val) {
		$this->Discount = $val;
		return $this;
	}
	public function getDiscount() {
		return $this->Discount;
	}
	
	private $CustomFields;
	
	public function setCustomFields($val) {
		$this->CustomFields = $val;
		return $this;
	}
	public function getCustomFields() {
		return $this->CustomFields;
	}
	
	private $ExternalUrl;
	
	public function setExternalUrl($val) {
		$this->ExternalUrl = $val;
		return $this;
	}
	public function getExternalUrl() {
		return $this->ExternalUrl;
	}
	
	private $Value;
	
	public function setValue($val) {
		$this->Value = $val;
		return $this;
	}
	public function getValue() {
		return $this->Value;
	}
	
	private $SoldQuantityMessage;
	
	public function setSoldQuantityMessage($val) {
		$this->SoldQuantityMessage = $val;
		return $this;
	}
	public function getSoldQuantityMessage() {
		return $this->SoldQuantityMessage;
	}
	
	private $BuyUrl;
	
	public function setBuyUrl($val) {
		$this->BuyUrl = $val;
		return $this;
	}
	public function getBuyUrl() {
		return $this->BuyUrl;
	}
	
	private $IsSoldOut;
	
	public function setIsSoldOut($val) {
		$this->IsSoldOut = $val;
		return $this;
	}
	public function getIsSoldOut() {
		return $this->IsSoldOut;
	}
	
	private $Title;
	
	public function setTitle($val) {
		$this->Title = $val;
		return $this;
	}
	public function getTitle() {
		return $this->Title;
	}
	
	private $RedemptionLocations;
	
	public function setRedemptionLocations($val) {
		$this->RedemptionLocations = $val;
		return $this;
	}
	public function getRedemptionLocations() {
		return $this->RedemptionLocations;
	}
	
	private $Details;
	
	public function setDetails($val) {
		$this->Details = $val;
		return $this;
	}
	public function getDetails() {
		return $this->Details;
	}
	
	private $ExpiresAt;
	
	public function setExpiresAt($val) {
		$this->ExpiresAt = $val;
		return $this;
	}
	public function getExpiresAt() {
		return $this->ExpiresAt;
	}
	
	private $DiscountPercent;
	
	public function setDiscountPercent($val) {
		$this->DiscountPercent = $val;
		return $this;
	}
	public function getDiscountPercent() {
		return $this->DiscountPercent;
	}
	
	private $Price;
	
	public function setPrice($val) 
	{
		$this->Price = $val;
		return $this;
	}
	public function getPrice() {
		return $this->Price;
	}
	
	private $InitialQuantity;
	
	public function setInitialQuantity($val) {
		$this->InitialQuantity = $val;
		return $this;
	}
	public function getInitialQuantity() {
		return $this->InitialQuantity;
	}
	
	private $RemainingQuantity;
	
	public function setRemainingQuantity($val) {
		$this->RemainingQuantity = $val;
		return $this;
	}
	public function getRemainingQuantity() {
		return $this->RemainingQuantity;
	}
	
	private $SoldQuantity;
	
	public function setSoldQuantity($val) {
		$this->SoldQuantity = $val;
		return $this;
	}
	public function getSoldQuantity() {
		return $this->SoldQuantity;
	}
	
	private $Id;
	
	public function setId($val) {
		$this->Id = $val;
		return $this;
	}
	public function getId() {
		return $this->Id;
	}
	
	private $MinimumPurchaseQuantity;
	
	public function setMinimumPurchaseQuantity($val) {
		$this->MinimumPurchaseQuantity = $val;
		return $this;
	}
	public function getMinimumPurchaseQuantity() {
		return $this->MinimumPurchaseQuantity;
	}
	
}