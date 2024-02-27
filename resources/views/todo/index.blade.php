<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body class="bg">
    <section class="vh-100 bg">
        <div class="container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                <div class="col">
                    <div class="card" id="list1"
                        style="border-radius: .75rem; background: linear-gradient(90deg, rgba(14,30,131,0.9472163865546218) 0%, rgba(56,56,181,1) 10%, rgba(6,173,163,1) 85%);">
                        <div class="card-body py-4 px-4 px-md-5">
                            <p class="h1 text-center mt-3 mb-4 pb-3 text-light">
                                <i class="fas fa-check-square me-1"></i>
                                <u>To-Do List</u>
                            </p>
                            <div class="pb-2">
                                <div class="card bg-secondary">
                                    <div class="card-body bg">
                                        <form action="{{ route('todo.store') }}" method="POST">
                                            @csrf
                                            <div class="d-flex flex-row align-items-center  ">
                                                <input type="text" name="name"
                                                    class="form-control form-control-lg bg me-3 text-light"
                                                    id="1" placeholder="Add new...">
                                                <input type="time" name="time"
                                                    class="form-control form-control-lg bg me-3 text-light"
                                                    id="2" placeholder="Add date...">
                                                <input type="date" name="date"
                                                    class="form-control form-control-lg bg me-3 text-light"
                                                    id="3" placeholder="Due date...">
                                                <div>
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class=" align-items-center d-flex justify-content-between ">
                        <div class=" align-items-center d-flex ">
                            <div class=" py-1 px-2 me-3  border  border-warning d-flex ">
                                <p class="small mb-0 fs-5 text-light">Total Task</p>
                            </div>
                        </div>
                        <div class=" d-flex  ml-auto  ">
                            <div class=" py-1 px-2 me-3 ms-2  border border-warning d-flex ">
                                <p class="small mb-0 fs-5 text-light">Time</p>
                            </div>
                            <div class="py-1 px-2 me-2 border  border-warning d-flex ">
                                <p class="small mb-0 fs-5 text-light">Due Date</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-1">
                        <input class="form-check-input me-0 border  border-primary " name="ids" type="checkbox"
                            value="#" id="all" />
                        <p class="small mb-0 ms-2 me-2 text-light ">Select All</p>
                    </div>
                    <div class="rows">
                        @foreach ($data as $dt)
                            <div class=" align-items-center d-flex justify-content-between ">
                                <div class=" align-items-center d-flex ">
                                    <input class="form-check-input me-0 border border-warning " name="ids"
                                        type="checkbox" value="" id="flexCheckChecked1" />
                                    <li class="list-group-item py-2 border-0 bg-transparent">
                                        <p class="lead fw-normal mb-0 text-light ">{{ $dt->name }}</p>
                                    </li>
                                </div>
                                <div class=" d-flex  ml-auto  ">
                                    <form action="{{ route('todo.destroy', $dt->id) }}" method="Post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger ms-2">Delete</button>
                                    </form>
                                    <a href="{{ route('todo.edit', $dt->id) }}"><button type="button" id=""
                                            class="btn btn-info ms-3">Edit</button></a>
                                    <div class=" py-2 px-3 me-2 ms-3 border border-warning d-flex bg-light">
                                        <p class="small mb-0"></i>{{ $dt->time }}</p>
                                    </div>
                                    <div class="text-end  py-2 px-3 me-2 border border-warning d-flex bg-light">
                                        <p class="small mb-0">{{ $dt->date }} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
