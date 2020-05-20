<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1>{{$presenter->getTableName()}}</h1>
    @if(!empty($presenter->getModelClassName()))
        <div>Associated with model {{$presenter->getModelClassName()}}</div>
    @endif
    <h2>@lang('churakovmike_dbdoc::dbdoc.table-header')</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
            <tr>
                <th>@lang('churakovmike_dbdoc::dbdoc.table-column')</th>
                <th>@lang('churakovmike_dbdoc::dbdoc.table-column-type')</th>
                <th>@lang('churakovmike_dbdoc::dbdoc.table-column-comment')</th>
                <th>@lang('churakovmike_dbdoc::dbdoc.table-column-default')</th>
                <th>@lang('churakovmike_dbdoc::dbdoc.table-column-not-null')</th>
                <th>@lang('churakovmike_dbdoc::dbdoc.table-column-options')</th>
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
