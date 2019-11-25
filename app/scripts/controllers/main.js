app.controller('MainCtrl', function ($scope, $http) {

    $scope.getFsmApi = function () {  
        //Check if input is 0 or 1 only      
        var error = false;
        if (!$scope.input) {
            error = true;
            $scope.answer ='You can only enter numbers 0 or 1! Error: ' + error;
            return;
        }

        $scope.answer = '';

        //If there is no error then we can proceed to get the data for the API simulation for this test assignment
        if (!error) {
            //We will simulate a API to get the json to be displayed in angular
            $http.post('api/process.php', {params: {input: $scope.input}}).then(function(response) {
                $scope.answer = response.data;
            }, function(error) {
                alert('Status = ' + error.statusText + ', Code =' + error.status);
            });     

            //Another Test example: Here can also simulate a real API with json data but not required for this scope test
            /*$http.get('https://gist.githubusercontent.com/jimla007/71477579432588121dc811bd4fa6d6dd/raw/a9e98a25e6bb49ba0d5e7aa27377cf20f8f85e1c/bpi.transitions.json')
            .then(function (response) {
                $scope.transitions = response.data[0];

                $http.post('api/process.php', {params: {input: $scope.input, transitions: $scope.transitions}})
                .then(function (response) {
                    $scope.answer = response.data;
                });                
            });*/ 
          
        }

    }

    //We will clear the content when user wants to clear
    $scope.clear = function () {
        delete $scope.input;
        delete $scope.answer;
    }
});
