var myApp = angular.module("myApp",[]);
var app = {};
app.frontend = "http://localhost/bdtime_frontend/admin";
app.backend = "http://localhost/bdtime_frontend/admin/";
app.host = "http://139.59.12.222/test_bdtimes/";
//app.host = "http://http://139.59.66.70/";


function funcA(page, banner_id){
		$('#pageTitle').text(page)
		$('#selectImageAd').attr('banner_id', banner_id) 
		$('#selectImageAd').attr('page', page) 
		$('#banner_id').val(banner_id) 
		$('#banner_page').val(page) 
		$('#undoImageAd').attr('banner_id', banner_id) 
		$('#undoImageAd').attr('page', page) 
		$("#ad-upload-modal").modal('toggle');	
		/*  var selectedClass = "";
		$(".fil-cat").click(function(){ 
			selectedClass = $(this).attr("data-rel"); 
			$("#portfolio").fadeTo(100, 0.1);
			$("#portfolio div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
			setTimeout(function() {
				  $("."+selectedClass).fadeIn().addClass('scale-anm');
				  $("#portfolio").fadeTo(300, 1);
				}, 300); 
				
			});  */
	}
angular.module('myApp').controller('HomeController', function($scope, $http, $window){
	
    /* $scope.loginUser = JSON.parse(localStorage.getItem('loginUser'));
    
	console.log($scope.loginUser);
	if($scope.loginUser == null)
		$scope.isLoggedIn = 0;
	else 
	{
		$scope.isLoggedIn = 1;
		$scope.user_role = $scope.loginUser.role;
		if($scope.isLoggedIn == 1){
			$http.get(app.backend + 'apis/getImages').then(function (result, events) {
				
				$scope.images = result.data.images;
				console.log(32222222222);
				console.log($scope.images)
				$scope.shapes = result.data.shapes;
				

			});
		}

		console.log($scope.user_role)
	}
	$http.get(app.backend + 'apis/initializeData').then(function (result, events) {
			console.log(result)
            $scope.menus = result.data.menus;
            $scope.breaking_news = result.data.breaking_news;
            $scope.ads = result.data.ads;
            

        }); */
})

angular.module('myApp').controller('MainController', function($scope, $http, $window){
  
	/* $scope.isLoading = true;
	$http.get(app.backend + 'apis/initializeData').then(function (result, events) {
			$scope.isLoading = false;
            $scope.latest_news = result.data.latest_news;
            

        }); */
	$scope.changeAd = funcA;
})
angular.module('myApp').controller('DetailsController', function($scope, $http, $window, $routeParams){
	/* $scope.isLoading = true;
	$http.get(app.backend + 'apis/getNewsDetails/'+$routeParams.news_id).then(function (result, events) {
			$scope.isLoading = false;
            $scope.news_details = result.data.news_details;
            $scope.popular_news = result.data.popular_news;
            

        }); */
})


angular.module('myApp').controller('NationalController', function($scope, $http, $window, $routeParams){
	/* $scope.isLoading = true;
	$scope.category_label = $routeParams.cat_type; */
	/* $http.get(app.backend + 'apis/initializeData').then(function (result, events) {
			console.log(result)
            $scope.menus = result.data.menus;
            $scope.breaking_news = result.data.breaking_news;
            

        }); */
	/* $http.get(app.backend + 'apis/getCategoryDetails/'+$scope.category_label).then(function (result, events) {
			$scope.isLoading = false;
            $scope.latest_news = result.data.latest_news;
            $scope.all_news = result.data.all_news;
			$scope.category = result.data.category[0].category_name;
            

        }); */
	
});
