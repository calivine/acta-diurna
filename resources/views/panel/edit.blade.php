@extends('layouts.master')

@section('content')
    <div class="container-fluid">
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
                <button class="btn btn-link" data-toggle="modal" data-target="#confirm-delete-modal">Delete Episode
                </button>
            </div>
            @include('modules.confirm-delete', ['modalId' => 'confirm-delete-modal', 'param' => $podcast, 'route' => 'podcasts.destroy'])
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <hgroup>
                    <h1 class="post-title">  {{ $podcast->title }}</h1>
                </hgroup>
                <p class="post-date">{{ $podcast->published->format('F jS, Y') }} </p>
                <section>
                    {{--
                    Updates the Podcast Resource
                    --}}
                    <form class="p-3 md-14" id="update-podcast" action="{{ route('podcasts.update', $podcast->id) }}" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <textarea name="description" cols="50" rows="10">{!! $podcast->description !!}</textarea>
                        @include('modules.figure', ['imgSource' => $podcast->thumbnail])

                        <label for="file">Update Thumbnail Image</label>
                        <div class="box" id="update-thumbnail">
                            <div class="box-input">
                                <input class="box-file" type="file" name="uploadThumbnailFile" id="thumbnailFile"
                                       data-multiple-caption="{count} files selected"/>
                                <label for="thumbnailFile"><strong>Choose a file</strong><span class="box-dragndrop"> or drag it here</span>.</label>
                            </div>
                            <div class="box-uploading">Uploading...</div>
                            <div class="box-success">Done!</div>
                            <div class="box-error">Error! <span></span>.</div>
                        </div>
                        <button type="submit">Upload</button>
                    </form>
                </section>

                <section>
                    @foreach($podcast->images->sortByDesc('position') as $image)
                        @if($image->filename != $podcast->thumbnail)
                            @include('panel.partials.edit-image',['loop' => $loop, 'image' => $image, 'podcast' => $podcast] )
                        @endif
                    @endforeach

                </section>

                <section>
                    <h4 class="my-1">Upload Image(s)</h4>
                    <form action="{{ route('podcasts.images.store', $podcast->id) }}" class="box" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="POST">

                            <div class="box">
                                <div class="box-input">
                                    <input class="box-file" type="file" name="uploadFile[]" id="file"
                                           data-multiple-caption="{count} files selected" multiple/>
                                    <label for="file"><strong>Choose a file</strong><span class="box-dragndrop"> or drag it here</span>.</label>
                                </div>
                                <div class="box-uploading" id="upload-display">Uploading...</div>
                                <div class="box-success">Done!</div>
                                <div class="box-error">Error! <span></span>.</div>
                            </div>
                        <button class="" type="submit">Save</button>
                        <div class="upload-results-container"></div>
                    </form>

                </section>


            </div>
        </div>
    </div>



@endsection

