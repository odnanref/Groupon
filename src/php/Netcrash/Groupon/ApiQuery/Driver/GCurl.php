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

namespace Netcrash\Groupon\ApiQuery\Driver;
/**
 * Basic curl data get
 * 
 * @author andref
 *
 */
class Gcurl extends GDriver
{
	
	public function get()
	{
		$session = curl_init();
		
		$url = $this->getUrl();
		
		$headers = array(
						'Accept: application/'. $this->getContentType()
						, 'Content-Type: application/'. $this->getContentType()
					);
		
		if (count($this->getHeaders()) > 0 ) {
			foreach ($this->getHeaders() as $key => $value ) {
				$headers[] = $key . ": " . $value;
			}
		}
		
		curl_setopt($session, CURLOPT_URL, $url);
		curl_setopt($session, CURLOPT_HTTPGET, 1);
		curl_setopt($session, CURLOPT_HEADER, false);
		
		curl_setopt($session, CURLOPT_HTTPHEADER, $headers);
		
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		
		if(ereg("^(https)",$request)) {
			// TODO test this
			curl_setopt($session,CURLOPT_SSL_VERIFYPEER,false);
		}
		
		$response = curl_exec($session);
		curl_close($session);
		
		return $this->getResponse($response);
		
	}
}