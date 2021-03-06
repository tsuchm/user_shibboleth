<?php
/**
 * ownCloud - user_shibboleth
 * 
 * Copyright (C) 2013 Andreas Ergenzinger andreas.ergenzinger@uni-konstanz.de
 *
 * This library is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this library. If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\user_shibboleth;

class Auth {

	//can be used to check if shibboleth authentication has taken place
	public static function getShibIdentityProvider() {
		if (isset($_SERVER['Shib-Identity-Provider']) &&
			$_SERVER['Shib-Identity-Provider'] !== '') {
			return $_SERVER['Shib-Identity-Provider'];
		}
		if (isset($_SERVER['Shib_Identity_Provider']) &&
			$_SERVER['Shib_Identity_Provider'] !== '') {
			return $_SERVER['Shib_Identity_Provider'];
		}
		return false;
	}
	
	public static function getMail() {//used by login.php
		$attr = \OCP\Config::getAppValue('user_shibboleth', 'ldap_link_attribute', 'mail');
                if (isset($_SERVER[$attr]) && $_SERVER[$attr] !== '')
                        return $_SERVER[$attr];
                return false;
        }
	
        public static function getPersistentId() {//used by login.php
                if (isset($_SERVER['persistent-id']) && $_SERVER['persistent-id'] !== '')
                        return $_SERVER['persistent-id'];
                if (isset($_SERVER['persistent_id']) && $_SERVER['persistent_id'] !== '')
                        return $_SERVER['persistent_id'];
                return false;
        }

}
