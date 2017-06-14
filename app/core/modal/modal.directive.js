'use strict';

angular.
module('core.modal').
directive('modalEdit', [ function () {
    return {
        restrict: 'E',
        templateUrl: 'core/modal/modal.template.html',
        controller: [ '$rootScope', '$scope', '$uibModal', function ($rootScope, $scope, $uibModal) {
            $scope.mode = {
                add: 'add',
                edit: 'edit',
                delete: 'delete'
            };

            $scope.close = function () {
                $scope.afterClose();
            };

            $scope.dismiss = function () {
                $scope.afterDismiss();
            };

            $scope.open = function () {
                $uibModal.open ({
                    animation: true,
                    ariaLabelledBy: 'modal-title',
                    ariaDescribedBy: 'modal-body',
                    size: $scope.size,
                    templateUrl: $scope.templateUrl,
                    controller: $scope.controller,
                    controllerAs: '$ctrl',
                    resolve: {
                        jsonObj: function () {
                            return {
                                selectedMode: $scope.selectedMode,
                                todoObj: $scope.todoObj
                            };
                        }
                    }
                }).result.then ( function (response) {
                    $scope.close();

                    // Creating notification
                    $rootScope.notification.create(response);

                // Dismiss
                }, function (response) {
                    $scope.dismiss();
                });
            };
        }],
        scope: {
            controller: '@',
            iconClass: '@',
            selectedMode: '@',
            templateUrl: '@',
            todoObj: '=',
            tooltipComment: '@?',
            tooltipPosition: '@?',
            size: '@',
            afterClose: '&?',
            afterDismiss: '&?'
        }
    };
}]);