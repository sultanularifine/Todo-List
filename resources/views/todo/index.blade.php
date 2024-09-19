<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body class="bg">
    <section class="vh-100 bg">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-md-10">
                    <div class="card" id="list1"
                        style="border-radius: .75rem; background: linear-gradient(90deg, rgba(14,30,131,0.9472163865546218) 0%, rgba(56,56,181,1) 10%, rgba(6,173,163,1) 85%);">
                        <div class="card-body py-4 px-4 px-md-5">
                            <p class="h1 text-center mt-3 mb-4 pb-3 text-light">
                                <i class="fas fa-check-square me-1"></i>
                                <u>To-Do List</u>
                            </p>

                            <!-- Task Form -->
                            <div class="pb-2">
                                <div class="card bg-secondary">
                                    <div class="card-body">
                                        <form action="{{ route('todo.store') }}" method="POST">
                                            @csrf
                                            <div class="d-flex flex-column flex-md-row align-items-md-center">
                                                <input type="text" name="name" class="form-control form-control-lg bg me-3 text-light mb-3 mb-md-0" placeholder="Add new task...">
                                                <input type="time" name="time" class="form-control form-control-lg bg me-3 text-light mb-3 mb-md-0" placeholder="Add time...">
                                                <input type="date" name="date" class="form-control form-control-lg bg me-3 text-light mb-3 mb-md-0" placeholder="Add due date...">
                                                <button type="submit" class="btn btn-primary w-100 w-md-auto">Add</button>
                                            </div>
                                        </form>
                                        <ul class="mt-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Task List Header -->
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="small mb-0 fs-5 text-light">Total Task</p>
                                <div class="d-flex">
                                    <p class="small mb-0 fs-5 text-light me-3">Time</p>
                                    <p class="small mb-0 fs-5 text-light">Due Date</p>
                                </div>
                            </div>

                            <!-- Task List -->
                            <div class="rows">
                                @foreach ($data as $dt)
                                    <div class="d-flex justify-content-between align-items-center my-2">
                                        <div class="d-flex align-items-center">
                                            <input class="form-check-input me-2" type="checkbox" name="ids" />
                                            <p class="lead fw-normal mb-0 text-light">{{ $dt->name }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <form action="{{ route('todo.destroy', $dt->id) }}" method="Post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger ms-2">Delete</button>
                                            </form>
                                            <a href="{{ route('todo.edit', $dt->id) }}" class="btn btn-info ms-2">Edit</a>
                                            <div class="py-2 px-3 ms-2 border border-warning d-flex bg-light">
                                                <p class="small mb-0">{{ $dt->time }}</p>
                                            </div>
                                            <div class="py-2 px-3 ms-2 border border-warning d-flex bg-light">
                                                <p class="small mb-0">{{ $dt->date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>

    <script>
        $('#all').change(function(e) {
            if (e.currentTarget.checked) {
                $('.rows').find('input[type="checkbox"]').prop('checked', true);
            } else {
                $('.rows').find('input[type="checkbox"]').prop('checked', false);
            }
        });
    </script>
</body>

</html>
