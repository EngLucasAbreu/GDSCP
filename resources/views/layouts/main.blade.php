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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        a {
            color:#fff;
            text-decoration: none;
        }

        a:hover {
            color:#0000ff;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="menu-toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <div class="user-info">
            <img src="/img/avatar.jpg" alt="User Avatar">
            <span>Olá, Lucas</span>
            <ion-icon name="chevron-down-outline" class="chevron-toggle"></ion-icon>
        </div>
    </div>
    <div class="main-container">
        <aside class="sidebar">
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
                        <li><a href="/cadastrar-cliente">CADASTRAR</a></li>
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
        </aside>
        <main class="main-content">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
        <h4>NSP - Núcleo de Segurança do Paciente</h4>
        <h6>Desenvolvido por PontesTi</h6>
    </footer>
    <script src="/js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
