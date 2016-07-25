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
namespace Edoger\Core;


/**
 * ================================================================================
 * Some Description.
 *
 * 
 * ================================================================================
 */
final class Config
{
	/**
	 * ----------------------------------------------------------------------------
	 * What is it ?
	 * ----------------------------------------------------------------------------
	 *
	 * @var type
	 */
	private $config = [];
	
	/**
	 * ----------------------------------------------------------------------------
	 * What is it ?
	 * ----------------------------------------------------------------------------
	 *
	 * @return type
	 */
	public function __construct(array $config)
	{
		$this -> config = $config;
	}

	/**
	 * ----------------------------------------------------------------------------
	 * What is it ?
	 * ----------------------------------------------------------------------------
	 *
	 * @return mixed
	 */
	public function get($key, $def = null)
	{
		if (isset($this -> config[$key])) {
			return $this -> config[$key];
		} else {
			if (empty($this -> config)) {
				return $def;
			}
			$config = $this -> config;
			foreach (explode('.', $key) as $query) {
				if (isset($config[$query])) {
					$config = $config[$query];
				} else {
					$config = $def;
					break;
				}
			}
			return $config;
		}
	}

	/**
	 * ----------------------------------------------------------------------------
	 * What is it ?
	 * ----------------------------------------------------------------------------
	 *
	 * @return boolean
	 */
	public function has($key)
	{
		return $this -> get($key) !== null;
	}
}