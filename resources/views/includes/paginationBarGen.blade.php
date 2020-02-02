<div>
    Current Page:<span class="text-danger">
        {{($data['data']->currentPage())}}
        </span>
    Total  Pages:<span class="text-danger">
        {{($data['data']->lastPage())}}
        </span>
    Per Page:<span class="text-danger">
        {{($data['data']->perPage())}}
        </span>
    Total:<span class="text-danger">
        {{($data['data']->total())}}
        </span>
</div>
