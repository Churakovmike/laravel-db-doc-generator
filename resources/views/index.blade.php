<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css">
    <title>DbDocumentator</title>
</head>
<body>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.html">DbDocumentor</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <!--<a class="nav-link" href="#">Sign out</a>-->
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        @include('churakovmike_dbdoc::menu', [
            'tables' => $tables,
        ])
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h1>table_name</h1>description from model
            <div>associated with model App\User.php</div>
            <h2>Table columns</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                    <tr>
                        <th>Column</th>
                        <th>Type</th>
                        <th>Comment</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>id</td>
                        <td>big integer</td>
                        <td>comment from database + model comment</td>
                        <td>PRIMARY_KEY, AUTOINCREMENT</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>varchar(128)</td>
                        <td>comment from database + model comment</td>
                        <td>UNIQUE</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>varchar(128)</td>
                        <td>comment from database + model comment</td>
                        <td> - </td>
                    </tr>
                    <tr>
                        <td>biography</td>
                        <td>text</td>
                        <td>comment from database + model comment</td>
                        <td> - </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h2>Foreign Keys</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                    <tr>
                        <th>Key's name</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>id</td>
                        <td>big integer</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>varchar(128)</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>varchar(128)</td>
                    </tr>
                    <tr>
                        <td>biography</td>
                        <td>text</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h2>Indexes</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                    <tr>
                        <th>Key's name</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>id</td>
                        <td>big integer</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>varchar(128)</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>varchar(128)</td>
                    </tr>
                    <tr>
                        <td>biography</td>
                        <td>text</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
  feather.replace()
</script>
</body>
</html>
