<head>
  <!-- Angular -->
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js"></script>
  <!-- UI-Router -->
  <script src="//angular-ui.github.io/ui-router/release/angular-ui-router.js"></script>
  <script src="<?= asset('app/SampleController.js') ?>"></script>
</head>

<body data-ng-app="myApp">
  <h2>Sample</h2>

  <div data-ui-view=""></div>
</body>

</html>
