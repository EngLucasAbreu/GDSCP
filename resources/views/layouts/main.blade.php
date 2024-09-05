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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        a {
            color:#fff;
            text-decoration: none;
        }

        a:hover {
            color:#aaaaaa;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <!-- <div class="container">

    </div> -->
    <div class="top-bar">
        <button class="btn btn-transparent btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
            <ion-icon name="menu-outline">
            </ion-icon>
        </button>
        <x-app-layout>
            <div class="user-info">
                <x-slot name="header">
                </x-slot>
            </div>
        </x-app-layout>
    </div>
        <div class="container wrapper">
            <!-- <aside class="sidebar">
                <div class="sidebar-header">
                    <h2>NSP</h2>
                    <p>Núcleo de Segurança do Paciente</p>
                    <div class="user-info">
                        <img src="/img/avatar.jpg" alt="User Avatar">
                        <span>Olá, Lucas</span>
                    </div>
                </div>
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
                            <li>PESQUISAR</li>
                        </ul>
                        <li class="menu-item">
                            <ion-icon name="bandage-outline"></ion-icon>
                            LESÕES
                            <ion-icon name="chevron-down-outline" class="chevron-toggle"></ion-icon>
                        </li>
                        <ul class="sub-nav">
                            <li>REGISTRAR INCIDENTE</li>
                            <li><a href="/evolucao">EVOLUÇÃO</a></li>
                            <li>PESQUISAR</li>
                        </ul>
                        <li class="menu-item">
                            <ion-icon name="hammer-outline"></ion-icon>
                            FERRAMENTAS
                            <ion-icon name="chevron-down-outline" class="chevron-toggle"></ion-icon>
                        </li>
                        <ul class="sub-nav">
                            <li><a href="/sala">SALAS</a></li>
                            <li><a href="/leito">LEITO</a></li>
                            <li><a href="/local-lesao">LOCAL DA LESÃO</a></li>
                            <li><a href="/tipo-lesao">TIPO DE LESÃO</a></li>
                            <li><a href="/tipo-tratamento">TIPO DE TRATAMENTO</a></li>
                            <li><a href="/local-lesao">EVOLUÇÃO DO TRATAMENTO</a></li>
                            <li><a href="/local-lesao">CONCLUSÃO DO TRATAMENTO</a></li>
                        </ul>
                    </ul>
                </nav>
            </aside> -->

            <div class="bg-custom-sidebar offcanvas offcanvas-start show" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header d-flex">
                    <div class="offcanvas-title">
                        <h3 id="offcanvasScrollingLabel">GDSCP</h5>
                        <h6 id="offcanvasScrollingLabel">Gestão de dados em saúde e cuidados com a pele</h5>
                    </div>
                    <button type="button" class="btn-close mb-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
                                <li><a href="/pacientes/store">PESQUISAR</a></li>
                            </ul>
                            <li class="menu-item">
                                <ion-icon name="bandage-outline"></ion-icon>
                                LESÕES
                                <ion-icon name="chevron-down-outline" class="chevron-toggle"></ion-icon>
                            </li>
                            <ul class="sub-nav">
                                <li>REGISTRAR INCIDENTE</li>
                                <li><a href="/evolucao">EVOLUÇÃO</a></li>
                                <li><a href="/pesquisar-lesoes">PESQUISAR</a></li>
                            </ul>
                            <li class="menu-item">
                                <ion-icon name="hammer-outline"></ion-icon>
                                FERRAMENTAS
                                <ion-icon name="chevron-down-outline" class="chevron-toggle"></ion-icon>
                            </li>
                            <ul class="sub-nav">
                                <li><a href="/sala">SALAS</a></li>
                                <li><a href="/leito">LEITO</a></li>
                                <li><a href="/ferramentas/read-all-comorbidades">COMORBIDADE</a></li>
                                <li><a href="/local-lesao">LOCAL DA LESÃO</a></li>
                                <li><a href="/tipo-lesao">TIPO DE LESÃO</a></li>
                                <li><a href="/tipo-tratamento">TIPO DE TRATAMENTO</a></li>
                                <li><a href="/local-lesao">EVOLUÇÃO DO TRATAMENTO</a></li>
                                <li><a href="/local-lesao">CONCLUSÃO DO TRATAMENTO</a></li>
                            </ul>
                        </ul>
                    </nav>
                </div>
            </div>
            <main class="main-content">
                @yield('content')
            </main>
        </div>
        <footer class="footer d-flex flex-column align-items-end">
            <h6 class="fs-5">GDSCP - Gestão de dados em saúde e cuidados com a pele</h6>
            <h6 class="fs-6">Desenvolvido por PontesTi</h6>
        </footer>
        <script src="/js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
