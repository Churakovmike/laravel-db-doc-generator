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