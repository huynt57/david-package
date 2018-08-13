<div class="box box-{{ $boxClass or 'default' }}">
    @isset($header)
        <div class="box-header with-border">{{ $header }}</div>
    @endisset
    <div class="box-body {{ $bodyClass or 'no-padding' }}">
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="box-footer">{{ $footer }}</div>
    @endisset
</div>