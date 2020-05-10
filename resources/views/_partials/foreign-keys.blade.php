@if(count($presenter->getForeignKeys()) > 0)
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
@endif
