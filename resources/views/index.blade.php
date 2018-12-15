@extends('firefly::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="page-info">
                <h1 class="mb-0">{{ __('Discussions') }}</h1>

                <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">All Discussions</li>
                    </ol>
                </div>
            </div>

            @if (! count($discussions))
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-yellow mb-0" role="alert">
                            <strong>{{ __('Holy guacamole!') }}</strong><br>
                            {{ __('There are no discussions; You could be the first to create one.') }}
                        </div>
                    </div>
                </div>
            @endif

            @include('firefly::partials.discussion-list')

            {!! $discussions->links(config('firefly.pagination.view')) !!}
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">{{ __('Groups') }}</h3>
                </div>

                <div class="list-group list-group-flush">
                    @foreach ($groups as $group)
                        <a href="{{ route('firefly.group.show', $group) }}" class="list-group-item list-group-item-action">
                            <div class="group-display group-display-small mr-3 mb-0" style="background: {{ $group->color }};"></div>

                            <span>{{ $group->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
