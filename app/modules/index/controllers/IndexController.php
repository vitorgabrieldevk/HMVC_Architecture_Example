<?php

class IndexController
{
    public function init()
    {
        $data = [
            'title' => 'Index da página',
            'message' => 'Bem-vindo à página inicial!'
        ];

        View::renderView('index', 'index/index', $data);
    }
}
