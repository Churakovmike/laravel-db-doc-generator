<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            @foreach($tables as $table)
                <li class="nav-item">
                    @if(isset($currentTable) && $currentTable == $table)
                        <a class="nav-link active" href="{{$table}}.html">
                            {!! $table !!}
                        </a>
                    @else
                        <a class="nav-link" href="{{$table}}.html">
                            {!! $table !!}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</nav>
