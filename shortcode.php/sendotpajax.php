public function sendOtp(Request $request)
    {
        try {
            $validation = \Validator::make($request->all(), [
                'contact' => 'required|digits:10',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validation->errors()->first(),
                    'data' => new \stdClass()
                ]);
            }

            $contact = $request->contact;
            $otp = mt_rand(100000, 999999);
            Session::put('otp', $otp);
            Session::put('contact', $contact);

            return response()->json(['success' => true, 'message' => 'OTP Sent Successfully', 'otp' => $otp]);
            
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Something went wrong.']);
        }
    }




    <!-- js code -->


    $(document).ready(function () {
        $('#contact').on('input', function () {
            var inputValue = $(this).val();
            if (inputValue.length === 10 && !isNaN(inputValue)) {
                $('.sendBtn').show();
            } else {
                $('.sendBtn').hide();
            }
        });
    });

    $(document).ready(function() {
        $('#send-otp').click(function(e) {
            var contact = $("#contact").val();
            e.preventDefault();

            if (!isValidContact(contact)) {
                $('.validation-errors').text('Please enter a valid 10-digit contact number.');
                alert('Please enter a valid 10-digit contact number.');
                setTimeout(function() {
                    $('.validation-errors').text('');
                }, 5000);
                return;
            }
            
            $.ajax({
                type: 'POST',
                url: '{{ route("ajax.send.otp") }}',
                data: {"_token": "{{ csrf_token() }}", contact: contact},
                dataType: 'json',
                success: function(response) {
                    if(response.success) {
                        $('#otp').show().find('input').prop('required', true);
                        $('.sendBtn').hide();
                        alert('OTP has been sent successfully! Please check your phone.');
                        var generatedOTP = response.otp;
                    } else {
                        $('.validation-errors').text(response.message);
                        alert('Failed to send OTP. Please try again later.');
                        setTimeout(function() {
                            $('.validation-errors').text('');
                        }, 5000);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#query-form').submit(function(e) {
            e.preventDefault();
            submitForm();
        });

        

        
        function isValidContact(contact) {
            if (contact.trim() === '') {
                return false;
            }
            if (!/^\d+$/.test(contact)) {
                return false;
            }
            if (contact.length !== 10) {
                return false;
            }

            return true;
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const sendBtn = document.getElementById('send-otp');

        sendBtn.addEventListener('click', function() {
            sendBtn.disabled = true;
        });
    });




    <!-- form code  -->


    <div class="col-6">
        <div class="form-group row validated" style="position:relative;">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <input type="text" oninput="this.value=this.value.replace(/[^0-9]/, '')" name="contact" id="contact" value="{{ old('contact', $row->contact ?? '') }}" class="form-control form-control-lg form-control-custom" maxlength="10"   placeholder="Enter Contact"/>
                @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
            </div>
        </div> 
        <div id="otp" style="display:none; margin-top: -65px; margin-left: 190px; position: absolute;">
            <input id="otp-input" placeholder="Enter OTP" class="form-control" name="otp" type="text" required>
        </div>
        <div class="sendBtn" style=" margin-top: -65px; margin-left: 290px; position: absolute; display:none;">
            <input type="button" id="send-otp" class="btn btn-primary" value="Send OTP" >
        </div>
    </div>