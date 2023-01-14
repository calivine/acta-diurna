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
            <div class="col-md-3"> 
                <h2>Edit Podcast Episode</h2>
            </div>
            <div class="col-md-9">
                <button class="btn btn-link" data-toggle="modal" data-target="#confirm-delete-modal">Delete Episode
                </button>
            </div>
            @include('modules.confirm-delete', ['modalId' => 'confirm-delete-modal', 'param' => $podcast, 'route' => 'podcasts.destroy'])
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-10">
                
                <section class="update-podcast-container">
                    {{--
                    Updates the Podcast Resource
                    --}}
                    <form id="update-podcast" action="{{ route('podcasts.update', $podcast->id) }}" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <label for="pod-description">Episode Description</label>
                        <textarea id="pod-description" name="description" cols="35" rows="5">{!! $podcast->description !!}</textarea>
                        
                        <div class="update-thumbnail-container">

                            <label for="file">Update Thumbnail Image</label>

                            @include('modules.thumbnail', ['imgSource' => $podcast->thumbnail])

                            
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
                            <button type="submit">Update</button>

                        </div>
                        
                        
                    </form>
                </section>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <section>
                    @foreach($podcast->images->sortBy('position') as $image)
                        @if($image->filename != $podcast->thumbnail)
                            @include('panel.partials.edit-image',['loop' => $loop, 'image' => $image, 'podcast' => $podcast] )
                        @endif
                    @endforeach
    
                </section>
            </div>
            
        </div>

        <div class="row justify-content-center">
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



@endsection

