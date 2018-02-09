<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @var $cpv_dumps
 */
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
                    <a class="nav-link" href="<?=site_url('cpv');?>">Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('cpv/latest_dump');?>">Latest Dump</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?=site_url('cpv/all_dumps');?>">All Dumps</a>
                </li>
            </ul>

            <h2 class="mb-3">All Dumps</h2>
            <div class="card-columns">
            <?php foreach($cpv_dumps as $key=>$dump):
                $highlight = $key == 0 ? ' border-primary' : ''; ?>
                <div id="cpv_dump_<?=$dump['cpv_dump_id'];?>" class="card<?=$highlight;?>">
                    <div class="card-header"><?=$this->datetime_formatter->format_system_datetime($dump['timestamp']);?></div>
                    <div class="card-body">
                        <p><strong><?=$dump['form_name'];?></strong></p>
                        <p><?=nl2br($dump['form_dump']);?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            
        <?php $this->load->view('_snippets/body_resources'); ?>
    </body>
</html>