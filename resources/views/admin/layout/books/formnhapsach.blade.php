@extends('admin.index')

@section('body')
<div class="row">
  <div class="col-12 col-lg-12 col-sm-12 ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm mới sách</h4>
        <hr>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-12 col-sm-12" style="margin-top:-50px ;">
    <div class="row">
      <div class="col-6 col-lg-6 col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputName1">Tên Sách</label>
                <input name="TenSach" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên sách ...">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Nội dung cuốn sách</label>
                <textarea name="NoiDung" class="form-control" id="exampleInputEmail3" cols="30" rows="10" placeholder="Nhập nội dung ..."></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Số trang của cuốn sách</label>
                <input name="SoTrang" type="number" class="form-control" id="exampleInputPassword4" placeholder="Nhập số trang ...">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Thể loại</label>
                <select class="form-control" id="exampleSelectGender" name="TenTL">
                @foreach($list_Tl as $key => $tl)
                <option value="{{$tl->TenTL}}">{{$tl->TenTL}}</option>
                @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputCity1">Giá Sách</label>
                <input name="GiaSach" type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
              </div>
              <div class="form-group">
                <label for="exampleInputCypher1" class="mr-2">Số lượng</label>
                <input name="SoLuong" type="number" class="form-control mr-2" id="exampleInputCypher1" placeholder="Số lượng ..." disabled>

              </div>
              <div class="form-group">
                
              <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" id="hasTap" name="tapOption" onclick="toggleInput()">
                  <label class="form-check-label" for="hasTap">Sách không có tập</label>
                </div>

                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" id="noTap" name="tapOption" onclick="toggleInput()">
                  <label class="form-check-label" for="noTap">Sách có tập</label>
                </div>
              </div>

              <script>
                function toggleInput() {
                  var inputElement = document.getElementById('exampleInputCypher1');
                  var hasTapRadio = document.getElementById('hasTap');
                  var noTapRadio = document.getElementById('noTap');

                  if (hasTapRadio.checked) {
                    inputElement.disabled = false;
                  } else if (noTapRadio.checked) {
                    inputElement.disabled = true;
                    inputElement.value = '';
                  }
                }
              </script>



              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
              @csrf
            </form>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-6 col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form class="forms-sample">

              <div class="form-group">
                <label>File upload</label>
                <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection