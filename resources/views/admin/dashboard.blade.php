@extends('layouts.app')

@section("conteudo")

    

    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
            <div class="card card-tile card-xs bg-primary bg-gradient text-center">
                <div class="card-body p-4">
                    <!-- Accepts .invisible: Makes the items. Use this only when you want to have an animation called on it later -->
                    <div class="tile-left">
                        <i class="batch-icon batch-icon-user-alt batch-icon-xxl"></i>
                    </div>
                    <div class="tile-right">
                        <div class="tile-number">1,359</div>
                        <div class="tile-description">Customers Online</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
            <div class="card card-tile card-xs bg-secondary bg-gradient text-center">
                <div class="card-body p-4">
                    <div class="tile-left">
                        <i class="batch-icon batch-icon-tag-alt-2 batch-icon-xxl"></i>
                    </div>
                    <div class="tile-right">
                        <div class="tile-number">$7,349.90</div>
                        <div class="tile-description">Today's Sales</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
            <div class="card card-tile card-xs bg-primary bg-gradient text-center">
                <div class="card-body p-4">
                    <div class="tile-left">
                        <i class="batch-icon batch-icon-list batch-icon-xxl"></i>
                    </div>
                    <div class="tile-right">
                        <div class="tile-number">26</div>
                        <div class="tile-description">Open Tickets</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
            <div class="card card-tile card-xs bg-secondary bg-gradient text-center">
                <div class="card-body p-4">
                    <div class="tile-left">
                        <i class="batch-icon batch-icon-star batch-icon-xxl"></i>
                    </div>
                    <div class="tile-right">
                        <div class="tile-number">476</div>
                        <div class="tile-description">New Orders</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-8 mb-5">
            <div class="card card-md">
                <div class="card-header">
                    Sales Overview
                    <div class="header-btn-block">
										<span class="data-range dropdown">
											<a href="#" class="btn btn-primary dropdown-toggle"
                                               id="navbar-dropdown-sales-overview-header-button" data-toggle="dropdown"
                                               data-flip="false" aria-haspopup="true" aria-expanded="false">
												<i class="batch-icon batch-icon-calendar"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="navbar-dropdown-sales-overview-header-button">
												<a class="dropdown-item" href="today">Today</a>
												<a class="dropdown-item" href="week">This Week</a>
												<a class="dropdown-item" href="month">This Month</a>
												<a class="dropdown-item active" href="year">This Year</a>
											</div>
										</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-chart" data-chart-color-1="#07a7e3" data-chart-color-2="#32dac3"
                         data-chart-legend-1="Sales ($)" data-chart-legend-2="Orders">
                        <canvas id="sales-overview"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-4 mb-5">
            <div class="card card-md">
                <div class="card-header">
                    Aniversariantes do dia
                    <div class="header-btn-block">
										<span class="data-range dropdown">
											<a href="#" class="btn btn-primary dropdown-toggle"
                                               id="navbar-dropdown-traffic-sources-header-button" data-toggle="dropdown"
                                               data-flip="false" aria-haspopup="true" aria-expanded="false">
												<i class="batch-icon batch-icon-calendar"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="navbar-dropdown-traffic-sources-header-button">
												<a class="dropdown-item" href="today">Today</a>
												<a class="dropdown-item" href="week">This Week</a>
												<a class="dropdown-item" href="month">This Month</a>
												<a class="dropdown-item active" href="year">This Year</a>
											</div>
										</span>
                    </div>
                </div>
                <div class="card-body text-center">
                    <p class="text-left">Your top 5 traffic sources</p>
                    <div class="card-chart" data-chart-color-1="#07a7e3" data-chart-color-2="#32dac3"
                         data-chart-color-3="#4f5b60" data-chart-color-4="#FCCF31" data-chart-color-5="#f43a59">
                        <canvas id="traffic-source"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-5 col-xl-3 mb-5">
            <div class="card card-md card-team-members">
                <div class="card-header">
                    Team Members
                </div>
                <div class="card-media-list">
                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Johanna Quinn
                            </div>
                            <div class="subtext">jquinn897</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-3.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Teal'c Jaffa
                            </div>
                            <div class="subtext">tealc</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-secondary float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-2.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Samantha Carter
                            </div>
                            <div class="subtext">samanthac</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-secondary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-4.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                General Landry
                            </div>
                            <div class="subtext">glandry</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-6.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Jacklin O'neil
                            </div>
                            <div class="subtext">jakjak</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Johanna Quinn
                            </div>
                            <div class="subtext">jquinn897</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-3.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Teal'c Jaffa
                            </div>
                            <div class="subtext">tealc</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-secondary float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-2.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Samantha Carter
                            </div>
                            <div class="subtext">samanthac</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-secondary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-4.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                General Landry
                            </div>
                            <div class="subtext">glandry</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="profiles-member-profile.html">
                        <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-6.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Jacklin O'neil
                            </div>
                            <div class="subtext">jakjak</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 mb-5">
            <div class="card card-md card-customer-location">
                <div class="card-header">
                    Customer Location
                </div>
                <div class="card-body">
                    <div class="card-chart" data-chart-color-selected="#07a7e3">
                        <div id="customer-location"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xl-3 mb-5">
            <div class="row mb-4">
                <div class="col-sm-12">
                    <div class="card card-sm bg-primary bg-gradient text-center">
                        <div class="card-body">
                            <i class="batch-icon batch-icon-database batch-icon-xxl"></i>
                            <h6 class="mt-1">Database Load</h6>
                            <div class="card-chart" data-chart-color-1="#FFFFFF" data-chart-color-2="#FFFFFF">
                                <canvas id="database-load"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-sm bg-secondary bg-gradient text-center">
                        <div class="card-body">
                            <div class="card-chart" data-chart-color-1="#FFFFFF" data-chart-color-2="#FFFFFF"
                                 data-chart-color-2="#FFFFFF">
                                <canvas id="profit-loss"></canvas>
                            </div>
                            <h6>Profit/Loss (18 Months)</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-xl-4 mb-5">
            <div class="card card-task card-md">
                <div class="card-header">
                    Task List
                    <p class="task-list-stats">
                        <span class="task-list-completed">0</span> of <span class="task-list-total">0</span> tasks
                        completed
                    </p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-sm bg-gradient" role="progressbar" aria-valuenow="0"
                             aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                    </div>
                    <div class="header-btn-block">
                        <a href="task-manager.html" class="btn btn-primary">
                            <i class="batch-icon batch-icon-add"></i>
                        </a>
                    </div>
                </div>
                <div class="card-task-list">
                    <ul class="task-list">
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label">Mauris rutrum quam at porta feugiat</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"><span class="badge badge-danger">Critical</span>Mauris
                                    rutrum quam at porta feugiat</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label">Fusce in felis nec exdf</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked>
                                <label class="custom-control-label"><span
                                        class="badge badge-warning">High Priority</span>Aliquam vel tristique
                                    ipsum</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked>
                                <label class="custom-control-label"><span class="badge badge-primary">Optional</span>Aenean
                                    vehicula, ligula sit amet varius maximus</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked>
                                <label class="custom-control-label">Etiam varius neque sed sagittis fringilla</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label">Mauris rutrum quam at porta feugiat</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked>
                                <label class="custom-control-label"><span class="badge badge-info">Low Priority</span>Sed
                                    velit augue, tincidunt vitae posuere</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"><span
                                        class="badge badge-warning">High Priority</span>Fusce in felis nec exdf</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"><span class="badge badge-info">Low Priority</span>Aliquam
                                    vel tristique ipsum</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"><span class="badge badge-info">Low Priority</span>
                                    Aenean vehicula, ligula sit amet varius maximus</label>
                            </div>
                        </li>
                        <li class="task-list-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked>
                                <label class="custom-control-label">Etiam varius neque sed sagittis fringilla</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3 mb-5">
            <div class="card card-md bg-primary bg-gradient text-center card-goal-reached">
                <!-- Accepts qp-animate-type which contains an optional animation type from animate.css -->
                <div class="card-body">
                    <h6 class="my-5">Goal Reached</h6>
                    <i class="batch-icon batch-icon-bullhorn batch-icon-xxl"></i>
                    <div class="display-4 mt-3">4,294</div>
                    <p>of 4,000 Target Downloads</p>
                    <p>Congratulations! You surpassed your target goal.</p>
                    <a class="btn btn-secondary">See Details</a>
                </div>
            </div>
        </div>
        <div class="col-xl-5 mb-5">
            <div class="card card-activity card-md">
                <div class="card-header">
                    Activity
                </div>
                <div class="card-media-list">
                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                You were assigned a new task.
                            </div>
                            <div class="subtext">by Johanna Quinn</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-3.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Teal'c Jaffa was added to your team members.
                            </div>
                            <div class="subtext">by George Hammond</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-secondary float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-2.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                A task was escalated from <span class="badge badge-info">Low priority</span> to <span
                                    class="badge badge-danger">Urgent</span>.
                            </div>
                            <div class="subtext">by Samantha Carter</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-secondary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-4.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                A task was marked as <span class="badge badge-success">Completed</span>.
                            </div>
                            <div class="subtext">by General Landry</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-6.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                A new project was created.
                            </div>
                            <div class="subtext">by Jacklin O'neil</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                You were assigned a new task.
                            </div>
                            <div class="subtext">by Johanna Quinn</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-3.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                Teal'c Jaffa was added to your team members.
                            </div>
                            <div class="subtext">by George Hammond</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-secondary float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-2.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                A task was escalated from <span class="badge badge-info">Low priority</span> to <span
                                    class="badge badge-danger">Urgent</span>.
                            </div>
                            <div class="subtext">by Samantha Carter</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-secondary has-message float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-4.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                A task was marked as <span class="badge badge-success">Completed</span>.
                            </div>
                            <div class="subtext">by General Landry</div>
                        </div>
                    </div>

                    <div class="media clickable" data-qp-link="task-list.html">
                        <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                            <img src="assets/img/profile-pic-6.jpg" width="44" height="44">
                        </div>
                        <div class="media-body">
                            <div class="heading mt-1">
                                A new project was created.
                            </div>
                            <div class="subtext">by Jacklin O'neil</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    User Management
                </div>
                <div class="card-table table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="thead-light">
                        <tr>
                            <th>Member</th>
                            <th>Email</th>
                            <th class="text-center">Status</th>
                            <th>Created</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div
                                        class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                                        <img src="assets/img/profile-pic.jpg" width="44" height="44">
                                    </div>
                                    <div class="media-body">
                                        <div class="heading mt-1">
                                            Johanna Quinn
                                        </div>
                                        <div class="subtext">jquinn897</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#">johanna.quinn@quillpro.com</a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-primary">Approved</span>
                            </td>
                            <td>23rd Feb 2017</td>
                            <td class="text-right">
                                <a class="btn btn-primary">
                                    <i class="batch-icon batch-icon-eye"></i>
                                </a>
                                <a class="btn btn-success">
                                    <i class="batch-icon batch-icon-quill"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media">
                                    <div
                                        class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                                        <img src="assets/img/profile-pic-3.jpg" width="44" height="44">
                                    </div>
                                    <div class="media-body">
                                        <div class="heading mt-1">
                                            Teal'c Jaffa
                                        </div>
                                        <div class="subtext">tealc</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#">tealc.jaffa@kawoosh.com</a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-success">Reviewing</span>
                            </td>
                            <td>15th Jan 2017</td>
                            <td class="text-right">
                                <a class="btn btn-primary">
                                    <i class="batch-icon batch-icon-eye"></i>
                                </a>
                                <a class="btn btn-success">
                                    <i class="batch-icon batch-icon-quill"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="profile-picture bg-gradient bg-secondary float-right d-flex mr-3">
                                        <img src="assets/img/profile-pic-2.jpg" width="44" height="44">
                                    </div>
                                    <div class="media-body">
                                        <div class="heading mt-1">
                                            Samantha Carter
                                        </div>
                                        <div class="subtext">samanthac</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#">samantha.carter@sgc.com</a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-danger">Rejected</span>
                            </td>
                            <td>7th Jan 2017</td>
                            <td class="text-right">
                                <a class="btn btn-primary">
                                    <i class="batch-icon batch-icon-eye"></i>
                                </a>
                                <a class="btn btn-success">
                                    <i class="batch-icon batch-icon-quill"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media">
                                    <div
                                        class="profile-picture bg-gradient bg-secondary has-message float-right d-flex mr-3">
                                        <img src="assets/img/profile-pic-4.jpg" width="44" height="44">
                                    </div>
                                    <div class="media-body">
                                        <div class="heading mt-1">
                                            General Landry
                                        </div>
                                        <div class="subtext">glandry</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#">g.landry@sgc.com</a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-warning">Pending</span>
                            </td>
                            <td>7th Jan 2017</td>
                            <td class="text-right">
                                <a class="btn btn-primary">
                                    <i class="batch-icon batch-icon-eye"></i>
                                </a>
                                <a class="btn btn-success">
                                    <i class="batch-icon batch-icon-quill"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                                        <img src="assets/img/profile-pic-5.jpg" width="44" height="44">
                                    </div>
                                    <div class="media-body">
                                        <div class="heading mt-1">
                                            Daniella Jackson
                                        </div>
                                        <div class="subtext">jacksond</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#">daniella.jackson@chabaai.com</a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-default">Banned</span>
                            </td>
                            <td>5th Jan 2017</td>
                            <td class="text-right">
                                <a class="btn btn-primary">
                                    <i class="batch-icon batch-icon-eye"></i>
                                </a>
                                <a class="btn btn-success">
                                    <i class="batch-icon batch-icon-quill"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                                        <img src="assets/img/profile-pic-6.jpg" width="44" height="44">
                                    </div>
                                    <div class="media-body">
                                        <div class="heading mt-1">
                                            Jacklin O'neil
                                        </div>
                                        <div class="subtext">jakjak</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#">jack.oneill@ancientgene.com</a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-info">Action Required</span>
                            </td>
                            <td>1st Jan 2017</td>
                            <td class="text-right">
                                <a class="btn btn-primary">
                                    <i class="batch-icon batch-icon-eye"></i>
                                </a>
                                <a class="btn btn-success">
                                    <i class="batch-icon batch-icon-quill"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
