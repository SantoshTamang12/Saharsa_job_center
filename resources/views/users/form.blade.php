@push('styles')
    <style>
        /* .profile-div {
                position: absolute;
                top: 0;
                left: 0;
                overflow: hidden;
            }

            #image {
                height: 100%;
                width: 100%;
            } */

        #uploadBtn {
            height: 30px;
            width: 100px;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            / background: rgba(0, 0, 0, 0.7);
            / color: white;
            line-height: 130px;
            font-family: sans-serif;
            font-size: 15px;
            cursor: pointer;
            display: none;
            top: 74px !important;
        }

        .profile-div .close {
            background-color: white;
            position: absolute;
            border-radius: 20px;
            right: 5px;
            top: 35px;
            height: 25px;
            width: 25px;
            text-align: center;
            display: none;

        }

        #file-upload-hidden {
            display: none;
        }
    </style>
@endpush
<div class="form-group row">
    <div class="form-group profile-div">
        <label>Image</label><br>
        <button type="button" class="close" id="close" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <img src="{{ asset('img/placeholder.png') }}" id="image" height="124px" width="124px">
        <input type="file" id="imageUpload" name="image" style="display:none">
        <label for="imageUpload" id="uploadBtn" class="text-white">Browse</label>

    </div>
    <div class="col-6 mt-5">
        <label for="">Name <span class="text-danger">*</span></label>
        <input type="text" required class="form-control" name="name" value="{{ old('name', $item->name) }}"
            id="name" placeholder="Enter Name">
    </div>
    <div class="col-6 mt-5">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="{{ old('email', $item->email ?? '') }}"
            id="email" placeholder="Enter Email">
    </div>
    <div class="col-6 mt-5">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" value="{{ old('password', $item->password ?? '') }}"
            id="password" placeholder="Enter Password">
    </div>
</div>
