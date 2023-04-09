
<?php include '../admin/include/head.php'; ?>
<?php
  include_once 'functions/Functions.php';
  $registerClient = new Functions();



  if (isset($_POST['submit'])) {
      $check = $registerClient->jobpostings($_POST);
  
      if ($check->status) {
         
        $_SESSION['status'] = "معلومات شما به موفقیت ثبت شد.";    
        echo "post Registered";
  
  
      }
      else{
          echo "User Registration Failed";
      }
  }


?>




<body class="alt-menu sidebar-noneoverflow" style = "background-color:#ebf0ec;">



    <!-- BEGIN LOADER -->
    <div id="load_screen container"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"> </div>
    </div></div></div>
    <!--  END LOADER -->

   <?php include '../admin/include/header.php'; ?>

    
   <div class="main-container" id="container">

<div class="overlay"></div>
<div class="search-overlay"></div>

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
    
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget widget-content-area br-4">
                   
                </div>
            </div>

           

            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Job Posting From</h4>
                                <label style="margin-left:15px;" for="inputEmail4">please fill the form completly </label>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area" style="height: 1500px;">
                        <form method="post" role="form" >
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="job_title">Job Title</label>
                                        <input type="text" name="jobtitle" class="form-control" id="inputEmail4" placeholder="Job title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Job Location</label>
                                        <input type="text" name="location" class="form-control" id="inputPassword4" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Nationalilty</label>
                                        <input type="text" name="nationality" class="form-control" id="inputPassword4" placeholder="Country">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Contract Type</label>
                                        <input type="text" name="contract_type" class="form-control" id="inputPassword4" placeholder="type">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Working Hours</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Vacancy Number</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="type">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Number of Jobs</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Years Of Experience</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="type">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Company Name</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Educational Degree</label>
                                        <input type="text" class="form-control" id="inputPassword4" placeholder="">
                                    </div>
                                </div>
                               
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Education Type </label>
                                        <input type="text" class="form-control" id="inputCity">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Gender</label>
                                        <select id="inputState" class="form-control">
                                            <option selected="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label for="inputZip">Close Date</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                <div class="form-group col-md-12">
                                        <label for="inputZip">About the Company</label>
                                        <textarea type="text" class="form-control" id="inputZip"></textarea>
                                    </div>
                                </div>
                          
                                <div class="form-row mb-4">
                                <div class="form-group col-md-12">
                                        <label for="inputZip">Aditoinal Informations</label>
                                        <textarea type="text" class="form-control" id="inputZip"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check pl-0">
                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input" id="gridCheck">
                                            <label class="custom-control-label" for="gridCheck">Check me out</label>
                                        </div>
                                    </div>
                                </div>
                              <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6  mb-4">
                <div class="card b-l-card-1 h-100">
                    <img class="card-img-top" src="assets/img/400x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <strong class="card-category">Trends</strong>
                        <h5 class="card-title mt-2">Trending Style</h5>
                        <p class="card-text meta-info meta-time mb-2"><small class="">3 mins ago</small></p>
                        <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <button class="btn btn-outline-warning mt-2">Read More</button>
                    </div>
                </div>
            </div>

        

        </div>
        
    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div>
</div>
<!--  END CONTENT AREA  -->

</div>
           
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
 

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>