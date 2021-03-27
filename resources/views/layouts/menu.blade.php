<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-building"></i><span>Users</span></a>
</li>

<li class="side-menus {{ Request::is('sports*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('sports.index') }}"><i class="fas fa-building"></i><span>Sports</span></a>
</li>

<li class="side-menus {{ Request::is('series*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('series.index') }}"><i class="fas fa-building"></i><span>Series</span></a>
</li>

<li class="side-menus {{ Request::is('matches*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('matches.index') }}"><i class="fas fa-building"></i><span>Matches</span></a>
</li>

<li class="side-menus {{ Request::is('contests*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contests.index') }}"><i class="fas fa-building"></i><span>Contests</span></a>
</li>

<li class="side-menus {{ Request::is('teams*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('teams.index') }}"><i class="fas fa-building"></i><span>Teams</span></a>
</li>

<li class="side-menus {{ Request::is('players*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('players.index') }}"><i class="fas fa-building"></i><span>Players</span></a>
</li>

