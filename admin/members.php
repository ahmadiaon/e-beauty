<?php
    include "../service.php";
    // Declare for this page
    $_SESSION["title_admin"] = "Users";

    $data = where("users","username",$_SESSION["username"]);
    $members = getAll("members");
?>


<?php include "partial_head.php" ?>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
            <?php include "partial_header.php" ?>
            <!-- End Topbar header -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <?php include "partial_sidebar.php" ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Basic Initialisation</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 19</option>
                                <option value="1">July 19</option>
                                <option value="2">Jun 19</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
               
                <!-- multi-column ordering -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                          <h4 class="card-title">Our members</h4>
                          <div class="ml-auto">
                            <div class="dropdown sub-dropdown">
                              <button
                                class="btn btn-link text-muted dropdown-toggle"
                                type="button"
                                id="dd1"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i data-feather="more-vertical"></i>
                              </button>
                              <div
                                class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="dd1"
                              >
                                <a class="dropdown-item" data-toggle="modal"
                      data-target="#bs-example-modal-lg" >Insert</a>
                              </div>
                            </div>
                          </div>
                        </div>
                                <div class="table-responsive">
                                    <table id="multi_col_order"
                                        class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($members as $member) :?>
                                                <tr>
                                                    <td><?= $member["username"]?></td>
                                                    <td><?= $member["phone_number"]?></td>
                                                    <td><?= $member["email"]?></td>
                                                    <td><?= $member["address"]?></td>
                                                    <td>
                                                    <div class="btn-group text-center" role="group" aria-label="First group">
                                                        <button data-toggle="modal"
                                                                data-target="#edit-modal-<?= $member["id"]?>"
                                                                type="button" 
                                                                class="btn btn-secondary"><i
                                                                class="far fa-edit"></i></button>
                                                        <button type="button" 
                                                                class="btn btn-secondary"
                                                                data-toggle="modal"
                                                                data-target="#delete-member-modal-<?= $member["id"]?>">
                                                                <i class="ti-trash"></i>
                                                        </button>

                                                        <!-- Delete member Modal -->
                                                        <div
                                                            id="delete-member-modal-<?= $member["id"]?>"
                                                            class="modal fade"
                                                            tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="delete-member-modalLabel"
                                                            aria-hidden="true" >
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div
                                                                    class="modal-header modal-colored-header bg-danger"
                                                                >
                                                                    <h4 class="modal-title" id="delete-member-modalLabel">
                                                                    Confirm Delete
                                                                    </h4>
                                                                    <button
                                                                    type="button"
                                                                    class="close"
                                                                    data-dismiss="modal"
                                                                    aria-hidden="true"
                                                                    >
                                                                    ×
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5 class="mt-0">Are you sure to delete this member ?</h5>
                                                                    <p>
                                                                    Member name is <b><?= $member["username"]?></b> 
                                                                    </p>                                  
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button
                                                                    type="button"
                                                                    class="btn btn-light"
                                                                    data-dismiss="modal"
                                                                    >
                                                                    Close
                                                                    </button>
                                                                    <form action="../service.php" method="post"> 
                                                                    <input type="hidden" name="id" value="<?= $member["id"]?>">                                 
                                                                    <button name="delete_member" type="submit" class="btn btn-danger">
                                                                        Save changes
                                                                    </button>
                                                                    </form>
                                                                    
                                                                </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                        </div>

                                                        <!-- Edit Member Modal  -->
                                                        <div
                                                            class="modal fade"
                                                            id="edit-modal-<?= $member["id"]?>"
                                                            tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="myLargeModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                                    Form edit data member
                                                                    </h4>
                                                                    <button
                                                                    type="button"
                                                                    class="close"
                                                                    data-dismiss="modal"
                                                                    aria-hidden="true"
                                                                    >
                                                                    ×
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">                
                                                                        <form action="../service.php" method="post" enctype='multipart/form-data'>
                                                                            <input type="hidden" name="id" value="<?= $member['id'] ?>">
                                                                            <div class="form-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-5">
                                                                                        <div class="form-group">
                                                                                            <label>Name</label>
                                                                                            <input name="username" value="<?= $member['username'] ?>" type="text" class="form-control" placeholder="1">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-7">
                                                                                        <div class="form-group">
                                                                                            <label>email</label>
                                                                                            <input name="email" value="<?= $member['email'] ?>" type="email" class="form-control" placeholder="col-md-11">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">                           
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label>Address</label>
                                                                                            <input name="address" value="<?= $member['address'] ?>" type="text" class="form-control" placeholder="col-md-10">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label>Phone Number</label>
                                                                                            <input name="phone_number" value="<?= $member['phone_number'] ?>" type="text" class="form-control" placeholder="col-md-3">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label>Password</label>
                                                                                            <input name="password" value="<?= $member['password'] ?>" type="text" class="form-control" placeholder="col-md-9">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>                        
                                                                            </div>
                                                                            <div class="form-actions">
                                                                                <div class="text-right">
                                                                                    <button name="edit_member" type="submit" class="btn btn-info">Submit</button>
                                                                                    <button type="reset" class="btn btn-dark">Reset</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>                   
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->




    <!--  Modal content for the above example -->
    <div
        class="modal fade"
        id="bs-example-modal-lg"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                Form data member
                </h4>
                <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-hidden="true"
                >
                ×
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-12">                
                    <form action="../service.php" method="post" enctype='multipart/form-data'>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="username" type="text" class="form-control" placeholder="name">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>email</label>
                                        <input name="email" type="email" class="form-control" placeholder="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">                           
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" type="text" class="form-control" placeholder="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone_number" type="text" class="form-control" placeholder="phone number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="text" class="form-control" placeholder="password">
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button name="create_member" type="submit" class="btn btn-info">Submit</button>
                                <button type="reset" class="btn btn-dark">Reset</button>
                            </div>
                        </div>
                    </form>                   
                </div>
            </div>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal -->










    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>