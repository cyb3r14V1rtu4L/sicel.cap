<li class="<?php if($controlador=='index'){echo 'active'; }?>"> <a href="/dashboard/" onclick="block()"> <i class="fa fa-home"></i> <span class="title">Dashboard</span> </a> </li>
<li class="<?php if($controlador=='profile'){echo 'active'; }?>"> <a href="/dashboard/profile" onclick="block()"> <i class="fa fa-user"></i> <span class="title">Profile</span> </a> </li>
<!--<li class=""> <a href="/dashboard/property/edit" onclick="block()"> <i class="icon-custom-home"></i> <span class="title">Add Property</span> </a> </li>-->
<li class="<?php if($metodo=='my_properties'){echo 'active'; }?>"> <a href="/dashboard/property/my_properties" onclick="block()"> <i class="icon-custom-home"></i> <span class="title">My Properties</span> </a> </li>
