@if($time instanceof Carbon\Carbon)
    {{ $time->diffForHumans() }}
    <a href="javascript:;" data-toggle="tooltip" title="{{ $time->format('H:i:s d/m/Y') }}">
        <i class="fa fa-question-circle"></i>
    </a>
@endif
