<?php

class View
{
    // Método para carregar a view de um módulo
    public static function renderView($module, $viewName, $data = [])
    {
        // Definir o caminho base para a view
        $viewPath = APP_PATH . "modules/{$module}/views/{$viewName}.php";

        // Verificar se a view existe
        if (file_exists($viewPath)) {
            // Extrair dados para serem acessíveis diretamente na view
            extract($data);
            // Incluir a view
            include $viewPath;
        } else {
            echo "View '{$viewName}' não encontrada no módulo '{$module}'.";
        }
    }
}
