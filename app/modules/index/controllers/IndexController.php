<?php

class IndexController
{
    public function init()
    {
        $data = [
            'title' => 'Página Inicial',
            'message' => 'Bem-vindo à página inicial!'
        ];

        // Cria uma instância da classe View com o caminho e os dados
        $view = new View('index/views/index', $data);
        $view->render();
    }
}
