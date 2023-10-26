  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

   

      <li class="nav-item">
        <a class="nav-link" href="{{ route('reclamations.charts') }}" >
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
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link" href="/reclamationslist">
          <i class="bi bi-menu-button-wide"></i><span>Réclamations</span>
        </a>
      </li>


  
 

 
    </ul>

  </aside><!-- End Sidebar-->