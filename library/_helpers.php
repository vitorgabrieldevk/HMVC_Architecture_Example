<?php

class Helpers
{
    /**
     * Redireciona para a URL especificada.
     *
     * @param string $route A URL ou rota para a qual redirecionar.
     * @return void
     */
    public static function redirect_route($route)
    {
        $route = APP_PATH . ltrim($route, '/');

        var_dump($route);

        if (!empty($route)) {
            header("Location: $route");
            exit();
        } else {
            throw new InvalidArgumentException('A URL ou rota para redirecionamento não pode estar vazia.');
        }
    }
}

?>
