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
({
    plugins: ['Dashlet'],
    
    initDashlet: function() {
        if (this.meta.config) {
            var limit = this.settings.get("limit") || "5";
            this.settings.set("limit", limit);
            var myposition = this.settings.get("myposition") || "no";
            this.settings.set("myposition", myposition);
            var mapoptions = parseInt(this.settings.get("mapoptions")) || 1;
            this.settings.set("mapoptions", mapoptions);
        }
        this.my_data = '';
    },
    
    _render: function() {
        if (this.my_data == '') {
            return;
        }
        this._super('_render');
    },
    
    loadData: function(options) {
        var limit;
        if (_.isUndefined(this.model)) {
            return;
        }
        var limit = this.settings.get('limit') || 5;
        //var dashlet_height = parseInt(this.settings.get('dashlet_height') || 5, 10);
        var myposition = this.settings.get('myposition') || 'no';
        var mapoptions = parseInt(this.settings.get('mapoptions')) || 1;
        var self = this;
        var args = '';
        switch(mapoptions) {
			case 2:
				args = 'AccountsGmaps/map2?assigned_user_id='+app.user.attributes.id+'&limit='+limit;
				break;
			case 3:
				args = 'AccountsGmaps/map3?assigned_user_id='+app.user.attributes.id+'&limit='+limit;
				break;
			case 1:
			default:
				args = 'AccountsGmaps/map1?assigned_user_id='+app.user.attributes.id+'&limit='+limit;
				break;
		}
		console.log('mapoptions='+mapoptions+', args='+args+', limit='+limit+', myposition='+myposition);
		var myself = this;
		
        app.api.call('GET', app.api.buildURL(args), null, 
		{ 
            success: function (data) {  
                if (this.disposed) {
                    return;
                }
                console.log('# API call map success');
				myself.my_data = JSON.stringify(data);
                myself.my_data = myself.my_data.replace(/'/g, "\\'");
				myself.myposition = myposition;
				console.log('# Now render!');
				myself.render();
				return;

			} // success 1
        }
        );

    } // Load data
    
})
