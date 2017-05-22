<div class="panel panel-default">
    <div class="panel-heading">Thông tin đăng nhập</div>
    <div class="panel-body">
        <div class="form-group">
            <label for="email">@lang('app.email')</label>
            <input type="email" class="form-control" id="email"
                   name="email" placeholder="@lang('app.email')" value="{{ $edit ? $user->email : '' }}">
        </div>
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" placeholder="Tên đăng nhập"
                   name="username" value="{{ $edit ? $user->username : '' }}">
        </div>
        <div class="form-group">
            <label for="password">{{ $edit ? trans("app.new_password") : trans('app.password') }}</label>
            <input type="password" class="form-control" id="password"
                   name="password" @if ($edit) placeholder="Để trống nếu bạn không muốn thay đổi mật khẩu" @endif>
        </div>
        <div class="form-group">
            <label for="password_confirmation">{{ $edit ? trans("app.confirm_new_password") : trans('app.confirm_password') }}</label>
            <input type="password" class="form-control" id="password_confirmation"
                   name="password_confirmation" @if ($edit) placeholder="Để trống nếu bạn không muốn thay đổi mật khẩu" @endif>
        </div>
        @if ($edit)
            <button type="submit" class="btn btn-primary" id="update-login-details-btn">
                <i class="fa fa-refresh"></i>
                Cập nhật
            </button>
        @endif
    </div>
</div>