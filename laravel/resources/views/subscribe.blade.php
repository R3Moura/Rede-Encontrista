@extends('layouts.master')
@section('title')
    Rede Encontrista: Inscrever em curso
@endsection
@section('page-title')

    Inscrever em curso
@endsection
@section('main')
    <div class="main">
        <section ng-app="app" ng-controller="ctrl">
            <% %>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="curso">Curso</label>
                    <div class="col-md-9">

                        <select class="form-control" name="meetings"
                                ng-options="meeting | label for meeting in meetings  track by meeting.id"
                                ng-model="meetingsSelected" ng-change="change()"></select>

                    </div>
                </div>

                <div class="form-horizontal hide" ng-class="selected">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="curso">Local</label>
                        <div class="col-md-7">
                            <p class="form-control-static"> <% meeting.place%></p>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="curso">Inicio</label>
                        <div class="col-md-7">
                            <p class="form-control-static"> <% meeting.start_date | date:"custom"%></p>
                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="curso">Fim</label>
                        <div class="col-md-6">
                            <p class="form-control-static"> <% meeting.end_date  | date:"custom"%></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="curso">Estado</label>
                        <div class="col-md-9 container-fluid">
                            <div class="col-sm-3 col-md-3  text-center">
                                <div ng-if="status.subscribed" type="button" class="alert alert-success">Inscrito
                                </div>
                                <div ng-if="!status.subscribed" type="button" class="alert alert-danger"> Não
                                    Inscrito
                                </div>
                            </div>
                            <div ng-if="status.subscribed" class="col-sm-3 col-md-3  text-center ">
                                <div ng-if="cursoInfo.participate" type="button" class="alert  alert-success">Realziado
                                </div>
                                <div ng-if="!cursoInfo.participate" type="button" class="alert alert-danger"> Faltou
                                </div>
                            </div>
                            <div ng-if="status.subscribed" class="col-sm-3 col-md-3  text-center ">
                                <div ng-if="status.payed" type="button" class="alert  alert-success">Pago</div>
                                <div ng-if="!status.payed" type="button" class="alert alert-danger"> Por Pagar</div>
                            </div>
                            <div ng-if="status.subscribed" class="col-sm-3 col-md-3  text-center ">
                                <div type="button" class="alert  alert-info"><% status.role%></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="curso">Descrição</label>
                        <div class="col-md-9">
                            <p class="form-control-static" ng-bind-html="meeting_type.description"></p>
                        </div>
                    </div>
                    <div class="form-group  ">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <div class="btn-group">
                                    @Perm('course.unsubscribe.me')
                                    <a ng-class="unsubscribeStateClass" class="btn btn-danger " ng-click="unsubscribe()"
                                       role="button">Desinscrever-me</a>
                                    @endPerm
                                    @Perm('course.subscribe.me')
                                    <a ng-class="subscribeStateClass" class="btn btn-success " ng-click="subscribe()"
                                       role="button">Inscrever-me</a>
                                    @endPerm
                                    @Perm('course.subscribe.group')
                                    <a href="#" class="btn btn-info  " role="button">Inscrever Grupo</a>
                                    @endPerm

                                </div>
                            </div>
                        </div>
                    </div>


                    <h2>Pessoas a Inscrever</h2>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            João António - joao.antonio@shalom.pt
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            Luis Duarte - luis.duarte@shalom.pt
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            Ana Filomena - ana.filomena@shalom.pt
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="float">Inscrever</button>
                        <button type="submit" class="float">Desinscrever</button>
                    </div>

                    <h2>Lista de Inscritos (6 no total)</h2>


                </div>
        </section>
    </div>

@stop

@section('javascript-asset')

    <script>
        var admin = false;
        var urlMeetingList = "{{URL::route('meetings.json.list')}}?filter=future";
        var urlMeetingInfo = "{{URL::route('meetings.json.info',':id')}}";
        var urlMeetingSubscribe = "{{URL::route('meetings.subscribe',':id')}}";
        var urlMeetingUnsubscribe = "{{URL::route('meetings.unsubscribe',':id')}}";
    </script>
    <script src="{{asset('js/angular/app.js')}}"></script>
    <script src="{{asset('js/angular/meetings/serv.js')}}"></script>
    <script src="{{asset('js/angular/meetings/filterLabel.js')}}"></script>
    <script src="{{asset('js/angular/meetings/ctrl.js')}}"></script>

@endsection


