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
        @page {
    size: A4;
    margin: 15mm;
}

.contenedor-imagen {
    width: 180mm;
    height: 260mm;
    text-align: center;
    vertical-align: middle;
}

.imagen-documento {
    max-width: 180mm;
    max-height: 260mm;
    width: auto;
    height: auto;
}
    </style>
</head>

<body>

    {{-- ENCABEZADO --}}
    <div class="encabezado">

        <h1>LEGAJO DE {{ strtoupper($alumno->apellido) }} {{ strtoupper($alumno->nombre)}}</h1>

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
            <tr>
                <th>Curso</th>
                <td>
                    {{ $alumno->curso->curso ?? '-' }}{{ $alumno->division->division ?? '-' }}
                </td>
            </tr>
        </table>

    </div>
    {{-- DOCUMENTOS --}}
@if ($alumno->documentos && $alumno->documentos->count())

    <div class="seccion">

        <h2>Documentos</h2>

        @foreach ($alumno->documentos as $documento)

            <table>

                <tr>
                    <th>Nombre</th>
                    <td>{{ $documento->nombre ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Tipo</th>
                    <td>{{ $documento->tipo ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Año</th>
                    <td>{{ $documento->año ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Copia</th>
                    <td>
                        {{ $documento->copia ? 'Sí' : 'No' }}
                    </td>
                </tr>

            </table>
            @if ($documento->archivo_adj)
    <div class="contenedor-imagen">
        <img
            src="{{ public_path($documento->archivo_adj) }}"
            class="imagen-documento"
        >
    </div>
    @endif
        @endforeach

    </div>

@endif
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
                        <td>{{ $familiar->parentesco ?? '-' }}</td>
                    </tr>

                </table>

            @endforeach

        </div>

    @endif

</body>
</html>