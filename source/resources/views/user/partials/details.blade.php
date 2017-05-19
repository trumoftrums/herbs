<div class="panel panel-default">
    <div class="panel-heading">Thông tin chi tiết</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">Vai trò</label>
                    {!! Form::select('role', $roles, $edit ? $user->roles->first()->id : '',
                        ['class' => 'form-control', 'id' => 'role', $profile ? 'disabled' : '']) !!}
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    {!! Form::select('status', $statuses, $edit ? $user->status : '',
                        ['class' => 'form-control', 'id' => 'status', $profile ? 'disabled' : '']) !!}
                </div>
                <div class="form-group">
                    <label for="first_name">Tên</label>
                    <input type="text" class="form-control" id="first_name"
                           name="first_name" placeholder="Tên" value="{{ $edit ? $user->first_name : '' }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Họ</label>
                    <input type="text" class="form-control" id="last_name"
                           name="last_name" placeholder="Họ" value="{{ $edit ? $user->last_name : '' }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="birthday">Ngày sinh</label>
                    <div class="form-group">
                        <div class='input-group date'>
                            <input type='text' name="birthday" id='birthday' value="{{ $edit ? $user->birthday : '' }}" class="form-control" />
                            <span class="input-group-addon" style="cursor: default;">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Số ĐT</label>
                    <input type="text" class="form-control" id="phone"
                           name="phone" placeholder="Số ĐT" value="{{ $edit ? $user->phone : '' }}">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address"
                           name="address" placeholder="Địa chỉ" value="{{ $edit ? $user->address : '' }}">
                </div>
                <div class="form-group">
                    <label for="address">Quốc gia</label>
                    {!! Form::select('country_id', $countries, $edit ? $user->country_id : '', ['class' => 'form-control']) !!}
                </div>
            </div>

            @if ($edit)
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="update-details-btn">
                        <i class="fa fa-refresh"></i>
                        Cập nhật
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>