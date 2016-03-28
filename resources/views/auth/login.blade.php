<!DOCTYPE html>
<html>
<head>
  <title>Capacitación | Login</title>
</head>
<body>
<div class="row">
  <div class="col-md-4 col-md-offset-2">
    <div class="alert alert-danger">
      @foreach($errors->all() as $err)
        <p>{{$err}}</p>
      @endforeach
    </div>
    <form action="/auth/login" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label>Username</label>
        <input class="form-control" type="text" autocomplete="off"
          name="username" value="{{old('username')}}"
        />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" />
      </div>
      <div class="form-group center">
        <button class="btn btn-success" type="submit">Login</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
