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
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <style>
            html, body {
                background-color: ghostwhite;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="mt-3 ml-3 mr-3 mb-3">
            <div class="container">
            <select class="search form-control" name="search"></select>

                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
                <script type="text/javascript">
                    $('.search').select2({
                        placeholder: 'Search...',
                        ajax: {
                            url: '/search',
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                console.log(data);
                                return {
                                    results:  $.map(data, function (item) {
                                        return { text: item.customer_name }
                                    })
                                };
                            },
                            cache: true
                        }
                    });

                </script>
            </div>

            <form id="formfield" method="post" action="" class="">
                {{csrf_field()}}
                <button type="button" class="btn btn-light font-weight-bold" value="Add Data" onclick="window.location.href = '{{route('add')}}'">Add Data</button>
                <button type="button" class="btn btn-light font-weight-bold" value="Edit Data" onclick="display_edit()">Edit Data</button>
                <button class="btn btn-light font-weight-bold" value="Delete Data" type="submit" onclick="document.getElementById('formfield').action = '{{route('delete_data')}}'">Delete</button>

                <table class="table table-responsive table-hover" style="cursor: default">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col" style="width: 40px"><input type="checkbox" id="check_head" onclick="checkAll()"></th>
                            <th scope="col">@sortablelink('customer_name', 'Name')</th>
                            <th scope="col">@sortablelink('pic_id', 'PIC')</th>
                            <th scope="col">@sortablelink('customer_category', 'Category')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($for_each_cust as $a)
                            <tr>
                                <td><input type="checkbox" name="dataset[]" value="{{$a->customer_id}}" class="text-center"></td>
                                <td>{{$a->customer_name}}</td>
                                <td>{{$a->customer_func->pic_code}}</td>
                                <td>{{$a->customer_category}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$for_each_cust->links()}}
                <div id="edit" class="" style="display: none">
                    <h3>EDIT DATA</h3>
                    <div class="">
                        <div class="col-md-12 m-auto">
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="Nasabah">Nasabah</option>
                                <option value="Debitur">Debitur</option>
                            </select><br>

                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 m-auto">
                            <select name="Pic" class="form-control @error('Pic') is-invalid @enderror">
                                <option value="" disabled selected>Pilih PIC</option>
                                @foreach(\App\Pic::all() as $p)
                                    <option value="{{$p->pic_id}}">{{$p->pic_code}}</option>
                                @endforeach
                            </select><br><br>

                            @error('Pic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 m-auto">
                                <button value="Edit Data" type="submit" onclick="document.getElementById('formfield').action = '{{route('edit_data')}}'" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </body>
    <script>
        function display_edit() {
            var a = document.getElementById("edit");

            if(a.style.display === "block") a.style.display = "none";
            else a.style.display = "block";
        }

        function checkAll(){
            var headCheckbox = document.getElementById('check_head');
            for(let inp of document.querySelectorAll('input')){
                if(inp.type === "checkbox" && inp.name === "dataset[]")
                    !headCheckbox.checked ? inp.checked = false : inp.checked = true;
            }
        }
    </script>
</html>

{{--Create elements through DOM node--}}
{{--function edit_form() {--}}
{{--    //Selection for category--}}
{{--    var new_edit_form = document.createElement("select");--}}
{{--    new_edit_form.name = "kategori";--}}

{{--    var new_opt_1 = document.createElement("option");--}}
{{--    new_opt_1.value = "Nasabah";--}}
{{--    new_opt_1.textContent = "Nasabah";--}}
{{--    var new_opt_2 = document.createElement("option");--}}
{{--    new_opt_2.value = "Debitur";--}}
{{--    new_opt_2.textContent = "Debitur";--}}
{{--    new_edit_form.appendChild(new_opt_1);--}}
{{--    new_edit_form.appendChild(new_opt_2);--}}

{{--    var new_edit_form_2 = document.createElement("select");--}}
{{--    new_edit_form_2.name = "pic";--}}

{{--    @foreach(\App\Pic::all() as $pic)--}}
{{--        var new_opt = document.createElement("option");--}}
{{--        new_opt.value = parseInt("{{$pic->id}}");--}}
{{--        new_opt.textContent = "{{$pic->pic_code}}";--}}
{{--        //Same as Malloc (create a variable for the current scope)--}}
{{--        new_edit_form_2.appendChild(new_opt);--}}
{{--    @endforeach--}}

{{--    var new_btn_submit = document.createElement("button");--}}
{{--    new_btn_submit.value = "Edit Data";--}}

{{--    document.getElementById("editForm").append("Kategori : ");--}}
{{--    document.getElementById("editForm").append(new_edit_form);--}}
{{--    document.getElementById("editForm").append(document.createElement('br'));--}}
{{--    document.getElementById("editForm").append("PIC : ");--}}
{{--    document.getElementById("editForm").append(new_edit_form_2);--}}
{{--    document.getElementById("editForm").append(document.createElement('br'));--}}
