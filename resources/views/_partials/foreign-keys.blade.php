<?php
/** @var \ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface $presenter */
?>
@if(count($presenter->getForeignKeys()) > 0)
<h2>Foreign Keys</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered">
        <thead>
        <tr>
            <th>Key's name</th>
            <th>On field</th>
            <th>Reference table</th>
            <th>Reference field</th>
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
