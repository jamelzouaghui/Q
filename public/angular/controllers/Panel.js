/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


app = angular.module('MonApp');

app.controller('PanelController', function ($scope, $rootScope, $http) {

    console.log('test angular ');
    $scope.cars = [{
            id: 1,
            label: 'Audi'
        }, {
            id: 2,
            label: 'BMW'
        }, {
            id: 1,
            label: 'Honda'
        }];
    $scope.selectedCar = [];
    $scope.selectedCar = [];
    $http.get(Routing.generate('listpanels'))
            .then(function (result) {
                console.log(result);
                $scope.panels = result.data.panels;
            });



});


//app.directive('myUiSelect', function () {
//    return {
//        require: 'uiSelect',
//        link: function (scope, element, attrs, $select) {
//            $select.activate(); // call this by an event handler
//            $select.open = true;
//            $select.activate(true);
//        }
//    };
//});


