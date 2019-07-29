@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cities</div>

                <div class="card-body">
                    <h2>List of Cities:-</h2>
                    <a href="{{ route('admin.cities.create') }}" class="btn btn-sm btn-primary">Add New City</a> 
                    <br><br>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        @forelse($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->name }}</td>
                                <td>
                                    <a href="{{ route('admin.cities.edit',$city->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form method="POST" action="{{ route('admin.cities.destroy',$city->id) }}">
                                        {{ method_field('DELETE') }}
                                        @csrf 
                                        <input class="btn btn-sm btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No Records Found</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
