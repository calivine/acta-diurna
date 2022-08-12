@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                @if ($podcast->rss == 'Pending')
                    Publish episode?
                    <form action="{{ route('podcasts.publish', $podcast->id) }}" method="POST">
                        {{ csrf_field() }}
                        <label for="podcast-rss" class="mb-0">RSS Link</label>
                        <input type="text" id="podcast-rss" class="px-0 form-control mb-3 mt-0" name="rss">
                        <button class="" type="submit">Publish</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <button class="btn btn-link" data-toggle="modal" data-target="#confirm-delete-modal">Delete Episode</button>
            </div>
            @include('modules.confirm-delete', ['modalId' => 'confirm-delete-modal', 'param' => $podcast, 'route' => 'podcasts.destroy'])
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="post__date">{{ $podcast->published }} </p>
                <hgroup>
                    <h1 class="post__title">  {{ $podcast->title }}</h1>
                </hgroup>
                <section>
                    <form class="p-3 md-14" action="{{ route('podcasts.update', $podcast->id) }}" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <textarea name="description" cols="50" rows="10">{!! $podcast->description !!}</textarea>

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
                        <button class="btn btn-link" data-toggle="modal" data-target="#confirm-delete-img-modal">Delete Image</button>
                        @include('modules.confirm-delete', ['modalId' => 'confirm-delete-img-modal', 'param' => $image, 'route' => 'images.destroy'])
                        @include('modules.figure', ['imgSource' => $image->filename])
                        <form action="{{ route('images.update', $image->id) }}" class="p-3 md-14" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <label for="{{ 'photo-' . $loop->iteration . '-caption' }}" class="mb-0">Caption</label>
                                <input type="text" id="{{ 'photo-' . $loop->iteration . '-caption' }}"
                                       class="form-control mb-0" name="caption">
                            </div>
                            <button class="" type="submit">Save</button>
                        </form>

                    @endforeach

                </section>

                <section>
                    <h4 class="my-1">Upload Image</h4>
                    <form action="{{ route('podcasts.images.store', $podcast->id) }}" class="md-14" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="POST">
                        <div class="row">
                            <div class="box">
                                <div class="box__input">
                                    <input class="box__file" type="file" name="uploadFile[]" id="file"
                                           data-multiple-caption="{count} files selected" multiple/>
                                    <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="image_name" class="mb-0">Title</label>
                            <input type="text" id="image_name" class="form-control mb-0" name="filename">
                        </div>
                        <div class="row">
                            <label for="image_caption" class="mb-0">Caption</label>
                            <input type="text" id="image_caption" class="form-control mb-0" name="caption">
                        </div>
                        <button class="" type="submit">Save</button>
                    </form>
                </section>


            </div>
        </div>
    </div>



@endsection

