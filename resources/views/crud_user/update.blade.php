<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style>
        header,
        footer,
        .content {
            text-align: center;
            border: 2px solid black;
            margin-bottom: 100px;
        }

        footer{
            margin-bottom: 0;
            inset: 0;
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
            margin: 5px;
            color: black;
        }

        .content {
            width: 500px;
            height: auto;
            left: calc((100% - 500px)/2);
            top: 0;
            position: relative;
        }


        .button {
            display: inline-flex;
            margin-top: 50px;
            width: 90%;
            left: 30%;
            align-items: center;
            text-align: center;
            position: relative;
            padding-left: 20px;
        }

        .register-btn {
            background-color: aqua;
            border-radius: 3px;
            width: 30%;
            height: 40px;
        }

        .label {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .label label {
            width: 100px;
            text-align: right;
            margin-right: 10px;
        }
        .label input {
            flex: 0.8;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <header>
        <ul>
            <li>
                <a href="./index.html">Home</a>
                <a href="#" style="font-weight: bold;">Cập nhật</a>
            </li>
        </ul>
    </header>
    <div class="content">
        <div class="login-box">
            <div class="title">
                <h3>Màn hình cập nhật</h3>
            </div>
            <form action="{{ route('user.postUpdateUser') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" width="100">

            <input name="id" type="hidden" value="{{$user->id}}">
            <div class="username label">
                <label for="username">Username</label>
                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                           value="{{ $user->name }}"
                                           required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
            </div>
            <br>
            <div class="phone label">
                <label for="phone">Phone</label>
                <input type="text" placeholder="Name" id="phone" class="form-control" name="phone"
                                           value="{{ $user->phone }}"
                                           required autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
            </div>
            <br>
            <div class="address label">
                <label for="address">Address</label>
                <input type="text" placeholder="Address" id="name" class="form-control" name="address" value="{{ $user->address }}"
                                           required autofocus>
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
            </div>
            <br>

            <div class="like label">
                <label for="like">so thich</label>
                <input type="text" placeholder="so thich" id="name" class="form-control" name="like" value="{{ $user->like }}"
                                           required autofocus>
                                    @if ($errors->has('like'))
                                        <span class="text-danger">{{ $errors->first('like') }}</span>
                                    @endif
            </div>
            <br>

            <div class="linkfb label">
                <label for="linkfb">Link</label>
                <input type="text" placeholder="link fb" id="linkfb" class="form-control" name="linkfb" value="{{ $user->linkfb }}"
                                           required autofocus>
                                    @if ($errors->has('linkfb'))
                                        <span class="text-danger">{{ $errors->first('linkfb') }}</span>
                                    @endif
            </div>
            <br>

            <div class="mail label">
                <label for="mail">Mail</label>
                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                           value="{{ $user->email }}"
                                           name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
            </div>
            <br>
            <div class="password label">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" class="form-control"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
            </div>
            <br>

            <div class="image label">
                <label for="avatar">hinh anh</label>
                <input type="file" name="avatar" id="avatar" class="form-control" required>
            </div>
            <br>
           
            <div class="button">

                <button class="register-btn" type="submit">Cập nhật</button>
            </div>
    </form>
        </div>
    </div>
    <footer>
        <h4>Lập trình web @2024</h4>
    </footer>
</body>
</html>