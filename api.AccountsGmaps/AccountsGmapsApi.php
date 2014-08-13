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
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
 
 
class AccountsGmapsApi extends SugarApi
{
    public function registerApiRest()
    {
        return array(
             'GetMyAccountsMap1Endpoint' => array(
                //request type
                'reqType' => 'GET',
                //endpoint path
                'path' => array('AccountsGmaps', 'map1'),
                //endpoint variables
                'pathVars' => array('', '', 'data'),
                //method to call
                'method' => 'GetMap1',
                //short help string to be displayed in the help documentation
                'shortHelp' => 'Gmaps: current user\'s accounts',
                //long help to be displayed in the help documentation
                'longHelp' => '',
            ),
            
             'GetMyAccountsMap2Endpoint' => array(
                //request type
                'reqType' => 'GET',
                //endpoint path
                'path' => array('AccountsGmaps', 'map2'),
                //endpoint variables
                'pathVars' => array('', '', 'data'),
                //method to call
                'method' => 'GetMap2',
                //short help string to be displayed in the help documentation
                'shortHelp' => 'Gmaps: current user\'s opportunities & accounts',
                //long help to be displayed in the help documentation
                'longHelp' => '',
            ),        

             'GetMyAccountsMap3Endpoint' => array(
                //request type
                'reqType' => 'GET',
                //endpoint path
                'path' => array('AccountsGmaps', 'map3'),
                //endpoint variables
                'pathVars' => array('', '', 'data'),
                //method to call
                'method' => 'GetMap3',
                //short help string to be displayed in the help documentation
                'shortHelp' => 'Gmaps: current user\'s today meetings related to accounts',
                //long help to be displayed in the help documentation
                'longHelp' => '',
            ),        
         );
    }
 
    /**
     * Method to be used for my MyEndpoint/GetExample endpoint
     */

    public function GetMap1($api, $args)
    {
		if (!isset($args['assigned_user_id'])) { 
			return '[]'; 
			exit; 
		}
		$limit = '';
		if (isset($args['limit'])) {
			if ($args['limit']!='all') {
				$limit = '' . intval($args['limit']);
				if ($limit != '') $limit = " limit $limit";
			}
		}
		$ac = new Account();
		$assigned_user_id=$ac->db->quote($args['assigned_user_id']);
		$sql = "select ac.id,ac.name, ac.billing_address_street, ac.billing_address_postalcode, ac.billing_address_city, ac.billing_address_country, ac.industry, acstm.latitude_c,acstm.longitude_c from accounts ac
left join accounts_cstm acstm on ac.id = acstm.id_c
where (acstm.id_c is not null) and assigned_user_id='$assigned_user_id'
and deleted='0' $limit";
		$GLOBALS['log']->debug("##sql: $sql");
		$result = $ac->db->query($sql);
		$return = array();
		$return['next_offset'] = -1;
		$return['map'] = 1;
		$return['records'] = array();
		while($row = $ac->db->fetchByAssoc($result)) {
			$r = array();
			$r['id'] = $row['id'];
			$r['name'] = $row['name'];
			$r['billing_address_street'] = self::filt($row['billing_address_street']);
			$r['billing_address_postalcode'] = self::filt($row['billing_address_postalcode']);
			$r['billing_address_city'] = self::filt($row['billing_address_city']);
			$r['billing_address_country'] = self::filt($row['billing_address_country']);
			$r['industry'] = self::filt($row['industry']);
			$r['latitude_c'] = self::filt($row['latitude_c']);
			$r['longitude_c'] = self::filt($row['longitude_c']);
			$r['_module'] = 'Accounts';
			array_push($return['records'], $r);
		}
		return($return);
    }

