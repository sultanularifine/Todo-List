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
    <section class="vh-100 ">
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
                                <div class="card bg">
                                    <div class="card-body bg">
                                        <form action="{{route('todo.update',$data->id)}}" method="Post">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex flex-row align-items-center bg card-input">
                                                <input type="text" name="name" value="{{!empty($data)? $data->name : ''}}" class="form-control form-control-lg bg text-light" id="1" placeholder="Add new...">
                                                <input type="time" name="time" value="{{!empty($data)? $data->time : ''}}" class="form-control form-control-lg bg text-light " id="2" placeholder="Add date...">
                                                <input type="date" name="date" value="{{!empty($data)? $data->date : ''}}" class="form-control form-control-lg bg text-light" id="3" placeholder="Due date...">
                                                 <div>
                                                   <button type="submit" class="btn btn-primary">Update</button>
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
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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