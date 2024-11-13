<!--<html>
    <head>
        <title>Mi Web</title>
    </head>
    <body>
        @section('menu')
            Contenido del menu
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarcaPersonalFP</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; /* Coloca los elementos en una columna */
            height: 100vh; /* Hace que ocupe toda la altura de la pantalla */
        }

        header {
            background-color: red; /* Color de fondo del header */
            color: white; /* Color del texto del header */
            padding: 20px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 1; /* Asegura que el header esté encima de otros elementos */
        }

        /* Contenedor principal para el sidebar y el main */
        .main-container {
            display: flex;
            flex-grow: 1; /* Hace que ocupe el espacio restante */
            padding: 10px;
        }

        /* Sidebar debajo del header pero a la izquierda */
        sidebar {
            background-color: pink; /* Color de fondo del sidebar */
            width: 200px;
            padding: 20px;
            position: relative;
            flex-shrink: 0; /* Asegura que el sidebar no se reduzca */
            height: calc(100vh - 60px); /* Ajusta la altura del sidebar para que quede debajo del header */
            overflow-y: auto; /* Permite hacer scroll en el sidebar si el contenido es largo */
        }

        /* Main content */
        main {
            background-color: white; /* Color de fondo de la sección main */
            flex-grow: 1; /* El contenido principal ocupa el resto del espacio */
            padding: 20px;
            text-align: center;
        }

        /* Estilo para el contenido dentro del main */
        .content {
            width: 100%;
            max-width: 1000px; /* Máxima anchura para el contenido */
            padding: 20px;
            box-sizing: border-box;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>MarcaPersonalFP</h1>

    </header>

    <!-- Contenedor principal que tiene tanto el sidebar como el main -->
    <div class="main-container">
        <!-- Sidebar -->
        <sidebar>
            <h2>Menú del Sidebar</h2>
            @yield('menu')
        </sidebar>

        <!-- Main Content -->
        <main>
            <div class="content">
                @yield('content') <!-- Aquí se incluirá el contenido dinámico -->
            </div>
        </main>
    </div>

</body>
</html>



