@extends('admin.Layout.app')

@section('main-content')
    <div class="panel-body">
        <table id="example1"
               class="table table-striped table-bordered dt-responsive  table-responsive "
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>CV </th>

                <th>Remarks</th>


            </tr>
            </thead>
            <tbody>
            @if(isset($jobseeker))
                @foreach($jobseeker as $row)
                    <tr>
                        <td>{{$row->id }}</td>
                        <td>{{$row->name }}</td>
                        <td>{{$row->email }}</td>
                        <td>@if($row->cv_status==1)
                                <a href="{{route('seeker_cv',$row->id)}}">
                                    <button class="btn btn-primary btn-sm" data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="">view</button>
                                </a>

                            @endif
                        </td>
                        <td></td>

                    </tr>
                @endforeach
            @endif


            </tbody>

        </table>
    </div>


@endsection
