<div class="modal fade" id="verifyAccountModal" tabindex="-1" role="dialog" aria-labelledby="verifyAccountModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.password.confirm') }}" method="POST" id="verifyAccountForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifyAccountModalLabel">Verify Your Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <p class="text-danger">
                            Please verify your password before completing your action
                        </p>
                        <label for="sYourPassword">
                            Your Password
                            <strong class="text-danger">*</strong>
                        </label>
                        <input type="password" name="password" class="form-control" id="sYourPassword"
                            placeholder="Your Password">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal">
                        <i class="flaticon-cancel-12"></i>
                        Discard
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        $('#verifyAccountForm').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    $('#{{ $formId }}').submit();
                },
                error: function(data) {
                    let passwordInput = form.find('input');
                    var errors = data.responseJSON;
                    passwordInput.addClass('is-invalid');
                    passwordInput.siblings('.invalid-feedback').text(errors.errors.password[0]);
                }
            });
        })
    </script>
@endpush
