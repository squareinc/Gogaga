var app = angular.module('mynapp',[]);
app.controller('myctrl',function($scope){
    $scope.ptn = function() {
    		


        return $scope.firstName + " " + $scope.lastName;
    };
    
    /*$scope.cramount =0;
    $scope.crsup =0;
    $scope.crhol =0;
    $scope.crsal =0;

    $scope.y2 =0;
    $scope.y3 =0;
    $scope.y4 =0;

    $scope.remit =0; 
    $scope.visa =0;
    $scope.trins =0;
    $scope.trans_amt =0;
*/
});

