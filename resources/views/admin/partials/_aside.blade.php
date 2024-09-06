<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                  <a href="{{ route('empresa.index') }}">
                    <i class="fa fa-users"></i> <span> Empresa </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('quartos.index') }}">
                    <i class="fa fa-bed"></i> <span> Quartos </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('galeria.index') }}">
                    <i class="fa fa-file-image-o"></i> <span> Galeria </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('auditorio.index') }}">
                    <i class="mdi mdi-microphone"></i> <span> Auditório </span>
                  </a>
                </li>

                @if(Auth::User()->nivel == 1)
                  <li>
                      <a href="{{ route('historico.index') }}">
                          <i class="dripicons-document"></i> <span> Histórico de Atividades </span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('usuario.index') }}">
                          <i class="fa fa-user"></i> <span> Usuários </span>
                      </a>
                  </li>
                @endif
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
