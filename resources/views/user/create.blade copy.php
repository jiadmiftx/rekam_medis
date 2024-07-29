{!! Html::form('post', '/users')->open() !!}

<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Html::label('name', __('Name'))->class('form-label') !!}
                {!! Html::input('text', 'name', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Enter User Name'),
                    'required' => 'required',
                ]) !!}
                @error('name')
                    <small class="invalid-name" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Html::label('email', __('Email'))->class('form-label') !!}
                {!! Html::input('text', 'email', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Enter User Email'),
                    'required' => 'required',
                ]) !!}
                @error('email')
                    <small class="invalid-email" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        @if (\Auth::user()->type != 'super admin')
            <div class="form-group col-md-6">
                {!! Html::label('role', __('User Role'))->class('form-label') !!}
                {!! Html::select('role', $roles, null, ['class' => 'form-control select', 'required' => 'required']) !!}
                @error('role')
                    <small class="invalid-role" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        @elseif(\Auth::user()->type == 'super admin')
            {!! Html::hidden('role', 'company', ['class' => 'form-control select2', 'required' => 'required']) !!}
        @endif
        <div class="col-md-6">
            <div class="form-group">
                {!! Html::label('password', __('Password'))->class('form-label') !!}
                {!! Html::input('password', 'password', null, [
                    'class' => 'form-control',
                    'placeholder' => __('Enter User Password'),
                    'required' => 'required',
                    'minlength' => '6',
                ]) !!}
                @error('password')
                    <small class="invalid-password" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    {!! Html::button(__('Cancel'), ['type' => 'button', 'class' => 'btn btn-light', 'data-bs-dismiss' => 'modal']) !!}
    {!! Html::submitButton(__('Create'), ['class' => 'btn btn-primary']) !!}
</div>
{!! Html::form()->close() !!}
