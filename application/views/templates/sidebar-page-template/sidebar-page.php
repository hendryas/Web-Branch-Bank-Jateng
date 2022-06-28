<div class="page-sidebar">
    <div class="page-sidebar-inner">
        <div class="page-sidebar-profile">
            <div class="sidebar-profile-image">
                <img src="../../assets/images/avatars/avatar1.png">
            </div>
            <?php
            $role_id = $this->session->userdata('role_id');

            $this->db->select('menu_level_1.*');
            $this->db->from('menu_level_1');
            $this->db->join('user_access_menu', 'user_access_menu.id_menu_level_1 = menu_level_1.id');
            $this->db->where('user_access_menu.role_id', $role_id);
            $this->db->order_by('user_access_menu.id_menu_level_1', 'asc');

            $menu_1 = $this->db->get()->result_array();
            // var_dump($role_id);
            // die;
            ?>
            <div class="sidebar-profile-info">
                <a href="javascript:void(0);" class="account-settings-link">
                    <p><?= $user['nama']; ?></p>
                    <span><?= $user['email']; ?><i class="material-icons float-right">arrow_drop_down</i></span>
                </a>
            </div>
        </div>
        <div class="page-sidebar-menu">
            <div class="page-sidebar-settings hidden">
                <ul class="sidebar-menu list-unstyled">
                    <li><a href="#" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a></li>
                </ul>
            </div>
            <div class="sidebar-accordion-menu">
                <ul class="sidebar-menu list-unstyled">
                    <li>
                        <a href="index.html" class="waves-effect waves-grey">
                            <i class="material-icons">settings_input_svideo</i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-grey">
                            <i class="material-icons">apps</i>Apps<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="app-mailbox.html">Mailbox</a></li>
                            <li><a href="app-file-manager.html">File Manager</a></li>
                            <li><a href="app-todo.html">Todo</a></li>
                        </ul>
                    </li>
                    <li class="active-page">
                        <a href="#" class="waves-effect waves-grey shown-menu">
                            <i class="material-icons">desktop_windows</i>Layouts<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="layout-blank.html" class="active">Blank Page</a></li>
                            <li><a href="layout-boxed.html">Boxed Layout</a></li>
                            <li><a href="layout-hidden-sidebar.html">Hidden Sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-grey">
                            <i class="material-icons">code</i>Components<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="ui-alerts.html">Alerts</a></li>
                            <li><a href="ui-accordion.html">Accordion</a></li>
                            <li><a href="ui-badges.html">Badges</a></li>
                            <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-button-group.html">Button Group</a></li>
                            <li><a href="ui-cards.html">Cards</a></li>
                            <li><a href="ui-code.html">Code</a></li>
                            <li><a href="ui-color.html">Color</a></li>
                            <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                            <li><a href="ui-icons.html">Icons</a></li>
                            <li><a href="ui-list-group.html">List Group</a></li>
                            <li><a href="ui-modal.html">Modal</a></li>
                            <li><a href="ui-pagination.html">Pagination</a></li>
                            <li><a href="ui-popovers.html">Popovers</a></li>
                            <li><a href="ui-progress.html">Progress</a></li>
                            <li><a href="ui-spinners.html">Spinners</a></li>
                            <li><a href="ui-tooltips.html">Tooltips</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-grey">
                            <i class="material-icons">star_border</i>Plugins<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="plugins-code-editor.html">Code Editor</a></li>
                            <li><a href="plugins-nestable.html">Nestable List</a></li>
                            <li><a href="plugins-masonry.html">Masonry</a></li>
                            <li><a href="plugins-idle.html">Idle Timer</a></li>
                            <li><a href="plugins-image-crop.html">Image Crop</a></li>
                            <li><a href="plugins-image-zoom.html">Image Zoom</a></li>
                            <li><a href="plugins-select2.html">Select2</a></li>
                            <li><a href="plugins-plupload.html">Plupload</a></li>
                            <li><a href="plugins-toastr.html">Toastr</a></li>
                            <li><a href="plugins-range-sliders.html">Range Sliders</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="forms.html" class="waves-effect waves-grey">
                            <i class="material-icons">mode_edit</i>Forms
                        </a>
                    </li>
                    <li>
                        <a href="tables.html" class="waves-effect waves-grey">
                            <i class="material-icons">grid_on</i>Tables
                        </a>
                    </li>
                    <li>
                        <a href="charts.html" class="waves-effect waves-grey">
                            <i class="material-icons">trending_up</i>Charts
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-grey">
                            <i class="material-icons">tag_faces</i>Extra Pages<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="pages-404.html">404</a></li>
                            <li><a href="pages-500.html">500</a></li>
                            <li><a href="pages-sign-in.html">Sign In</a></li>
                            <li><a href="pages-sign-up.html">Sign Up</a></li>
                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                            <li><a href="pages-coming-soon.html">Coming Soon</a></li>
                            <li><a href="pages-invoice.html">Invoice</a></li>
                            <li><a href="pages-pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="pages-help-center.html">Help Center</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="sidebar-footer">
                <p class="copyright">Created ©</p>
                <a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>
            </div> -->
    </div>
</div><!-- Left Sidebar -->