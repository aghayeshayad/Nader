@if (count($breadcrumbs))

    <h3 class="kt-subheader__title">
        داشبورد
    </h3>
    <span class="kt-subheader__separator kt-hidden"></span>
    <div class="kt-subheader__breadcrumbs">
        <a href="{{ route('admin.dashboard.index') }}"
           class="kt-subheader__breadcrumbs-home">
            <i class="flaticon2-shelter"></i>
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <a href="{{ $breadcrumb->url }}" class="kt-subheader__breadcrumbs-link">
                    {{ $breadcrumb->title }}
                </a>
            @else
                <a class="kt-subheader__breadcrumbs-link">
                    ~ {{ $breadcrumb->title }}
                </a>
            @endif
        @endforeach
    </div>

@endif
