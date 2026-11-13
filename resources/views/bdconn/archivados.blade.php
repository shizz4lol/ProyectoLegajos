
@extends('layouts.app')

@section('contenido')
<div class="archivados-vista">
    <div class="archivados-header">
        <div>
            <h1>Legajos Archivados</h1>
            <p>Consulta los legajos que fueron archivados.</p>
        </div>

        <button class="btn-volver-lista" onclick="window.history.back()">
            Volver
        </button>
    </div>

    <div class="lista-archivados">
        @forelse ($archivados as $archivado)
            <div class="archivado-card">
                <div class="archivado-avatar">
                    <img src="{{ asset('imagen/usuario.png') }}" alt="Alumno">
                </div>

                <div class="archivado-info">
                    <div class="archivado-nombre">
                        <h2>{{ $archivado->nombre }} {{ $archivado->apellido }}</h2>
                        <span class="badge-archivado">ARCHIVADO</span>
                    </div>

                    <div class="archivado-datos">
                        <span>
                            <strong>DNI:</strong>
                            {{ $archivado->dni }}
                        </span>

                        <span>
                            <strong>Curso:</strong>
                            {{ $archivado->curso->curso ?? 'Sin curso' }}
                            {{ $archivado->division->division ?? '' }}
                        </span>

                        <span>
                            <strong>Fecha de archivo:</strong>
                            {{ $archivado->archivado_at->format('d/m/Y H:i') }}
                        </span>
                    </div>
                </div>

                <div class="acciones-archivado">
                    <a href="{{ route('alumnos', $archivado->id_alumno) }}" class="btn-ver-archivado">
                        Ver legajo →
                    </a>

                    @if (session('rol') === 'secretaria')
                        <form action="{{ route('alumnos.desarchivar', $archivado->id_alumno) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-submit" id="desarchivar">
                                Desarchivar
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="sin-archivados">
                <h3>No hay legajos archivados</h3>
                <p>No existen alumnos archivados actualmente.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
