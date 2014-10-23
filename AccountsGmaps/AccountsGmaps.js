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
