angular.module('app.controllers')
.controller('LoginController', ['$scope', '$location', 'OAuth',function($scope, $location, OAuth){
        $scope.user = {
            username : '',
            password: ''
        };

        $scope.error = {
            message : '',
            error : false
        };

        $scope.login = function(){

            if($scope.form.$valid){
                OAuth.getAccessToken($scope.user).then(function(){
                    // Sucesso, redireciona para a HOME
                    $location.path('home');
                }, function(data){
                    // Erro, mostra o erro
                    $scope.error.error = true;
                    $scope.error.message = data.data.error_description;
                });
            }
        };
    }]);