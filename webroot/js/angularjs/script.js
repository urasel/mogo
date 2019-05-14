var fetch = angular.module('myapp', ['infinite-scroll']);
        
fetch.controller('fetchCtrl', ['$scope', '$http', function ($scope, $http) {

    // Variables
    $scope.row = 0;
    $scope.rowperpage = 10;
    $scope.rowid = '';
    $scope.rowsingleName = '';
    $scope.rowchilds = '';
    $scope.rowcharacter = '';
    $scope.rowqueryCountry = '';
    $scope.rowcountryId = '';
    $scope.posts = [];
    $scope.busy = false;
    $scope.loading = false;
	
		$scope.init = function(id,singleName,childs,character,queryCountry,countryId)
		  {
			$scope.rowid = id;
			$scope.rowsingleName = singleName; 
			$scope.rowchilds = childs; 
			$scope.rowcharacter = character; 
			$scope.rowqueryCountry = queryCountry; 
			$scope.rowcountryId = countryId; 
		  };
      
    // Fetch data
    $scope.getPosts = function(){
        if ($scope.busy) return;
        $scope.busy = true;
                
        // Fetch data
        $http({
            method: 'post',
            //url: 'ajaxfile.php',
			url: 'http://localhost/mogo/information/siteactions/category_angular',
            data: {row:$scope.row,rowperpage:$scope.rowperpage,rowid:$scope.rowid,rowsingleName:$scope.rowsingleName,rowchilds:$scope.rowchilds,rowcharacter:$scope.rowcharacter,rowqueryCountry:$scope.rowqueryCountry,rowcountryId:$scope.rowcountryId}
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