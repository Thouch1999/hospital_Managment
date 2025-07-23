<?php
function active1($currect_page)
{
    $url_array =  explode('/', $_SERVER['REQUEST_URI']); //Uniform Resource Identifier
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active'; //class name in css 
    }
}
function active($key, $pages = [])
{
    return (isset($_GET[$key]) && in_array($_GET[$key], $pages)) ? 'active' : '';
}
function active2($mainKey, $subKeys = [])
{
    if (isset($_GET[$mainKey]) && in_array($_GET[$mainKey], $subKeys)) {
        return 'active';
    }
    return '';
}
?>



<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <?php
                if ($_SESSION['user_role'] == '1') {
                ?>

                    <li class="<?= active1('index.php') ?>">
                        <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>

                    <li class="<?= active('p_doctor', ['list_doctor','create_doctor','update_doctor']) ?>">
                        <a href="index.php?p_doctor=list_doctor"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                    </li>

                    <li class="<?= active('p_patient', ['list_patient']) ?>">
                        <a href="index.php?p_patient=list_patient"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                    </li>
                    <li class="<?= active('p_appointment', ['list_appointment', 'update_appointment', 'add_appointment']) ?>">
                        <a href="index.php?p_appointment=list_appointment"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                    </li>

                    <li class="<?= active('p_doctor_sch', ['list_doctor_schedule', 'add_doctor_sch', 'update_doctor_sch']) ?>">
                        <a href="index.php?p_doctor_sch=list_doctor_schedule"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                    </li>

                    <li class="<?= active('p_department', ['list_department', 'add_department', 'update_department']) ?>">
                        <a href="index.php?p_department=list_department"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                    </li>
                    <?php
                    $isEmployeeActive = (isset($_GET['p_employee']) && in_array($_GET['p_employee'], ['employee_list', 'add_employee', 'update_empolyee', 'list_leave', 'add_leave', 'edit_leave', 'holiday_list', 'add_holiday', 'edit_holiday', 'attendent_list']));
                    ?>
                    <li class="submenu  <?= $isEmployeeActive ? 'open' : '' ?>">
                        <a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
                        <ul style="<?= $isEmployeeActive ? 'display: block;' : 'display: none;' ?>">
                            <li class="<?= active2('p_employee', ['employee_list', 'add_employee', 'update_empolyee']) ?>">
                                <a href="index.php?p_employee=employee_list">
                                    Employees List
                                </a>
                            </li>
                            <li class="<?= active2('p_employee', ['list_leave', 'add_leave', 'edit_leave']) ?>">
                                <a href="index.php?p_employee=list_leave">
                                    Leaves
                                </a>
                            </li>
                            <li class="<?= active2('p_employee', ['holiday_list', 'add_holiday', 'edit_holiday']) ?>">
                                <a href="index.php?p_employee=holiday_list">
                                    Holidays
                                </a>
                            </li>
                            <li class="<?= active2('p_employee', ['attendent_list']) ?>">
                                <a href="index.php?p_employee=attendent_list">
                                    Attendance
                                </a>
                            </li>
                        </ul>
                    </li>

                    <?php
                        $isAccountActive = (isset($_GET['p_account']) && in_array($_GET['p_account'], ['invoices_list','add_invoice','edit_invoice','invoice_view','payment_list','xpense_list','add_xpense','edit_xpense','tax_list','add_tax','edit_tax','provident_list','add_provident','edit_provident']));
                    ?>
                    <li class="submenu <?= $isAccountActive?'open':''?>">
                        <a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                        <ul style="<?= $isAccountActive ? 'display: block;' : 'display: none;' ?>">
                            <li class="<?=active2('p_account',['invoices_list','add_invoice','edit_invoice','invoice_view'])?>">
                                <a href="index.php?p_account=invoices_list">
                                    Invoices
                                </a>
                            </li>
                            <li class="<?=active2('p_account',['payment_list'])?>">
                                <a href="index.php?p_account=payment_list">
                                    Payments
                                </a>
                            </li >
                            <li class="<?=active2('p_account',['xpense_list','add_xpense','edit_xpense'])?>"> 
                                <a href="index.php?p_account=xpense_list">
                                    Expenses
                                </a>
                            </li>
                            <li class="<?=active2('p_account',['tax_list','add_tax','edit_tax'])?>">
                                <a href="index.php?p_account=tax_list">
                                    Taxes
                                </a>
                            </li>
                            <li class="<?=active2('p_account',['provident_list','add_provident','edit_provident'])?>">
                                <a href="index.php?p_account=provident_list">Provident Fund</a>
                            </li>
                        </ul>
                    </li>

                     <?php
                        $isPayRollActive = (isset($_GET['p_payroll']) && in_array($_GET['p_payroll'], ['employeeSalary_list','add_employeeSalary','edit_employeeSalary','payslip_view']));
                    ?>
                    <li class="submenu <?=$isPayRollActive?'open':''?>">
                        <a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                        <ul style="<?= $isPayRollActive ? 'display: block;' : 'display: none;' ?>">
                            <li class="<?=active2('p_payroll',['employeeSalary_list','add_employeeSalary','edit_employeeSalary'])?>">
                                <a href="index.php?p_payroll=employeeSalary_list"> Employee Salary </a>
                            </li>
                            <li class="<?=active2('p_payroll',['payslip_view'])?>">
                                <a href="index.php?p_payroll=payslip_view"> Payslip </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php
                if ($_SESSION['user_role'] == '4') {
                ?>
                    <li class="<?= active('index.php?p_doctor=list_doctor') ?>">
                        <a href="index.php?p_doctor=list_doctor"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</div>