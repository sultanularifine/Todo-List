<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body class="bg">
    <section class="vh-100 bg">
        <div class="container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                <div class="col">
                    <div class="card" id="list1" style="border-radius: .75rem; background: linear-gradient(90deg, rgba(14,30,131,0.9472163865546218) 0%, rgba(56,56,181,1) 10%, rgba(6,173,163,1) 85%);">
                        <div class="card-body py-4 px-4 px-md-5">
                            <p class="h1 text-center mt-3 mb-4 pb-3 text-light">
                                <i class="fas fa-check-square me-1"></i>
                                <u>To-Do List</u>
                            </p>
                            <div class="pb-2">
                                <div class="card bg-secondary">
                                    <div class="card-body bg">
                                        <form action="{{route()}}" method="">
                                            @csrf
                                            <div class="d-flex flex-row align-items-center  ">
                                                <input type="text" name="task_name" value="" class="form-control form-control-lg bg me-3 text-light" id="1" placeholder="User Name">
                                                <input type="password" name="add_date" value="" class="form-control form-control-lg bg me-3 text-light" id="2" placeholder="Password">
                                               
                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-lg ">LogIn</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

</body>

</html>