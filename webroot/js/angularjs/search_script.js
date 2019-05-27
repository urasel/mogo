var fetch = angular.module('searchapp', ['infinite-scroll']);
        
fetch.controller('fetchCtrlSearch', ['$scope', '$http', function ($scope, $http) {
	
    // Variables
    $scope.row = 0;
    $scope.rowperpage = 10;
    $scope.searchName = $('.searchName').text();
    $scope.searchStringParams = $('.searchStringParams').text();
    $scope.fieldName = $('.fieldName').text();

    $scope.posts = [];
    $scope.busy = false;
    $scope.loading = false;
	
	
    // Fetch data
    $scope.getPosts = function(){
		
        if ($scope.busy) return;
        $scope.busy = true;
                
        // Fetch data
        $http({
            method: 'post',
            //url: 'ajaxfile.php',
			url: 'http://localhost/mogo/information/siteactions/searchitem_angular',
            data: {row:$scope.row,rowperpage:$scope.rowperpage,searchName:$scope.searchName,searchStringParams:$scope.searchStringParams,fieldName:$scope.fieldName}
        }).then(function successCallback(response) {
                 
            if(response.data !='' ){
                // New row value       
                $scope.row+=$scope.rowperpage;
                $scope.loading = true;           
                
                setTimeout(function() {
                    $scope.$apply(function(){
                        
                        // Assign response to posts Array       
                        angular.forEach(response.data,function(item) {
                            $scope.posts.push(item);
                        });
                        $scope.busy = false;
                        $scope.loading = false;
                    });
                                
                },500);
            }
                    
        });
    }

    // Call function
    $scope.getPosts();
      
}]);