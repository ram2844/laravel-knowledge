<!-- models code -->

<!-- set (insert format) code -->
public function setLastSubmissionAttribute($value)
{
    $this->attributes['last_submission'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
}

<!-- Get code -->
public function getLastSubmissionAttribute($value)
{
    return $value ? date('d-M-Y', strtotime($value)) : null;
}

<!-- form code  -->

<div class="form-group row validated">
    <label class="col-form-label col-lg-3 col-sm-12 text-lg-left">Last Date of Bid Submission:</label>
    <div class="col-lg-9 col-md-9 col-sm-12">

        <div class="input-group date">
            
            <input type="text" name="last_submission" value="{{ old('last_submission', $row->last_submission ?? '') }}" class="form-control kt_datepicker" placeholder="Enter Event Start Date" readonly />

            @error('last_submission')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="la la-calendar-check-o"></i>
                </span>
            </div>
        </div>
    </div>
</div>


<!-- controller code  -->

$tender->last_submission                    = $request->last_submission;



<!-- controller code if date not select then insert today date  -->


$technical_documents->upload_date = $request->input('upload_date') ?? now();


<!-- controller code if date not select then insert today date  -->

public function setUploadDateAttribute($value)
{
    $this->attributes['upload_date'] = $value ? \Carbon\Carbon::parse($value)->format('Y-m-d') : now()->format('Y-m-d');
}
 or 

public function setUploadDateAttribute($value)
{
    // If a date is selected in the request, use that date; otherwise, use today's date
    $selectedDate = $value ? \Carbon\Carbon::parse($value)->format('Y-m-d') : now()->format('Y-m-d');
    $this->attributes['upload_date'] = $selectedDate;
}

