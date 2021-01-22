<div id="sidebar" class="sidebar responsive ace-save-state">
    <ul class="nav nav-list">
        <li class="active">
            <a href="{{ route('dashboard.index')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
        </li>
        @can('view_user', 'create_user', 'edit_user', 'delete_user')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text"> Members </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                @can('create_user')
                    <li class="">
                        <a href="{{ route('user.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Adding Member
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                    <li class="">
                        <a href="{{ route('user.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View Users
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        @endcan
        @can('edit_role', 'create_role', 'view_all_role', 'permission_role')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-lock"></i>
                    <span class="menu-text"> Role </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    @can('create_role')
                    <li class="">
                        <a href="{{ route('role.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Adding Role
                        </a>
                        <b class="arrow"></b>
                    </li>
                    @endcan
                    <li class="">
                        <a href="{{ route('role.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View Roles
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        @endcan
        @can('edit_business', 'view_business', 'create_business', 'delete_business')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-briefcase" aria-hidden="true"></i>
                    <span class="menu-text"> Bussiness </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    @can('create_business')
                    <li class="">
                        <a href="{{ route('business.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Adding Bussiness
                        </a>
                        <b class="arrow"></b>
                    </li>
                    @endcan
                    <li class="">
                        <a href="{{ route('business.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View Bussiness
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        @endcan
        @can('edit_offer', 'view_offer', 'create_offer', 'create_tag_offer', 'edit_tag_offer', 'delete_tag_offer')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-gift"></i>
                    <span class="menu-text"> Offers </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    @can('create_offer')
                        <li class="">
                        <a href="{{ route('offer.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Adding Offers
                        </a>
                        <b class="arrow"></b>
                        </li>
                    @endcan
                    <li class="">
                    <a href="{{ route('offer.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        View Offers
                    </a>
                    <b class="arrow"></b>
                    </li>
                    @can('create_tag_offer')
                    <li class="">
                    <a href="{{ route('offer.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Adding Tag
                        </a>
                        <b class="arrow"></b>
                    </li>
                    @endcan
                    @can('create_tag_offer', 'edit_tag_offer', 'delete_tag_offer')

                    <li class="">
                        <a href="{{ route('offer.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        View Tag
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @endcan

                </ul>
            </li>
        @endcan
        @can('view_event', 'create_event', 'edit_event', 'delete_event')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-calendar"></i>
                    <span class="menu-text"> Events </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                @can('create_event')
                    <li class="">
                        <a href="{{ route('event.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Adding Event
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                    <li class="">
                        <a href="{{ route('event.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        View Event
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        @endcan
        @can('view_news', 'create_news', 'edit_news', 'delete_news', 'create_news_category', 'edit_news_category','delete_news_category', 'create_news_author', 'edit_news_author', 'delete_news_author')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-newspaper-o" aria-hidden="true"></i>
                    <span class="menu-text"> News </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('news.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            News Dashboard
                        </a>
                        <b class="arrow"></b>
                    </li>
                @can('create_news')
                    <li class="">
                        <a href="{{ route('news.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Adding News
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                @can('edit_news_category', 'delete_news_category')
                    <li class="">
                        <a href="{{ route('newscategory.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            News Category
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                @can('create_news_category')
                    <li class="">
                        <a href="{{ route('newscategory.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Add News Category
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                @can('create_news_author', 'edit_news_author')
                    <li class="">
                        <a href="{{ route('author.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Authors
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                <!--  -->
                </ul>
            </li>
        @endcan
        @can('view_category', 'create_category', 'edit_category', 'delete_category', 'create_category_tag', 'edit_category_tag', 'delete_category_tag')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-paperclip"></i>
                    <span class="menu-text"> Category </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                @can('create_category')
                    <li class="">
                        <a href="{{ route('category.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Adding Category
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                @can('view_category', 'edit_category', 'delete_category')
                    <li class="">
                        <a href="{{ route('category.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View Category
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                @can('create_category')
                    <li class="">
                        <a href="{{ route('categorytag.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Adding Tag
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                @can('edit_category_tag', 'delete_category_tag')
                    <li class="">
                        <a href="{{ route('categorytag.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        View Tag
                        </a>

                        <b class="arrow"></b>
                    </li>
                @endcan
                </ul>
            </li>
        @endcan
        @can('view_qatar', 'create_qatar', 'edit_qatar', 'delete_qatar')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-globe" aria-hidden="true"></i>
                    <span class="menu-text"> Qatar </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                @can('create_qatar')
                    <li class="">
                        <a href="{{ route('qatar.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Qatar Dashboard
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                    <li class="">
                    <a href="{{ route('qatar.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Add New
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        @endcan
        @can('view_page', 'edit_page')
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-file" aria-hidden="true"></i>
                    <span class="menu-text">More Pages </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="{{ route('page.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Pages
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        @endcan
        @can('create_location', 'edit_location', 'delete_location', 'create_slider', 'edit_slider', 'delete_slider')
            <li class="">
                <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list" aria-hidden="true"></i>
                <span class="menu-text"> Apperance </span>
                <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                @can('create_location')
                    <li class="">
                        <a href="{{ route('location.index')}}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Location
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                @can('create_slider')
                    <li class="">
                    <a href="{{ route('slider.index')}}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Slider
                        </a>
                        <b class="arrow"></b>
                    </li>
                @endcan
                </ul>
            </li>
        @endcan
        <!-- @can('create_user') -->
        <!-- <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-bell" aria-hidden="true"></i>
              <span class="menu-text"> Notification </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
              <li class="">
                <a href="{{ url('/admin/email') }}">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Mail Notification
                </a>
                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="">
                  <i class="menu-icon fa fa-caret-right"></i>
                  App Notification
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
        </li> -->
        <!-- @endcan -->
        <!-- @can('create_user')
        <li class="">
          <a href="#">
              <i class="menu-icon fa fa-bar-chart"></i>
              <span class="menu-text"> Report </span>
            </a>
        </li>
        @endcan -->
        <!-- @can('create_user')
        <li class="">
          <a href="#">
              <i class="menu-icon fa fa-exchange"></i>
              <span class="menu-text"> Export </span>
            </a>
        </li>
        @endcan -->
        <!-- @can('create_user')


        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-tag"></i>
                <span class="menu-text"> More Pages </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                <a href="profile.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    User Profile
                </a>

                <b class="arrow"></b>
                </li>

                <li class="">
                <a href="inbox.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Inbox
                </a>

                <b class="arrow"></b>
                </li>

                <li class="">
                <a href="pricing.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Pricing Tables
                </a>

                <b class="arrow"></b>
                </li>

                <li class="">
                <a href="invoice.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Invoice
                </a>

                <b class="arrow"></b>
                </li>

                <li class="">
                <a href="timeline.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Timeline
                </a>

                <b class="arrow"></b>
                </li>

                <li class="">
                <a href="search.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Search Results
                </a>

                <b class="arrow"></b>
                </li>

                <li class="">
                <a href="email.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Email Templates
                </a>

                <b class="arrow"></b>
                </li>

                <li class="">
                <a href="login.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Login &amp; Register
                </a>

                <b class="arrow"></b>
                </li>
            </ul>
        </li>
        @endcan -->

    </ul><!-- /.nav-list -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
            data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
