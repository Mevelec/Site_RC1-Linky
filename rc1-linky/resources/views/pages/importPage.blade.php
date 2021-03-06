@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <body class="hold-transition skin-blue sidebar-mini">
        @include('navbar.navbarHeader')
        @include('navbar.navbarSidebar',['page'=>'consoView'])
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Importer
                        <small>Importer un fichier</small>
                    </h1>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Importer votre fichier de consommation</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="file_upload">Selectionner un fichier</label>
                                                <input type="file" id="file_upload" name="file_upload" accept=".csv">

                                                <p class="help-block">Le fichier selectionner sera stocké sur nos serveur et restera strictement confidentiel. </p>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Envoyer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Récupération via Enedis</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <p class="help-block" id="returnMsg">Si vous cliquez sur le bouton ci-dessous nous allons récupérer les données de votre consommation automatiquement</p>
                                        <button  class="btn btn-primary" onclick="loadEnedis()">Récupérer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </body>
    </div>

    <style>
        .loader {
            border: 3px solid #f3f3f3; /* Light grey */
            border-top: 3px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>


@endsection
@section('script')
    <script>
            function loadEnedis(){
                $("#returnMsg").empty();
                $("#returnMsg").append("<div class='loader'></div>");

            $.ajax({
                type:'get',
                url:'/loadViaEnedis',
                success:function(data){
                    data = JSON.parse(data);
                    var msg="";
                    if(data.status === "ok"){
                        msg='<div class="form-group col-xs-12"><div class="alert alert-success alert-dismissible col-xs-3"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i>Récupération réussie !</h4>';
                    }else{
                        msg='<div class="form-group col-xs-12"><div class="alert alert-warning alert-dismissible col-xs-3"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i>'+data.error+'</h4>';
                    }
                    $("#returnMsg").empty();
                    $("#returnMsg").append(msg);
                }
            });
        }
    </script>
@endsection
