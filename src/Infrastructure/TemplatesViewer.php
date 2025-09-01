<?php

namespace Opinionstage\Infrastructure;

use Opinionstage;

class TemplatesViewer {

    public static function require_template($template_name, $args = []) {

        $template_path = $template_name . '.php';

        $path = Opinionstage::get_instance()->plugin_path . $template_path;

        if (!file_exists($path)) {
            return;
        }

        extract($args);

        require($path);
    }
}
