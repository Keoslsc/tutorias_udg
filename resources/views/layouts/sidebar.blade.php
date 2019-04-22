<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            
            @if(Auth::user()->hasRole('admin'))
            <!-- Admin -->


                <!-- Convocatories -->
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon icon-note"></i> Convocatories</a>
                    <ul class="nav-dropdown-items">

                        <!-- Create -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('convocatory.create') }}">
                            <i class="nav-icon icon-plus"></i> Create</a>
                        </li>

                        <!-- View -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('convocatory.index') }}">
                            <i class="nav-icon icon-list"></i> View list</a>
                        </li>
                    </ul>
                </li>

                <!-- Divisions -->
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon icon-calculator"></i> Divisions</a>
                    <ul class="nav-dropdown-items">

                        <!-- Create -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('division.create') }}">
                            <i class="nav-icon icon-plus"></i> Create</a>
                        </li>

                        <!-- View -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('division.index') }}">
                            <i class="nav-icon icon-list"></i> View list</a>
                        </li>
                    </ul>
                </li>

                <!-- Divisions -->
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon icon-notebook"></i> Careers</a>
                    <ul class="nav-dropdown-items">

                        <!-- Create -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('career.create') }}">
                            <i class="nav-icon icon-plus"></i> Create</a>
                        </li>

                        <!-- View -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('career.index') }}">
                            <i class="nav-icon icon-list"></i> View list</a>
                        </li>
                    </ul>
                </li>


                <!-- Divisions -->
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon icon-note"></i> Modules</a>
                    <ul class="nav-dropdown-items">

                        <!-- Create -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('module.create') }}">
                            <i class="nav-icon icon-plus"></i> Create</a>
                        </li>

                        <!-- View -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('module.index') }}">
                            <i class="nav-icon icon-list"></i> View list</a>
                        </li>
                    </ul>
                </li>


                
            @elseif(Auth::user()->hasRole('tutor'))
            <!-- Tutor -->
            @else
            <!-- Student -->
            @endif



        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>