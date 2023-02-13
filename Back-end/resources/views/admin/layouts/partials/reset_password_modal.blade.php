@if (!auth()->user()->reset_password_at)

<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('admin.user.reset_password', auth()->user()) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="reset_password_at" value="{{ now() }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
                </div>
                <div class="modal-body">
                    <p class="modal-text text-danger mb-4">
                        Please reset your default password before accessing the admin panel
                    </p>
                    <div class="form-group mb-4">
                        <label for="sPassword">{{ __('general.common.password') }}</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="sPassword" placeholder="{{ __('general.common.password') }}" value="{{ old('password') }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="sPasswordConfirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="sPasswordConfirmation"
                            placeholder="Password Confirmation" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
<script>
    $('#resetPasswordModal').modal('show');
</script>
@endprepend

@endif
