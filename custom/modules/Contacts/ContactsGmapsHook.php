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
  
class ContactAddressChangeHook
{
     
    public function resetPosition(Contact $bean, $event, $arguments)
    {
        // call on changed records only
        if ( 
			($bean->primary_address_street != $bean->fetched_row[primary_address_street]) ||
			($bean->primary_address_postalcode != $bean->fetched_row[primary_address_postalcode]) || 
			($bean->primary_address_city != $bean->fetched_row[primary_address_city])  ||
			($bean->primary_address_country != $bean->fetched_row[primary_address_country]) 
        ) {
            //
            // execute changed record business process
            //
            $bean->latitude_c = '';
            $bean->longitude_c = '';
        }
    }
}
