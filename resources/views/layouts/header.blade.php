<div class="p-2 d-flex px-0 bg-primary shadow-sm rounded justify-content-between align-items-center header animate__animated animate__fadeIn">
        <button class="btn btn-primary d-inline d-lg-none aside-menu-open mb-0">
            <i class="feather-menu fa-2x mb-0"></i>
        </button>
        <form class="d-none d-md-block" action="">

            <div class="form-inline">

                <div class="dropdown mr-3">
                    <a class="btn btn-light bg-transparent text-white border-0 dropdown-toggle text-uppercase" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-plus-circle"></i> Quick Add
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                        <a class="dropdown-item text-uppercase" href="">
                            Add Unit
                        </a>
                    </div>
                </div>
                <div class="form-group mr-2">
                    <input type="text" class="form-control" name="orderCode" placeholder="Find Order" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-light">
                        <i class="fa fa-search text-primary"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="dropdown">
            <a class="btn btn-light bg-transparent text-white border-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset(Auth::user()->photo) }}" class="avatar" alt="">
                <span class="d-none d-lg-inline">
                    {{ Auth::user()->name }}
                </span>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button onclick="return confirm('Are you want to exit?')" type="submit" class="dropdown-item">Logout</button>
                    </form>

            </div>
        </div>
    </div>
