@component('layouts.admin')
    @slot('title', 'Nhật ký hoạt động')
    @slot('breadcrumb')
        <li class="active">Nhật ký hoạt động</li>
    @endslot

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <button class="btn btn-danger btn-sm btn-toggle" onclick="deleteActivities()" disabled>
                        <i class="fa fa-trash-o fa-fw"></i>
                        <span>XÓA</span>
                    </button>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped has-images v-middle">
                        <thead>
                        <tr>
                            <th style="width: 10px"><input type="checkbox" class="check-all"></th>
                            <th class="text-center">THÀNH VIÊN</th>
                            <th class="text-center">HOẠT ĐỘNG</th>
                            <th class="text-center">THỜI GIAN</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(! $activities->count())
                            <tr>
                                <td colspan="5" class="text-center text-bold text-danger">
                                    CHƯA CÓ HOẠT ĐỘNG NÀO DIỄN RA
                                </td>
                            </tr>
                        @else
                            @foreach($activities as $activity)
                                <tr>
                                    <td><input type="checkbox" form="activities" name="activities[]" value="{{ $activity->getKey() }}"></td>
                                    <td>
                                        <img src="{{ $activity->causer->avatar or '' }}" class="img-thumbnail">
                                        <a href="{{ route('users.show', $activity->causer) }}" class="link">{{ $activity->causer->name or '' }}</a>
                                        <span>{{ $activity->causer->email or '' }}</span>
                                    </td>
                                    <td class="text-center">{{ $activity->description }}</td>
                                    <td class="text-center">
                                        @component('components.ago', ['time'=>$activity->created_at])
                                        @endcomponent
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteActivity({{ $activity->getKey() }})">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    @component('components.paginate', ['collection' => $activities])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>

    <form id="delete-activity" action="" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
    </form>

    <form id="activities" action="{{ route('activities.delete') }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>

    <script>
        function deleteActivity(id) {
            if(confirm("Bạn có chắc muốn xóa hoạt động này")) {
                var form = document.getElementById("delete-activity");
                form.action = "/activities/"+id;
                form.submit();
            }
        }

        function deleteActivities() {
            if(confirm("Bạn có chắc chắn muốn xóa các hoạt động đã chọn")) {
                document.getElementById("activities").submit();
            }
        }
    </script>

@endcomponent