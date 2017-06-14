'use strict';

angular.
module('core.todo').
factory('$Todo', [ '$http', function ($http) {
    return {
        add: function (todoObj) {
            return $http ({
                method: 'POST',
                url: 'packages/ui/todo-service.php',
                headers: { },
                data: { },
                params: {
                    action: 2,
                    description: todoObj.description,
                    goal: todoObj.goal
                },
                isArray: false
            }).
            then ( function (response) {
                return response;
            });
        },

        all: function () {
            return $http ({
                method: 'POST',
                url: 'packages/ui/todo-service.php',
                headers: { },
                data: { },
                params: {
                    action: 0
                },
                isArray: true
            }).
            then ( function (response) {
                return response;
            });
        },

        delete: function (todoObj) {
            return $http ({
                method: 'POST',
                url: 'packages/ui/todo-service.php',
                headers: { },
                data: { },
                params: {
                    action: 4,
                    code: todoObj.code
                },
                isArray: false
            }).
            then ( function (response) {
                return response;
            });
        },

        edit: function (todoObj) {
            return $http ({
                method: 'POST',
                url: 'packages/ui/todo-service.php',
                headers: { },
                data: { },
                params: {
                    action: 3,
                    code: todoObj.code,
                    description: todoObj.description,
                    goal: todoObj.goal
                },
                isArray: false
            }).
            then ( function (response) {
                return response;
            });
        },

        oneByCode: function (todoObj) {
            return $http ({
                method: 'POST',
                url: 'packages/ui/todo-service.php',
                headers: { },
                data: { },
                params: {
                    action: 1,
                    code: todoObj.code
                },
                isArray: true
            }).
            then ( function (response) {
                return response;
            });
        }
    }           
}]);