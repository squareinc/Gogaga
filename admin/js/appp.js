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
.when('/galleryupload', {
    templateUrl : 'pages/galleryupload.php',
    controller  : 'galleryupload'
  })
.when('/maps', {
    templateUrl : 'pages/maps.php',
    controller  : 'MapsController'
  })

.when('/pricecalc', {
    templateUrl : 'pages/pricecalc.php',
    controller  : 'PriceCalcController'
  })

.when('/gstdefault', {
    templateUrl : 'pages/gstdefault.php',
    controller  : 'gstdefaultController'
  })
.when('/currencyconv', {
    templateUrl : 'pages/currencyconv.php',
    controller  : 'CurrencyController'
  })

.when('/itsubmitted', {
    templateUrl : 'pages/itsubmitted.php',
    controller  : 'SubmittedItinerariesController'
  })
.when('/itpending', {
    templateUrl : 'pages/itpending.php',
    controller  : 'PendingItinerariesController'
  })
.when('/itwork', {
    templateUrl : 'pages/itwork.php',
    controller  : 'PendingWorkController'
  })
.when('/superpartner', {
    templateUrl : 'pages/superpartner.php',
    controller  : 'superpartner'
  })
.when('/holidaypartner', {
    templateUrl : 'pages/holidaypartner.php',
    controller  : 'holidaypartner'
  })

.when('/salespartner', {
    templateUrl : 'pages/salespartner.php',
    controller  : 'salespartner'
  })
.when('/agentreport', {
    templateUrl : 'pages/agentreport.php',
    controller  : 'agentreport'
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
.when('/newtran', {
    templateUrl : 'pages/newtran.php',
    controller  : 'NewTransactionsController'
  })
.when('/edittran', {
    templateUrl : 'pages/edittran.php',
    controller  : 'EditTransactionsController'
  })
.when('/pendingcomm', {
    templateUrl : 'pages/pendingcomm.php',
    controller  : 'pendingcomm'
  })
.when('/issuedstat', {
    templateUrl : 'pages/issuedstat.php',
    controller  : 'issuedstat'
  })



  .otherwise({redirectTo: '/'});
});



app.controller('DashboardController', function($scope) {
  $scope.message = 'Hello from DashboardController';
});
app.controller('CaseController', function($scope) {
  $scope.message = 'Hello from CaseController';
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
app.controller('galleryupload', function($scope) {
  $scope.message = 'Hello from galleryupload';
});

app.controller('MapsController', function($scope) {
  $scope.message = 'Hello from MapsController';
});
app.controller('PriceCalcController', function($scope) {
  $scope.message = 'Hello from PriceCalcController';
});
app.controller('gstdefaultController', function($scope) {
  $scope.message = 'Hello from gstdefaultController';
});
app.controller('CurrencyController', function($scope) {
  $scope.message = 'Hello from CurrencyController';
});

app.controller('SubmittedItinerariesController', function($scope) {
  $scope.message = 'Hello from SubmittedItinerariesController';
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

app.controller('NewTransactionsController', function($scope) {
  $scope.message = 'Hello from NewTransactionsController';
});

app.controller('EditTransactionsController', function($scope) {
  $scope.message = 'Hello from EditTransactionsController';
});


app.controller('superpartner', function($scope) {
  $scope.message = 'Hello from superpartner';
});


app.controller('holidaypartner', function($scope) {
  $scope.message = 'Hello from holidaypartner';
});


app.controller('salespartner', function($scope) {
  $scope.message = 'Hello from salespartner';
});



app.controller('agentreport', function($scope) {
  $scope.message = 'Hello from agentreport';
});


app.controller('pendingcomm', function($scope) {
  $scope.message = 'Hello from pendingcomm';
});

app.controller('issuedstat', function($scope) {
  $scope.message = 'Hello from issuedstat';
});





