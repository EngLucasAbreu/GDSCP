<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Garantir que o body ocupe toda a altura da página e use flexbox */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        /* Wrapper flex para conteúdo e footer */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            flex-grow: 1; /* Ocupa o espaço restante */
        }

        .wrapper {
            display: flex;
            flex-grow: 1;
            width: 100%;
        }

        #sidebar {
            width: 300px;
            transition: all 0.3s;
            height: 100vh;
            position: fixed; /* Sidebar fixa */
            top: 0;
            left: 0;
            background-color: #e30505; /* Cor de fundo da sidebar */
        }

        #main-content {
            flex-grow: 1;
            margin-left: 300px; /* Ajuste para conteúdo ao lado da sidebar */
            transition: all 0.3s;
        }

        /* Sidebar recolhida */
        #sidebar.collapsed {
            width: 0;
            padding: 0;
            overflow: hidden;
        }

        #sidebar.collapsed .nav-link {
            display: none;
        }

        #main-content.expanded {
            margin-left: 0; /* Expandir o conteúdo quando a sidebar está recolhida */
        }

        a {
            color:#fff;
            text-decoration: none;
        }
        a:hover {
            color:#aaaaaa;
            text-decoration:none;
        }

        a.active {
            color: #0000ff;
        }

        a.active:hover {
            color: #5a5a5a;
        }

        footer {
            background-color: #f5f5f5;
            padding-right: 10px;
            padding-top: 3px;
            text-align: right;
        }

        /* Garantir que o conteúdo role enquanto a sidebar fica fixa */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow-x: hidden;
        }

    </style>
</head>
<body>
    <div class="content-wrapper">
        <!-- Sidebar e conteúdo -->
        <div class="wrapper">
            <div id="sidebar" class="bg-custom-sidebar p-3">
                <div class="d-flex p-3">
                    <div>
                        <h3>GDSCP</h3>
                        <h6>Gestão de dados em saúde e cuidados com a pele</h6>
                    </div>
                </div>
                <div class="user-info ml-3">
                    <img src="/img/avatar.jpg" alt="User Avatar">
                    <span>Olá, Lucas</span>
                </div>
                <div class="offcanvas-body">
                    <nav class="sidebar-nav">
                        <ul>
                            <li class="menu-item">
                                <a href="/dashboard">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    DASHBOARD
                                </a>
                            </li>
                            <li class="menu-item">
                                <ion-icon name="person-add-outline"></ion-icon>
                                PACIENTES
                                <ion-icon name="chevron-down-outline" class="chevron-toggle"></ion-icon>
                            </li>
                            <ul class="sub-nav">
                                <li><a href="/pacientes/create">CADASTRAR</a></li>
                                <li><a href="/pacientes/pesquisar-paciente">PESQUISAR</a></li>
                            </ul>
                            <li class="menu-item">
                                <ion-icon name="bandage-outline"></ion-icon>
                                LESÕES
                                <ion-icon name="chevron-down-outline" class="chevron-toggle"></ion-icon>
                            </li>
                            <ul class="sub-nav">
                                <li><a href="/lesoes/read-all-lesoes">EVOLUÇÃO</a></li>
                            </ul>
                            <li class="menu-item">
                                <ion-icon name="hammer-outline"></ion-icon>
                                FERRAMENTAS
                                <ion-icon name="chevron-down-outline" class="chevron-toggle"></ion-icon>
                            </li>
                            <ul class="sub-nav">
                                <li><a href="/ferramentas/read-all-setores">SETORES</a></li>
                                <li><a href="/ferramentas/read-all-leitos">LEITO</a></li>
                                <li><a href="/ferramentas/read-all-comorbidades">COMORBIDADE</a></li>
                                <li><a href="/ferramentas/read-all-local-lesao">LOCAL DA LESÃO</a></li>
                                <li><a href="/ferramentas/read-all-tipo-lesao">TIPO DE LESÃO</a></li>
                                <li><a href="/ferramentas/read-all-tipo-tratamentos">TIPO DO TRATAMENTO</a></li>
                            </ul>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div id="main-content">
                <div class="top-bar">
                    <button id="toggleSidebar" class="btn btn-transparent btn-lg" type="button">
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>
                    <x-app-layout>
                        <div class="user-info">
                            <x-slot name="header">
                                <div class="container p-3">
                                    @yield('content')
                                </div>
                            </x-slot>
                        </div>
                    </x-app-layout>
                </div>
            </div>
        </div>

        <!-- Rodapé -->
        <footer class="footer d-flex flex-column align-items-end">
            <dt class="text-bold-black">GDSCP - Gestão de dados em saúde e cuidados com a pele</dt>
            <dd class="text-black ">Desenvolvido por <a class="active" href="#">PontesTi</a></dd>
        </footer>
    </div>

    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        toggleSidebar.addEventListener('click', function () {
            // Alterna a classe "collapsed" na sidebar
            sidebar.classList.toggle('collapsed');
            sidebar.classList.toggle('p-3');
            mainContent.classList.toggle('expanded');
        });
    </script>
    <script src="/js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
