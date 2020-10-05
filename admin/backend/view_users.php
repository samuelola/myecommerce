                 <div class="col-lg-12">
                      
                          <?php display_message(); ?>
                        <h1 class="page-header">
                            Users
                         
                        </h1>
                          <p class="bg-success">
                            
                        </p>

                        <a href="index.php?add_user" class="btn btn-primary">Add User</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>First Name</th>
                                        <th>Last Name </th>
                                        <th>Action</th>
                                        <th>Add Role</th>
                                    </tr>
                                </thead>
                                <tbody>

                                 <?php show_the_users_admin(); ?>
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>










                        
                    </div>
    












