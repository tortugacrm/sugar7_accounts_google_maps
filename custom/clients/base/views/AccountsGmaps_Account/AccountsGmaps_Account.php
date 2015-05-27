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
 * 
 */

$viewdefs['base']['view']['AccountsGmaps_Account'] = array(
    'dashlets' => array(
        array(
            'label' => 'LBL_DASHLET_ACCOUNTSGMAPS_ACCVIEW',
            'description' => 'LBL_DASHLET_ACCOUNTSGMAPS_ACCVIEW_DESC',
            'config' => array(
                'limit' => '5',
            ),
            'preview' => array(
                'limit' => '5',
            ),

            'filter' => array(
                'module' => array(
                    'Accounts',
                ),
                'view' => array(
					'record', 
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
			/*
            array(
                'name' => 'myposition',
                'label' => 'LBL_DASHLET_ACCOUNTSGMAPS_SHOWPOS',
                'type' => 'enum',
                'searchBarThreshold' => -1,
                'options' => 'LBL_DASHLET_ACCOUNTSGMAPS_SHOWPOS_list'
            ),
            
            array(
                'name' => 'hackposition',
                'label' => 'Hack Position',
                'type' => 'enum',
                'searchBarThreshold' => -1,
                'searchBarThreshold' => 0,
                'options' => array(
                    'nohack' => 'Show real position',
                    'Paris' => 'Paris',
                    'Munich' => 'Munich',
                    'Sugarcon' => 'Sugarcon',
                    'CeBit' => 'CeBit',
                    'custom' => 'custom',
                ),
            ),
            
            array(
                'name' => 'latitude',
                'label' => 'Custom Latitude',
                'type' => 'string',
                'value' => ''
            ),
            
            array(
                'name' => 'longitude',
                'label' => 'Custom Longitude',
                'type' => 'string',
                'value' => ''
            ),
            
            */
        ),
    ),
      
);
