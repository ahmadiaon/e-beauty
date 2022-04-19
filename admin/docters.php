<?php
    include "../service.php";
    // Declare for this page
    $_SESSION["title_admin"] = "Docter";

    $docters = getAll("docters");
?>


<?php include "partial_head.php" ?>
<body>
    <?php include "partial_preloader.php" ?>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <?php include "partial_header.php" ?>
            <!-- End Topbar header -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <?php include "partial_sidebar.php" ?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php include "partial_nav.php" ?>
            <div class="container-fluid">               
                <!-- order table -->
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                          <h4 class="card-title">Our Docters</h4>
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
                            data-target="#signup-modal" >Insert</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="table-responsive">
                          <table id="zero_config" class="table no-wrap v-middle mb-0">
                            <thead>
                              <tr class="border-0">
                                <th
                                  class="border-0 font-14 font-weight-medium text-muted"
                                >
                                  Docters
                                </th>
                                <th
                                  class="border-0 font-14 font-weight-medium text-muted px-2"
                                >
                                  facebook
                                </th>
                                <th
                                  class="border-0 font-14 font-weight-medium text-muted"
                                >
                                  instagram
                                </th>
                                <th
                                  class="border-0 font-14 font-weight-medium text-muted text-center"
                                >
                                  twitter
                                </th>
                                <th
                                  class="border-0 font-14 font-weight-medium text-muted text-center"
                                >
                                  action
                                </th>                          
                              </tr>
                            </thead>
                            <tbody>
                                <?php foreach($docters as $docter) :?>
                              <tr>
                                <td class="border-top-0 px-2 py-4">
                                  <div class="d-flex no-block align-items-center">
                                    <div class="mr-3">
                                      <img
                                        src="../file/<?= $docter["image_path"]?>"
                                        alt="user"
                                        class="rounded-circle"
                                        width="45"
                                        height="45"
                                      />
                                    </div>
                                    <div class="">
                                      <h5
                                        class="text-dark mb-0 font-16 font-weight-medium"
                                      >
                                      <?= $docter["name"]?>
                                      </h5>
                                      <span class="text-muted font-14"
                                        > <?= $docter["specialis"]?> </span
                                      >
                                    </div>
                                  </div>
                                </td>
                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                <?= $docter["facebook"]?>
                                </td>
                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                <?= $docter["instagram"]?>
                                </td>
                                <td class="border-top-0 text-muted px-2 py-4 font-14">
                                <?= $docter["twitter"]?>
                                </td>
                                <td class="border-top-0 px-2 py-4">
                                  <div class="popover-icon">
                                    <a
                                      data-toggle="modal"
                                      data-target="#edit-modal-<?= $docter["id"]?>"
                                      class="btn btn-primary rounded-circle btn-circle font-12"
                                      href="#"
                                      ><i class="icon-note"></i></a>
                                    <a  data-toggle="modal"
                                        data-target="#danger-header-modal-<?= $docter["id"]?>"
                                      class="btn btn-danger rounded-circle btn-circle font-12 popover-item"
                                      href="delete/<?= $docter["name"]?>"
                                      ><i class="icon-trash"></i></a>                              
                                  </div>

                                </td>
                                <!-- Delete docter Modal -->
                                <div
                                  id="danger-header-modal-<?= $docter["id"]?>"
                                  class="modal fade"
                                  tabindex="-1"
                                  role="dialog"
                                  aria-labelledby="danger-header-modalLabel"
                                  aria-hidden="true"
                                >
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div
                                        class="modal-header modal-colored-header bg-danger"
                                      >
                                        <h4 class="modal-title" id="danger-header-modalLabel">
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
                                        <h5 class="mt-0">Are you sure to delete this docter</h5>
                                        <p>
                                          Docters name is <b><?= $docter["name"]?></b> 
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
                                        <form action="service.php" method="post"> 
                                          <input type="hidden" name="id" value="<?= $docter["id"]?>">                                 
                                          <button name="delete_docter" type="submit" class="btn btn-danger">
                                            Save changes
                                          </button>
                                        </form>
                                        
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>

                                 <!-- Edit Docter modal content -->
                                <div
                                    id="edit-modal-<?= $docter["id"] ?>"
                                    class="modal fade"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-hidden="true"
                                  >
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-body">
                                          <div class="text-center mt-2 mb-4">
                                            <a href="index.html" class="text-success">
                                              <span
                                                ><img
                                                  class="mr-2"
                                                  src="assets/images/logo-icon.png"
                                                  alt=""
                                                  height="18" /><img
                                                  src="assets/images/logo-text.png"
                                                  alt=""
                                                  height="18"
                                              /></span>
                                            </a>
                                          </div>

                                          <form class="pl-3 pr-3" action="../service.php" method="post" enctype='multipart/form-data'>
                                              <input type="hidden" name="id" value="<?= $docter["id"] ?>">
                                              <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="username">Name</label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            id="username"
                                                            required=""
                                                            name="name" value="<?= $docter["name"] ?>"
                                                            placeholder="Name docter"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Specialis</label>
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            id="username"
                                                            required=""
                                                            name="specialis"
                                                            value="<?= $docter["specialis"] ?>"
                                                            placeholder="specialis"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="form-input">
                                                                <div class="preview">
                                                                    <label for="file-ip-1">Upload </label>
                                                                    <input class="custom-file-input" require name="image_path" type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
                                                                    <img id="file-ip-1-preview" src="../file/<?= $docter["image_path"] ?>" alt="image" class="img-fluid img-rounded" height="200">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            <div class="form-group">
                                              <label for="username">facebook</label>
                                              <input
                                                class="form-control"
                                                type="text"
                                                name="facebook"
                                                id="username"
                                                required=""
                                                value="<?= $docter["facebook"] ?>"
                                                placeholder="facebook"
                                              />
                                            </div>

                                            <div class="form-group">
                                              <label for="specialis">instagram</label>
                                              <input
                                                class="form-control"
                                                type="text"
                                                name="instagram"
                                                id="emailaddress"
                                                required=""
                                                value="<?= $docter["instagram"] ?>"
                                                placeholder="docter instagram is"
                                              />
                                            </div>
                                            <div class="form-group">
                                              <label for="specialis">twitter</label>
                                              <input
                                                class="form-control"
                                                type="text"
                                                name="twitter"
                                                id="emailaddress"
                                                value="<?= $docter["twitter"] ?>"
                                                required=""
                                                placeholder="docter twitter is"
                                              />
                                            </div>
                                            
                                            <div class="form-group text-center">
                                              <button class="btn btn-primary" name="edit_docter" type="submit">
                                                Save change
                                              </button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                              </tr>
                              <?php endforeach?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
    <!-- All Jquery -->
    <!-- ============================================================== -->


    <!-- Add Docter modal content -->
    <div
        id="signup-modal"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="text-center mt-2 mb-4">
                <a href="index.html" class="text-success">
                  <span
                    ><img
                      class="mr-2"
                      src="assets/images/logo-icon.png"
                      alt=""
                      height="18" /><img
                      src="assets/images/logo-text.png"
                      alt=""
                      height="18"
                  /></span>
                </a>
              </div>
              
              <form class="pl-3 pr-3" action="../service.php" method="post" enctype='multipart/form-data'>
                  <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input
                                class="form-control"
                                type="text"
                                id="username"
                                required=""
                                name="name"
                                placeholder="docter name is"
                            />
                        </div>
                        <div class="form-group">
                            <label for="username">Specialis</label>
                            <input
                                class="form-control"
                                type="text"
                                id="username"
                                required=""
                                name="specialis"
                                placeholder="specialis docter is"
                            />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="form-input">
                                    <div class="preview">
                                        <label for="files-ip-1">Upload </label>
                                        <input class="custom-file-input" require name="image_path" type="file" id="files-ip-1" accept="image/*" onchange="showPreviews(event);">
                                        <img id="files-ip-1-preview" src="../file/images/empty.png"  alt="image" class="img-fluid img-rounded" height="200">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                <div class="form-group">
                  <label for="username">facebook</label>
                  <input
                    class="form-control"
                    type="text"
                    name="facebook"
                    id="username"
                    required=""
                    placeholder="facebook docter is"
                  />
                </div>

                <div class="form-group">
                  <label for="specialis">instagram</label>
                  <input
                    class="form-control"
                    type="text"
                    name="instagram"
                    id="emailaddress"
                    required=""
                    placeholder="docter specialis is"
                  />
                </div>
                <div class="form-group">
                  <label for="specialis">twitter</label>
                  <input
                    class="form-control"
                    type="text"
                    name="twitter"
                    id="emailaddress"
                    required=""
                    placeholder="docter specialis is"
                  />
                </div>
                
                <div class="form-group text-center">
                  <button class="btn btn-primary" name="create_docter" type="submit">
                    Add Docter
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

   
                  <!-- /.modal -->


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
  
        <script type="text/javascript">
        function showPreview(event){
        if(event.target.files.length > 0){
          $(document).on("change", ".custom-file-input", function() {
            var myImg = this.files[0];
            var myImgType = myImg["type"];
            var validImgTypes = ["image/gif", "image/jpeg", "image/png"];

            if ($.inArray(myImgType, validImgTypes) < 0) {
              alert("Not an image");
            }else{
              var src = URL.createObjectURL(event.target.files[0]);
            
              var preview = document.getElementById("file-ip-1-preview");
              preview.src = src;
              preview.style.display = "block";
            }

          });  
          
         
        }
        }
        </script>
        <script>
            function showPreviews(event){
              if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("files-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
              }
            }
        </script>
</body>

</html>