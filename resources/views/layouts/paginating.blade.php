<nav aria-label="Page navigation">
    <ul class="pagination">                
        @if ($data->currentPage() != 1)
        <li class="page-item">
            <a class="page-link" href="{!! str_replace('/?','?',$data->url($data->currentPage() - 1)) !!}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @endif
        @for ($i = 1; $i <=  $data->lastPage(); $i++)
        <li class="page-item {!! ($data->currentPage() == $i)? 'active':'' !!}">
            @if($data->currentPage() != $i)
            <a class="page-link" href="{!! str_replace('/?','?',$data->url($i)) !!}">{!! $i !!}</a>
            @else 
            <a class="page-link">{!! $i !!}</a>
            @endif
        </li>
        @endfor
        @if ($data->currentPage() != $data->lastPage())
        <li class="page-item">
            <a class="page-link" href="{!! str_replace('/?','?',$data->url($data->currentPage() + 1)) !!}" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @endif
    </ul>
</nav>