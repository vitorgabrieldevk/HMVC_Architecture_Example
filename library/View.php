<?php

class View
{
    public static function renderView($module, $viewName, $data = [])
    {
        $viewPath = APP_PATH . "modules/{$module}/views/{$viewName}.php";

        if (file_exists($viewPath)) {
            extract($data);
            include $viewPath;
        } else {
            echo "View '{$viewName}' não encontrada no módulo '{$module}'.";
        }
    }
}
