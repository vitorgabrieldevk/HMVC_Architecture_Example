<?php

return [
    // Página inicial e rotas gerais
    '/' => 'index/IndexController@init',
    '/about' => 'main/AboutController@index',  // Sobre a loja
    '/contact' => 'main/ContactController@index',  // Página de contato

    // Rotas para produtos
    '/products' => 'products/ProductController@list',    // Listagem de produtos
    '/products/{id}' => 'products/ProductController@detail',  // Detalhe do produto (id é o identificador do produto)
    '/categories/{category}' => 'products/CategoryController@listByCategory', // Produtos por categoria

    // Rotas para o carrinho de compras
    '/cart' => 'cart/CartController@viewCart',  // Ver o carrinho
    '/cart/add/{id}' => 'cart/CartController@addToCart',  // Adicionar item ao carrinho
    '/cart/remove/{id}' => 'cart/CartController@removeFromCart',  // Remover item do carrinho
    '/cart/finish' => 'cart/CartController@finishOrder',  // Finalizar compra

    // Rotas para checkout e pagamento
    '/checkout' => 'checkout/CheckoutController@index',  // Tela de checkout
    '/checkout/confirm' => 'checkout/CheckoutController@confirmOrder',  // Confirmar pedido
    '/checkout/payment' => 'checkout/PaymentController@processPayment',  // Processar pagamento

    // Rotas de autenticação de usuário
    '/login' => 'auth/UserController@loginForm',  // Formulário de login
    '/login/submit' => 'auth/UserController@login',  // Ação de login
    '/register' => 'auth/UserController@registerForm',  // Formulário de registro
    '/register/submit' => 'auth/UserController@register',  // Ação de registro
    '/logout' => 'auth/UserController@logout',  // Logout do usuário

    // Rotas para gerenciamento de conta do usuário
    '/account' => 'user/AccountController@index',  // Dashboard do usuário
    '/account/orders' => 'user/AccountController@orderHistory',  // Histórico de pedidos
    '/account/orders/{id}' => 'user/AccountController@viewOrder',  // Ver detalhes do pedido

    // Rotas administrativas (exemplo)
    '/admin' => 'admin/DashboardController@index',  // Dashboard do admin
    '/admin/products' => 'admin/ProductController@list',  // Gerenciamento de produtos
    '/admin/products/create' => 'admin/ProductController@create',  // Criar novo produto
    '/admin/products/edit/{id}' => 'admin/ProductController@edit',  // Editar produto
    '/admin/orders' => 'admin/OrderController@list',  // Gerenciamento de pedidos
    '/admin/users' => 'admin/UserController@list',  // Gerenciamento de usuários

    // Rotas de busca
    '/search' => 'main/SearchController@searchResults',  // Resultados da busca
];
