<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-5">
    <h2>{{ isset($employee) ? 'Edit Employee' : 'Add Employee' }}</h2>

    <form action="{{ isset($employee) ? route('employees.update', $employee) : route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($employee))
            @method('PUT')
        @endif

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name ?? '') }}">
        </div>

        <div class="form-group">
            <label>Desigination</label>
            <input type="text" name="desigination" class="form-control" value="{{ old('desigination', $employee->desigination ?? '') }}">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $employee->address ?? '') }}">
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control-file">
            @if(isset($employee) && $employee->image)
                <img src="{{ asset('storage/' . $employee->image) }}" width="50" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">{{ isset($employee) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
