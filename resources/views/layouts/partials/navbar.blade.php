<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Student Information App</a>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li>
                    <a class="nav-link" id="btn-login" href=""><i class="fa fa-power-off"></i><span> Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
const Logouturl = "{{ route('logout') }}";
document.getElementById("btn-login").addEventListener("click", function (e) {
    e.preventDefault();
    $.ajax({
        url: Logouturl,
        type: "GET",
        data: {},
        dataType: "JSON",
        success: (res) => {
            if (res.status) {
                localStorage.clear();
                location.replace("{{ route('home') }}");
            }
        },
        error: (e) => {
            console.log(e);
        },
    });
});
</script>

