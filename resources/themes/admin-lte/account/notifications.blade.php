@component('account.master')

    @slot('title')
        Thông báo
    @endslot

    @slot('heading')
        Thông báo
    @endslot

    @slot('breadcrumb')
        <li class="active">Thông báo</li>
    @endslot

    @if($notifications->count() == 0)
        <div class="alert alert-warning">
            Hiện tại, bạn chưa có thông báo nào.
        </div>
    @else
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Thông báo</h3>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    @foreach($notifications as $notification)
                        <li>
                            <a href="{{ route('notifications.show', $notification) }}">
                                {{ $notification->data['message'] }}
                                <span class="label label-default pull-right">
                                    {{ $notification->created_at->diffForHumans() }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endcomponent