<?php
$menus = App\Utils::AcessoMenu(Auth::user()->id);
?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

        <?php 
            foreach($menus as $id):
                $menu    = App\Utils::GetMenu($id);
                $submenus = App\Utils::GetSubMenu($id);
                $nav = (Request::segment(1)==$menu['url']) ? true : false ;
        ?>
            <li class="nav-item <?php echo ($nav==true) ? 'start active open' : ''; ?>">
                <a href="<?php echo url('').'/'.$menu['url'] ?>" class="nav-link nav-toggle">
                    <i class="<?php echo $menu['icone']?>"></i>
                    <span class="title"><?php echo strtolower($menu['nome'])?></span>
                    <?php if($nav==true){ ?>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                    <?php } ?>
                </a>
                <?php if(count($submenus)>0){ ?>
                    <ul class="sub-menu">
                    <?php foreach ($submenus as $submenu): ?>                        
                        <li class="nav-item">
                            <a href="<?php echo url('').'/'.$submenu['url'] ?>" class="nav-link ">
                                <i class="<?php echo $submenu['icone']?> "></i>
                                <span class="title"><?php echo $submenu['nome']?></span>
                            </a>
                        </li>
                    <?php endforeach ?>
                    </ul>
                <?php } ?>
            </li>
        <?php
            endforeach;
        ?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
