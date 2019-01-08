/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


app = angular.module('MonApp');

app.controller('PanelController', function ($scope, $rootScope, $http) {

    console.log('test angular ');
    $http.get(Routing.generate('listpanels'))
            .then(function (result) {
                console.log(result);
                $scope.panels = result.data.panels;
            });



});





