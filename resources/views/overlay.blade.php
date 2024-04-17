@foreach (glob(base_path('resources/views/partials/overlay/overlay-*.blade.php')) as $file)
    @include(str_replace('.blade.php', '', str_replace(base_path('resources/views/'), '', $file)))
@endforeach
