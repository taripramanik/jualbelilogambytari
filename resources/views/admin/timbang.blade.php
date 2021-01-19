@extends('admin.home')

@section('content')
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Pengumpulan Sampah
                    <small>Proses Pengumpulan Sampah</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Pengumpulan</a></li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Pengumpulan
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(['route' => 'admin.timbang.save']) !!}
                                    {!! Form::hidden('data', $id) !!}
                                    <div class="row">
                                        <div class="col-xs-12 form-group">
                                            {!! Form::label('berat_sampah', 'Berat Sampah', ['class' => 'control-label']) !!}
                                            <div class="input-group">
                                                {!! Form::text('berat', $data['berat'], ['class' => 'form-control', 'placeholder' => '', 'readonly' => true]) !!}
                                                <span class="input-group-addon" id="basic-addon2">kilogram</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            {!! Form::label('petugas', 'Petugas', ['class' => 'control-label']) !!}
                                            {!! Form::text('petugas', null, ['class' => 'form-control', 'placeholder' => '', 'required' => true]) !!}
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            {!! Form::label('lokasi', 'Lokasi', ['class' => 'control-label']) !!}
                                            {!! Form::text('lokasi', null, ['class' => 'form-control', 'placeholder' => '', 'required' => true]) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="submit" class="btn btn-success" value="Proses">
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
@endsection