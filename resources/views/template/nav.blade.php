<li class="nav-item @if ($active == 'dashboard'){
    {{'active'}}
}@endif">
<a class="nav-link"></a>
<a class ="dropdown-item" href="/user">
<i class="fa-solid fa-gauge  fa-sm fa-fw mr-2 " style="color:#ee4061"></i>
<i style="color:#fff">Dashboard</i>
</a>
</a></i>
<a class="dropdown-item " href="/catatan">
    <i class="fa-solid fa-book fa-sm fa-fw mr-2" style="color: #ee4061;"></i>
    <i style="color:#fff">Catatan</i>
</a>
<a class="dropdown-item" href="/logout">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color: #ee4061;"></i>
    <i style="color:#fff">Logout</i>
</a>

