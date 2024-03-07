<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<div class="card p-4" style="width: 300px;margin: auto;margin-top: 100px;">

    <div class="card-header">
        <h5>Login</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('post_login') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
            <input class="form-control" name="username" type="text" placeholder="Username">
            </div>

            <div class="mb-3">
            <input class="form-control" name="password" type="password" placeholder="Password">
            </div>

            <button class="btn btn-sm btn-primary" type="submit">Login</button> 
            <span style="color:#495057;font-size: 0.8rem;">Plase ask admin to create an account!</span>
        </form>
    </div>

</div>

