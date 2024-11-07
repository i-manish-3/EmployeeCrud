<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .rounded-circle {
        width: 50px;            
        height: 50px;          
        object-fit: cover;     
        border-radius: 50%;      
        border: 2px solid #ccc; 
    }
</style>
<div class="container mt-5">
    <h2>Employee List</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Desigination</th>
                <th>Address</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->desigination }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>
                        @if($employee->image)
                            <img src="{{ asset('storage/' . $employee->image) }}" class="rounded-circle">
                            {{-- <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" width="50"> --}}
                            {{-- {{$employee->image}} --}}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
