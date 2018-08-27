<template>
  	<div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-home"></i> <span></span></a>
          </div>

           <div class="clearfix"></div>
          <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                       <router-link tag="li" active-class="active" to="/" exact>
                      <a><i class="fa fa-home"></i>Dashboard</a>
                    </router-link>
                      <li><a><i class="fa fa-briefcase"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                           <router-link tag="li"  active-class="active" to="/hello">
                      <a><i class=""></i>tes data</a>
                      
                    </router-link>

                     <router-link tag="li"  active-class="active" to="/create">
                          <a><i class=""></i>tes data2</a>
                        </router-link>

                    <router-link tag="li"  active-class="active" to="/loader">
                      <a>Dashboard3</a>
                    </router-link>
                        </ul>
                      </li>
                    </ul>
                </div>
                  <div class="menu_section">
                    <h3>Live On</h3>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="e_commerce.html">E-commerce</a></li>
                          <li><a href="projects.html">Projects</a></li>
                          <li><a href="project_detail.html">Project Detail</a></li>
                          <li><a href="contacts.html">Contacts</a></li>
                          <li><a href="profile.html">Profile</a></li>
                        </ul>
                      </li>           
                      <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                    </ul>
                  </div>
              </div>  
          <!-- /sidebar menu -->
        </div>
    </div>
</template>
<script>
	export default {
		name : 'sidebar'
	}
</script>
  