<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h1>Alpine World!</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Barang</h5>
                        <form action="{{ route('store.barang') }}" method="POST" id="create-form">
                            @csrf
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Ketika form disubmit
                                $('#create-form').submit(function(e) {
                                    e.preventDefault(); // Hindari aksi default form (reload halaman)

                                    // Ambil nilai input
                                    var namaBarang = $('#nama_barang').val();

                                    // Kirim data dengan AJAX
                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ route('store.barang') }}', // URL untuk menyimpan data barang
                                        data: $(this).serialize(), // Data form yang akan dikirim
                                        success: function(response) {
                                            // Jika berhasil, tambahkan data baru ke daftar barang
                                            $('#daftar-barang').append('<tr><td>' + response.nomor_urut + '</td><td>' + response.nama_barang + '</td></tr>');
                                            alert('Barang berhasil ditambahkan!');
                                            $('#nama_barang').val(''); // Kosongkan input setelah submit
                                        },
                                        error: function(xhr, status, error) {
                                            alert('Gagal menambahkan barang. Silakan coba lagi.');
                                        }
                                    });
                                });
                            });
                        </script>



                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


  </body>
</html>
