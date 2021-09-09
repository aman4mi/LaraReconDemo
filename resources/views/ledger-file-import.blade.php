<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Import Export Excel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Script -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#fileReset").click(function () {
                    document.getElementById("customFile").value = null;
                });

                $("#imBtn").click(function () {
                    var file = $("#customFile").val();
                    var afterDot = file.substr(file.indexOf("."));
                    // debugger
                    if (!file) {
                        alert("No File Selected ");
                        return;
                    }
                    if (afterDot == ".xlsx" || afterDot == ".xls") {

                    }else{
                        alert("Not a correct file type");
                        return;
                    }
                });

            });
        </script>
    </head>

    <body>
        <div class="container mt-5 text-center">
            <h2 class="mb-4">
                Ledger Import to Database
            </h2>
            <!-- {{ route('ledger-file-import') }}   -->
            <form action="{{ route('ledger-file-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <label for="customFile">Example file input</label>
                    <input type="file" name="file" class="form-control-file" id="customFile" value="{{ csrf_token() }}" />
                </div>
                <button class="btn btn-primary" id="imBtn">Import data</button>
                <a class="btn btn-success" id="exBtn" href="{{ route('get-ledger-dataview') }}">Export data</a>
                <a class="btn btn-warning" id="fileReset">Reset</a>
            </form>
        </div>
    </body>
</html>
