@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Room</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Room</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0"> </h5>
                        <div>
                            <a href="{{ url('/room/tambah') }}" class="btn btn-primary btn-sm"><i
                                    class="bi bi-plus-square"></i> Add Room</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Room</th>
                                    <th>Kontak Person</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i>
                                            Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
                                            Hapus</a>
                                    </td>
                                    <td>Graiden</td>
                                    <td>vehicula.aliquet@semconsequat.co.uk</td>
                                    <td>076 4820 8838</td>
                                    <td>Offenburg</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>Dale</td>
                                    <td>fringilla.euismod.enim@quam.ca</td>
                                    <td>0500 527693</td>
                                    <td>New Quay</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-danger">Inactive</span>
                                    </td>
                                    <td>Nathaniel</td>
                                    <td>mi.Duis@diam.edu</td>
                                    <td>(012165) 76278</td>
                                    <td>Grumo Appula</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>Darius</td>
                                    <td>velit@nec.com</td>
                                    <td>0309 690 7871</td>
                                    <td>Ways</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>Oleg</td>
                                    <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                    <td>0500 441046</td>
                                    <td>Rossignol</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>Kermit</td>
                                    <td>diam.Sed.diam@anteVivamusnon.org</td>
                                    <td>(01653) 27844</td>
                                    <td>Patna</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>Jermaine</td>
                                    <td>sodales@nuncsit.org</td>
                                    <td>0800 528324</td>
                                    <td>Mold</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-danger">Inactive</span>
                                    </td>
                                    <td>Ferdinand</td>
                                    <td>gravida.molestie@tinciduntadipiscing.org</td>
                                    <td>(016977) 4107</td>
                                    <td>Marlborough</td>

                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>Kuame</td>
                                    <td>Quisque.purus@mauris.org</td>
                                    <td>(0151) 561 8896</td>
                                    <td>Tresigallo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
