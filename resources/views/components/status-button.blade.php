@section('css')
<style>
    input[switch] {
        display: none;
    }
    input[switch] + label {
        font-size: 1em;
        line-height: 1;
        width: 4.7rem;
        height: 1.5rem;
        background-color: #ddd;
        background-image: none;
        border-radius: 2rem;
        padding: 0.1666666667rem;
        cursor: pointer;
        display: inline-block;
        text-align: center;
        position: relative;
        box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.2) inset;
        font-family: inherit;
        -webkit-transition: all 0.1s ease-in-out;
        transition: all 0.1s ease-in-out;
    }
    input[switch] + label:before {
    /* Label */
    text-transform: uppercase;
    color: #b7b7b7;
    content: attr(data-off-label);
    display: block;
    font-family: inherit;
    font-family: FontAwesome, inherit;
    font-weight: 500;
    font-size: 0.6rem;
    line-height: 1.22rem;
    position: absolute;
    right: 0.2166666667rem;
    margin: 0.2166666667rem;
    top: 0;
    text-align: center;
    min-width: 1.6666666667rem;
    overflow: hidden;
    -webkit-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
    }
    input[switch] + label:after {
    /* Slider */
    content: '';
    position: absolute;
    left: 0.1666666667rem;
    background-color: #f7f7f7;
    box-shadow: none;
    border-radius: 2rem;
    height: 1.22rem;
    width: 1.22rem;
    -webkit-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
    }
    input[switch]:checked + label {
    background-color: lightblue;
    background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255, 0.15)), to(rgba(0, 0, 0, 0.2)));
    background-image: linear-gradient(rgba(255, 255, 255, 0.15), rgba(0, 0, 0, 0.2));
    box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3) inset;
    }
    input[switch]:checked + label:before {
    color: #fff;
    content: attr(data-on-label);
    right: auto;
    left: 0.2166666667rem;
    }
    input[switch]:checked + label:after {
    left: 3.22rem;
    background-color: #f7f7f7;
    box-shadow: 1px 1px 10px 0 rgba(0, 0, 0, 0.3);
    }

    input[switch="bool"] + label {
        background-color: #ee6562;
    }
    input[switch="bool"] + label:before {
        color: #fff !important;
    }
    input[switch="bool"]:checked + label {
        background-color: #BCE954;
    }
    input[switch="bool"]:checked + label:before {
        color: #fff !important;
    }

    input[switch="default"]:checked + label {
    background-color: #a2a2a2;
    }
    input[switch="default"]:checked + label:before {
    color: #fff !important;
    }

    input[switch="success"]:checked + label {
    background-color: #BCE954;
    }
    input[switch="success"]:checked + label:before {
    color: #fff !important;
    }

    input[switch="warning"]:checked + label {
    background-color: gold;
    }
    input[switch="warning"]:checked + label:before {
    color: #fff !important;
    }
</style>
@endsection

@props(['status', 'id', 'model'])

<input type="checkbox" id="switch{{ $id }}" class="toggleButton" switch="bool" data-id="{{ $id }}" data-model="{{ $model }}" {{ $status ? 'checked' : '' }}/>
<label for="switch{{ $id }}" data-on-label="Active" data-off-label="Inactive"></label>

@section('script')
<script>
    $(document).ready(function () {
        $('.toggleButton').on('change', function () {
            var id = $(this).data('id');
            var model = $(this).data('model');
            var status = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: '{{ route('toggleStatus') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status,
                    id: id,
                    model: model
                },
                success: function(response) {
                    if(response.success) {
                        toastr.success('Status updated successfully');
                    } else {
                        toastr.warning('Status not updated');
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    if(status === 'error') {
                        toastr.error(xhr.responseJSON.error);
                    }
                }
            });
        });
    });
</script>
@endsection
