@component('components.modal')
    @slot('title')
        {{ __('davidbase.auth.logout.title') }}
    @endslot
    <form id="logout" action="{{ route('logout') }}" method="post">
        {{ csrf_field() }}
        <p>{{ __('davidbase.auth.logout.confirm') }}</p>
    </form>
    @slot('footer')
        <button type="submit" form="logout" class="btn btn-danger">
            {{ __('davidbase.auth.logout.button') }}
        </button>
    @endslot
@endcomponent