<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Multiple Image Upload example - NiceSnippets.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style type="text/css">
    h2{
        text-align: center;
        font-size:22px;
        margin-bottom:50px;
    }
    body{
        background:#f2f2f2;
    }
    .section{
        margin-top:150px;
        padding:50px;
        background:#fff;
    }
</style>
<body>
    <div class="container">
        <div class="col-md-8 section offset-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2> Image Upload here</h2>
                </div>
                <div class="panel-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('multiple.image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <input type="file" name="file[]" accept="image/*" multiple="multiple" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            @if ($images = Session::get('files'))
                                @foreach($images as $value)
                                <div class="col-md-2">
                                    <img src="{{ asset('images/'.$value) }}" width="100">
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
