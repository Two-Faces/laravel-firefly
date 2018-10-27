@extends('firefly::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('firefly.discussion.edit', [$discussion->id, $discussion->slug]) }}" class="btn btn-info mr-3">{{ __('Edit') }}</a>

                <form action="{{ route('firefly.discussion.delete', [$discussion->id, $discussion->slug]) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger">{{ __('Delete') }}</button>
                </form>
            </div>

            @foreach ($posts as $post)
                <div class="list-group-item list-group-item-action mb-4">
                    <p>{{ $post->user->name }} {{ $post->created_at->diffForHumans() }}</p>

                    <p>{{ $post->content }}</p>
                </div>
            @endforeach

            <div class="mt-5">
                <new-post :discussion="{{ $discussion }}"  inline-template>
                    <form role="form" @submit.prevent="submit">
                        <div class="form-group">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea v-model="content" id="content" class="form-control" rows="3">{{ old('content') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-blue" v-show="content.length > 0">
                            {{ __('Submit Reply') }}
                        </button>
                    </form>
                </new-post>
            </div>
        </div>
    </div>
</div>
@endsection
