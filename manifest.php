<?php
/*
 *  This file is part of 'Accounts Gmaps Dashlet'.
 *
 *  'Accounts Gmaps Dashlet' is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation.
 *
 *  'Accounts Gmaps Dashlet' is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with 'Accounts Gmaps Dashlet'.  If not, see http://www.gnu.org/licenses/gpl.html.
 *
 * Copyright 2014 SugarCRM Inc.  All rights reserved.
 * Authors: Olivier Nepomiachty, Andrew Gittins, Andy Yeates & Abhijeet Vardhan.
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
		  'published_date' => '2014-10-23 08:00',
		  'type' => 'module',
		  'version' => '1.0.0.24',
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
    /*
    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_latitude_c.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_latitude_c.php',
    ),
    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_longitude_c.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_longitude_c.php',
    ),
    */    
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
