<?php
/*
 *  This file is part of 'Accounts Gmaps Dashlet'.
 *
 * Copyright [2015/1/26] [Olivier Nepomiachty]
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
 * Authors: Olivier Nepomiachty, Andrew Gittins, Andy Yeates & Abhijeet Vardhan.
 * 
 */
$manifest = array (

		'acceptable_sugar_versions' => 
			array(
				'regex_matches' => array(
					'7\\.[0-9]\\.[0-9]\\.[0-9]*$'
				),
			),			
			
		  'acceptable_sugar_flavors' =>
		  array(
			  0 => 'PRO',
			  1 => 'CORP',
			  2 => 'ENT',
			  3 => 'ULT',
		  ),
		  'readme'=>'README.txt',
		  'key'=>'AGP',
		  'author' => 'Olivier Nepomiachty',
		  'description' => 'Accounts Gmaps Dashlet',
		  'icon' => '',
		  'is_uninstallable' => true,
		  'name' => 'Accounts Gmaps Dashlet',
		  'published_date' => '2015-01-26 08:00',
		  'type' => 'module',
		  'version' => '1.0.0.27',
		  'remove_tables' => false,
		  );  
		  
$installdefs = array (
  'id' => 'AccountsGmaps',

  'copy' => 
  array (
    array (
      'from' => '<basepath>/AccountsGmaps/',
      'to' => 'custom/clients/base/views/AccountsGmaps',
    ),
    array (
      'from' => '<basepath>/api.AccountsGmaps/AccountsGmapsApi.php',
      'to' => 'custom/clients/base/api/AccountsGmapsApi.php',
    ),
   array (
      'from' => '<basepath>/modules/Accounts/AccountsGmapsHook.php',
      'to' => 'custom/modules/Accounts/AccountsGmapsHook.php',
    ),
   ),   

    'logic_hooks' => array(
        array(
			 'module'  => 'Accounts',
			 'hook'    => 'before_save',
			 'order'   => 98,
			 'description' => 'reset position',
			 'file'   => 'custom/modules/Accounts/AccountsGmapsHook.php',
			 'class'   => 'AddressChangeHook',
			 'function'  => 'resetPosition',
        ),
    ),
    
    
'custom_fields' => array (
	array(
		'name' => 'latitude_c',
		'label' => 'LBL_TEXT_LATITUDE',
		'type' => 'varchar',
		'module' => 'Accounts',
		'help' => '',
		'comment' => '',
		'default_value' => '',
		'max_size' => 255,
		'required' => false, // true or false
		'reportable' => false, // true or false
		'audited' => false, // true or false
		'importable' => 'true', // 'true', 'false', 'required'
		'duplicate_merge' => false, // true or false
	),

	array(
		'name' => 'longitude_c',
		'label' => 'LBL_TEXT_LONGITUDE',
		'type' => 'varchar',
		'module' => 'Accounts',
		'help' => '',
		'comment' => '',
		'default_value' => '',
		'max_size' => 255,
		'required' => false, // true or false
		'reportable' => false, // true or false
		'audited' => false, // true or false
		'importable' => 'true', // 'true', 'false', 'required'
		'duplicate_merge' => false, // true or false
	),
 ),
  
  'language' => 
  array (
    array (
      'from' => '<basepath>/language.AccountsGmaps/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),    
  ),
  
);
