'Accounts Google Maps Dashlet' module.
Copyright [2015/5/25] [Olivier Nepomiachty - SugarCRM]


1) SYNOPSIS
Sugar 7.5 dashlet.
Features
See on the map:
- current user’s position
- current user’s accounts on the map
- current user’s accounts with opened opportunities on the map
   - info window shows the account name, industry and an array with the opened opportunities (name, amount, status)
- current user’s accounts with meetings that will occure today
   - info window shows the account name, industry and an array with the meetings (name, time in the user timezone, duration)
- the accounts markers icons are based on the account industry
- itinerary: from the user's position to a marker
- route planner: best itinerary to join the meetings

Add the dashlet 'Accounts Gmaps' to the home page with the maximum width (3 columns).


2) LICENCE

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at
 
     http://www.apache.org/licenses/LICENSE-2.0
 
Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

Author: Olivier Nepomiachty SugarCRM


3) 3RD PARTIES

Icons by Nicolas Mollet
http://mapicons.nicolasmollet.com/
Creative Commons 3.0 BY-SA (http://creativecommons.org/licenses/by-sa/3.0/)


4) INSTALLATION

- log in as the admin
- Module loader – install the module
- log out
- log in as Jim
- add the dashlet to the home page

5) Change history
- 1.2.3 7/31/2015
API method GET AccountsGmaps/GetContact was missing in the previous packages.

- 1.2.2 7/31/2015
Bug fixed. Accounts & Contacts shared the same classname for the logic hooks, which trigers an error when converting a lead.