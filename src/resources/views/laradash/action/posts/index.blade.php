@extends('laradash.theme.app')
@include('laradash.utils.success-error')

@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container-fluid content">
    <div class="card">
        @yield('success-error')
        <div class="card-header">
            <div class="card-title mb-0">
                <span class="section-title">All Posts</span>
            </div>
        </div>
        <div class="card-body">
            <table id="articles" class="table table-sm table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Publish Date</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Views</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $item)
                    <tr>
                        <td>{{ $item->created_at }}</td>
                        <td class="text-center">{{ $item->title }}</td>
                        <td class="text-center">{{ $item->views ?? 0 }}</td>
                        <td class="text-center" style="width:150px;">
                            <a href="{{ $item->frontUrl() }}" class="btn btn-sm btn-outline-primary">
                                <i class="far fa-eye"></i>
                            </a>  
                            <a href="{{url('admin/posts/'.$item->id.'/edit')}}" class="btn btn-sm btn-outline-success">
                                <i class="far fa-edit"></i>
                            </a>  
                            <a href="#" class="btn btn-sm btn-outline-danger" onclick="setAction('{{url('admin/posts/'.$item->id)}}')">
                                <i class="fas fa-trash-alt"></i>
                            </a>                             
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('laradash.utils.delete-modal')

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#articles').DataTable({
        'scrollX':true,
        "order": [[ 0, "desc" ]]
    });
    function setAction(url){
        if(url==""){
            alert('Something went wrong.');
            return;
        }

        $('#deleteModalForm').attr('action',url);
        $('#deleteModal').modal('show');
    }
</script>
@endsection