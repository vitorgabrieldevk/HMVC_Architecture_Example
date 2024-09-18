<?php

class ErrorController
{
    public function RouteNotFound()
    {
        $data = [
            'title' => 'Index da página',
            'message' => 'Bem-vindo à página inicial!',
            'teste' => 'Página de erro.'
        ];

        View::renderView('Erro', '404/erro', $data);
    }
}
