<?php

class View
{
    protected $viewPath;
    protected $data = [];

    // Construtor para definir o caminho da view e os dados
    public function __construct($viewPath, $data = [])
    {
        $this->viewPath = $viewPath;
        $this->data = $data;
    }

    // Método para carregar e exibir a view
    public function render()
    {
        $filePath = __DIR__ . '/../app/modules/' . $this->viewPath . '.php';

        if (file_exists($filePath)) {
            // Extrair dados para a visualização
            extract($this->data);
            // Incluir o arquivo da view
            include $filePath;
        } else {
            echo "View não encontrada: {$filePath}";
        }
    }
}
