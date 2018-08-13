<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">{{ $title ?? '' }}</h4>
</div>
<div class="modal-body">
    {{ $slot }}
</div>
@isset($footer)
    <div class="modal-footer">
        {{ $footer }}
    </div>
@endisset