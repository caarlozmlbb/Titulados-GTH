<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta de Trabajo Dirigido</title>
    <style>
        @page {
            margin: 0; /* Elimina los márgenes de la página */
        }
        body {
            margin: 0;
            padding: 20px;
            font-family: Helvetica, sans-serif;
            background-image: url('{{ public_path("assets/images/membretado_gth.jpg") }}');
            background-size: cover; /* Asegura que la imagen cubra toda la página */
            height: 100vh; /* Asegura que la altura sea del 100% de la vista */
            color: #333; /* Color del texto */
            text-align: justify; /* Justifica el texto */
        }
        /* Estilos para la tabla del encabezado */
        .header-table {
            width: 100%;
            height: 100px; /* Altura total de la fila */
            border-collapse: collapse; /* Para evitar bordes dobles */
        }
        .header-table td {
            text-align: center; /* Centrar el texto y contenido */
            vertical-align: middle; /* Centrar verticalmente */
        }
        .small-box {
            width: 100px; /* Ancho fijo para los cuadrados */
            height: 100px; /* Alto fijo para los cuadrados */
        }
        .large-box {
            width: calc(100% - 220px); /* Restar el ancho de las cajas pequeñas */
            height: 100px; /* Altura igual que las pequeñas */
            color: #000; /* Color del texto */
            padding: 10px; /* Espaciado interno */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Sombra opcional */
        }
        .university-info {
            padding: 0px; /* Espaciado interno */
            font-size: 10px; /* Tamaño de la información adicional */
            font-family: 'Gabriola';
        }
        /* Estilos para las tablas de contenido */
        .content {
            padding: 20px; /* Espaciado interno */
            margin: 18px 45px 42px 45px; /* Márgenes: superior, derecho, inferior, izquierdo */
        }
        h3, h1 {
            text-align: center; /* Centra los títulos */
            margin: 0; /* Elimina el espaciado entre títulos */
        }
        p {
            margin: 1px 0; /* Reduce el margen entre párrafos */
        }
        .content-table {
            width: 100%; /* Asegura que la tabla use el ancho completo */
            border-collapse: collapse; /* Colapsa los bordes de las celdas */
        }
        .content-table th, .content-table td {
            border: 1px solid #000; /* Establece un borde */
            padding: 10px; /* Espaciado interno de celdas */
            text-align: left; /* Alineación de texto en celdas */
        }
        .content-table {
            width: 100%; /* Asegura que la tabla use el ancho completo */
        }
    </style>
