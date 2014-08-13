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
 
class AddressChangeHook
{
     
    public function resetPosition(Account $bean, $event, $arguments)
    {
        // call on changed records only
        if ( 
			($bean->billing_address_street != $bean->fetched_row[billing_address_street]) ||
			($bean->billing_address_postalcode != $bean->fetched_row[billing_address_postalcode]) || 
			($bean->billing_address_city != $bean->fetched_row[billing_address_city])  ||
			($bean->billing_address_country != $bean->fetched_row[billing_address_country]) 
        ) {
            //
            // execute changed record business process
            //
            $bean->latitude_c = '';
            $bean->longitude_c = '';
        }
    }
}
