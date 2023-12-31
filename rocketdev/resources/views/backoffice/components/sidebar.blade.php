  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

   

      <li class="nav-item">
      <li class="nav-item">
        <a class="nav-link" href="/chart">
          <i class="bi bi-menu-button-wide"></i><span>Dashboard</span>
        </a>
      </li>
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Freelancer</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ request()->is('freelancers/*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li >
            <a  class="{{ request()->is('freelancers/create*') ? 'active' : '' }}" href="/freelancers/create">
              <i class="bi bi-circle"></i><span>Create Freelancer</span>
            </a>
          </li>
          <li >
            <a  class="{{ request()->is('freelancers/list*') ? 'active' : '' }}" href="/freelancers/list">
              <i class="bi bi-circle"></i><span>Freelancers List</span>
            </a>
          </li>
      
        </ul>
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Formations</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ request()->is('formations/*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li >
            <a  class="{{ request()->is('formations/create*') ? 'active' : '' }}" href="/formations/create">
              <i class="bi bi-circle"></i><span>Add Formation</span>
            </a>
          </li>
          <li >
            <a  class="{{ request()->is('formations/list*') ? 'active' : '' }}" href="/formations/list">
              <i class="bi bi-circle"></i><span>Formation List</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ request()->is('formations/*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li >
            <a  class="{{ request()->is('formations/create*') ? 'active' : '' }}" href="/events/create">
              <i class="bi bi-circle"></i><span>Add Event</span>
            </a>
          </li>
          <li >
            <a  class="{{ request()->is('formations/list*') ? 'active' : '' }}" href="/events/list">
              <i class="bi bi-circle"></i><span>Events List</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/projet/list">
          <i class="bi bi-menu-button-wide"></i><span>Projets</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/reclamationslist">
          <i class="bi bi-menu-button-wide"></i><span>Réclamations</span>
        </a>
      </li>
      
      
  </aside><!-- End Sidebar-->events/create