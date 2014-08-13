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

$viewdefs['base']['view']['AccountsGmaps'] = array(
    'dashlets' => array(
        array(
            'label' => 'Accounts maps',
            'description' => 'See my accounts on a map',
            'config' => array(
                'limit' => '5',
            ),
            'preview' => array(
                'limit' => '5',
            ),

            'filter' => array(
                'module' => array(
                    'Home',
                    'Accounts',
                    'Opportunities',
                ),
                'view' => array(
					'record', 'records'
				),
            ),
        ),
    ),
    
    'config' => array(
        'fields' => array(
            array(
                'name' => 'mapoptions',
                'label' => 'Select map options______________',
                'type' => 'enum',
                'searchBarThreshold' => 1,
                'options' => array(
                    1 => "My accounts",
                    2 => "My opened opportunities",
                    3 => "My meetings (today)",
				),
            ),
            array(
                'name' => 'limit',
                'label' => 'Number of records to show',
                'type' => 'enum',
                'searchBarThreshold' => 0,
                'options' => array(
                    5 => 5,
                    10 => 10,
                    20 => 20,
                    30 => 30,
                    40 => 40,
                    50 => 50,
                    100 => 100,
                    all => All,
                ),
            ),
            array(
                'name' => 'myposition',
                'label' => 'Show my position',
                'type' => 'enum',
                'searchBarThreshold' => -1,
                'options' => array(
                    "yes" => 'yes',
                    "no" => 'no',
                ),
            ),
        ),
    ),
      
);
