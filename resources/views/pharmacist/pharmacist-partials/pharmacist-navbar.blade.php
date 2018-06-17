<div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
    <h1 class="hidden-xs hidden-sm" style="color: #eeece7;">Pharmacist</h1>
    <ul>
        <li class="link">
            <a href="{{ route('pharmacist.dashboard') }}">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Dashboard</span>
            </a>
        </li>
        <li class="link">
            <a href="{{ route('pharmacist.medicine.create') }}">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Medicine</span>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('pharmacist.search-prescription') }}">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Prescriptions</span>
            </a>
        </li>

        <li class="link settings-btn">
            <a href="{{route('pharmacist.settings')}}">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Settings</span>
            </a>
        </li>
    </ul>
</div>