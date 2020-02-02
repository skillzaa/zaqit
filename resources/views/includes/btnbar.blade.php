
<div class="btn-group">
<a  class="btn btn-sm  
{{($data['param']=="all")? " btn-success " : "btn-secondary"}}
" href={{URL('student/query/all')}}>All</a>

<a  class="btn btn-sm  
{{($data['param']=="enabled")? " btn-success " : "btn-secondary"}}
" href={{URL('student/query/enabled')}}>Enabled</a>

<a  class="btn btn-sm  
{{($data['param']=="disabled")? " btn-success " : "btn-secondary"}}
" href={{URL('student/query/disabled')}}>Disabled</a>


<a  class="btn btn-sm  
{{($data['param']=="student")? " btn-success " : "btn-secondary"}}
" href={{URL('student/query/student')}}>Student</a>

<a  class="btn btn-sm  
{{($data['param']=="teacher")? " btn-success " : "btn-secondary"}}
" href={{URL('student/query/teacher')}}>Teacher</a>

<a  class="btn btn-sm  
{{($data['param']=="supervisor")? " btn-success " : "btn-secondary"}}
" href={{URL('student/query/supervisor')}}>Supervisor</a>
</div>

    
