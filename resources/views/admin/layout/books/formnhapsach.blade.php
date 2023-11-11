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
  <form class="forms-sample" action="{{route('admin.danhmucsach.post-nhap-sach')}}" method="post" enctype="multipart/form-data">
    <div class="col-12 col-lg-12 col-sm-12" style="margin-top:-50px ;">
      <div class="row">
        <div class="col-6 col-lg-6 col-sm-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputName1">Tên Sách</label>
                <input name="TenSach" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên sách ...">
                @error('TenSach')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Nội dung cuốn sách</label>
                <textarea name="NoiDung" class="form-control" id="exampleInputEmail3" cols="30" rows="10" placeholder="Nhập nội dung ..."></textarea>
                @error('NoiDung')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmai33">Tác giả</label>
                <textarea name="TacGia" class="form-control" id="exampleInputEmai33" cols="30" rows="1" placeholder="Nhập tác giả ..."></textarea>
                @error('TacGia')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Số trang của cuốn sách</label>
                <input name="SoTrang" type="number" class="form-control" id="exampleInputPassword4" placeholder="Nhập số trang ...">
                @error('SoTrang')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Thể loại</label>
                <select class="form-control" id="exampleSelectGender" name="MaTL">
                  <option value="">--:--</option>
                  @foreach($list_Tl as $key => $tl)
                  <option value="{{$tl->MaTL}}">{{$tl->TenTL}}</option>
                  @endforeach
                </select>
                @error('MaTL')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputCity1">Giá Sách</label>
                <input name="GiaSach" type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                @error('GiaSach')
                <span style="color: red;">{{$message}}</span>
                @enderror
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


              <a type="submit" class="btn btn-gradient-primary me-2">Submit</a>
              <a class="btn btn-light">Cancel</a>

            </div>
          </div>
        </div>
        <div class="col-6 col-lg-6 col-sm-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <div class="form-group">
                <label>Ảnh sách</label>
                <input type="file" name="AnhSach" class="file-upload-default" id="upload-input">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Ảnh sách ...">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Tải ảnh</button>
                  </span>
                </div>
                @error('AnhSach')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>

              <!-- Image preview container -->
              <div id="image-preview-container">
                <img id="image-preview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 400px; display: none;">
              </div>

              <script>
                $(document).ready(function() {
                  // Handle file input change event
                  $('#upload-input').change(function() {
                    // Get the selected file
                    var file = this.files[0];

                    if (file) {
                      // Create a FileReader
                      var reader = new FileReader();

                      // Set a callback function to update the image preview when the file is loaded
                      reader.onload = function(e) {
                        $('#image-preview').attr('src', e.target.result).show();
                      };

                      // Read the file as a data URL
                      reader.readAsDataURL(file);
                    }
                  });
                });
              </script>


            </div>
          </div>
        </div>

      </div>
    </div>
    @csrf
  </form>

</div>

@endsection