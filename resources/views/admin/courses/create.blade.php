@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.courses.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.courses.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('teachers_id', trans('quickadmin.courses.fields.teachers').'', ['class' => 'control-label']) !!}
                    {!! Form::select('teachers_id', $teachers, old('teachers_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('teachers_id'))
                        <p class="help-block">
                            {{ $errors->first('teachers_id') }}
                        </p>
                    @endif
                </div>
            </div>






                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('title', trans('quickadmin.courses.fields.title').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('title'))
                                    <p class="help-block">
                                        {{ $errors->first('title') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('description', trans('quickadmin.courses.fields.description').'', ['class' => 'control-label']) !!}
                                {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('description'))
                                    <p class="help-block">
                                        {{ $errors->first('description') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('course_image', trans('quickadmin.courses.fields.course-image').'', ['class' => 'control-label']) !!}
                                {!! Form::file('course_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                                {!! Form::hidden('course_image_max_size', 2) !!}
                                {!! Form::hidden('course_image_max_width', 4096) !!}
                                {!! Form::hidden('course_image_max_height', 4096) !!}
                                <p class="help-block"></p>
                                @if($errors->has('course_image'))
                                    <p class="help-block">
                                        {{ $errors->first('course_image') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('start_date', trans('quickadmin.courses.fields.start-date').'', ['class' => 'control-label']) !!}
                                {!! Form::text('start_date', old('start_date'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('start_date'))
                                    <p class="help-block">
                                        {{ $errors->first('start_date') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('published', trans('quickadmin.courses.fields.published').'', ['class' => 'control-label']) !!}
                                {!! Form::hidden('published', 0) !!}
                                {!! Form::checkbox('published', 1, old('published', false), []) !!}
                                <p class="help-block"></p>
                                @if($errors->has('published'))
                                    <p class="help-block">
                                        {{ $errors->first('published') }}
                                    </p>
                                @endif
                            </div>
                        </div>







        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });

        });
    </script>

@stop
