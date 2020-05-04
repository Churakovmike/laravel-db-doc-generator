<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1>{{$presenter->getTableName()}}</h1>TODO:description from model
    <div>TODO:associated with model App\User.php</div>
    <h2>Table columns</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
            <tr>
                <th>Column</th>
                <th>Type</th>
                <th>Comment</th>
                <th>Default</th>
                <th>Not null</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($presenter->getColumns() as $column)
            <tr>
                <td>{{$column->getName()}}</td>
                <td>{{$column->getType()}}</td>
                <td>{{$column->getComment()}}</td>
                <td>{{$column->getDefaultValue()}}</td>
                <td>{{$column->getIsNull()}}</td>
                <td>{{$column->getOptions()}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <h2>TODO:Foreign Keys</h2>
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
    <h2>TODO:Indexes</h2>
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