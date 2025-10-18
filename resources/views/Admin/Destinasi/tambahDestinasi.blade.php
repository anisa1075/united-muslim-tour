@extends('template.base')

@section('title', 'Form Destinasi')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Destinasi</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Tabel Destinasi</a></li>
        </ol>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 pb-4">
                <div class="card" style="padding: 1rem; margin-top:1rem;">



                    <form action="{{ route('tambah.destinasi') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="img">Image Destinasi</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="img" class="custom-file-input" id="img">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto Deskripsi Destinasi</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input" id="foto">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                            <p>*ukuran landscpae foto</p>
                        </div>

                        <div class="mb-3">
                            <label for="negara" class="form-label">Negara</label>
                            <input type="text" class="form-control border" id="negara" name="negara"
                                aria-describedby="emailHelp">

                        </div>

                        <div class="mb-3">
                            <label for="link_artikel" class="form-label">Link Artikel Lengkap</label>
                            <input type="text" class="form-control border" id="link_artikel" name="link_artikel"
                                aria-describedby="emailHelp" placeholder="Masukkan berupa link *https">

                        </div>



                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="editor" name="desc" rows="3" placeholder="Enter ..."></textarea>
                        </div>





                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>




@endsection

@section('ckEditor')

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {

                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",

                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
