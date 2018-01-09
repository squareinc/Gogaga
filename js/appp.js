var app = angular.module('myApp', ['ngRoute']);

app.controller('DashboardController', function($scope) {
  $scope.message = 'Hello from DashboardController';
 

});


app.config(function($routeProvider) {
  $routeProvider

  .when('/', {
    templateUrl : 'pages/dashboard.php',
    controller  : 'DashboardController'
  })

  .when('/case', {
    templateUrl : 'pages/casestatus.php',
    controller  : 'CaseController'
  })

  .when('/partners', {
    templateUrl : 'pages/partners.php',
    controller  : 'PartnerController'
  })

  .when('/clients', {
    templateUrl : 'pages/clients.php',
    controller  : 'ClientsController'
  })
  .when('/voucher', {
    templateUrl : 'pages/voucher.php',
    controller  : 'VoucherController'
  })

.when('/gallery', {
    templateUrl : 'pages/gallery.php',
    controller  : 'GalleryController'
  })
.when('/maps', {
    templateUrl : 'pages/maps.php',
    controller  : 'MapsController'
  })

.when('/pricecalc', {
    templateUrl : 'pages/pricecalc.php',
    controller  : 'PriceCalcController'
  })
.when('/currencyconv', {
    templateUrl : 'pages/currencyconv.php',
    controller  : 'CurrencyController'
  })
.when('/inbox', {
    templateUrl : 'pages/inbox.php',
    controller  : 'MailInboxController'
  })
.when('/sent', {
    templateUrl : 'pages/sent.php',
    controller  : 'MailSentController'
  })
.when('/itsubmitted', {
    templateUrl : 'pages/itsubmitted.php',
    controller  : 'SubmittedItinerariesController'
  })
.when('/itdsr', {
    templateUrl : 'pages/itdsr.php',
    controller  : 'itdsrController'
  })
.when('/itpending', {
    templateUrl : 'pages/itpending.php',
    controller  : 'PendingItinerariesController'
  })
.when('/itwork', {
    templateUrl : 'pages/itwork.php',
    controller  : 'PendingWorkController'
  })

.when('/itsmashed', {
    templateUrl : 'pages/itsmashed.php',
    controller  : 'SmashedItinerariesController'
  })
.when('/notification', {
    templateUrl : 'pages/notification.php',
    controller  : 'NotificationController'
  })
.when('/profile', {
    templateUrl : 'pages/profile.php',
    controller  : 'ProfileController'
  })
.when('/settings', {
    templateUrl : 'pages/settings.php',
    controller  : 'SettingsController'
  })
.when('/create_user', {
    templateUrl : 'pages/create_user.php',
    controller  : 'CreateUserController'
  })
.when('/account_settings', {
    templateUrl : 'pages/account_settings.php',
    controller  : 'AccountSettingsController'
  })

.when('/fintran', {
    templateUrl : 'pages/fintran.php',
    controller  : 'FinancialTransactionsController'
  })

  .otherwise({redirectTo: '/'});
});



app.controller('DashboardController', function($scope) {
  $scope.message = 'Hello from DashboardController';
});
app.controller('CaseController', function($scope) {
  $scope.message = 'Hello from CaseController';
});
app.controller('PartnerController', function($scope) {
  $scope.message = 'Hello from PartnerController';
});
app.controller('ClientsController', function($scope) {
  $scope.message = 'Hello from ClientsController';
});
app.controller('VoucherController', function($scope) {
  $scope.message = 'Hello from VoucherController';
});
app.controller('GalleryController', function($scope) {
  $scope.message = 'Hello from GalleryController';
});
app.controller('MapsController', function($scope) {
  $scope.message = 'Hello from MapsController';
});
app.controller('PriceCalcController', function($scope) {
  $scope.message = 'Hello from PriceCalcController';
});
app.controller('CurrencyController', function($scope) {
  $scope.message = 'Hello from CurrencyController';
});
app.controller('MailInboxController', function($scope) {
  $scope.message = 'Hello from MailInboxController';
});
app.controller('MailSentController', function($scope) {
  $scope.message = 'Hello from MailSentController';
});
app.controller('SubmittedItinerariesController', function($scope) {
  $scope.message = 'Hello from SubmittedItinerariesController';
});
app.controller('itdsrController', function($scope) {
  $scope.message = 'Hello from itdsrController';
});
app.controller('PendingItinerariesController', function($scope, $location) {
  $scope.message = 'Hello from PendingItinerariesController';  
});
app.controller('PendingWorkController', function($scope) {
  $scope.message = 'Hello from PendingWorkController';
});
app.controller('SmashedItinerariesController', function($scope) {
  $scope.message = 'Hello from SmashedItinerariesController';
});
app.controller('NotificationController', function($scope) {
  $scope.message = 'Hello from NotificationController';
});
app.controller('ProfileController', function($scope) {
  $scope.message = 'Hello from ProfileController';
});
app.controller('SettingsController', function($scope) {
  $scope.message = 'Hello from SettingsController';
});
app.controller('CreateUserController', function($scope) {
  $scope.message = 'Hello from CreateUserController';
});
app.controller('AccountSettingsController', function($scope) {
  $scope.message = 'Hello from AccountSettingsController';
});


app.controller('FinancialTransactionsController', function($scope) {
  $scope.message = 'Hello from FinancialTransactionsController';
});






