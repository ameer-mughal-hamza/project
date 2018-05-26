<div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
    <h1 class="hidden-xs hidden-sm" style="color: #8eb4cb;">Doctor</h1>
    <ul>
        <li class="link">
            <a href="{{ route('patient.dashboard') }}">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Dashboard</span>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('show.patient.doctor') }}">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Doctors</span>
            </a>
        </li>

        <li class="link">
            <a href="">
                <span><img src="" width="25px"
                           height="25px"
                           alt="" ) style="border-radius: 50%; margin-left: -5px; margin-top: -5px;"></span>
                <span class="hidden-sm hidden-xs">Profile</span>
                <span class="label label-success pull-right hidden-xs hidden-sm">20</span>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('show.patient.detail',['id' => Auth::user()->id]) }}">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Record</span>
            </a>
        </li>

    </ul>
</div>