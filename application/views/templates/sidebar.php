<div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="<?= base_url('assets/images/logo.png')?>" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="<?= base_url($pages)?>" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li><a href="<?= base_url($pages.'/'.$page1);?>"> <?php echo $page1; ?></a></li>
                                    <li><a href="<?= base_url($pages.'/'.$page2);?>"> <?php echo $page2; ?></a></li>
                                </ul>
                            </li>
                    </nav>
                </div>
            </div>
        </div>