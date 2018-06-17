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

        <li class="link {{ Request::is('doctor/profile/' .  Auth::user()->id ) ? 'active' : '' }}">
            <a href="{{ route('doctor.profile', ['id' => Auth::user()->id]) }}">
                <span><img src="{{ URL::asset('/doctor-images/' . Auth::user()->image_url) }}" width="25px"
                           height="25px"
                           alt="" ) style="border-radius: 50%; margin-left: -5px; margin-top: -5px;"></span>
                <span class="hidden-sm hidden-xs">Profile</span>
                <span class="label label-success pull-right hidden-xs hidden-sm">20</span>
            </a>
        </li>

        <li class="link {{ Request::is('doctors') ? 'active' : '' }}">
            <a href="{{ route('doctors.index') }} #collapse-patients" data-toggle="collapse"
               aria-controls="collapse-patients">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Patients</span>
                <span class="label label-success pull-right hidden-xs hidden-sm">20</span>
            </a>
            <ul class="collapse collapseable" id="collapse-patients">
                <li>
                    <a href="{{ route('doctor.show.all.patients') }}">View Patients
                        <span class="label label-success pull-right hidden-xs hidden-sm">10</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('doctor.medicine.prescription') }}">Perscription
                        <span class="label label-warning pull-right hidden-xs hidden-sm">10</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all-appointment',['id' => Auth::user()->id]) }}">Appointment
                        <span class="label label-warning pull-right hidden-xs hidden-sm">10</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="link">
            <a href="#collapse-settings" data-toggle="collapse"
               aria-controls="collapse-settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Settings</span>
            </a>
            <ul class="collapse collapseable" id="collapse-settings">
                <li>
                    <a href="{{ route('doctor.appointment-setting', ['id' => Auth::user()->id]) }}">Appointment Settings
                        <span class="label label-success pull-right hidden-xs hidden-sm">10</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('doctor.password') }}">Change Password
                        <span class="label label-warning pull-right hidden-xs hidden-sm">10</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>