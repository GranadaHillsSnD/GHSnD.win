<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/admins">GHSnD Admins - {{ \Auth::user()->name }}</a>
      </div>
      <!-- /.navbar-header -->

      <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
                  <li class="sidebar-search">
                      <div class="input-group custom-search-form">
                          <input type="text" class="form-control" placeholder="Search...">
                          <span class="input-group-btn">
                              <button class="btn btn-default" type="button">
                                  <i class="fa fa-search"></i>
                              </button>
                          </span>
                      </div>
                      <!-- /input-group -->
                  </li>

                  <li>
                      <a href="/admin/pending"><i class="fa fa-edit fa-fw"></i> Pending ({{ \DB::table('social_media')->orderBy('datetime_posted', 'asc')->where('approved', 'Pending')->count() }})</a>
                      <a href="/admin/approved"><i class="fa fa-edit fa-fw"></i> Approved</a>
                      <a href="/admin/denied"><i class="fa fa-edit fa-fw"></i> Denied</a>
                      <a href="/admin/post/new"><i class="fa fa-edit fa-fw"></i> New Post</a>
                      <a href="/admin/post/edit"><i class="fa fa-edit fa-fw"></i> Edit a Post</a>
                      <a href="/admin/calendar"><i class="fa fa-edit fa-fw"></i> Add Event</a>
                  </li>
              </ul>
          </div>
          <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
  </nav>
