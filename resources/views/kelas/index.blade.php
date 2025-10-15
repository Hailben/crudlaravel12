<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kelas</title>
</head>
<body>
    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-center">
        <h1 style="width:75%; margin-top:50px;">Data Kelas</h1>
    </div>

    <div class="d-flex justify-content-center">
        <table class="table" style="width:75%; margin-top:50px;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Tingkat</th>
                    <th scope="col">Wali Kelas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($kelas)>0)
                    @foreach($kelas as $key=>$kelasItem)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $kelasItem->nama_kelas }}</td>
                        <td>{{ $kelasItem->tingkat }}</td>
                        <td>{{ $kelasItem->wali_kelas }}</td>
                        <td>
                            <a href="{{ route('kelas.edit', $kelasItem->id) }}" class="btn btn-outline-success my-1">Edit</a>
                            
                            <form action="{{ route('kelas.destroy', $kelasItem->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger my-1" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data kelas</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>