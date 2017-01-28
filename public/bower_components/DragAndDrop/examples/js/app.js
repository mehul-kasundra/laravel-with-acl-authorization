(function () {
  'use strict';
  var sampleApp = angular.module('sampleApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
  });
  angular.module('demoApp', ['ui.tree', 'ngRoute', 'ui.bootstrap'])

    .config(['$routeProvider', '$compileProvider', function ($routeProvider, $compileProvider) {
      $routeProvider
        .when('/connected-trees', {
          controller: 'ConnectedTreesCtrl',
          templateUrl: 'views/connected-trees.html'
        })
        .otherwise({
            controller: 'ConnectedTreesCtrl',
            templateUrl: 'views/connected-trees.html'
        });

      // testing issue #521
      $compileProvider.debugInfoEnabled(false);
    }]);
})();
