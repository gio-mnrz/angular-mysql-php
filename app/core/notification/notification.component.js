'use strict';

angular.
module('core.notification').
component('notification', {
    templateUrl: 'core/notification/notification.template.html',
    controller: [ '$rootScope', function ($rootScope) {
        var self = this;

        self.notifications = [];

        self.add = function (obj) {
            self.notifications.push(obj);
        };

        // Customization added for this project
        $rootScope.notification = {
            create: function (response) {
                var flag = false,
                    timeout = null;
                    
                if (response.data.status == 'success' ||
                        response.data.status == 'info') {
                    timeout = 3750;
                    flag = true;
                }

                self.add ({
                    message: response.data.user,
                    timeout: timeout,
                    title: response.data.title,
                    type: response.data.status
                });
                
                return flag;
            }
        }

        self.close = function(index) {
            self.notifications.splice(index, 1);
        };
    }]
});