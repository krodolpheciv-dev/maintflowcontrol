@php
    $routeName = Route::currentRouteName();
    $page = config("breadcrumbs.$routeName");
@endphp

@if($page)
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">

            {{-- Breadcrumb --}}
            <div class="col-md-12">
                <ul class="breadcrumb">
                    @foreach($page['items'] as $item)
                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                            @if(isset($item['route']) && !$loop->last)
                                <a href="{{ route($item['route']) }}">
                                    {{ $item['label'] }}
                                </a>
                            @else
                                {{ $item['label'] }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Title --}}
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">{{ $page['title'] }}</h2>
                </div>
            </div>

        </div>
    </div>
</div>
@endif
