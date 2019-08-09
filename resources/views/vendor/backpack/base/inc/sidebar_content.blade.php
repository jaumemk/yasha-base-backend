<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->

<li class="header">Main</li>

<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ __('backpack::base.dashboard') }}</span></a></li>

<li><a href="{{ backpack_url('menu-item') }}"><i class="fa fa-list"></i> <span>{{ __('yasha/backend::sidebar.menu-item') }}</span></a></li>

<li><a href="{{ backpack_url('page') }}"><i class="fa fa-file"></i> <span>{{ __('yasha/backend::sidebar.page') }}</span></a></li>

@includeIf('vendor/backpack/base/inc/sidebar_content')

<li class="header">Advanced</li>

<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ __('backpack::crud.file_manager') }}</span></a></li>

<li><a href="{{ backpack_url('server') }}"><i class="fa fa-server"></i> <span>{{ __('yasha/backend::sidebar.server') }}</span></a></li>

<li><a href='{{route("log-viewer::logs.list")}}'><i class='fa fa-history'></i> <span>Logs</span></a></li>