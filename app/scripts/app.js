var app = angular.module('bpiApp', ['ngRoute']
)
.config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('');
    $routeProvider
// Main Test Page
.when("/", {templateUrl: "views/main.html", controller: "MainCtrl"})
// Default Main Test Page 
.otherwise("/", {templateUrl: "views/main.html", controller: "MainCtrl"});
});