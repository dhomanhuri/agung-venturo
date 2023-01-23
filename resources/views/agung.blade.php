<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Venturo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  </head>
  <body>
    <div class="card mt-5 text-center container">
      <h5 class="card-header">Venturo - Laporan penjualan tahunan per menu</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-2">
            <select id="years" class="form-select" aria-label="Default select example">
              <option selected>pilih tahun</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
          </div>
          <div class="col-6 mb-4">
            <button type="button" id="tampilkan" class="btn btn-primary">tampilkan</button>
          </div>
          <hr />
          <table class="table table-bordered">
            <caption>List of users</caption>
            <thead>
            <tr>
                <th scope="col" rowspan="2" valign="center">Menu</th>
                <th scope="col" colspan="12">Periode</th>
                <th scope="col" rowspan="2"  valign="center">Total</th>
            </tr>
            <tr>
                <th scope="col">Jan</th>
                <th scope="col">Feb</th>
                <th scope="col">Mar</th>
                <th scope="col">Apr</th>
                <th scope="col">Mei</th>
                <th scope="col">Jun</th>
                <th scope="col">Jul</th>
                <th scope="col">Ags</th>
                <th scope="col">Sep</th>
                <th scope="col">Okt</th>
                <th scope="col">Nov</th>
                <th scope="col">Des</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($generalarray as $data)
                <tr>
                    @for ($i = 0; $i <= 13; $i++)
                        @if (!empty($data[$i]))
                            <td>{{$data[$i]}}</td>
                        @endif
                        @if (empty($data[$i]))
                            <td></td>
                        @endif
                    @endfor
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
