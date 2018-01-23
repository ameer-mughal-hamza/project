<div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
    <h1 class="hidden-xs hidden-sm" style="color: #8eb4cb;">Doctor</h1>
    <ul>
        <li class="link {{ Request::is('doctor') ? 'active' : ''}}">
            <a href="{{ route('doctor.dashboard') }}">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Dashboard</span>
            </a>
        </li>
        <li class="link {{ Request::is('doctor/blog') ? 'active' : ''}}">
            <a href="{{ route('doctor.blog') }}">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Blog</span>
                <span class="label label-success pull-right hidden-xs hidden-sm">20</span>
            </a>
        </li>

        <li class="link {{ Request::is('doctors') ? 'active' : '' }}">
            <a href="{{ route('doctors.index') }}">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Doctors</span>
                <span class="label label-success pull-right hidden-xs hidden-sm">20</span>
            </a>
        </li>

        <li class="link {{ Request::is('doctors') ? 'active' : '' }}">
            <a href="{{ route('doctors.index') }} #collapse-patients" data-toggle="collapse" aria-controls="collapse-patients">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Patients</span>
                <span class="label label-success pull-right hidden-xs hidden-sm">20</span>
            </a>
            <ul class="collapse collapseable" id="collapse-patients">
                <li>
                    <a href="">View Patients
                        <span class="label label-success pull-right hidden-xs hidden-sm">10</span>
                    </a>
                </li>

                <li>
                    <a href="">Perscription
                        <span class="label label-warning pull-right hidden-xs hidden-sm">10</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="link">
            <a href="#collapse-comments" data-toggle="collapse" aria-controls="collapse-comments">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Comments</span>
            </a>
            <ul class="collapse collapseable" id="collapse-comments">
                <li>
                    <a href="approved.html">Approved
                        <span class="label label-success pull-right hidden-xs hidden-sm">10</span>
                    </a>
                </li>

                <li>
                    <a href="approved.html">Unapproved
                        <span class="label label-warning pull-right hidden-xs hidden-sm">10</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="link settings-btn">
            <a href="settings.html">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Settings</span>
            </a>
        </li>
    </ul>
</div>