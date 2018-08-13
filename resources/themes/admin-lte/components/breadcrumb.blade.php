<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">
            <i class="fa fa-dashboard"></i>
            {{ __('davidbase.breadcrumb.dashboard') }}
        </a>
    </li>
    {{ $slot }}
</ol>