<?php
/**
 * composer.json -> files
 * composer dump-autoload
 */

function flash($message) {
    session()->flash('success', $message);
        
    }
    