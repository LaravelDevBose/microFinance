<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left">
                        <?php $avater = Auth::user()->avater;   if(!file_exists($avater)){ $avater = 'public/images/default/user_profile.jpg'; }?>
                        <img src="{{ asset($avater) }}" class="img-circle img-sm" alt="">
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->full_name }}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-user-check text-size-small"></i> {{ Auth::User()->username }}
                        </div>
                    </div>

                    {{--<div class="media-right media-middle">--}}
                        {{--<ul class="icons-list">--}}
                            {{--<li>--}}
                                {{--<a href="#"><i class="icon-cog3"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="active"><a href="{{ route('dashboard')  }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#"><i class="icon-users4"></i> <span>Member Info</span></a>
                        <ul>
                            <li><a href="{{ route('member.index') }}">Member List</a></li>
                            <li><a href="{{ route('member.create') }}">Create Member</a></li>
                            <li><a href="{{ route('member.show', 1) }}">Profile page</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-cash3"></i> <span>Cash Transition</span></a>
                        <ul>
                            <li><a href="{{ route('dps.transition') }}">DPS Transition</a></li>
                            <li><a href="{{ route('loan.transition') }}">Loan Transition</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-wallet"></i> <span>Income & Expense</span></a>
                        <ul>
                            <li><a href="{{ route('IE_head') }}">Income & Expense Head</a></li>
                            <li><a href="{{ route('income_expense.index')  }}">Income & Expense List</a></li>

                        </ul>
                    </li>
                    <li><a href="{{ route('department.index')  }}"><i class=" icon-hammer-wrench"></i> <span> Department</span></a></li>
                    <li><a href="{{ route('designation.index')  }}"><i class="icon-graduation2"></i> <span> Designation</span></a></li>
                    <li>
                        <a href="#"><i class="icon-user-tie"></i> <span> Employee</span></a>
                        <ul>
                            <li><a href="{{ route('employee.create') }}">Add Employee </a></li>
                            <li><a href="{{ route('employee.index') }}">Employee List</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user-tie"></i> <span> Setting</span></a>
                        <ul>
                            <li><a href="{{ route('employee.create') }}">Add Employee </a></li>
                            <li><a href="{{ route('employee.index') }}">Employee List</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-user-check"></i> <span> Admin</span></a>
                        <ul>
                            <li><a href="{{ route('sub_admin.create') }}">Add Admin </a></li>
                            <li><a href="{{ route('sub_admin.index') }}">Admin List</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
