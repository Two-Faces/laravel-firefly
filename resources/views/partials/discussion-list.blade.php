@foreach ($discussions as $discussion)
    <div class="card mb-3">
        <div class="card-body">
            <div class="discussion-item d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('firefly.discussion.show', [$discussion->id, $discussion->slug]) }}">
                        <h3 class="mb-0">{{ $discussion->title }}</h3>
                    </a>

                    <div class="discussion-item-meta">
                        {{ $discussion->user->name }}
                        <span class="mx-2">{{ $discussion->created_at->diffForHumans() }}</span>
                        {{ $discussion->reply_count }}
                    </div>
                </div>

                <div class="d-flex">
                    @if ($discussion->pinned_at)
                        <i class="icon icon-pinned mr-2" data-toggle="tooltip" title="{{ __('Pinned') }}"></i>
                    @endif

                    @if ($discussion->locked_at)
                        <i class="icon icon-locked mr-2" data-toggle="tooltip" title="{{ __('Locked') }}"></i>
                    @endif

                    @foreach ($discussion->groups as $group)
                        <a href="{{ route('firefly.group.show', $group) }}"><div class="group-display mb-0" data-toggle="tooltip" title="{{ $group->name }}" style="background: {{ $group->color }};"></div></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endforeach
