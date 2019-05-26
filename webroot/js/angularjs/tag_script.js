var fetch = angular.module('tagapp', ['infinite-scroll']);
        
fetch.controller('fetchCtrlTag', ['$scope', '$http', function ($scope, $http) {
	
    // Variables
    $scope.row = 0;
    $scope.rowperpage = 10;
    $scope.currentLng = $('.currentLng').text();
    $scope.passtype = $('.passtype').text();
    $scope.passseotitle = $('.passseotitle').text();
    $scope.country = $('.country').text();
    $scope.passcountry = $('.passcountry').text();
    $scope.division = $('.division').text();
    $scope.passdivision = $('.passdivision').text();
    $scope.district = $('.district').text();
    $scope.passdistrict = $('.passdistrict').text();
    $scope.thana = $('.thana').text();
    $scope.passthana = $('.passthana').text();
    $scope.slugid = $('.slugid').text();
    $scope.singleName = $('.singleName').text();
    $scope.className = $('.className').text();
    $scope.placeTypeID = $('.placeTypeID').text();
    $scope.contentTitle = $('.contentTitle').text();
    $scope.loadModelName = $('.loadModelName').text();
    $scope.queryCountry = $('.queryCountry').text();
    $scope.params = $('.params').text();

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
			url: 'http://localhost/mogo/information/siteactions/tags_angular',
            data: {row:$scope.row,rowperpage:$scope.rowperpage,currentLng:$scope.currentLng,passtype:$scope.passtype,passseotitle:$scope.passseotitle,country:$scope.country,passcountry:$scope.passcountry,division:$scope.division,passdivision:$scope.passdivision,district:$scope.district,passdistrict:$scope.passdistrict,thana:$scope.thana,passthana:$scope.passthana,slugid:$scope.slugid,params:$scope.params,className:$scope.className,singleName:$scope.singleName,placeTypeID:$scope.placeTypeID,contentTitle:$scope.contentTitle,loadModelName:$scope.loadModelName,queryCountry:$scope.queryCountry}
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