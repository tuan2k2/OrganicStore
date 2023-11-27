 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Home Page <sup>2</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="#">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
             <i class="fas fa-fw fa-cog"></i>
             <span>Quản lý danh mục</span>
         </a>
         <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Danh mục sản phẩm</h6>
                 <a class="collapse-item" href="{{Route('addDanhMuc')}}">Thêm danh mục</a>
                 <a class="collapse-item" href="{{Route('allDanhMuc')}}">Liệt kê danh mục</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
             <i class="fas fa-fw fa-cog"></i>
             <span>Quản lý sản phẩm</span>
         </a>
         <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Sản phẩm</h6>
                 <a class="collapse-item" href="{{Route('addSanPham')}}">Thêm sản phẩm</a>
                 <a class="collapse-item" href="{{Route('allSanPham')}}">Liệt kê sản phẩm</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#collapseOrder" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOrder">
             <i class="fas fa-fw fa-cog"></i>
             <span>Đơn Hàng</span>
         </a>
         <div id="collapseOrder" class="collapse" aria-labelledby="headingOrder" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{Route('manageOrder')}}">Quản lý đơn hàng</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#collapseDiscount" data-toggle="collapse" aria-expanded="false" aria-controls="collapseDiscount">
             <i class="fas fa-fw fa-cog"></i>
             <span>Mã giảm giá</span>
         </a>
         <div id="collapseDiscount" class="collapse" aria-labelledby="headingDiscount" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="{{ Route('admin.insretCoupon') }}">Thêm mã giảm giá</a>
                 <a class="collapse-item" href="{{ Route('admin.listCoupon') }}">Danh sách mã giảm giá</a>
             </div>
         </div>
     </li>
 </ul>


 <!-- End of Sidebar -->