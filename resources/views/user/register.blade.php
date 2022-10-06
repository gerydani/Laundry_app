<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">

    <title>Try_Code :')</title>
    <style>
        .input-group {
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="mt-5">
        <div class="container">
            <div class="card" style="padding: 15px;">
                <div class="text-center mb-2">
                    <h4>Register</h4>
                </div>
                <form action="/register/save" role="form" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="example: Saipuddin" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="colFormLabel" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example: saip@gmail.com" value="">
                    </div>
                    <div class="mb-3">
                        <label for="colFormLabel" class="form-label">Nomor Hp</label>
                        <input type="number" class="form-control" id="nohp" name="nohp" placeholder="example: 08636337" value="">
                    </div>
                    <div class="mb-3">
                        <label for="colFormLabel" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="example: Saipuddin713" value="">
                    </div>
                    <div class="mb-3">
                        <label for="colFormLabel" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="" value="">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>