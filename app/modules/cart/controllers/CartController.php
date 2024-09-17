<?php

class CartController
{
    public function finishOrder()
    {
        echo "Hello World from CartController!";
    }

    public function index()
    {
        $data = [
            'title' => 'Página Inicial',
            'message' => 'Bem-vindo à página inicial!'
        ];

        echo "ksjdgfuysdf";

        // A view está dentro do módulo 'index', deduzido automaticamente
        // View::loadView('index/index', $data);
    }
}
