<?php

class IndexController
{
    public function init()
    {
        $data = [
            'title' => 'Index da página',
            'message' => 'Bem-vindo à página inicial!',
            'teste' => 'Esta é a tela de página inicial.'
        ];

        View::renderView('index', 'index/index', $data);
    }
}
