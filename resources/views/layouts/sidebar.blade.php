<div id="sidebar" class='active'>
  <div class="sidebar-wrapper active">
      <div class="sidebar-header">
          <h2 class="mt-2"><strong>Book Rental</strong></h2>
      </div>
      <div class="sidebar-menu">
          <ul class="menu">
            <li class='sidebar-title'>Main Menu</li>
            @if (Auth::user())
                @if (Auth::user()->role_id == 1)
                <li class="sidebar-item @if (Route::is('dashboard')) active @endif">
                    <a href={{ route('dashboard') }} class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::is('books')) active @elseif (Route::is('booksAdd')) active @elseif (Route::is('booksEdit')) active @elseif (Route::is('booksSoftDelete')) active  @endif">
                    <a href={{ route('books') }} class='sidebar-link'>
                        <i data-feather="book" width="20"></i>
                        <span>Books</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::is('categories')) active @elseif (Route::is('categoriesAdd')) active @elseif (Route::is('categoriesEdit')) active @elseif (Route::is('categoriesSoftDelete')) active @endif">
                    <a href="{{ route('categories') }}" class='sidebar-link'>
                        <i data-feather="grid" width="20"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::is('users')) active @elseif (Route::is('usersAdd')) active @elseif (Route::is('usersActived')) active @elseif (Route::is('usersDetail')) active @elseif (Route::is('usersBannedView')) active @endif">
                    <a href="{{ route('users') }}" class='sidebar-link'>
                        <i data-feather="user" width="20"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::is('book-lists')) active @endif ">
                    <a href="/book-lists" class='sidebar-link'>
                        <i data-feather="list" width="20"></i>
                        <span>Book Lists</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::is('rentLog')) active @endif">
                    <a href="{{ route('rentLog') }}" class='sidebar-link'>
                        <i data-feather="info" width="20"></i>
                        <span>Rent Log</span>
                    </a>
                </li>

                <li class="sidebar-item @if (Route::is('bookRent')) active @endif">
                    <a href="{{ route('bookRent') }}" class='sidebar-link'>
                        <i data-feather="plus-circle" width="20"></i>
                        <span>Book Rent</span>
                    </a>
                </li>
                <li class="sidebar-item  @if (Route::is('returnBook')) active @endif">
                    <a href="{{ route('returnBook') }}" class='sidebar-link'>
                        <i data-feather="rewind" width="20"></i>
                        <span>Return Book</span>
                    </a>
                </li>
               
                <li class="sidebar-item">
                    <a href="{{ url('/logout') }}" class='sidebar-link'>
                        <i data-feather="log-out" width="20"></i>
                        <span>Log Out</span>
                    </a>
                </li>
                @else  
                <li class="sidebar-item @if (Route::is('profile')) active @endif">
                    <a href="/profile" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::is('book-lists')) active @endif ">
                    <a href="/book-lists" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Book Lists</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::is('bookRent')) active @endif">
                    <a href="{{ route('bookRent') }}" class='sidebar-link'>
                        <i data-feather="plus-circle" width="20"></i>
                        <span>Book Rent</span>
                    </a>
                </li>
                <li class="sidebar-item  @if (Route::is('returnBook')) active @endif">
                    <a href="{{ route('returnBook') }}" class='sidebar-link'>
                        <i data-feather="rewind" width="20"></i>
                        <span>Return Book</span>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::is('logout')) active @endif">
                    <a href="{{ url('/logout') }}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Log Out</span>
                    </a>
                </li>
                @endif
            @endif
          </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>