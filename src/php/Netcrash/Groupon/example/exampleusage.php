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


require '__autoload.php';

$api = new \Netcrash\Groupon\apiClient();

// 41,17567, -8,58766 --- groupon of map location
$wc = new \Netcrash\Groupon\DataObject\WebClient();
$wc->setIP('178.166.91.82'); // use a real IP
$wc->setLat(41,17567)->setLng(-8,58766);

// Your token here!
$api->setToken("API_KEY");
// Only tested with version 2
$api->setVersion(2);

// Webclient is the user for witch the request is being made
// your website user it's from here it's used the location lat and long
// values
$api->setWebClient($wc);

// Good for dev testing
$api->setDriver(new \Netcrash\Groupon\ApiQuery\Driver\GTest());

print "Getting list of divisions:\n";
$a = $api->getDivisions();

if (is_object($a)) {
	foreach ($a as $Obj) {
		print $Obj->getId().PHP_EOL;
	}
	/*
	 * also a division can be specified by using
 	 *
	 * $div = new \Groupon\DataObject\Division();
	 * $div->setId("something");
	 *
	 */

	$api->setDivision($Obj);
}

$a = null;

print "GETTING DEALS\n";
$a = $api->getDeals();
print $api->getDriver()->getUrl() . PHP_EOL;
if (is_object($a)) {
	foreach ($a as $Obj) {
		print $Obj->getId() . ($Obj->isSoldOut() ? " sold out..." : " Available! ") . PHP_EOL;
	}
}

print "DETAIL\n";
$a = null;
try {
	$a = $api->getDealById($Obj->getId());
	print $a->getTitle() . ", " .
			$a->getId() . " -- " . $a->getSoldQuantity()
			. PHP_EOL;
	$o = $a->getOptions();
	if ( $o->count() > 0 ) {
		print "list of details:\n";
		foreach ($o as $detail ) {
			print $a->getId() . " <- " . $detail->getDiscountPercent() . PHP_EOL;
		}
	}
} catch (Exception $e) {
	print $e->getMessage()."\n";
	print $api->getDriver()->getUrl() . PHP_EOL;
}

print $api->getDriver()->getUrl() . PHP_EOL;
