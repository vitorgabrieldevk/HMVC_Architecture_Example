<?php

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        // Carregar as rotas do arquivo routes.php
        $this->routes = require_once 'routes.php';
    }

    // Função principal que inicia o roteamento
    public function dispatch()
    {
        $url = $this->parseUrl();

        if ($this->matchRoute($url)) {
            // Separar módulo, controlador e método (ex: 'products/ProductController@list')
            list($moduleAndController, $method) = explode('@', $this->params['action']);
            list($module, $controller) = explode('/', $moduleAndController);

            // Caminho do arquivo do controlador com base no módulo
            $controllerFile = APP_PATH . 'modules/' . $module . '/controllers/' . $controller . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controller();

                // Verificar se o método existe no controlador
                if (method_exists($controller, $method)) {
                    call_user_func_array([$controller, $method], $this->params['params']);
                } else {
                    echo "Método {$method} não encontrado no controlador {$controller}.";
                }
            } else {
                echo "Controlador {$controller} não encontrado no módulo {$module}.";
            }
        } else {
            echo "Rota não encontrada!";
        }
    }

    // Função para comparar a URL atual com as rotas definidas
    protected function matchRoute($url)
    {
        foreach ($this->routes as $route => $action) {
            // Substitui parâmetros dinâmicos (ex: {id}) com expressões regulares
            $routePattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);

            // Adiciona delimitadores de início e fim na expressão
            $routePattern = '#^' . $routePattern . '$#';

            // Verifica se a URL corresponde à rota
            if (preg_match($routePattern, $url, $matches)) {
                array_shift($matches); // Remove o primeiro elemento que é a URL completa

                // Salva o controlador, método e parâmetros da rota
                $this->params = [
                    'action' => $action,
                    'params' => $matches
                ];
                return true;
            }
        }

        return false;
    }

    // Função para parsear a URL
    protected function parseUrl()
    {
        if (isset($_GET['url'])) {
            return '/' . filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
        }
        return '/'; // Rota padrão se não houver URL
    }
}

