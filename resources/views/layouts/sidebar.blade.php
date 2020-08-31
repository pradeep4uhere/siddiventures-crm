<style type="text/css">
  .selected{
    background-color: white;
    margin-left: -4px !important;
    padding-left: 4px;
  }
</style>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php  $path = $_SERVER['PATH_INFO'];  ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <?php $menuarr = GeneralHelper::getAllSideBarMenu();?>
         <li class="header"><h4>Balance: {{GeneralHelper::getAmount(GeneralHelper::getWalletBalance())}}<h4></li>
         <li class="treeview <?php if($path=='/setting'){ ?>active <?php } ?>">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>General Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="<?php if($path=='/setting'){ ?>selected <?php } ?>"><a class="nav-link" href="{{ route('setting') }}"><i class="fa fa-gear"></i>&nbsp;Setting</a></li>
          </ul>
        </li>

       
        <li class="treeview <?php if($path=='/addmenu'){ ?> active <?php } ?> <?php if(strpos($path, 'menutype')!== false){ ?> active <?php } ?>">
          <a href="#">
            <i class="fa fa-list"></i> <span>Menu Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu active">
            <?php if(!empty($menuarr)){ ?>
            <?php foreach($menuarr as $firstLevelItem){  ?>
            <li class="treeview menu-open <?php if(($path=='/menutype/'.$firstLevelItem['id'])){ ?> menu-open <?php } ?>" <?php if(strpos($path, '/menutype/'.$firstLevelItem['id'])!== false){ ?> style="display:block !important;" <?php } ?>>
              <a href="{{route('menutype',['id'=>$firstLevelItem['id']])}}"><i class="fa fa-hand-o-right"></i> {{$firstLevelItem['title']}}
                <?php if(!empty($firstLevelItem['child_menu'])){ ?>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              <?php } ?>
              </a>
              <?php if(array_key_exists('child_menu', $firstLevelItem)){ ?>
              <ul class="treeview-menu menu-open" 
                <?php 
                if(($path=='/menutype/'.$firstLevelItem['id'])){  ?> style="display:block !important" <?php } ?>>
                <?php if(!empty($firstLevelItem['child_menu'])){ ?>
                <?php foreach($firstLevelItem['child_menu'] as $secondLevelItem){ ?>
                    <!--Check Is this child Item has Child or not-->
                    <li style="display: block;"><a href="{{route('menutype',['id'=>$secondLevelItem['id']])}}"><i class="fa fa-hand-o-right"></i>{{$secondLevelItem['title']}}</a></li>
                <?php } ?>
                <?php } ?>
              </ul>
            <?php } ?>

            </li>
          <?php } ?>
          <?php } ?>
           <li><a class="nav-link" href="{{ route('addmenu') }}"><i class="fa fa-plus"></i> Add Menu</a></li>
        </ul>
          <li class="treeview 
          <?php if($path=='/transactiontypes'){ ?>active <?php } ?>
          <?php if($path=='/usercommission'){ ?>active <?php } ?>
          ">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Commission Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="<?php if($path=='/transactiontypes'){ ?>selected <?php } ?>"><a class="nav-link" href="{{ route('transactiontypes') }}"><i class="fa fa-gear"></i>All Commission Type</a></li>
          <li class="<?php if($path=='/usercommission'){ ?>selected <?php } ?>"><a class="nav-link" href="{{ route('usercommission') }}"><i class="fa fa-gear"></i>DS/RO Commission Setting</a></li>
          </ul>
        </li>

               
         <!-- <li><a class="nav-link" href="{{ route('allpages') }}"> <i class="fa fa-tag"></i></i>Manage Pages</a></li> -->

         <li class="treeview 
          <?php if(strpos($path, '/createpage')!== false){ ?> active <?php } ?>
          <?php if(strpos($path, '/allpages')!== false){ ?> active <?php } ?> 
          <?php if(strpos($path, '/editpage')!== false){ ?> active <?php } ?>" >
          <a href="#">
            <i class="fa fa-file-code-o"></i>
            <span>Page Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="<?php if($path=='/allpages'){ ?>selected <?php } ?>"><a class="nav-link" href="{{route('allpages')}}"><i class="fa fa-list"></i> All Pages</a></li>
           <li class="<?php if($path=='/createpage'){ ?>selected <?php } ?>"><a class="nav-link" href="{{route('createpage')}}"><i class="fa fa-plus"></i> Add New Page</a></li>

          </ul>
        </li>



         <li class="treeview 
          <?php if(strpos($path, '/alldslist')!== false){ ?> active <?php } ?>
           <?php if(strpos($path, '/allrolist')!== false){ ?> active <?php } ?>
          "> 
          <a href="#">
            <i class="fa fa-file-code-o"></i>
            <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="<?php if($path=='/alldslist'){ ?>selected <?php } ?>"><a class="nav-link" href="{{route('alldslist')}}"><i class="fa fa-list"></i> All DS List</a></li>
           <li class="<?php if($path=='/allrolist'){ ?>selected <?php } ?>"><a class="nav-link" href="{{route('allrolist')}}"><i class="fa fa-list"></i> All RO List</a></li>

          </ul>
        </li>


         <li class="treeview 
          <?php if(strpos($path, '/alldsbalancerequest')!== false){ ?> active <?php } ?>
          <?php if(strpos($path, '/allrobalancerequest')!== false){ ?> active <?php } ?>
         
          "> 
          <a href="#">
            <i class="fa fa-file-code-o"></i>
            <span>Balance Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="<?php if($path=='/alldsbalancerequest'){ ?>selected <?php } ?>"><a class="nav-link" href="{{route('alldsbalancerequest')}}"><i class="fa fa-list"></i> All Request From DS</a></li>
           <li class="<?php if($path=='/allrobalancerequest'){ ?>selected <?php } ?>"><a class="nav-link" href="{{route('allrobalancerequest')}}"><i class="fa fa-list"></i> All Request From RO</a></li>

          </ul>
        </li>



        <li class="treeview 
          <?php if(($path=='/contactuslist')){ ?> active <?php } ?>
          
          " >
          <a href="#">
            <i class="fa fa-file-word-o"></i>
            <span>Contact Us</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu  <?php if(($path=='/contactuslist')){ ?> active <?php } ?>">
           <li class="
           <?php if($path=='/contactuslist'){ ?>selected <?php } ?>
            <?php if(strpos($path, '/contactuslist')!== false){ ?> active <?php } ?>
           "><a class="nav-link" href="{{route('contactuslist')}}"><i class="fa fa-list"></i> All Enquiry</a></li>
          

          </ul>
        </li>

       
         
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
