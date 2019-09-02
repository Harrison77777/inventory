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
                    <a style="color:{{Request::is('dashboard*') ? 'red!important;' : ''}}" href="{{route('dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li class="{{Request::is('post*') ? 'active' : ''}}">
                    <a style="color:{{Request::is('pos*') ? 'red!important;' : ''}}" href="{{route('pos')}}"> <i class="menu-icon fa fa-shopping-cart"></i>Point Of Sale</a>
                </li>
                <li class="{{Request::is('salesReport*') ? 'active' : ''}}">
                    <a style="color:{{Request::is('salesReport*') ? 'red!important;' : ''}}" href="{{route('salesReport')}}"> <i class="menu-icon fa fa-pagelines"></i>Sales Report</a>
                </li>
                <li class="{{Request::is('employee*') ? 'active' : ''}}">
                    <a style="color:{{Request::is('employee*') ? 'red!important;' : ''}}" href="{{route('employees')}}"> <i class="menu-icon fa fa-users"></i>Manage Employees</a>
                </li>
                <li class="{{Request::is('customer*') ? 'active' : ''}}">
                <a style="color:{{Request::is('customer*') ? 'red!important;' : ''}}" style="color:" href="{{route('all.customer')}}"> <i class="menu-icon fa fa-h-square"></i>Manage Customer
                </a>
                </li>
                <li class="{{Request::is('supplier*') ? 'active' : ''}}">
                <a style="color:{{Request::is('supplier*') ? 'red!important;' : ''}}" href="{{route('all.supplier')}}"> <i class="menu-icon fa fa-road"></i>Suppliers
                </a>
                </li>
                <li class="{{Request::is('salary*') ? 'active' : ''}}">
                <a style="color:{{Request::is('salary*') ? 'red!important;' : ''}}" href="{{route('all.salary')}}"> <i class="menu-icon fa fa-money"></i>Manage Salaries
                </a>
                </li>
                <li  class="{{Request::is('category*') ? 'active' : ''}}">
                <a style="color:{{Request::is('category*') ? 'red!important;' : ''}}" href="{{route('all.category')}}"> <i class="menu-icon fa fa-folder-open"></i>Manage Product Category
                </a>
                </li>
                <li class="{{Request::is('product*') ? 'active' : ''}}">
                <a style="color:{{Request::is('product*') ? 'red!important;' : ''}}" href="{{route('all.product')}}"> <i class="menu-icon fa fa-truck"></i>Manage Products 
                </a>
                </li>
                <li class="{{Request::is('expanse*') ? 'active' : ''}}">
                <a style="color:{{Request::is('expanse*') ? 'red!important;' : ''}}" href="{{route('all.expanse')}}"> <i class="menu-icon fa fa-strikethrough"></i>Manage Expanses 
                </a>
                </li>
                <li class="{{Request::is('attendance*') ? 'active' : ''}}">
                <a style="color:{{Request::is('attendance*') ? 'red!important;' : ''}}" href="{{route('attendance')}}"> <i class="menu-icon fa fa-hand-o-up"></i>Manage Attendance 
                </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->