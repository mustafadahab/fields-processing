
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if(Auth::check())
                    <ul class="nav navbar-nav ">
                        <li><a href="{{ route('add-field') }}">Add A Field</a></li>
                        <li><a href="{{ route('add-tractor') }}">Add Tractor</a></li>
                        <li><a href="{{ route('paf-create') }}">Processing A Field</a></li>
                        <li><a href="{{ route('display-reports') }}">Reports</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="{{ route('logout') }}">Logout</a></li>

                    </ul>
                        @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('welcome') }}">Sign in/up</a></li>
                    </ul>

                        @endif
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
