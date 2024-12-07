<?php
// app/core/Controller.php

class Controller {

    // Method to load views
    public function view($view, $data = []) {
        // Check if the view file exists
        if (file_exists('../app/views/' . $view . '.php')) {
            // Extract data to make it accessible in the view
            extract($data);
            require_once '../app/views/' . $view . '.php';
        } else {
            // Handle error if view doesn't exist
            die('View does not exist.');
        }
    }
}
?>
