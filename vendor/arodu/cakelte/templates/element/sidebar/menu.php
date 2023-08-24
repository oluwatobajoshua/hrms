<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
<li class="nav-header">MAIN NAVIGATION</li>
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/companies/dashboard'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/companies/employee-dashboard'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Employee Dashboard</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>
      File
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/companies'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Company</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/branches'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Branches</p>
      </a>
    </li>
    
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/units'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Units</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/sections'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Sections</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/banks'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Banks</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/cadres'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Cadres</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/grades'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Grades</p>
      </a>
    </li>
    
  </ul>
</li>
<li class="nav-header">EMPLOYEES</li>
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>
      Employee Management
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/employees'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Employees</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/emergency-contacts'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Emergency Contacts</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/departments'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Departments</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/designations'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Designations</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-table"></i>
    <p>
      Attendance and Leave
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/attendances/index'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Attendance</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/holidays/index'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Holidays</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/leaves/add'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Request Leave</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/leaves/index'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Leave Status</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-header">HR</li>
<li class="nav-item">
  <a href="<?php echo $this->Url->build('/attendances/index'); ?>" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Attendance</p>
  </a>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-table"></i>
    <p>
      Payroll & Comp
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">  
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/salary-components'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Salary Components</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/transactions'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Payroll</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/service-charges'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Service Charge</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/users/index'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Compensations</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/bonuses'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Bonuses</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-table"></i>
    <p>
    Recruit. & Onboarding
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/job-listings'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Job Listings</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/applicants'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Applicants</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/interviews'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Interview</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $this->Url->build('/onboardings'); ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Onboarding</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Reports
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Employees
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo $this->Url->build('/reports/bio-data'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bio-Data</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Payroll
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo $this->Url->build('/reports/payroll-register'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Payroll Register</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $this->Url->build('/reports/end_of_year_bonus'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Year End Bonus (Staff)</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>

<!--<li class="nav-item">-->
<!--  <a href="#" class="nav-link">-->
<!--    <i class="nav-icon fas fa-th"></i>-->
<!--    <p>-->
<!--      Simple Link-->
<!--      <span class="right badge badge-danger">New</span>-->
<!--    </p>-->
<!--  </a>-->
<!--</li>-->


