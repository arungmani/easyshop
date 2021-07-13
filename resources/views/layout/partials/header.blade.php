<!--Main Navigation-->
<header>
   @php
   $role = Auth::user()->role;
   $name = Auth::user()->name;
   @endphp
   <!-- Sidebar navigation -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
     
      <!-- Sidebar -->
      <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!--  <div class="image">
               <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
               </div>-->
            <div class="info">
               <a href="{{ url('home') }}" class="d-block" style="font-size:27px;"><img src="{{asset('web/assets/images/logo/1.svg')}}" >@if($role==1) Easyshop Admin @elseif($role==2) Easyshop Sub Admin @elseif($role==3) Shop Admin @lseif($role==4)  @elseif($role==5) @php echo $name;@endphp @endif</a>
            </div>
         </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview menu-open">
                  <a href="{{ url('home') }}" class="nav-link active">
                     <i class="nav-icon fas fa-tachometer-alt"></i>
                     <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                     </p>
                  </a>
               </li>
               @if($role==1)
               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('category') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Category</p>
                                 </a>
                               </li>
                            
                               <li class="nav-item">
                                 <a href="{{ url('assignvariants') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Assign Variant Types</p>
                                 </a>
                               </li>
                             
                             </ul>
               </li>
               <!-- <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Variant Types
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('variant_type') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Variant Type</p>
                                 </a>
                               </li>
                            
                              
                             
                             </ul>
               </li> -->
               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                     Variants
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('variant_type') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Variant Types</p>
                                 </a>
                               </li>
                            
                              
                             
                             </ul>
                             <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('variants') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Variants</p>
                                 </a>
                               </li>
                            
                              
                             
                             </ul>
               </li>
               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Banners
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('banners') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Banners</p>
                                 </a>
                               </li>
                            
                              
                             
                             </ul>
               </li>
               <!-- <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Offers
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('catoffers') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Category Offers</p>
                                 </a>
                               </li>
                            
                              
                             
                             </ul>
               </li> -->

               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Products
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('catproducts') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Category Products</p>
                                 </a>
                               </li>
                            
                              
                             
                             </ul>
               </li>
               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Shops
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  
                <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('shopreg') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Shopreg</p>
                                 </a>
                               </li>
                           
                              
                             
                             </ul>
                                
                <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('shoplistbanner') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Shoplist Banner</p>
                                 </a>
                               </li>
                           
                              
                             
                             </ul>
                             <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('shopbanner') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Shop Banners</p>
                                 </a>
                               </li>
                           
                              
                             
                             </ul>
               </li>

               <!-- <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Shop Products
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                        <a href="{{ url('shopproducts') }}" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p> Shop Products</p>
                        </a>
                     </li>
                  </ul>
               </li> -->


               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                       Orders
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  
                <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('orders') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Orders</p>
                                 </a>
                               </li>
                           
                              
                             
                             </ul>
               </li>

               <!-- <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Customers
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               </li>
               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Admins
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               </li>
               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Orders
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               </li>
               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Customer Feedbacks
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               </li>
           
               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Shop Staffs
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               </li> -->
               @elseif($role==2)
               @elseif($role==3)
               @elseif($role==5)
              
			   <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Shop Products
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('shopproducts1') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Shop Products</p>
                                 </a>
                               </li>
                           
                              
                             
                             </ul>
               </li>
              
			   <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                        Orders
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                                 <a href="{{ url('orders1') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p> Orders</p>
                                 </a>
                               </li>
                           
                              
                             
                             </ul>
               </li>
			   @elseif($role==6)
			   
               @endif
            </ul>
         </nav>
         <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
   </aside>
   <!--/. Sidebar navigation -->
   @include('layout.partials.nav')
</header>
<!--Main Navigation-->