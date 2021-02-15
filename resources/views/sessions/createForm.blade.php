@extends("layouts.admin")

@section("page_title")
    Create Session
@endsection


@section("styles")
    @include("includes.styles.wyswyg")
    @include("includes.styles.select")
@endsection


@section("title")
    Create Session
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("sessions.index") }}">Sessions</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("sessions.store") }}" method="post">
                    {{ csrf_field() }}
                    <!-- Session Name -->
                    <div class="form-group mb-3">
                        <label for="name">Title</label>
                        <input required autofocus type="text"  id="name" value="{{old('name')}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Session Description -->
                    <div class="form-group mb-3">
                        <label for="summernote-basic">Description</label>
                        <textarea id="summernote-basic"  name="description" class="form-control @error('description') is-invalid @enderror" required>{!! old("description") !!}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Session Type -->
                    <div class="form-group mb-3">
                        <label for="example-select-1">Type</label>
                        <select name="type" class="form-control @error('type') is-invalid @enderror" id="example-select-1" required>
                            @foreach(EVENT_SESSION_TYPES as $type)
                              <option value={{$type}} onselect="{{$selected_type = $type}}" >{{ str_replace('_'," ",$type)}}</option>
                             @endforeach
                        </select>
                         @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Session Rooms -->
                    <div class="form-group mb-3">
                        <label for="example-select">Room</label>
                        <select name="room_id"  class="form-control @error('room_id') is-invalid @enderror" id="example-select" required>
                            <option value="">Select Room</option>
                            @foreach($rooms as $room)
                              <option value={{$room->id}}>{{$room->name}}</option>
                             @endforeach
                        </select>
                         @error('room_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Start Time and End Time -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Start Time</label>
                            <input  name="start_time" type="datetime-local" class="form-control"/>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">End Time</label>
                                <input  name="end_time" type="datetime-local" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Vimeo URL -->
                        <div class="form-group">
                            <label class="form-label">Vimeo URL</label>
                            <input name="vimeo_url" type="number" class="form-control"/>
                        </div>
                 
                    <!-- Zoom Webinar Id -->
                    <div class="form-group">
                        <label class="form-label">Zoom Webinar Id</label>
                        <input type="number"  name="zoom_webinar_id" class="form-control"/>
                    </div>

                    <!-- Zoom Password -->
                    <div class="form-group">
                        <label class="form-label">Zoom Webinar Password</label>
                        <input type="number"  name="zoom_password" class="form-control"/>
                    </div>

                    <!-- Past Video Recording -->
                    <div class="form-group">
                        <label class="form-label">Past Video Recording</label>
                        <input type="number"  name="past_video" class="form-control"/>
                    </div>
                 

                    <!-- Speakers -->
                    <div class="mb-3">
                        <label for="user">Select Speaker</label>
                        <select class="form-control select2-multiple @error('userids') is-invalid @enderror" id="speakers" name="speakers[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                            @foreach($speakers as $user)
                            <option value={{$user->id}}>{{$user->name}} ({{$user->email}}) </option>
                            @endforeach
                        </select> 
                    </div>


                     <!-- Zoom Direct URL -->
                     <div class="form-group">
                        <label class="form-label">Zoom Url (In case we want an external link)</label>
                        <input type="string"  name="zoom_url" class="form-control"/>
                    </div>

                    <div>
                        <input class="btn btn-primary" type="submit" value="Create" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
@include("includes.scripts.wyswyg")

@include("includes.scripts.select")
@endsection
