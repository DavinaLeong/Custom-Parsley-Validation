<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('_snippets/meta_headers'); ?>
        <?php $this->load->view('_snippets/head_resources'); ?>
    </head>
    <body>
        <div class="container">
            <h1 class="display-1">Custom Parsley Validators</h1>
            <p class="lead">External links: <a href="http://getbootstrap.com/" target="_blank">Bootstrap</a> | <a href="https://fontawesome.com/" target="_blank">Font Awesome</a> | <a href="http://parsleyjs.org/" target="_blank">Parsley</a></p>

            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=site_url('cpv');?>">Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('cpv/dump');?>">Latest Dump</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('cpv/dump_all');?>">All Dumps</a>
                </li>
            </ul>

            <h2>Test Form</h2>
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <ul><?php validation_errors('<li>', '</li>'); ?></ul>
            </div>
            <?php endif; ?>

            <form id="form-test" method="post" data-parsley-validate>
                <input type="hidden" id="form_submit" value="submitted">

                <div class="form-group">
                    <label class="control-label" for="multipleOfThree">Multiple of 3</label>
                    <input class="form-control" type="number" step="1" min="0" max="10000" placeholder="0"
                        id="multipleOfThree" name="multipleOfThree" data-parsley-multiple-of="3" required>
                </div>

                <button id="btn-submit" type="submit" class="btn btn-primary mt-1">Submit <i class="fas fa-check fa-fw"></i></button>
            </form>

            <?php if($this->input->post()): ?>
            <div class="card border-secondary">
                <div class="card-header">
                    <h5>POST Dump</h5>
                </div>
                <div class="card-body">
                    <?php var_export($this->input->post()); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php $this->load->view('_snippets/body_resources'); ?>

        
    </body>
</html>