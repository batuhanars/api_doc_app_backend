@extends('layouts.main')
@section('title', $project->title)
@section('content')

    <div class="container">
        <h3 class="page-title">
            {{ $project->title }}
            <small>
                <a href="{{ route('projects.index') }}">Projeler</a>
                /
                <span class="text-muted">{{ $project->title }}</span>
            </small>
        </h3>
        <div class="panel">
            <div class="panel-heading">
                <div style="display:flex;">
                    <h3 class="panel-title">
                        <form>
                            <input type="text" class="form-control" name="alt-proje" placeholder="Ara..."
                                value="{{ request()->get('alt-proje') }}">
                        </form>
                    </h3>
                    @if (request()->get('alt-proje'))
                        <a href="{{ route('sub-projects.index', $project) }}" class="btn btn-sm btn-light"
                            style="margin-left: 10px;">
                            <i class="fas fa-arrows-spin"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Proje</th>
                            <th>Tarih</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subProjects as $subProject)
                            <tr>
                                <td>
                                    <i class="fas fa-folder text-muted"></i>
                                    {{ $subProject->title }}
                                </td>
                                <td>{{ $subProject->created_at }}</td>
                                <td style="text-align:end;">
                                    <a href="{{ route('panel.index', [$project, $subProject]) }}"
                                        class="btn btn-primary btn-sm">Panele Bağlan</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END TABLE HOVER -->
    </div>

    </div>
    <!-- END MAIN CONTENT -->
@endsection
