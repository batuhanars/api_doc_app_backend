@extends('layouts.main')
@section('title', 'Projeler')
@section('content')
    <div class="container">
        <h3 class="page-title">Projeler</h3>
        <div class="panel">
            <div class="panel-heading">
                <div style="display:flex;">
                    <h3 class="panel-title">
                        <form>
                            <input type="text" class="form-control" name="proje" placeholder="Ara..."
                                value="{{ request()->get('proje') }}">
                        </form>
                    </h3>
                    @if (request()->get('proje'))
                        <a href="{{ route('projects.index') }}" class="btn btn-sm btn-light" style="margin-left: 10px;">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <i class="fas fa-folder text-muted"></i>
                                    <a href="{{ route('sub-projects.index', $project) }}"
                                        style="width:80%; display: inline-block;">{{ $project->title }}</a>
                                </td>
                                <td>{{ $project->created_at }}</td>
                                <td></td>
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
