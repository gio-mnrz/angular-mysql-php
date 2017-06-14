'use strict';

angular.
module('todoList').
component('todoList', {
    templateUrl: 'components/todo-list/todo-list.template.html',
    controller: [ '$rootScope', '$Todo', function TodoListController ($rootScope, $Todo) {
        var self = this;

        self.columns = ['Code', 'Goal', 'Description', ''];

        self.mode = {
            add: 'add',
            edit: 'edit',
            delete: 'delete'
        };

        self.options = ['Code', 'Goal', 'Description'];
        self.todos = null;

        self.$onInit = function () {
            self.orderBy = self.options[0].toLowerCase();
            self.loadTodos();
        };

        self.loadTodos = function () {
            $Todo.all().then ( function (response) {
                // Creating notification
                if ($rootScope.notification.create(response)) {
                    self.todos = response.data.output;
                };
            });
        };
    }]
});