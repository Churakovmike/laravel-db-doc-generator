<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1>{{$presenter->getTableName()}}</h1>
    @if(!empty($presenter->getModelClassName()))
        <div>Associated with model {{$presenter->getModelClassName()}}</div>
    @endif
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
    @include('churakovmike_dbdoc::_partials.foreign-keys', [
        'presenter' => $presenter,
    ])
    @include('churakovmike_dbdoc::_partials.indexes', [
        'presenter' => $presenter,
    ])
</main>
