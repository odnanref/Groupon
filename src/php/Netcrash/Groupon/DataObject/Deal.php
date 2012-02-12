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
 * The data information of the deal 
 * 
 * for details about the properties please see the api documentation
 * for deals.
 * 
 * @author andref
 *
 */
class Deal extends Basic
{
	/**
	 * (non-PHPdoc)
	 * @see Netcrash\Groupon\DataObject.Basic::setDivision()
	 *
	 * @params array $Div
	 * @return \Netcrash\Groupon\DataObject\Deal
	 */
	public function setDivision(array $Div)
	{
		$Division = new \Netcrash\Groupon\DataObject\Division();
		foreach ($Div as $k => $v ) {
			$tmp = "set" . ucfirst($k);
			$Division->$tmp($v);
		}
		$this->division = $Division;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Groupon\DataObject.Basic::getDivision()
	 *
	 * @return \Netcrash\Groupon\DataObject\Division
	 */
	public function getDivision()
	{
		return $this->division;
	}

	private $Type;
	
	public function setType($val) {
		$this->Type = $val;
		return $this;
	}
	public function getType() {
		return $this->Type;
	}
	
	private $PitchHtml;
	
	public function setPitchHtml($val) {
		$this->PitchHtml = $val;
		return $this;
	}
	public function getPitchHtml() {
		return $this->PitchHtml;
	}
	
	private $Areas;
	
	public function setAreas($val) {
		$this->Areas = $val;
		return $this;
	}
	public function getAreas() {
		return $this->Areas;
	}
	
	private $Grid4ImageUrl;
	
	public function setGrid4ImageUrl($val) {
		$this->Grid4ImageUrl = $val;
		return $this;
	}
	public function getGrid4ImageUrl() {
		return $this->Grid4ImageUrl;
	}
	
	private $Vip;
	
	public function setVip($val) {
		$this->Vip = $val;
		return $this;
	}
	public function getVip() {
		return $this->Vip;
	}
	
	private $TippingPoint;
	
	public function setTippingPoint($val) {
		$this->TippingPoint = $val;
		return $this;
	}
	public function getTippingPoint() {
		return $this->TippingPoint;
	}
	
	private $Says;
	
	public function setSays($val) {
		$this->Says = $val;
		return $this;
	}
	public function getSays() {
		return $this->Says;
	}
	
	private $IsNowDeal;
	
	public function setIsNowDeal($val) {
		$this->IsNowDeal = $val;
		return $this;
	}
	public function isNowDeal() {
		return $this->IsNowDeal;
	}
	
	private $FinePrint;
	
	public function setFinePrint($val) {
		$this->FinePrint = $val;
		return $this;
	}
	public function getFinePrint() {
		return $this->FinePrint;
	}
	
	private $SidebarImageUrl;
	
	public function setSidebarImageUrl($val) {
		$this->SidebarImageUrl = $val;
		return $this;
	}
	public function getSidebarImageUrl() {
		return $this->SidebarImageUrl;
	}
	
	private $Status;
	
	public function setStatus($val) {
		$this->Status = $val;
		return $this;
	}
	public function getStatus() {
		return $this->Status;
	}
	
	private $Grid6ImageUrl;
	
	public function setGrid6ImageUrl($val) {
		$this->Grid6ImageUrl = $val;
		return $this;
	}
	public function getGrid6ImageUrl() {
		return $this->Grid6ImageUrl;
	}
	
	private $TippedAt;
	
	public function setTippedAt($val) {
		$this->TippedAt = $val;
		return $this;
	}
	public function getTippedAt() {
		return $this->TippedAt;
	}
	
	private $IsTipped;
	
	public function setIsTipped($val) {
		$this->IsTipped = $val;
		return $this;
	}
	public function isTipped() {
		return $this->IsTipped;
	}
	
	private $DealUrl;
	
	public function setDealUrl($val) {
		$this->DealUrl = $val;
		return $this;
	}
	public function getDealUrl() {
		return $this->DealUrl;
	}
	
	private $LargeImageUrl;
	
	public function setLargeImageUrl($val) {
		$this->LargeImageUrl = $val;
		return $this;
	}
	public function getLargeImageUrl() {
		return $this->LargeImageUrl;
	}
	
	private $SoldQuantityMessage;
	
	public function setSoldQuantityMessage($val) {
		$this->SoldQuantityMessage = $val;
		return $this;
	}
	public function getSoldQuantityMessage() {
		return $this->SoldQuantityMessage;
	}
	
	private $DealTypes;
	
	public function setDealTypes($val) {
		$this->DealTypes = $val;
		return $this;
	}
	public function getDealTypes() {
		return $this->DealTypes;
	}
	
	private $Title;
	
	public function setTitle($val) {
		$this->Title = $val;
		return $this;
	}
	public function getTitle() {
		return $this->Title;
	}
	
	private $StartAt;
	
	public function setStartAt($val) {
		$this->StartAt = $val;
		return $this;
	}
	public function getStartAt() {
		return $this->StartAt;
	}
	
	private $PlacementPriority;
	
	public function setPlacementPriority($val) {
		$this->PlacementPriority = $val;
		return $this;
	}
	public function getPlacementPriority() {
		return $this->PlacementPriority;
	}
	
	private $Merchant;
	
	public function setMerchant($val) {
		$this->Merchant = $val;
		return $this;
	}
	public function getMerchant() {
		return $this->Merchant;
	}
	
	private $IsSoldOut;
	
	public function setIsSoldOut($val) {
		$this->IsSoldOut = $val;
		return $this;
	}
	public function isSoldOut() {
		return $this->IsSoldOut;
	}
	
	private $GrouponRating;
	
	public function setGrouponRating($val) {
		$this->GrouponRating = $val;
		return $this;
	}
	public function getGrouponRating() {
		return $this->GrouponRating;
	}
	
	private $RedemptionLocation;
	
	public function setRedemptionLocation($val) {
		$this->RedemptionLocation = $val;
		return $this;
	}
	public function getRedemptionLocation() {
		return $this->RedemptionLocation;
	}
	
	private $EndAt;
	
	public function setEndAt($val) {
		$this->EndAt = $val;
		return $this;
	}
	public function getEndAt() {
		return $this->EndAt;
	}
	
	private $SmallImageUrl;
	
	public function setSmallImageUrl($val) {
		$this->SmallImageUrl = $val;
		return $this;
	}
	public function getSmallImageUrl() {
		return $this->SmallImageUrl;
	}
	
	private $ShippingAddressRequired;
	
	public function setShippingAddressRequired($val) {
		$this->ShippingAddressRequired = $val;
		return $this;
	}
	public function getShippingAddressRequired() {
		return $this->ShippingAddressRequired;
	}
	
	private $HighlightsHtml;
	
	public function setHighlightsHtml($val) {
		$this->HighlightsHtml = $val;
		return $this;
	}
	public function getHighlightsHtml() {
		return $this->HighlightsHtml;
	}
	
	private $Tags;
	
	public function setTags($val) {
		$this->Tags = $val;
		return $this;
	}
	public function getTags() {
		return $this->Tags;
	}
	
	private $SoldQuantity;
	
	public function setSoldQuantity($val) {
		$this->SoldQuantity = $val;
		return $this;
	}
	public function getSoldQuantity() {
		return $this->SoldQuantity;
	}
	
	private $LocationNote;
	
	public function setLocationNote($val) {
		$this->LocationNote = $val;
		return $this;
	}
	public function getLocationNote() {
		return $this->LocationNote;
	}
	
	private $Id;
	
	public function setId($val) {
		$this->Id = $val;
		return $this;
	}
	public function getId() {
		return $this->Id;
	}
	
	private $TextAd;
	
	public function setTextAd($val) {
		$this->TextAd = $val;
		return $this;
	}
	public function getTextAd() {
		return $this->TextAd;
	}
	
	private $IsAutoRefundEnabled;
	
	public function setIsAutoRefundEnabled($val) {
		$this->IsAutoRefundEnabled = $val;
		return $this;
	}
	public function isAutoRefundEnabled() {
		return $this->IsAutoRefundEnabled;
	}
	
	private $Channels;
	
	public function setChannels($val) {
		$this->Channels = $val;
		return $this;
	}
	public function getChannels() {
		return $this->Channels;
	}
	
	private $AnnouncementTitle;
	
	public function setAnnouncementTitle($val) {
		$this->AnnouncementTitle = $val;
		return $this;
	}
	public function getAnnouncementTitle() {
		return $this->AnnouncementTitle;
	}
	
	private $MediumImageUrl;
	
	public function setMediumImageUrl($val) {
		$this->MediumImageUrl = $val;
		return $this;
	}
	public function getMediumImageUrl() {
		return $this->MediumImageUrl;
	}
	
	/**
	 * Holds information about the Deal options
	 * 
	 * @see Netcrash\Groupon\DataObject\DealOption
	 * 
	 * @var \ArrayObject
	 */
	private $Options;
	
	public function setOptions($val) {
		$Options = new \ArrayObject();
		foreach ($val as $Option ) {
			$Opt = new \Netcrash\Groupon\DataObject\DealOption();
			foreach ($Option as $k => $v ) {
				$tmp = 'set' . ucfirst($k);
				$Opt->$tmp($v);
			}
			
			if ($Opt->getId() !== null ) {
				$Options->append($Opt);
			}			
		}
		$this->Options = $Options;
		return $this;
	}
	
	/**
	 * 
	 * @return ArrayObject
	 */
	public function getOptions() {
		return $this->Options;
	}
	
}