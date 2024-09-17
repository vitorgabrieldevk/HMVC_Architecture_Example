<?php

class View
{
    // Método loadView para carregar a view de um módulo
    public static function loadView($view, $data = [], $module = null)
    {
        // Extrai os dados como variáveis para serem usadas na view
        extract($data);

        // Se o módulo não for fornecido, tentar deduzir o módulo da view
        if ($module === null) {
            // Separar o nome do módulo e a view (ex: 'index/index')
            $viewParts = explode('/', $view);
            if (count($viewParts) > 1) {
                $module = $viewParts[0];   // Nome do módulo
                $view = $viewParts[1];     // Nome da view
            } else {
                // Caso não tenha um módulo fornecido e a view não siga o padrão, lança um erro
                echo "Módulo não especificado para a view {$view}.";
                return;
            }
        }

        // Define o caminho para a view dentro do módulo automaticamente
        $viewFile = "../app/modules/{$module}/views/{$view}.php";

        // Verifica se o arquivo da view existe
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "View {$view} não encontrada no módulo {$module}.";
        }
    }
}
