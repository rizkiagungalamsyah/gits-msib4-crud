 <aside id="left-panel" class="left-panel">
     <nav class="navbar navbar-expand-sm navbar-default">
         <div id="main-menu" class="main-menu collapse navbar-collapse">
             <ul class="nav navbar-nav" id="navMenus">
                 <h3 class="menu-title pl-3">Category</h3>
                 <li>
                     <a href="{{ route('category.index') }}"> <i class="menu-icon fa fa-list"></i>List Category</a>
                 </li>
                 <h3 class="menu-title pl-3">Product</h3>
                 <li>
                     <a href="{{ route('product.index') }}"> <i class="menu-icon fa fa-list"></i>List Product</a>
                 </li>
             </ul>
         </div>
     </nav>
 </aside>
 <script>
     var menuItems = document.querySelectorAll('#navMenus li');

     for (var i = 0; i < menuItems.length; i++) {
         if (menuItems[i].querySelector('a').href === window.location.href) {
             menuItems[i].classList.add('active');
         }
     }
 </script>
