<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Laravel 8 Import and Export CSV & Excel to Database Example
        </h2>

        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
             @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <label for="customFile">Example file input</label>
                <input type="file" name="file" class="form-control-file" id="customFile" value="{{ csrf_token() }}">
            </div>
                 <button class="btn btn-primary">Import data</button>
                 <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>

            <!-- <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left form-group">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
            <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a> -->


        </form>
    </div>
</body>

</html>