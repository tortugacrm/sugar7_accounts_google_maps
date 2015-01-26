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

$viewdefs['base']['view']['AccountsGmaps'] = array(
    'dashlets' => array(
        array(
            'label' => 'LBL_DASHLET_ACCOUNTSGMAPS',
            'description' => 'LBL_DASHLET_ACCOUNTSGMAPS_DESC',
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
                'label' => 'LBL_DASHLET_ACCOUNTSGMAPS_MAPOPTIONS',
                'type' => 'enum',
                'searchBarThreshold' => 2,
                'options' => 'LBL_DASHLET_ACCOUNTSGMAPS_MAPOPTIONS_list'
            ),
            array(
                'name' => 'limit',
                'label' => 'LBL_DASHLET_ACCOUNTSGMAPS_NBRECORDSSHOWN',
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
                'label' => 'LBL_DASHLET_ACCOUNTSGMAPS_SHOWPOS',
                'type' => 'enum',
                'searchBarThreshold' => -1,
                'options' => 'LBL_DASHLET_ACCOUNTSGMAPS_SHOWPOS_list'
            ),
        ),
    ),
      
);
