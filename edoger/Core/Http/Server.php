<?php
/**
 * Edoger PHP Framework (EdogerPHP)
 * 
 * A simple and efficient PHP framework.
 *
 * By REENT (Qingshan Luo)
 * Version 1.0.0
 *
 * http://www.edoger.com/
 *
 * The MIT License (MIT)
 * Copyright (c) 2016 REENT (Qingshan Luo)
 * Permission is hereby granted, free of charge, to any person obtaining a 
 * copy of this software and associated documentation files (the “Software”), 
 * to deal in the Software without restriction, including without limitation 
 * the rights to use, copy, modify, merge, publish, distribute, sublicense, 
 * and/or sell copies of the Software, and to permit persons to whom the 
 * Software is furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in 
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, 
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF 
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. 
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, 
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR 
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE 
 * USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace Edoger\Core\Http;


/**
 * ================================================================================
 * Some Description.
 *
 * 
 * ================================================================================
 */
class Server
{
	/**
	 * ----------------------------------------------------------------------------
	 * What is it ?
	 * ----------------------------------------------------------------------------
	 *
	 * @var type
	 */
	private $server = [];
	
	/**
	 * ----------------------------------------------------------------------------
	 * [__construct description]
	 * ----------------------------------------------------------------------------
	 *
	 * 
	 */
	public function __construct()
	{
		if (!empty($_SERVER)) {
			$this -> server = $_SERVER;
		}
	}

	/**
	 * ----------------------------------------------------------------------------
	 * [query description]
	 * ----------------------------------------------------------------------------
	 * 
	 * @param  string $key [description]
	 * @param  [type] $def [description]
	 * @return [type]      [description]
	 */
	public function query(string $key, $def = null)
	{
		return $this -> server[$key] ?? $def;
	}

	/**
	 * ----------------------------------------------------------------------------
	 * [search description]
	 * ----------------------------------------------------------------------------
	 * 
	 * @param  string $key [description]
	 * @param  [type] $def [description]
	 * @return [type]      [description]
	 */
	public function search(string $key, $def = null)
	{
		foreach (explode('|', $key) as $query) {
			if (isset($this -> server[$query])) {
				return $this -> server[$query];
			}
		}
		return $def;
	}

	/**
	 * ----------------------------------------------------------------------------
	 * [exists description]
	 * ----------------------------------------------------------------------------
	 * 
	 * @param  string $key [description]
	 * @return [type]      [description]
	 */
	public function exists(string $key)
	{
		return isset($this -> server[$key]);
	}
}