@component('account.master')

    @slot('title')
        Nhật ký hoạt động
    @endslot

    @slot('breadcrumb')
        <li class="active">Nhật ký hoạt động</li>
    @endslot

    @component('components.box', ['bodyClass'=>'no-padding'])
        @slot('title')
            Hoạt động gần đây
        @endslot
        @slot('footer')
            @component('components.paginate', ['collection'=>$activities])
            @endcomponent
        @endslot
        <table class="table table-striped">
            <thead>
            <tr>
                <th>HOẠT ĐỘNG</th>
                <th>THỜI GIAN</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->description }}</td>
                    <td>
                        @component('components.ago', ['time'=>$activity->created_at])
                        @endcomponent
                    </td>
                    <td>
                        <a href="" class="btn btn-xs btn-primary">
                            <i class="fa fa-search"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endcomponent

@endcomponent