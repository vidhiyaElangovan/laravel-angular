var myApp = angular.module("myApp", ['ui.router']);

myApp.config(function ($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.when("", "/sample");

    $stateProvider
        .state("sample", {
            url: "/sample",
            templateUrl: "sample"
        })
        .state("sample.Page1", {
            url: "/main",
            templateUrl: "main"
        })
        .state("sample.Page2", {
            url: "/top",
            templateUrl: "top"
         })
        .state("sample.Page3", {
            url: "/left",
            templateUrl: "left"
        });
});