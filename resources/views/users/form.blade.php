<div class="form-group row">
    <div class="col-6">
        <label for="">Name <span class="text-danger">*</span></label>
        <input type="text" required class="form-control" name="name" value="{{ old('name', $item->name) }}"
            id="name" placeholder="Enter Name">
    </div>
    <div class="col-6">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="{{ old('email', $item->email ?? '') }}"
            id="email" placeholder="Enter Email">
    </div>
    <div class="col-6">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" value="{{ old('password', $item->password ?? '') }}"
            id="password" placeholder="Enter Password">
    </div>
</div>
