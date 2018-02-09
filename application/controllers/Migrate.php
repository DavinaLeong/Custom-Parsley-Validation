<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Migrations_model');
        $this->load->library('migration');
    }
    
    public function index() {
        if ($this->migration->current() === FALSE) {
            $this->failed_html($this->migration->error_string());
        } else {
            $body_content = '<p>Migraion version: ' . $this->Migrations_model->get_version() . '</p>';
            $this->success_html($body_content);
        }
    }

    public function latest() {
        if ($this->migration->latest() === FALSE) {
            $this->failed_html($this->migration->error_string());
        } else {
            $body_content = '<p>Migraion version: ' . $this->Migrations_model->get_version() . '</p>';
            $this->success_html($body_content);
        }
    }

    public function version($target_version) {
        if ($this->migration->version($target_version) === FALSE) {
            $this->failed_html($this->migration->error_string());
        } else {
            $body_content = '<p>Migraion version: ' . $this->Migrations_model->get_version() . '</p>';
            $this->success_html($body_content);
        }
    }

    private function styles() {
        return "
        <style>
            body {
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            h1, h2, h3, h4, h5, h6 {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                padding: 0;
                margin: 0;
            }

            .success {
                color: green;
            }

            .failed {
                color: darkred;
            }

            .migration-panel {
                border: thin solid #666;
                padding: 0;
            }
            
            .migration-header {
                padding: 0.5rem;
                margin-bottom: 0.1rem;
                border-bottom: thin solid #666;
                background: #ccc;
            }

            .migration-body {
                color: #333;
                background: #eee;
                padding: 0.5rem;
                min-height: 5rem;
            }
        </style>
        ";
    }

    private function failed_html($body_content) {
        echo '<!DOCTYPE html>' . $this->whitespace_char()['newline'];
        echo '<html lang="en">' . $this->whitespace_char()['newline'];
        echo '<head>' . $this->whitespace_char()['newline'];
        echo $this->styles();
        echo '<title>' . PROJECT_NAME . '</title>' . $this->whitespace_char()['newline'];
        echo '</head>' . $this->whitespace_char()['newline'];
        echo '<body>' . $this->whitespace_char()['newline'];
        echo '<div class="migration-panel">' . $this->whitespace_char()['newline'];
        echo '<div class="migration-header"><h3 class="failed">Migration Failed</h3></div>' . $this->whitespace_char()['newline'];
        echo '<div class="migration-body>' . $this->whitespace_char()['newline'];
        echo $body_content;
        echo '</div>' . $this->whitespace_char()['newline'];
        echo '</div>' . $this->whitespace_char()['newline'];
        echo '</body>' . $this->whitespace_char()['newline'];
        echo '</html>';
    }

    private function success_html($body_content) {
        echo '<!DOCTYPE html>' . $this->whitespace_char()['newline'];
        echo '<html lang="en">' . $this->whitespace_char()['newline'];
        echo '<head>' . $this->whitespace_char()['newline'];
        echo $this->styles();
        echo '<title>' . PROJECT_NAME . '</title>' . $this->whitespace_char()['newline'];
        echo '</head>' . $this->whitespace_char()['newline'];
        echo '<body>' . $this->whitespace_char()['newline'];
        echo '<div class="migration-panel">' . $this->whitespace_char()['newline'];
        echo '<div class="migration-header"><h3 class="success">Migration Successful</h3></div>' . $this->whitespace_char()['newline'];
        echo '<div class="migration-body>' . $this->whitespace_char()['newline'];
        echo $body_content;
        echo '</div>' . $this->whitespace_char()['newline'];
        echo '</div>' . $this->whitespace_char()['newline'];
        echo '</body>' . $this->whitespace_char()['newline'];
        echo '</html>';
    }

    private function whitespace_char() {
        return [
            'newline' => "\n",
            'tab' => "\t",
            'emptyline' => "\t\n"
        ];
    }

} //end Migrate class