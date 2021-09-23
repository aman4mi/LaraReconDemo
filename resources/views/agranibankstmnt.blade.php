<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agrani BANK Import Export Excel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Script -->
    <script type="text/javascript">
        var routeUrl = '';
        $(document).ready(function () {
            $("#fileReset").click(function () {
                document.getElementById("customFile").value = null;
            });

            $("#imBtn").click(function () {
                var file = $("#customFile").val();
                var afterDot = file.substr(file.indexOf("."));
                if (!file) {
                    alert("No File Selected ");
                    return;
                }
                if (afterDot == ".xlsx" || afterDot == ".xls") {
                    routeUrl =  document.getElementById("myForm").action = "{{ route('ag-bank-file-import') }}";
                    routeUrl =  document.getElementById("myForm").method = "POST";
                } else {
                    routeUrl =  document.getElementById("myForm").action = "";
                    routeUrl =  document.getElementById("myForm").method = "";

                    alert("Not a correct file type, Select Excel");
                    return;
                }
            });
        });

    </script>
</head>

<body>
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Agrani BANK Excel to Database
        </h2>
        <!-- {{ route('ledger-file-import') }}   -->
        <form id="myForm" action="" method="" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <label for="customFile">Bank id</label>
                <input type="text" value="1" name="bank_id" />
                <input type="file" name="file" class="form-control-file" id="customFile" value="{{ csrf_token() }}" />
            </div>
            <button class="btn btn-primary" id="imBtn">Import data</button>

        </form>
    </div>
</body>

</html>
