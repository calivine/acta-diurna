@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">{{ $podcast->published }} </p>
                <hgroup>
                    <h1 class="post__title">  {{ $podcast->title }}</h1>

                </hgroup>




                <section>
                    <textarea cols="50" rows="10">{!! $podcast->description !!}</textarea>

                    <form class="p-3 md-14" action="{{ route('podcasts.update', $podcast->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <div class="row">
                            <div class="box">
                                <div class="box__input">
                                    <input class="box__file" type="file" name="uploadFile[]" id="file"
                                           data-multiple-caption="{count} files selected" multiple/>
                                    <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                                    <button class="" type="submit">Upload</button>
                                </div>
                                <div class="box__uploading">Uploading...</div>
                                <div class="box__success">Done!</div>
                                <div class="box__error">Error! <span></span>.</div>
                            </div>

                        </div>
                    </form>
                </section>

                <section>
                    @foreach($podcast->images as $image)
                        @include('modules.figure', ['imgSource' => $image->filename])
                        <form action="{{ route('images.update', $image->id) }}" class="p-3 md-14" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <label for="{{ 'photo-' . $loop->iteration . '-caption' }}" class="mb-0">Caption</label>
                                <input type="text" id="{{ 'photo-' . $loop->iteration . '-caption' }}" class="form-control mb-0" name="{{ 'photo-' . $loop->iteration . '-caption' }}">
                            </div>
                            <button class="" type="submit">Save</button>
                        </form>

                    @endforeach

                </section>


            </div>
        </div>
    </div>



@endsection

