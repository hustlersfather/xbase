<?php include('../authentication/security.php'); ?>
<?php include('../authentication/auth-controller.php'); ?>
<?php include('includes/header.php'); ?>

        <!--Sidebar-->
        <div class="col-lg-10">
            <div class="container-fluid mx-2">
                <!--Breadcrumbs-->
                <div class="border-bg mb-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                            <a href="#" class="text-white">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Post</li>
                        </ol>
                    </nav>
                </div>
                <!--Breadcrumbs ends-->

                <!--Sb heading-->
                <div class="border-bg pb-2">
                    <div class="d-flex justify-content-between align-items-center mx-3">
                        <h5 class="h5 text-white">Users Page</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#exampleModal">
                            Add user
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger py-3 text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="user.php" method="post">

                                        <div class="form-group mt-5">
                                            <label  class="lead">Username</label>
                                            <input type="text" name="username" class="form-control py-2 mt-2">
                                        </div>

                                        <div class="form-group mt-5">
                                            <label class="lead">Email</label>
                                            <input type="email" name="email"  class="form-control py-2 mt-2" >
                                        </div>

                                        <div class="form-group mt-5">
                                            <label class="lead">Password</label>
                                            <input type="password"  class="form-control py-2 mt-2" name="password">
                                        </div>

                                        <div class="form-group mt-5">
                                            <input type="hidden"  class="form-control py-2 mt-2" name="usertype" value="user">
                                        </div>
                                                                            
                                        <div class="d-flex justify-content-start align-items-center mt-4">
                                            <button type="submit" name="add_user" class="btn btn-lg btn-success">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Sb heading ends-->

                <!--search form-->
                <div class="float-right mt-2">
                    <form action="">
                        <label for="search" class="text-white h6">Search:</label>
                        <input type="text" class="py-1 rounded">
                    </form>
                </div>
                <!--search form ends-->

                <!--Post Table-->
                <div class="table-responsive">
                  <div class="table-card rounded">
                    <div class="card-head rounded">
                        <h5 class="h5">All Users</h5>
                    </div>
                      <?php
                        include('../authentication/dbconfig.php'); 
                          $query = "SELECT * FROM user WHERE usertype='user' ";
                          $results = mysqli_query($db, $query);
                      ?>
                          <table id="example" class="table table-striped mt-4" style="100%">
                            <thead>
                              <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Username</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Password</th>
                                  <th scope="col">Balance</th>
                                  <th scope="col">Edit</th>
                                  <th scope="col">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              if(mysqli_num_rows($results) > 0)
                              {
                                while($row = mysqli_fetch_assoc($results))
                                {
                                  ?>
                                  <tr>
                                    <td> <?php echo $row['id']; ?> </td>
                                    <td> <?php echo $row['username']; ?> </td>
                                    <td> <?php echo $row['email']; ?> </td>
                                    <td> <?php echo $row['password']; ?> </td>
                                    td> <?php echo $row['balance']; ?> </td>
                                    <td>
                                        <form action="edit_user.php" method="post">
en" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button class="btn btn-success" type="submit" name="edit_btn">
                                            Edit
                                            </button>
                                        </form>
                                    </td> 
                                    <td>
                                        <form action="../authentication/auth-controller.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button class="btn btn-danger" name="delete_btn">
                                            Delete
                                            </button>
                                        </form>
                                    </td>
                                  </tr>
                                  <?php

                                  }
                                }
                                else{
                                  echo "NO RECORD FOUND";
                                }
                              ?>
                            </tbody>
                          </table>
                  </div>
              </div>
            </div>
                <!--post Table ends-->

                
                
            </div>
        </div>
        <!--Main Body ends-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script>
          $(document).ready(function() {
            $('#example').DataTable();
          } );
        </script>
        <?php include('includes/footer.php'); ?>
