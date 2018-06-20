var app = angular.module('employeeRecords', [])
        .constant('API_URL', 'http://localhost/angular/public/api/v1/');
    app.controller('employeesController', function($scope, $http, API_URL) {

         $scope.sortType = 'email'; 
         $scope.sortReverse  = false;  
    //retrieve employees listing from API
    $http.get(API_URL + "employeesdata")
            .success(function(response) {
                $scope.employees = response;
                console.log($scope.employees);
            });   
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Employee";
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $http.get(API_URL + 'employeesdata/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.employee = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }
    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "employees";    
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.employee),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
            
        }).error(function(response) {
            console.log(response);
            alert('Error occured');
        });
    }
    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'employees/' + id
            }).
                    success(function(data) {
                        console.log(data);
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
});
