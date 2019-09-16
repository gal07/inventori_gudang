<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <?= $headScript;?>
</head>
<body>
<div class="wrapper">
<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?= base_url() ?>assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    Creative Tim
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    Ct
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?= base_url() ?>assets/img/faces/avatar.jpg" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <?= $this->session->userdata('username') ?>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <li>
                                    <a href="#">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">image</i>
                            <p>Pages
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="pages/pricing.html">Pricing</a>
                                </li>
                                <li>
                                    <a href="pages/timeline.html">Timeline</a>
                                </li>
                                <li>
                                    <a href="pages/login.html">Login Page</a>
                                </li>
                                <li>
                                    <a href="pages/register.html">Register Page</a>
                                </li>
                                <li>
                                    <a href="pages/lock.html">Lock Screen Page</a>
                                </li>
                                <li>
                                    <a href="pages/user.html">User Profile</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#componentsExamples">
                            <i class="material-icons">apps</i>
                            <p>Components
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="componentsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="components/buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="components/grid.html">Grid System</a>
                                </li>
                                <li>
                                    <a href="components/panels.html">Panels</a>
                                </li>
                                <li>
                                    <a href="components/sweet-alert.html">Sweet Alert</a>
                                </li>
                                <li>
                                    <a href="components/notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="components/icons.html">Icons</a>
                                </li>
                                <li>
                                    <a href="components/typography.html">Typography</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#formsExamples">
                            <i class="material-icons">content_paste</i>
                            <p>Forms
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="forms/regular.html">Regular Forms</a>
                                </li>
                                <li>
                                    <a href="forms/extended.html">Extended Forms</a>
                                </li>
                                <li>
                                    <a href="forms/validation.html">Validation Forms</a>
                                </li>
                                <li>
                                    <a href="forms/wizard.html">Wizard</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#tablesExamples">
                            <i class="material-icons">grid_on</i>
                            <p>Tables
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="tablesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="tables/regular.html">Regular Tables</a>
                                </li>
                                <li>
                                    <a href="tables/extended.html">Extended Tables</a>
                                </li>
                                <li>
                                    <a href="tables/datatables.net.html">DataTables.net</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#mapsExamples">
                            <i class="material-icons">place</i>
                            <p>Maps
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="mapsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="maps/google.html">Google Maps</a>
                                </li>
                                <li>
                                    <a href="maps/fullscreen.html">Full Screen Map</a>
                                </li>
                                <li>
                                    <a href="maps/vector.html">Vector Map</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="widgets.html">
                            <i class="material-icons">widgets</i>
                            <p>Widgets</p>
                        </a>
                    </li>
                    <li>
                        <a href="charts.html">
                            <i class="material-icons">timeline</i>
                            <p>Charts</p>
                        </a>
                    </li>
                    <li>
                        <a href="calendar.html">
                            <i class="material-icons">date_range</i>
                            <p>Calendar</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>