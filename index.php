<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


</head>

<body>
    <div id="wrap">
        <div class="container">
            <div class="row">
            
                <form class="form-horizontal col-md-8" action="import_csv.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Form</legend>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>
            <table class="table table-striped" id="prices">
                <thead>
                  <tr>
                    <!-- <th>serial</th> -->
                    <th>Prefix</th>
                    <th>Named Route Name</th>
                    <th>Rates in GBP incl.VAT </th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#prices').DataTable( {
                       ajax: {
                            url: 'prices_list.php',
                            dataSrc: 'price'
                        },
                        columns: [ 
                            // { data: 'id' },
                            { data: 'prefix' },
                            { data: 'country' },
                            { data: 'rate' } 
                        ],
                        "order": [[ 1, "asc" ]]
                    } ); // data table
                } );
            </script>            
        </div>
    </div>
</body>

</html>