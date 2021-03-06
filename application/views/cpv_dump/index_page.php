<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('_snippets/meta_headers'); ?>
        <?php $this->load->view('_snippets/head_resources'); ?>
    </head>
    <body>
        <div class="container">
            <?php $this->load->view('_snippets/header'); ?>

            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=site_url('cpv');?>">Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('cpv/latest_dump');?>">Latest Dump</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('cpv/all_dumps');?>">All Dumps</a>
                </li>
            </ul>

            <h2 class="mb-3">Test Form</h2>
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <ul><?= validation_errors('<li>', '</li>'); ?></ul>
            </div>
            <?php endif; ?>

            <form id="form-test" method="post" data-parsley-validate>
                <input type="hidden" id="form_submit" name="form_submit" value="submitted">

                <div class="form-group">
                    <label class="control-label" for="multiple_of_3">Multiple of 3</label>
                    <input class="form-control" type="number" step="1" min="0" max="10000" placeholder="0"
                        id="multiple_of_3" name="multiple_of_3" data-parsley-multiple-of="3" required>
                </div>

                <div class="form-group">
                    <label class="control-label" for="invalid_name_bob">Valid Names</label>
                    <input class="form-control" type="text"
                        id="invalid_name_bob" name="invalid_name_bob" data-parsley-invalid-name="Bob" required>
                </div>

                <button id="btn-submit" type="submit" class="btn btn-primary mt-1">Submit <i class="fas fa-check fa-fw"></i></button>
            </form>

            <?php if($this->input->post()): ?>
            <div class="card border-secondary mt-3">
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
        <script>
        window.Parsley.addValidator('multipleOf', {
            requirementType: 'integer',
            validateNumber: function(value, requirement) {
                return 0 === value % requirement;
            },
            messages: {
                en: 'This value must be a multiple of %s.'
            }
        });

        window.Parsley.addValidator('invalidName', {
            requirementType: 'string',
            validateString: function(value, requirement) {
                return value.toLowerCase() !== requirement.toLowerCase();
            },
            messages: {
                en: 'This value cannot be %s.'
            }
        });
        </script>
    </body>
</html>