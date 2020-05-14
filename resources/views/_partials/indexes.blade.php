<?php
/** @var \ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface $presenter */
?>
@if(count($presenter->getIndexes()) > 0)
<h2>Indexes</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered">
        <thead>
        <tr>
            <th>Index name</th>
            <th>Index fields</th>
        </tr>
        </thead>
        <tbody>
        @foreach($presenter->getIndexes() as $index)
        <tr>
            <td>{{$index->getName()}}</td>
            <td>{{$index->getColumns()}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
