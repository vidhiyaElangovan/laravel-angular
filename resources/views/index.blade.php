<!DOCTYPE html>
<html lang="en-US" ng-app="employeeRecords">
    <head>
        <title>Crud operation</title>       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.0/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Including angular source -->
        <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-route.min.js"></script>
        <h2>Student Details</h2>
        <!-- defining angular controller -->
        <div  ng-controller="employeesController">
            <table class="table" ng-show="true">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email<a href="#" class="glyphicon glyphicon-tags" ng-click="sortType = 'email'; sortReverse = !sortReverse"></a></th>
                        <th>Contact No</th>
                        <th>Standard</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Student</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" ng-model="searchKeyword"></td>
                    </tr>
                    <tr ng-repeat="employee in employees | orderBy:sortType:sortReverse | filter: searchKeyword">
                        <td>@{{ employee.name }}</td>
                        <td>@{{ employee.email }}</td>
                        <td>@{{ employee.contact_number }}</td>
                        <td>@{{ employee.position }}</td>
                        <td>
                            <!-- edit glyphicon -->
                            <button class="btn btn-default btn-xs btn-success" ng-click="toggle('edit', employee.id)">Edit
                            <span class="glyphicon glyphicon-edit"></span></button>
                            <!-- delete glyphicon -->
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(employee.id)">Delete
                            <span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- modal to enter employee data -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmEmployees" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="@{{name}}" 
                                        ng-model="employee.name" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">Name field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="@{{email}}" 
                                        ng-model="employee.email" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmEmployees.email.$invalid && frmEmployees.email.$touched">Valid Email field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Contact Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="@{{contact_number}}" 
                                        ng-model="employee.contact_number" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmEmployees.contact_number.$invalid && frmEmployees.contact_number.$touched">Contact number field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Position</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="@{{position}}" 
                                        ng-model="employee.position" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmEmployees.position.$invalid && frmEmployees.position.$touched">Position field is required</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- including angular files -->
        <script src="<?= asset('app/controllers/employee.js') ?>"></script>
    </body>
</html>