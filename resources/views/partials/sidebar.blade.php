<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{route('dashboard')}}">INVENTORY</a>
            <a class="navbar-brand hidden" href="{{route('dashboard')}}"><img src="{{asset('application_css_js/images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('dashboard*') ? 'active' : ''}}">
                    <a href="{{route('dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li class="{{Request::is('employee*') ? 'active' : ''}}">
                    <a href="{{route('employees')}}"> <i class="menu-icon fa fa-users"></i>Manage Employee</a>
                </li>
                <li class="{{Request::is('customer*') ? 'active' : ''}}">
                <a  style="color:" href="{{route('all.customer')}}"> <i class="menu-icon fa fa-h-square"></i>Manage Customer
                </a>
                </li>
                <li class="{{Request::is('supplier*') ? 'active' : ''}}">
                <a href="{{route('all.supplier')}}"> <i class="menu-icon fa fa-road"></i>Supplier
                </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->