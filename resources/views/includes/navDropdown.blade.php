

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Create
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a  class="dropdown-item"  href="{{ url('/subject/create') }}">Subject</a>

  <a class="dropdown-item" href="{{ url('/level/create') }}">Level</a>
  <a class="dropdown-item" href="{{ url('/displayheading/create') }}">Display Heading</a>

  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="{{ url('/question/create') }}">Question</a>
  <a class="dropdown-item" href="#">Paper</a>
</div>
</li>
