<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h3>Update Person</h3>
        <form action="{{ url('update-person/'.$person->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" value="{{ $person->name }}" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" value="{{ $person->email }}" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">City</label>
                <select name="city" id="" class="form-control">
                    <option {{ $person->city=='Dhaka'? 'selected': '' }} value="Dhaka">Dhaka</option>
                    <option {{ $person->city=='Chattogram'? 'selected': '' }} value="Chattogram">Chattogram</option>
                    <option {{ $person->city=='Sylhet'? 'selected': '' }} value="Sylhet">Sylhet</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Date of Birth</label>
                <input type="date" value="{{ $person->birth_date }}" name="dob" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Salary</label>
                <input type="number" value="{{ $person->salary }}" name="salary" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
</body>
</html>