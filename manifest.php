<?php
/*
 * This file is part of the 'Google Maps Dashlet'.
 * Copyright [2015/3/31] [Olivier Nepomiachty - SugarCRM]
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * Author: Olivier Nepomiachty SugarCRM
 */

$manifest = array (
  'built_in_version' => '7.5.0.1',
  'acceptable_sugar_versions' => 
  array (
    0 => '',
  ),
  'acceptable_sugar_flavors' => 
  array (
    0 => 'PRO',
    1 => 'ENT',
    2 => 'ULT',
  ),
  'readme' => '',
  'key' => 'SO',
  'author' => 'Olivier Nepomiachty',
  'description' => '',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'Google Maps Integration',
  'published_date' => '2015-05-26 10:30:00',
  'type' => 'module',
  'version' => '1.2.2',
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'GoogleMapsInt_1',
  

  // ###################
  // custom_fields (account, lead, contact)
  // ###################
  'custom_fields' => 
  array (
    'Accountslatitude_c' => 
    array (
      'id' => 'Accountslatitude_c',
      'name' => 'latitude_c',
      'label' => 'LBL_LATITUDE',
      'comments' => '',
      'help' => '',
      'module' => 'Accounts',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => '',
      'date_modified' => '2015-01-12 19:02:07',
      'deleted' => '0',
      'audited' => '0',
      'mass_update' => '0',
      'duplicate_merge' => '1',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => '',
      'ext2' => '',
      'ext3' => '',
      'ext4' => '',
    ),
    'Accountslongitude_c' => 
    array (
      'id' => 'Accountslongitude_c',
      'name' => 'longitude_c',
      'label' => 'LBL_LONGITUDE',
      'comments' => '',
      'help' => '',
      'module' => 'Accounts',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => '',
      'date_modified' => '2015-01-12 19:02:28',
      'deleted' => '0',
      'audited' => '0',
      'mass_update' => '0',
      'duplicate_merge' => '1',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => '',
      'ext2' => '',
      'ext3' => '',
      'ext4' => '',
    ),

    'Contactslatitude_c' => 
    array (
      'id' => 'Contactslatitude_c',
      'name' => 'latitude_c',
      'label' => 'LBL_LATITUDE',
      'comments' => '',
      'help' => '',
      'module' => 'Contacts',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => '',
      'date_modified' => '2015-01-12 19:02:07',
      'deleted' => '0',
      'audited' => '0',
      'mass_update' => '0',
      'duplicate_merge' => '1',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => '',
      'ext2' => '',
      'ext3' => '',
      'ext4' => '',
    ),
    'Contactslongitude_c' => 
    array (
      'id' => 'Contactslongitude_c',
      'name' => 'longitude_c',
      'label' => 'LBL_LONGITUDE',
      'comments' => '',
      'help' => '',
      'module' => 'Contacts',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => '',
      'date_modified' => '2015-01-12 19:02:28',
      'deleted' => '0',
      'audited' => '0',
      'mass_update' => '0',
      'duplicate_merge' => '1',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => '',
      'ext2' => '',
      'ext3' => '',
      'ext4' => '',
    ),
  ),

  // ###################
  // copy 
  // ###################
  'copy' => 
  array (

    0 => 
    array (
      'from' => '<basepath>/custom/modules/Accounts/AccountsGmapsHook.php',
      'to' => 'custom/modules/Accounts/AccountsGmapsHook.php',
    ),
    1 => 
    array (
      'from' => '<basepath>/custom/modules/Contacts/ContactsGmapsHook.php',
      'to' => 'custom/modules/Contacts/ContactsGmapsHook.php',
    ),

    2001 => 
    array (
      'from' => '<basepath>/custom/clients/',
      'to' => 'custom/clients',
    ),
	// application language (does not work with 'language'
    2100 => 
    array (
      'from' => '<basepath>/language/application/en_us.gmaps.php',
      'to' => 'custom/Extension/application/Ext/Language/en_us.gmaps.php',
    ),
    2101 => 
    array (
      'from' => '<basepath>/language/application/fr_FR.gmaps.php',
      'to' => 'custom/Extension/application/Ext/Language/fr_FR.gmaps.php',
    ),
  ),

  // ###################
  // language
  // ###################  
  'language' => 
  array (
		1010 => 
		array (
		  'from' => '<basepath>/language/modules/Accounts/en_us.lang.php',
		  'to_module' => 'Accounts',
		  'language' => 'en_us',
		),
		1011 => 
		array (
		  'from' => '<basepath>/language/modules/Contacts/en_us.lang.php',
		  'to_module' => 'Contacts',
		  'language' => 'en_us',
		),
	),

  
  // ###################
  // logic_hooks (Google Maps)
  // ###################
  'logic_hooks' => array(
        array(
			 'module'  => 'Accounts',
			 'hook'    => 'before_save',
			 'order'   => 98,
			 'description' => 'reset position',
			 'file'   => 'custom/modules/Accounts/AccountsGmapsHook.php',
			 'class'   => 'AccountAddressChangeHook',
			 'function'  => 'resetPosition',
        ),

        array(
			 'module'  => 'Contacts',
			 'hook'    => 'before_save',
			 'order'   => 98,
			 'description' => 'reset position',
			 'file'   => 'custom/modules/Contacts/ContactsGmapsHook.php',
			 'class'   => 'ContactAddressChangeHook',
			 'function'  => 'resetPosition',
        ),
    ),
    
  
);
