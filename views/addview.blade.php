<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <style>
        html, body {
            background-color: ghostwhite;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 15px;
        }
    </style>
</head>
<body>
    <div class="">
        <h3>ADD DATA</h3>
        <form method="post" action="">
            {{ csrf_field() }} {{--performed on behalf of an authenticated user--}}
            <div class="">
                <div class="col-md-12 m-auto">
                    <input type="text" name="name" placeholder="Tulis nama lengkap Anda.. (maks: 100 karakter)" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12 m-auto">
                    <select name="category" class="form-control @error('category') is-invalid @enderror">
                        <option value="" selected style="display: none">Pilih Kategori</option>
                        <option value="Nasabah">Nasabah</option>
                        <option value="Debitur">Debitur</option>
                    </select>

                    @error('category')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-12 m-auto">
                    <select name="Pic" class="form-control @error('Pic') is-invalid @enderror">
                        <option value="" selected style="display: none">Pilih PIC</option>
                        @foreach(\App\Pic::all() as $p)
                            <option value="{{$p->pic_id}}">{{$p->pic_code}}</option>
                        @endforeach
                    </select>

                    @error('Pic')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12 m-auto">
                        <button value="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
