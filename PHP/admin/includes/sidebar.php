<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Project 699</h3>
        <strong>P699</strong>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="/admin/dashboard.php">
                <i class="fa fa-home"></i>
                Home
            </a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-copy"></i>
                Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <?php if ($login_role == "student") {
                    echo '  
                    <li>
                        <a href="/admin/listing/student_list.php?student_id=' . $student_id . '">Student Details</a>
                    </li>
                    <li>
                        <a href="/admin/listing/attendance_list.php?student_id=' . $student_id . '">Attendance Details</a>
                    </li>
                    <li>
                        <a href="/admin/listing/payment_list.php?student_id=' . $student_id . '">Payment Details</a>
                    </li>
                    <li>
                        <a href="/admin/listing/course_list.php?student_id=' . $student_id . '">Course Details</a>
                    </li>
                    <li>
                        <a href="/admin/listing/message_list.php?student_id=' . $student_id . '">Messages / Posts</a>
                    </li>
                    ';
                } else if ($login_role == "admin") {
                    echo '
                    <li>
                        <a href="/admin/listing/student_list.php">Student Details</a>
                    </li>
                    <li>
                        <a href="/admin/listing/attendance_list.php">Attendance Details</a>
                    </li>
                    <li>
                        <a href="/admin/listing/payment_list.php">Payment Details</a>
                    </li>
                    <li>
                        <a href="/admin/listing/course_list.php">Course Details</a>
                    </li>
                    <li>
                        <a href="/admin/listing/message_list.php">Messages / Posts</a>
                    </li>
                    ';
                } ?>
            </ul>
        </li>
        <li>
            <a href="/about.php"> <i class="fa fa-briefcase"></i>About</a>
        </li>
    </ul>
</nav>


<style>

    /* Shrinking the sidebar from 250px to 80px and center aligining its content*/
    #sidebar.active {
        min-width: 80px;
        max-width: 80px;
        text-align: center;
    }

    /* Toggling the sidebar header content, hide the big heading [h3] and showing the small heading [strong] and vice versa*/
    #sidebar .sidebar-header strong {
        display: none;
    }

    #sidebar.active .sidebar-header h3 {
        display: none;
    }

    #sidebar.active .sidebar-header strong {
        display: block;
    }

    #sidebar ul li a {
        text-align: left;
    }

    #sidebar.active ul li a {
        padding: 20px 10px;
        text-align: center;
        font-size: 0.85em;
    }

    #sidebar.active ul li a i {
        margin-right: 0;
        display: block;
        font-size: 1.8em;
        margin-bottom: 5px;
    }

    /* Same dropdown links padding*/
    #sidebar.active ul ul a {
        padding: 10px !important;
    }

    /* Changing the arrow position to bottom center position,
       translateX(50%) works with right: 50%
       to accurately  center the arrow */
    #sidebar.active .dropdown-toggle::after {
        top: auto;
        bottom: 10px;
        right: 50%;
        -webkit-transform: translateX(50%);
        -ms-transform: translateX(50%);
        transform: translateX(50%);
    }

    @media (max-width: 768px) {
        /* 80px and its content aligned to centre. Pushing it off the screen with the
           negative left margin
        */
        #sidebar.active {
            min-width: 80px;
            max-width: 80px;
            text-align: center;
            margin-left: -80px !important;
        }

        /* Reappearing the sidebar on toggle button click */
        #sidebar {
            margin-left: 0;
        }

        /* Toggling the sidebar header content,
           hide the big heading [h3] and showing the small heading [strong] and vice versa
        */
        #sidebar .sidebar-header strong {
            display: none;
        }

        #sidebar.active .sidebar-header h3 {
            display: none;
        }

        #sidebar.active .sidebar-header strong {
            display: block;
        }

        /* Downsize the navigation links font size */
        #sidebar.active ul li a {
            padding: 20px 10px;
            font-size: 0.85em;
        }

        #sidebar.active ul li a i {
            margin-right: 0;
            display: block;
            font-size: 1.8em;
            margin-bottom: 5px;
        }

        /* Adjust the dropdown links padding*/
        #sidebar.active ul ul a {
            padding: 10px !important;
        }

        /* Changing the arrow position to bottom center position,
          translateX(50%) works with right: 50%
          to accurately  center the arrow */
        .dropdown-toggle::after {
            top: auto;
            bottom: 10px;
            right: 50%;
            -webkit-transform: translateX(50%);
            -ms-transform: translateX(50%);
            transform: translateX(50%);
        }
    }
</style>
<Script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
</Script>