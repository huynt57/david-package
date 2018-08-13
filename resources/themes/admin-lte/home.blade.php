@component('layouts.admin')
    @slot('title')
        {{ __('davidbase.pages.home.title') }}
    @endslot
    @slot('heading')
        <i class="fa fa-fw fa-dashboard"></i>
        {{ __('davidbase.pages.home.heading') }}
    @endslot
    @foreach($elements as $element)
        @component($element)
        @endcomponent
    @endforeach
@endcomponent