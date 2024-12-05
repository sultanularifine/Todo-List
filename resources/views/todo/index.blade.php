<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body class="bg">
    <section class="vh-100 bg">
        <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-md-12">
                        <div class="card shadow-lg" id="list1"
                            style="border-radius: 20px; background: linear-gradient(120deg, #1f3b73, #3d80b4);">
                            <div class="card-body py-4 px-4 px-md-5">
                                <div class="text-center mt-3 mb-4 pb-3">
                                    <p class="h4 text-light position-relative d-inline-block"
                                        style="font-weight: 700; font-family: 'Poppins', sans-serif; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                                        <i class="fas fa-tasks me-2 " style="color: #FFC107;"></i>
                                        <span
                                            style="background: linear-gradient(90deg, #ff6b6b, #f7b42c); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">To-Do
                                            List</span>
                                        <span class="underline"></span>
                                    </p>
                                </div>
                                <!-- Task Form -->
                                <div class="">
                                    <div class="card border-0 shadow-sm"
                                        style="background-color: rgba(255, 255, 255, 0.1); border-radius: 15px;">
                                        <div class="card-body">
                                            <form action="{{ route('todo.store') }}" method="POST">
                                                @csrf
                                                <div class="row g-1">
                                                    <div class="col-md-4">
                                                        <input type="text" name="name"
                                                            class="form-control form-control-lg bg-light text-dark"
                                                            placeholder="Task name..." />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" name="time"
                                                            class="form-control form-control-lg bg-light text-dark" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="date" name="date"
                                                            class="form-control form-control-lg bg-light text-dark" />
                                                    </div>
                                                    <div class="col-md-2 d-grid">
                                                        <button type="submit" class="btn btn-success btn-lg">Add
                                                            Task</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @if ($errors->any())
                                                <ul class="mt-3 text-danger">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Task List Header -->
                                <div class="d-flex justify-content-between align-items-center px-3 py-2 rounded shadow-sm"
                                    style="background-color: rgba(255, 255, 255, 0.3);">
                                    <p class="small mb-0 fs-5 text-light w-50">Tasks</p>
                                    <div class="d-flex justify-content-between w-50">
                                        <p class="small mb-0 fs-5 text-light">Time</p>
                                        <p class="small mb-0 fs-5 text-light">Due Date</p>
                                        <p class="small mb-0 fs-5 text-light text-end">Actions</p>
                                    </div>
                                </div>
                                <!-- Task List -->
                                <div class="rows mt-3">
                                    @foreach ($data as $index => $dt)
                                        <div class="task-item d-flex justify-content-between align-items-center mb-3 p-3 rounded shadow-sm"
                                            style="background-color: rgba(255, 255, 255, 0.2);">
                                            <div class="d-flex align-items-center" style="gap: 1rem;">
                                                <!-- Gap for number and name -->
                                                <span class="badge bg-light text-dark">{{ $index + 1 }}</span>
                                                <p class="lead fw-normal mb-0 text-light">{{ $dt->name }}</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between gap-3 w-50">
                                                <span class="badge bg-info text-dark p-2">
                                                    {{ \Carbon\Carbon::parse($dt->time)->format('h:i A') }} <!-- Time in 12-hour format -->
                                                </span>
                                                <span class="badge bg-warning text-dark p-2">
                                                    {{ \Carbon\Carbon::parse($dt->date)->format('j F Y') }} <!-- Date in "1 January 2000" format -->
                                                </span>
                                                
                                                <div class="d-flex align-items-center gap-3">
                                                    <!-- Edit Button with Icon Only -->
                                                    <a href="{{ route('todo.edit', $dt->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                                    </a>
                                                    
                                                    <!-- Delete Button with Icon Only -->
                                                    <form action="{{ route('todo.destroy', $dt->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash-alt"></i> <!-- Trash Icon for Delete -->
                                                        </button>
                                                    </form>
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
