                 <div class="col-lg-12">
                      
                          <?php display_message(); ?>
                        <h1 class="page-header">
                            User Roles
                         
                        </h1>
                          <p class="bg-success">
                            
                        </p>

                        <a href="index.php?add_user_roles" class="btn btn-primary">Add User Roles</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Role Id</th>
                                        <th>User Roles</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                 <?php create_the_users_roles(); ?>
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>










                        
                    </div>
    












