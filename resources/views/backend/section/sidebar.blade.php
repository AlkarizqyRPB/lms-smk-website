<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/favicon-32x32.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="{{ setSidebar(['admin.dashboard']) }}">
            <a href="{{ route('admin.dashboard') }}" class="">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="">
            <a href="" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Manage User</div>
            </a>
        </li>
        <li class="{{ setSidebar(['admin.category*', 'admin.subcategory*']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Category</div>
            </a>
            <ul>
                <li class="{{ setSidebar(['admin.category*']) }}"> <a href="{{ route('admin.category.index') }}"><i
                            class='bx bx-radio-circle'></i>Category</a>
                </li>
                <li class="{{ setSidebar(['admin.subcategory*']) }}"> <a
                        href="{{ route('admin.subcategory.index') }}"><i class='bx bx-radio-circle'></i>SubCategory</a>
                </li>
            </ul>
        </li>
        <li class="{{ setSidebar(['admin.teacher.index', 'admin.teacher.active']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Teacher</div>
            </a>
            <ul>
                <li class="{{ setSidebar(['admin.teacher.index']) }}">
                    <a href="{{ route('admin.teacher.index') }}"><i class='bx bx-radio-circle'></i>All
                        Teacher</a>
                </li>
                <li class="{{ setSidebar(['admin.teacher.active']) }}">
                    <a href="{{ route('admin.teacher.active') }}"><i class='bx bx-radio-circle'></i>Active
                        Teacher</a>
                </li>

            </ul>
        </li>

        <li class="{{ setSidebar(['admin.slider*', 'admin.info*']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Apllication Settings</div>
            </a>
            <ul>
                <li class="{{ setSidebar(['admin.slider*']) }}"> <a href="{{ route('admin.slider.index') }}"><i
                            class='bx bx-radio-circle'></i>Manage Slider</a>
                </li>
                <li class="{{ setSidebar(['admin.info*']) }}"> <a href="{{ route('admin.info.index') }}"><i
                            class='bx bx-radio-circle'></i>Manage Info</a>
                </li>
            </ul>
        </li>

        <li class="{{ setSidebar(['admin.course*', 'admin.course-section*']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Course Settings</div>
            </a>
            <ul>
                <li class="{{ setSidebar(['admin.course*', 'admin.course-section']) }}"> <a
                        href="{{ route('admin.course.index') }}"><i class='bx bx-radio-circle'></i>All Course</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
