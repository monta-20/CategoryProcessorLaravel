<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category Form</title>
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
        .btn-primary {
            background-color: #28a745; /* Green color for the button */
            border: none; /* Remove border */
        }
        .btn-primary:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Create a New Category</h2>
        <form action="/category/add" method="POST">
            <!-- CSRF Token (important for Laravel) -->
            @csrf

            <!-- Category Name Input -->
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="categoryName" name="name" placeholder="Enter category name" value = {{ @old('name') }}>
            </div>
             @error("name")
             {{-- name in input name="name" --}}
                 {{ $message }}
             @enderror
            <!-- Category Description Input -->
            <div class="mb-3">
                <label for="categoryDescription" class="form-label">Category Description</label>
                <textarea class="form-control" id="categoryDescription" name="description" rows="3" placeholder="Enter category description" value = {{ @old('description') }}></textarea>
            </div>
            @error("description")
               {{ $message }}
            @enderror

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
