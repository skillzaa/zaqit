<div class="btn-group">
    @if($data['enabled']=="all")
    <div class="btn-group">
        <a  class="btn btn-sm  btn-success" href={{URL('student/enabled/all')}}>All</a>
        <a  class="btn btn-sm  btn-secondary" href={{URL('student/enabled/enabled')}}>Enabled</a>
        <a  class="btn btn-sm  btn-secondary" href={{URL('student/enabled/disabled')}}>Disabled</a>
    </div>

    @elseif($data['enabled']=="enabled")

    <div class="btn-group">
        <a  class="btn btn-sm  btn-secondary" href={{URL('student/enabled/all')}}>All</a>
        <a  class="btn btn-sm  btn-success" href={{URL('student/enabled/enabled')}}>Enabled</a>
        <a  class="btn btn-sm  btn-secondary" href={{URL('student/enabled/disabled')}}>Disabled</a>
    </div>

    @elseif($data['enabled']=="disabled")

    <div class="btn-group">
        <a  class="btn btn-sm  btn-secondary" href={{URL('student/enabled/all')}}>All</a>
        <a  class="btn btn-sm  btn-secondary" href={{URL('student/enabled/enabled')}}>Enabled</a>
        <a  class="btn btn-sm  btn-success" href={{URL('student/enabled/disabled')}}>Disabled</a>
    </div>

    @endif
  </div>
