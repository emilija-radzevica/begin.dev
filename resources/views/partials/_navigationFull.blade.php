<nav class="nav">
    <ul>
        <div class="navigation">
            <li><a href="/">Home</a></li>
            <li><a href="/profile">Profile</a></li>
            <li class="create"><a href="/posts/create">Create</a></li>
        </div>
        <div class="login">
            <li><span>Welcome {{auth()->user()->username}}</span></li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="logout">Log out</button>
                </form>     
            </li>
        </div>
    </ul>
</nav>