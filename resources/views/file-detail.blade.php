@extends('layout.app')

@push('style')
    <style>
        .responsive-iframe-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }

        .responsive-iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
@endpush

@section('body')
<section>
    <div class="mb-10">
        <div class="">
            <h2 class="text-2xl font-medium">{{ $file->title }}</h2>
        </div>
        <div class="">
            <div class="">
                {!! $file->ringkasan !!}
            </div>
        </div>
    </div>
    <div class="responsive-iframe-container">
        <iframe src="{{ env('CLASSIFICATION_CONNECTION') . 'library?folder_path=' . $file->path }}" width="100"></iframe>
    </div>
</section>
@endsection