    public function GetMap2($api, $args)
    {
		if (!isset($args['assigned_user_id'])) { 
			return '[]'; 
			exit; 
		}
		$limit = '';
		if (isset($args['limit'])) {
			if ($args['limit']!='all') {
				$limit = '' . intval($args['limit']);
				if ($limit != '') $limit = " limit $limit";
			}
		}
		$op = new Opportunity();
		$sql = 'select id,symbol,iso4217 from currencies where deleted=0';
		$result = $op->db->query($sql);
		$currencies = array();
		$currencies_pos = array();
		$currencies[-99] = '$';
		$currencies_pos[-99] = 'L';
		while($row = $op->db->fetchByAssoc($result)) {
			$id = $row['id'];
			$symbol = $row['symbol'];
			$currencies[$id] = $symbol;
			$currencies_pos[$id] = ($row['iso4217'] == 'EUR') ? 'R' : 'L';
		}

		$assigned_user_id=$op->db->quote($args['assigned_user_id']);
		$sql  ="select op.id,op.name,op.amount,op.sales_status,op.currency_id,acop.account_id,ac.name as account_name,acstm.latitude_c,acstm.longitude_c,ac.billing_address_street,ac.billing_address_postalcode,ac.billing_address_city,ac.billing_address_country,ac.industry from opportunities op
left join accounts_opportunities acop on op.id = acop.opportunity_id
left join accounts ac on ac.id = acop.account_id
left join accounts_cstm acstm on ac.id = acstm.id_c
where (acop.opportunity_id is not null) and (acop.account_id is not null) 
and (op.assigned_user_id='$assigned_user_id') and (sales_status != 'Closed Won') and (sales_status != 'Closed Lost')  
and op.deleted='0' and acop.deleted='0' group by op.id "; // $limit
		$GLOBALS['log']->debug("##sql: $sql");
		$result = $op->db->query($sql);
		$return = array();
		$return['next_offset'] = -1;
		$return['map'] = 2;
		$return['records'] = array();
		while($row = $op->db->fetchByAssoc($result)) {
			
			$idx=-1;
			for($i=0; $i< count($return['records']); $i++) {
				if ($return['records'][$i]['id'] == $row['account_id']) {
					$idx = $i;
					break;
				}
			}
			if ($idx==-1) {
				$r = array();
				$r['id'] = $row['account_id'];
				$r['name'] = $row['account_name'];
				$r['billing_address_street'] = self::filt($row['billing_address_street']);
				$r['billing_address_postalcode'] = self::filt($row['billing_address_postalcode']);
				$r['billing_address_city'] = self::filt($row['billing_address_city']);
				$r['billing_address_country'] = self::filt($row['billing_address_country']);
				$r['industry'] = self::filt($row['industry']);
				$r['latitude_c'] = self::filt($row['latitude_c']);
				$r['longitude_c'] = self::filt($row['longitude_c']);
				$r['_module'] = 'Accounts';
				$r['opportunities'] = array();
				array_push($return['records'], $r);
				$idx = count($return['records']) - 1;
			}
			$r = array();
			$r['id'] = $row['id'];
			$r['name'] = $row['name'];
			$r['amount'] = round($row['amount'],0);
			if ($currencies_pos[$row['currency_id']] == 'L')
				$r['amount'] = $currencies[$row['currency_id']] . $r['amount'];
			else
				$r['amount'] = $r['amount'] . $currencies[$row['currency_id']];
			$r['sales_status'] = $row['sales_status'];
			array_push($return['records'][$idx]['opportunities'], $r);
		}
		return($return);
    }
    
    private function filt($s) {
		return($s == null) ? '' : $s;
	}

    public function GetMap3($api, $args)
    {
		if (!isset($args['assigned_user_id'])) { 
			return '[]'; 
			exit; 
		}
		$limit = '';
		if (isset($args['limit'])) {
			if ($args['limit']!='all') {
				$limit = '' . intval($args['limit']);
				if ($limit != '') $limit = " limit $limit";
			}
		}
		$meet = new Meeting();
		$assigned_user_id=$meet->db->quote($args['assigned_user_id']);
		$sql = "select m.id, m.name, m.duration_hours, m.duration_minutes, m.date_start, m.parent_id account_id, 
a.name as account_name, acstm.latitude_c, acstm.longitude_c, a.billing_address_street, a.billing_address_postalcode, a.billing_address_city, a.billing_address_country, a.industry 
from meetings m 
left join meetings_users mu on m.id=mu.meeting_id
left join accounts a on a.id=m.parent_id  
left join accounts_cstm acstm on a.id = acstm.id_c
where 
(mu.meeting_id is not null) and
(a.id is not null) and
mu.user_id='$assigned_user_id' and mu.deleted=0 and 
a.id=m.parent_id and
m.parent_type='Accounts' and m.deleted=0 
and current_date() = DATE_FORMAT(date_start, '%Y-%m-%d') 
group by m.id";
		$GLOBALS['log']->debug("##sql: $sql");
		$result = $meet->db->query($sql);
		$return = array();
		$return['next_offset'] = -1;
		$return['map'] = 3;
		$return['records'] = array();
		while($row = $meet->db->fetchByAssoc($result)) {
			
			$idx=-1;
			for($i=0; $i< count($return['records']); $i++) {
				if ($return['records'][$i]['id'] == $row['account_id']) {
					$idx = $i;
					break;
				}
			}
			if ($idx==-1) {
				$r = array();
				$r['id'] = $row['account_id'];
				$r['name'] = $row['account_name'];
				$r['billing_address_street'] = self::filt($row['billing_address_street']);
				$r['billing_address_postalcode'] = self::filt($row['billing_address_postalcode']);
				$r['billing_address_city'] = self::filt($row['billing_address_city']);
				$r['billing_address_country'] = self::filt($row['billing_address_country']);
				$r['industry'] = self::filt($row['industry']);
				$r['latitude_c'] = self::filt($row['latitude_c']);
				$r['longitude_c'] = self::filt($row['longitude_c']);
				$r['_module'] = 'Accounts';
				$r['meetings'] = array();
				array_push($return['records'], $r);
				$idx = count($return['records']) - 1;
			}
			$r = array();
			$r['id'] = $row['id'];
			$r['name'] = $row['name'];
			$r['duration_hours'] = $row['duration_hours'];
			$r['duration_minutes'] = $row['duration_minutes'];
			$r['date_start'] = $row['date_start'];
			array_push($return['records'][$idx]['meetings'], $r);
		}
		return($return);
    }
     
}
?>
