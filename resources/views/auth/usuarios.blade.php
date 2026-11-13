@extends('layouts.app')
@section ('contenido')
<table class="tabla-usuarios">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Rol</th>
            @if (session('rol')==='secretaria')
            <th>Acciones</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->tipo_rol }}</td>

                @if (session('rol')==='secretaria')
                <td>
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="accion-btn" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"/>
                                <path d="M8 6V4h8v2"/>
                                <path d="M19 6l-1 14H6L5 6"/>
                                <path d="M10 11v6"/>
                                <path d="M14 11v6"/>
                            </svg>
                        </button>
                    </form>
                </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@endsection