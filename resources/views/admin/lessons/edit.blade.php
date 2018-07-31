@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.lessons.title')</h3>

    {!! Form::model($lesson, ['method' => 'PUT', 'route' => ['admin.lessons.update', $lesson->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('course_id', trans('quickadmin.lessons.fields.course').'', ['class' => 'control-label']) !!}
                    {!! Form::select('course_id', $courses, old('course_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('course_id'))
                        <p class="help-block">
                            {{ $errors->first('course_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.lessons.fields.title').'*', ['class' => 'control-label']) !!}
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
                    @if ($lesson->lesson_image)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$lesson->lesson_image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$lesson->lesson_image) }}"></a>
                    @endif
                    {!! Form::label('lesson_image', trans('quickadmin.lessons.fields.lesson-image').'', ['class' => 'control-label']) !!}
                    {!! Form::file('lesson_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('lesson_image_max_size', 2) !!}
                    {!! Form::hidden('lesson_image_max_width', 4096) !!}
                    {!! Form::hidden('lesson_image_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lesson_image'))
                        <p class="help-block">
                            {{ $errors->first('lesson_image') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('short_text', trans('quickadmin.lessons.fields.short-text').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('short_text', old('short_text'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('short_text'))
                        <p class="help-block">
                            {{ $errors->first('short_text') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('full_text', trans('quickadmin.lessons.fields.full-text').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('full_text', old('full_text'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('full_text'))
                        <p class="help-block">
                            {{ $errors->first('full_text') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('position', trans('quickadmin.lessons.fields.position').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('position', old('position'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('position'))
                        <p class="help-block">
                            {{ $errors->first('position') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('downloadable_files', trans('quickadmin.lessons.fields.downloadable-files').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('downloadable_files', old('downloadable_files')) !!}
                    @if ($lesson->downloadable_files)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $lesson->downloadable_files) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('downloadable_files', ['class' => 'form-control']) !!}
                    {!! Form::hidden('downloadable_files_max_size', 8) !!}
                    <p class="help-block"></p>
                    @if($errors->has('downloadable_files'))
                        <p class="help-block">
                            {{ $errors->first('downloadable_files') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('free_lesson', trans('quickadmin.lessons.fields.free-lesson').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('free_lesson', 0) !!}
                    {!! Form::checkbox('free_lesson', 1, old('free_lesson', old('free_lesson')), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('free_lesson'))
                        <p class="help-block">
                            {{ $errors->first('free_lesson') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('published', trans('quickadmin.lessons.fields.published').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, old('published', old('published')), []) !!}
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

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

@stop
