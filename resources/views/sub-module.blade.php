@extends('layouts.panel')
@section('title', $subModule->title)
@section('content')
    <div class="container-fluid">
        <h3 class="page-title">{{ $subModule->endpoint->title }}</h3>
        <h4 class="page-title"><span style="margin-right: 7px"
                class="label label-default">{{ $subModule->endpoint->url }}</span>
            @switch($subModule->endpoint->method)
                @case('GET')
                    <span class="label label-success">{{ $subModule->endpoint->method }}</span>
                @break

                @case('POST')
                    <span class="label label-primary">{{ $subModule->endpoint->method }}</span>
                @break

                @case('PUT')
                    <span class="label label-info">{{ $subModule->endpoint->method }}</span>
                @break

                @case('DELETE')
                    <span class="label label-danger">{{ $subModule->endpoint->method }}</span>
                @break
            @endswitch
        </h4>
        <div class="row">
            <div class="col-md-5">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Request</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Parametre</th>
                                    <th>Tip</th>
                                    <th>Durum</th>
                                    <th>Açıklama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parameters as $parameter)
                                    <tr>
                                        <td>{{ $parameter->title }}</td>
                                        <td>{{ $parameter->type }}</td>
                                        <td>{{ $parameter->status }}</td>
                                        <td>{{ $parameter->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END TABLE HOVER -->
            </div>
            <div class="col-md-7">
                <!-- TABLE HOVER -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">HTTP Durum Kodları</h3>
                    </div>
                    <div class="panel-body">
                        <pre>{{ $subModule->endpoint->result_content }}</pre>
                    </div>
                </div>
                <!-- END TABLE HOVER -->
            </div>
        </div>
    </div>
@endsection
