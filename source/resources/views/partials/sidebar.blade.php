<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-avatar">
                <div class="dropdown">
                    <div>
                        <img alt="image" class="img-circle avatar" width="100" src="{{ Auth::user()->present()->avatar }}">
                    </div>
                    <div class="name"><strong>{{ Auth::user()->present()->nameOrEmail }}</strong></div>
                </div>
            </li>
            <li class="{{ Request::is('/') ? 'active open' : ''  }}">
                <a href="{{ route('dashboard') }}" class="{{ Request::is('/') ? 'active' : ''  }}">
                    <i class="fa fa-dashboard fa-fw"></i> Trang tổng quan
                </a>
            </li>

            @permission('news.user')
            <li class="{{ Request::is('tin-tuc-noi-bo*') ? 'active open' : ''  }}">
                <a href="{{ route('newsuser.list') }}" class="{{ Request::is('tin-tuc-noi-bo*') ? 'active' : ''  }}">
                    <i class="fa fa-newspaper-o"></i> Tin tức
                </a>
            </li>
            @endpermission
            @permission('users.manage')
                <li class="{{ Request::is('user*') ? 'active open' : ''  }}">
                    <a href="{{ route('user.list') }}" class="{{ Request::is('user*') ? 'active' : ''  }}">
                        <i class="fa fa-users fa-fw"></i> @lang('app.users')
                    </a>
                </li>
            @endpermission

            @permission('newsAdmin.manage')
            <li class="{{ Request::is('quan-ly-tin-tuc*') ? 'active open' : ''  }}">
                <a href="#">
                    <i class="fa fa-gear fa-fw"></i> Quản lý tin tức
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ route('newsadmin.list') }}" class="{{ Request::is('quan-ly-tin-tuc*') ? 'active' : ''  }}">
                            <i class="fa fa-newspaper-o fa-fw"></i> Quản lý tin tức
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('catnewadmin.list') }}" class="{{ Request::is('quan-ly-category*') ? 'active' : ''  }}">
                            <i class="fa fa-newspaper-o fa-fw"></i> Quản lý category
                        </a>
                    </li>

                </ul>
            </li>
            @endpermission
            @permission('dictadmin.manage')
            <li class="{{ Request::is('quan-ly-tu-dien*') ? 'active open' : ''  }}">
                <a href="{{ route('dictadmin.list') }}" class="{{ Request::is('quan-ly-tu-dien*') ? 'active' : ''  }}">
                    <i class="fa fa-newspaper-o fa-fw"></i> Quản lý từ điển dược liệu
                </a>
            </li>
            @endpermission

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>