@extends('templates.master')

@section('title', 'Manage User')
@section('head')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

@endsection

@section('content') 

<h1 class="border-bottom pb-2"> Manage Users</h1>
    @csrf
    
    <table class="table table-striped" id="users" width="100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Company</td>
                <td></td>
            </tr>
        </thead>
        @foreach ($users as $user)
        @if ($user->user_type === 'USER')
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->company->company_name }}</td>
            <td class="d-flex justify-content-evenly">

                <a href="{{ url('admin/edit-user/'. $user->id) }}" class="btn btn-success btn-sm" title="Edit"> <i class="fa-solid fa-pen-to-square"></i></a> 
                

                {{-- <button type="submit" class="btn btn-success btn-sm" title="Edit"> <i class="fa-solid fa-pen-to-square"></i></button> --}}
                {{--<button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>--}}

                <form action="{{ route('delete_user') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" id="user_id" name="user_id" value="{{ $user['id'] }}">
                    
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" data-toggle="tooltip"> <i class="fa-solid fa-trash"></i></button> 
                </form>
            </td>
        </tr>
        @endif

        @endforeach
        </table>
        
        <script>
            $(document).ready(function () {
                $('#users').DataTable({
                    scrollX: true,
                });
            });
        </script>

@endsection