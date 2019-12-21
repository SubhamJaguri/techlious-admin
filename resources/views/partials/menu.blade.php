<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('product_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-shopping-cart">

                        </i>
                        <span>{{ trans('cruds.productManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('product_category_access')
                            <li class="{{ request()->is('admin/product-categories') || request()->is('admin/product-categories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.product-categories.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.productCategory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('product_tag_access')
                            <li class="{{ request()->is('admin/product-tags') || request()->is('admin/product-tags/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.product-tags.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.productTag.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="{{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.products.index") }}">
                                    <i class="fa-fw fas fa-shopping-cart">

                                    </i>
                                    <span>{{ trans('cruds.product.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('location_access')
                            <li class="{{ request()->is('admin/locations') || request()->is('admin/locations/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.locations.index") }}">
                                    <i class="fa-fw fas fa-map-marker-alt">

                                    </i>
                                    <span>{{ trans('cruds.location.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('content_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.contentManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('content_category_access')
                            <li class="{{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.content-categories.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.contentCategory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('content_tag_access')
                            <li class="{{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.content-tags.index") }}">
                                    <i class="fa-fw fas fa-tags">

                                    </i>
                                    <span>{{ trans('cruds.contentTag.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('content_page_access')
                            <li class="{{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.content-pages.index") }}">
                                    <i class="fa-fw fas fa-file">

                                    </i>
                                    <span>{{ trans('cruds.contentPage.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('agent_access')
                <li class="{{ request()->is('admin/agents') || request()->is('admin/agents/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.agents.index") }}">
                        <i class="fa-fw fas fa-user-check">

                        </i>
                        <span>{{ trans('cruds.agent.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('order_access')
                <li class="{{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.orders.index") }}">
                        <i class="fa-fw fas fa-gift">

                        </i>
                        <span>{{ trans('cruds.order.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('development_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-code">

                        </i>
                        <span>{{ trans('cruds.development.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('metum_access')
                            <li class="{{ request()->is('admin/meta') || request()->is('admin/meta/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.meta.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.metum.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>