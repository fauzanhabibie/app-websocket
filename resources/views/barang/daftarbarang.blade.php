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
                        <h5 class="card-title">Daftar Barang</h5>
                        <table id="daftar-barang" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $key => $item)
                                <tr>
                                    <td scope="row">{{ $key + 1 }}</td> <!-- Nomor urut dimulai dari 1 -->
                                    <td>{{ $item->nama_barang }}</td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
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

    <!-- Di bagian akhir HTML Anda -->
    <script>
        fetch('/formbarang', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan token CSRF Anda disertakan jika diperlukan
            },
            body: JSON.stringify({ nama_barang: nama_barang })
        })
        .then(response => response.json())
        .then(data => {
            // Tangkap respons JSON dan tampilkan pesan
            alert(data.message); // Anda dapat menggunakan cara lain untuk menampilkan pesan
        })
        .catch(error => console.error('Error:', error));

            </script>

  </body>
</html>