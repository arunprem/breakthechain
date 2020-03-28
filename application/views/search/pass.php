<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>
    <head>
        <title>Kerala Police Travel Pass</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/libs/validator/css/bootstrapValidator.min.css">
    </head>
    <body>
        <section class="jumbotron text-center">
            <div class="container">
                <img src="<?php echo base_url() ?>public/web/images/kp_logo_red.png">
                <h1>Kerala Police </h1>
                <p class="lead text-muted">Travel Pass Verification </p>

            </div>
        </section>


        <form>
            <div class="form-group col-lg-12">
                <label for="pen">Pen</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Pen">
                <small id="emailHelp" class="form-text text-muted">Please enter Your Pen Number</small>
            </div>
            
              <div class="form-group col-lg-12">
                <label for="mobilenumber">Mobile</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile Number">
                <small id="emailHelp" class="form-text text-muted">Please enter Mobile Number</small>
            </div>
          
            <div class="form-group col-lg-12 text-center">
                <button type="submit" class="btn btn-success ">Search</button>
            </div>
        </form>


    </body>
    <script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js"></script>
</html>