<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu">
			 <li>
				<a href="{{ route('home')}}"><i class="fas fa-home"></i> Principal </a>
			</li> 
			
			<li>
				<a href="{{ url("/voluntario") }}">	<i class="fa fa-list">	</i> Voluntátios </a> 
			</li>
			<li>
				<a href="{{ url("/eventos") }}">	<i class="fa fa-list">	</i> Eventos </a> 
			</li>
			
			<li><a><i class="fas fa-cogs"></i> Configurações <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
						<li><a href="{{ url("/experiencia") }}">	<i class="fa fa-list">	</i> Experiência </a> </li>
						<li><a href="{{ url("/profissao") }}">	<i class="fa fa-list">	</i> Profissão </a> </li>
						<li><a href="{{ url("/user") }}">	<i class="fa fa-list">	</i> Usuarios </a> </li>
						
						
				</ul>
			</li>
		
			<li>
				<a href="{{ route('logout')}}"><i class="fa fa-sign-out"></i> Sair do sistema </a>
			</li>
		</ul>	
	</div>
</div>