</head>
<body>
    <div class="content">
        <table class="header-table">
            <tr>
                <td class="small-box">
                    <img src="{{ public_path('assets/images/escudo.png') }}" alt="Escudo Universidad Pública de El Alto" height="92">
                </td>
                <td class="large-box">
                    <div class="university-info">
                        <img src="{{ public_path('assets/images/info.png') }}" alt=" Universidad Pública de El Alto"height="40"><br>
                        Creada por ley 2115 del 5 de septiembre de 2000<br>
                        Autónoma por Ley 2556 del 12 de noviembre de 2003
                    </div>
                </td>
                <td class="small-box">
                    <img src="{{ public_path('assets/images/logo.png') }}" alt="Logo Gestión Turística y Hotelera" height="132">
                </td>
            </tr>
        </table>

        <h3>CARRERA DE GESTIÓN TURÍSTICA Y HOTELERA</h3>
        <h1>ACTA DE DEFENSA FINAL PÚBLICA DE</h1>
        <h1>TRABAJO DIRIGIDO</h1>
        <br>
        <p>
            En la ciudad de El Alto, a horas {{ $acta->hora_comienzo }} del día <b>{{ $acta->fecha_acta }}</b>, en {{ $acta->lugar }} 
            de la Universidad Pública de El Alto, zona villa esperanza, se efectuó la defensa final pública del <b>TRABAJO DIRIGIDO</b> 
            de las postulantes:
        </p>

        <br><b>{{-- Insertar Estudiante --}}
        </b>

        <p>
            Para el acto y cumplimiento de lo dispuesto en el Art. 27 del reglamento general sobre tipos y modalidades de graduación 
            del estatuto orgánico, reglamento específico de modalidades de graduación de TRABAJO DIRIGIDO emitido mediante resolución 
            del honorable consejo de carrera Nº {{ $acta->num_resolucion }}, se designa a los tribunales:
        </p>

        <br>{{-- Insertar tribunales --}}

        <p>
            Conforme al reglamento de trabajo dirigido cumplidas las condiciones para el trámite, preparación, revisión, presentación y 
            sustentación públicas del TRABAJO DIRIGIDO y en cumplimiento a las disposiciones contenidas en el reglamento específicos de 
            modalidades de graduación respectivos de la carrera de gestión turística hotelera se procedió a dicha presentación y defensa 
            pública de: TRABAJO DIRIGIDO.
        </p>
        <div style="height: 20px;"></div>
        <table class="content-table">
            <tr>
              <th>TÍTULO:</th>
              <td>{{ $acta->titulo }}</td>
            </tr>
            <tr>
              <th>TUTOR ACADÉMICO:</th>
              <td>{{ $acta->tutor_acta_id }}</td>
            </tr>
        </table>
        <div style="height: 20px;"></div>
        <p>
            Luego de la exposición y defensa del trabajo dirigido por las postulantes en obediencia a lo dispuesto por los reglamentos vigentes, 
            en reunión reservada, el tribunal decide otorgar la siguiente calificación:
        </p>
        <br>
        <b>RESUMEN DE NOTAS OBTENIDAS</b>
        <div style="height: 20px;"></div>

        <table class="content-table">
            <tr>
              <th>DEFENSA</th>
              <th>FECHA</th>
              <th>CALIFICACIÓN</th>
              <th>VALORACIÓN</th>
            </tr>
            <tr>
              <td>Perfil de trabajo dirigido</td>
              <td>Fila 2 Columna 2</td>
              <td>Fila 2 Columna 3</td>
              <td>Fila 2 Columna 4</td>
            </tr>
            <tr>
              <td>Defensa gran borrador del trabajo dirigido</td>
              <td>Fila 3 Columna 2</td>
              <td>Fila 3 Columna 3</td>
              <td>Fila 3 Columna 4</td>
            </tr>
            <tr>
              <td>Defensa final</td>
              <td>Fila 4 Columna 2</td>
              <td>Fila 4 Columna 3</td>
              <td>Fila 4 Columna 4</td>
            </tr>
          </table>
        <div style="height: 20px;"></div>
        <p>
            <b>Calificación total:</b> Defensa pública final trabajo dirigido.
            <div style="height: 20px;"></div>
            <b>Numeral:</b> {{ $acta->calificacion_total }}    <b>Literal:</b> {{ $acta->calificacion_literal }}.
            <br>
            <b>Valoración:</b> {{ $acta->valoracion }}.
        </p>
        <br><br>
        <p>
            Por tanto, el (las) postulantes, aprueban el trabajo dirigido, obteniendo el título 
            licenciatura en gestión turística y hotelera, con lo que terminó el acto a horas {{ $acta->hora_fin }}
            y para su constancia firman el presente documento los miembros del tribunal.
        </p>
        <div style="height: 60px;"></div>
        <table class="header-table">
            <tr>
                <td>_____________________</td>
                <td>_____________________</td>
                <td>_____________________</td>
            </tr>
            <tr>
                <th>TRIBUNAL</th>
                <th>TRIBUNAL</th>
                <th>TRIBUNAL</th>
            </tr>
            <tr>
                <td>Nombre</td>
                <td>Nombre</td>
                <td>Nombre</td>
            </tr>
            <tr>
                <td>C.I</td>
                <td>C.I</td>
                <td>C.I</td>
            </tr>
        </table>
        <div style="height: 50px;"></div>
        <table class="header-table">
            <tr>
                <td></td>
                <td>_____________________</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <th>DIRECTOR</th>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>nombre</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>C.I </td>
                <td></td>
            </tr>
        </table>
        <div style="height: 20px;"></div>
        <p>Estudiante ID: {{ $acta->estudiante_id }}</p>
        <p>Estudiante: {{ $acta->estudiante_id }}</p>
    </div>
</body>
</html>

