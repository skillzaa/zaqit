<div>
    Current Page:<span class="text-danger">
        {{($data['questions']->currentPage())}}
        </span>
    Total  Pages:<span class="text-danger">
        {{($data['questions']->lastPage())}}
        </span>
    Per Page:<span class="text-danger">
        {{($data['questions']->perPage())}}
        </span>
    Total:<span class="text-danger">
        {{($data['questions']->total())}}
        </span>
</div>
