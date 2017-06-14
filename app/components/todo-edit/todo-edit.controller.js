'use strict';

angular.
module('todoEdit').
controller('ModalEditController', [ '$rootScope', '$uibModalInstance', '$Todo', 'jsonObj', function ($rootScope, $uibModalInstance, $Todo, jsonObj) {
    var self = this;

    self.form = {};
    self.instance = $uibModalInstance;
    self.selectedMode = jsonObj.selectedMode;
    self.todoObj = jsonObj.todoObj;

    self.$onInit = function () {
        if (self.selectedMode == "edit" || self.selectedMode == "delete") {
            $Todo.oneByCode(self.todoObj).then ( function (response) {
                // Creating notification
                if ($rootScope.notification.create(response)) {
                    self.todoObj = response.data.output[0];
                } else {
                    self.todoObj = null;
                };
            });
        }
    }; 
    
    self.add = function (form) {
        if (!self.validate(form)) {
            return;
        }

        $Todo.add(self.todoObj).then ( function (response) {
            self.instance.close(response);
        });
    };

    self.cancel = function () {
        self.instance.dismiss(self.selectedMode);
    };

    self.delete = function () {
        $Todo.delete(self.todoObj).then ( function (response) {
            self.instance.close(response);
        });
    };

    self.edit = function (form) {
        if (!self.validate(form)) {
            return;
        }

        $Todo.edit(self.todoObj).then ( function (response) {
            self.instance.close(response);
        });
    };

    // Validating form before sending request to the database
    self.validate = function (form) {
        if (!form.$valid) {
            return false;
        }

        return true;
    }
}]);