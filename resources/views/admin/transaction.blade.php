@extends('admin.home')

@section('content')
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Pencairan Saldo
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-money"></i>Pencairan Saldo</a></li>
                </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Pencairan Saldo</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Pencairan</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $index => $item)
                                        @php
                                            $tanggal = new Carbon($item->created_at);
                                        @endphp
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $tanggal->format('d F Y') }}</td>
                                            <td>{{ rupiah($item->total_pencairan) }}</td>
                                            <td>
                                                <button data-id="{{ $item->id }}" class="btn btn-success btn-cairkan">Proses</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @if(count($data) === 0)
                                        <tr>
                                            <td style="text-align: center;" colspan="5">Tidak ada permintaan pencairan saldo.</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{ csrf_field() }}
@endsection