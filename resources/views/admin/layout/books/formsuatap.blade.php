@extends('admin.index')

@section('body')
<div class="row">
  <div class="col-12 col-lg-12 col-sm-12 ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Chỉnh sửa thông tin cho tập</h4>
        <hr>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-12 col-sm-12" style="margin-top:-50px ;">
    <div class="row">
      <div class="col-6 col-lg-6 col-sm-12 grid-margin stretch-card">

        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h4>Thông tin sách</h4>
            </div>
            <div class="form-group">
              <label>Tên Sách</label>
              <input type="text" class="form-control" value="{{$sach[0]->TenSach}}" disabled>
            </div>
            <div class="form-group">
              <label>Nội dung cuốn sách</label>
              <textarea class="form-control" cols="30" rows="10" disabled>{{$sach[0]->NoiDung}}</textarea>
            </div>
            <div class="form-group">
              <label>Tác giả</label>
              <textarea class="form-control" cols="30" rows="1" disabled>{{$sach[0]->TacGia}}</textarea>
            </div>
            <div class="form-group">
              <label>Số trang của cuốn sách</label>
              <input type="number" class="form-control" disabled value="{{$sach[0]->SoTrang}}">
            </div>
            <div class="form-group">
              <label>Thể loại</label>
              <input type="text" class="form-control" disabled value="{{$sach[0]->TenTL}}">
            </div>
            <div class="form-group">
              <label>Giá Sách</label>
              <input type="text" class="form-control" disabled value="{{$sach[0]->GiaSach}}">
            </div>
            <div class="form-group">
              <label>Ảnh sách</label>
              <div id="image-preview-container">
                <img id="image-preview" src="{{asset('storage/books/'.$sach[0]->AnhSach)}}" alt="Image Book" style="max-width: 100%; max-height: 400px;">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-6 col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h4>Thông tin tập</h4>
            </div>
            <form method="post" action="{{route('admin.danhmucsach.post-form-sua-tap',['idTap'=>$sach[0]->MaTap])}}" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputName1">Tên Tập</label>
                <input name="TenTap" type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên tập ..." value="{{$sach[0]->TenTap}}">
                @error('TenTap')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Nội dung của cuốn sách</label>
                <textarea name="NoiDungTap" class="form-control" id="exampleInputEmail3" cols="30" rows="10" placeholder="Nhập nội dung ...">{{$sach[0]->NoiDungTap}}</textarea>
                @error('NoiDungTap')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Số trang sách của tập</label>
                <input name="SoTrangTap" type="number" class="form-control" id="exampleInputPassword4" placeholder="Nhập số trang ..." value="{{$sach[0]->SoTrangTap}}">
                @error('SoTrangTap')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Số lượng bản sao</label>
                <input name="SoLuongBS" type="number" class="form-control" id="exampleInputPassword4" placeholder="Nhập số lượng bản sao ..." value="{{$sach[0]->SoLuongBS}}">
                @error('SoLuongBS')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Ảnh tập</label>
                <input type="file" name="AnhTap" class="file-upload-default" id="upload-input" value="{{old('AnhTap')}}">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Ảnh tập ..." value="{{old('AnhTap')}}">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Tải ảnh</button>
                  </span>
                </div>
                @error('AnhTap')
                <span style="color: red;">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-gradient-primary me-2">Cập nhật</button>
                <a href="{{route('admin.danhmucsach.index')}}" class="btn btn-light">Cancel</a>
              </div>
              @csrf
            </form>
            <!-- Image preview container -->
            <div id="image-preview-container">
              <img id="image-preview-1" src="{{asset('storage/books/'.$sach[0]->AnhTap)}}" alt="Image Preview" style="max-width: 100%; max-height: 400px;">
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
                      $('#image-preview-1').attr('src', e.target.result).show();
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
</div>

@endsection