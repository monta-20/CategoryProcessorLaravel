<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            background-color: white; /* White container for contrast */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 20px; /* Padding for better spacing */
        }
        h2 {
            color: #007bff; /* Bootstrap primary color */
        }
        .table thead th {
            background-color: #007bff; /* Primary color for table header */
            color: white; /* White text for contrast */
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2; /* Light gray for odd rows */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Categories</h2>
        @if ($message = Session::get('msg'))
             <div class="alert alert-success" role="alert">
                  {{ $message }}
             </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                       <td> <a class="btn btn-danger" href="/category/delete/{{ $category->id }}">Delete</a></td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
        @if($categories->isEmpty())
            <div class="alert alert-info" role="alert">
                No categories found.
            </div>
        @endif
    </div>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
