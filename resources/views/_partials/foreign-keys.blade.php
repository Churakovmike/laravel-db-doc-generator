<?php
/** @var \ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface $presenter */
?>
@if(count($presenter->getForeignKeys()) > 0)
<h2>@lang('churakovmike_dbdoc::dbdoc.table-foreign-keys')</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered">
        <thead>
        <tr>
            <th>@lang('churakovmike_dbdoc::dbdoc.table-foreign-keys-name')</th>
            <th>@lang('churakovmike_dbdoc::dbdoc.table-foreign-keys-field')</th>
            <th>@lang('churakovmike_dbdoc::dbdoc.table-foreign-keys-ref-table')</th>
            <th>@lang('churakovmike_dbdoc::dbdoc.table-foreign-keys-ref-field')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($presenter->getForeignKeys() as $foreignKey)
            <tr>
                <td>{{$foreignKey->getName()}}</td>
                <td>{{$foreignKey->getForeignTableName()}}</td>
                <td>{{$foreignKey->getColumnNames()}}</td>
                <td>{{$foreignKey->getForeignColumns()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
