<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Legajo - {{ $alumno->apellido }}, {{ $alumno->nombre }}</title>

    <style>
        body {
            font-family: times;
            font-size: 12px;
            margin: 40px;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 5px;
        }

        h2 {
            font-size: 15px;
            margin-top: 25px;
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
            padding-bottom: 4px;
        }

        .encabezado {
            text-align: center;
            margin-bottom: 25px;
        }

        .subtitulo {
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 7px;
            text-align: left;
        }

        th {
            width: 30%;
            font-weight: bold;
        }

        .seccion {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>

    {{-- ENCABEZADO --}}
    <div class="encabezado">

        <h1>LEGAJO DEL ALUMNO</h1>

        <div class="subtitulo">
            EPET N°20
        </div>

    </div>


    {{-- DATOS DEL ALUMNO --}}
    <div class="seccion">

        <h2>Datos personales</h2>

        <table>

            <tr>
                <th>Apellido</th>
                <td>{{ $alumno->apellido }}</td>
            </tr>

            <tr>
                <th>Nombre</th>
                <td>{{ $alumno->nombre }}</td>
            </tr>

            <tr>
                <th>DNI</th>
                <td>{{ $alumno->dni }}</td>
            </tr>

            <tr>
                <th>Fecha de nacimiento</th>
                <td>
                    {{ $alumno->fecha_nacimiento
                        ? \Carbon\Carbon::parse($alumno->fecha_nacimiento)->format('d/m/Y')
                        : '-' }}
                </td>
            </tr>

            <tr>
                <th>Teléfono</th>
                <td>{{ $alumno->telefono ?? '-' }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $alumno->email ?? '-' }}</td>
            </tr>

        </table>

    </div>


    {{-- DATOS ACADÉMICOS --}}
    <div class="seccion">

        <h2>Datos académicos</h2>

        <table>

            <tr>
                <th>Curso</th>
                <td>
                    {{ $alumno->curso->curso ?? '-' }}
                </td>
            </tr>

            <tr>
                <th>División</th>
                <td>
                    {{ $alumno->division->division ?? '-' }}
                </td>
            </tr>

        </table>

    </div>


    {{-- DOCUMENTACIÓN --}}
    <div class="seccion">

        <h2>Documentación</h2>

        <table>

            <tr>
                <th>Acta de nacimiento</th>
                <td>{{ $alumno->acta_nacimiento ?? '-' }}</td>
            </tr>

            <tr>
                <th>Inscripción</th>
                <td>{{ $alumno->inscripcion ?? '-' }}</td>
            </tr>

            <tr>
                <th>Constancia de alumno regular</th>
                <td>{{ $alumno->constanciaregular ?? '-' }}</td>
            </tr>

            <tr>
                <th>Apto para herramientas</th>
                <td>{{ $alumno->apto_herramientas ?? '-' }}</td>
            </tr>

            <tr>
                <th>Certificado 7°</th>
                <td>{{ $alumno->certificado7mo ?? '-' }}</td>
            </tr>

        </table>

    </div>


    {{-- FAMILIARES --}}
    @if ($alumno->familiares && $alumno->familiares->count())

        <div class="seccion">

            <h2>Familiares</h2>

            @foreach ($alumno->familiares as $familiar)

                <table>

                    <tr>
                        <th>Nombre</th>
                        <td>{{ $familiar->nombre ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Apellido</th>
                        <td>{{ $familiar->apellido ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>DNI</th>
                        <td>{{ $familiar->dni ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Fecha de nacimiento</th>
                        <td>
                            {{ $familiar->fecha_nacimiento
                                ? \Carbon\Carbon::parse($familiar->fecha_nacimiento)->format('d/m/Y')
                                : '-' }}
                        </td>
                    </tr>

                    <tr>
                        <th>Teléfono</th>
                        <td>{{ $familiar->telefono ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Domicilio</th>
                        <td>{{ $familiar->domicilio ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $familiar->email ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Parentesco</th>
                        <td>{{ $familiar->parentezco ?? '-' }}</td>
                    </tr>

                </table>

            @endforeach

        </div>

    @endif

</body>
</html>